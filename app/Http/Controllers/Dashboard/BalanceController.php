<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Transaction;
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
            ['amount' => 0, 'currency' => 'USD']
        );

        $balance->increment('amount', $request->input('amount'));

        Transaction::create([
            'user_id' => $request->user()->id,
            'type' => 'credit',
            'amount' => $request->input('amount'),
            'status' => 'completed',
            'description' => 'إضافة رصيد عبر ' . $request->input('method'),
        ]);

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
            ['amount' => 0, 'currency' => 'USD']
        );

        if ($balance->amount < $request->input('amount')) {
            return back()->withErrors(['amount' => 'الرصيد غير كافٍ لإتمام عملية السحب.']);
        }

        $balance->decrement('amount', $request->input('amount'));

        Transaction::create([
            'user_id' => $request->user()->id,
            'type' => 'debit',
            'amount' => $request->input('amount'),
            'status' => 'pending',
            'description' => 'طلب سحب عبر ' . $request->input('method'),
        ]);

        return back()->with('status', 'تم إرسال طلب السحب بنجاح.');
    }
}
