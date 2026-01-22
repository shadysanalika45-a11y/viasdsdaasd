<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreatorController extends Controller
{
    public function index(Request $request): View
    {
        return view('dashboard.creator.index', [
            'user' => $request->user(),
        ]);
    }

    public function storeIntroVideo(Request $request): RedirectResponse
    {
        $request->validate([
            'intro_video_url' => ['required', 'url', 'max:2048'],
            'intro_video_title' => ['nullable', 'string', 'max:120'],
        ]);

        return back()->with('status', 'تم حفظ الفيديو التعريفي بنجاح.');
    }

    public function storeDeposit(Request $request): RedirectResponse
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:1'],
            'method' => ['required', 'string', 'max:100'],
        ]);

        return back()->with('status', 'تم إنشاء طلب شحن الرصيد بنجاح.');
    }

    public function storeWithdrawal(Request $request): RedirectResponse
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:1'],
            'payout_method' => ['required', 'string', 'max:100'],
            'payout_details' => ['required', 'string', 'max:255'],
        ]);

        return back()->with('status', 'تم إرسال طلب السحب بنجاح.');
    }

    public function storeSupportMessage(Request $request): RedirectResponse
    {
        $request->validate([
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        return back()->with('status', 'تم إرسال رسالة الدعم بنجاح.');
    }

    public function updateOrderStatus(Request $request, string $order): RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'in:pending,in_progress,completed,rejected'],
            'notes' => ['nullable', 'string', 'max:500'],
            'delivery_url' => ['nullable', 'url', 'max:2048'],
        ]);

        return back()->with('status', "تم تحديث حالة الطلب #{$order} بنجاح.");
    }
}
