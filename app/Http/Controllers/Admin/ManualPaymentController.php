<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\ManualPaymentProof;
use App\Models\Subscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ManualPaymentController extends Controller
{
    public function index(): View
    {
        return view('admin.manual-payments.index', [
            'proofs' => ManualPaymentProof::with(['payment', 'payment.user'])->latest()->get(),
        ]);
    }

    public function approve(ManualPaymentProof $proof): RedirectResponse
    {
        $payment = $proof->payment;
        $payment->update(['status' => 'approved']);

        Subscription::updateOrCreate(
            ['user_id' => $payment->user_id],
            [
                'plan_id' => $payment->plan_id,
                'status' => 'active',
                'starts_at' => now(),
                'ends_at' => now()->addMonth(),
            ]
        );

        $proof->update(['status' => 'approved']);

        AuditLog::record('manual_payment.approved', auth()->user(), ['proof_id' => $proof->id]);

        return back()->with('status', 'Payment approved.');
    }

    public function reject(ManualPaymentProof $proof): RedirectResponse
    {
        $proof->update(['status' => 'rejected']);
        $proof->payment->update(['status' => 'rejected']);

        AuditLog::record('manual_payment.rejected', auth()->user(), ['proof_id' => $proof->id]);

        return back()->with('status', 'Payment rejected.');
    }
}
