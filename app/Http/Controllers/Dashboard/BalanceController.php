<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Transaction;
use App\Notifications\TransactionOtpNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BalanceController extends Controller
{
    public function client(Request $request): View
    {
        $user = $request->user();

        return view('dashboard.client-balance', [
            'user' => $user,
            'balance' => $user->balance,
            'transactions' => $user->transactions()->latest()->take(10)->get(),
        ]);
    }

    public function creator(Request $request): View
    {
        $user = $request->user();

        return view('dashboard.creator-balance', [
            'user' => $user,
            'balance' => $user->balance,
            'transactions' => $user->transactions()->latest()->take(10)->get(),
        ]);
    }

    public function add(Request $request): RedirectResponse
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:1'],
            'method' => ['required', 'string', 'max:100'],
        ]);

        $balance = Balance::firstOrCreate(
            ['user_id' => $request->user()->id],
            ['amount' => 0, 'points' => 0, 'currency' => 'USD']
        );

        $balance->increment('amount', $request->input('amount'));

        $transaction = Transaction::create([
            'user_id' => $request->user()->id,
            'type' => 'credit',
            'amount' => $request->input('amount'),
            'points' => 0,
            'status' => 'completed',
            'gateway' => $request->input('method'),
            'verification_code' => (string) random_int(100000, 999999),
            'description' => 'إضافة رصيد عبر ' . $request->input('method'),
        ]);

        $request->user()->notify(new TransactionOtpNotification($transaction));

        return back()->with('status', 'تمت إضافة الرصيد بنجاح.');
    }

    public function withdraw(Request $request): RedirectResponse
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:1'],
            'method' => ['required', 'string', 'max:100'],
            'details' => ['required', 'string', 'max:255'],
        ]);

        $balance = Balance::firstOrCreate(
            ['user_id' => $request->user()->id],
            ['amount' => 0, 'points' => 0, 'currency' => 'USD']
        );

        if ($balance->amount < $request->input('amount')) {
            return back()->withErrors(['amount' => 'الرصيد غير كافٍ لإتمام عملية السحب.']);
        }

        $balance->decrement('amount', $request->input('amount'));

        $transaction = Transaction::create([
            'user_id' => $request->user()->id,
            'type' => 'debit',
            'amount' => $request->input('amount'),
            'points' => 0,
            'status' => 'pending',
            'gateway' => $request->input('method'),
            'verification_code' => (string) random_int(100000, 999999),
            'description' => 'طلب سحب عبر ' . $request->input('method'),
        ]);

        $request->user()->notify(new TransactionOtpNotification($transaction));

        return back()->with('status', 'تم إرسال طلب السحب بنجاح.');
    }

    public function confirm(Request $request, Transaction $transaction): RedirectResponse
    {
        $request->validate([
            'verification_code' => ['required', 'string', 'max:10'],
        ]);

        if ($transaction->user_id !== $request->user()->id) {
            abort(403);
        }

        if ($transaction->verified_at) {
            return back()->with('status', 'تم تأكيد العملية مسبقًا.');
        }

        if ($transaction->verification_code !== $request->input('verification_code')) {
            return back()->withErrors(['verification_code' => 'رمز التحقق غير صحيح.']);
        }

        $transaction->forceFill([
            'verified_at' => now(),
            'status' => $transaction->status === 'pending' ? 'completed' : $transaction->status,
        ])->save();

        return back()->with('status', 'تم تأكيد العملية بنجاح.');
    }
}
