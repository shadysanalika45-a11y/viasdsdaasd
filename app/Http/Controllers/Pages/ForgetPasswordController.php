<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ForgetPasswordController extends Controller
{
    public function index(): View
    {
        return view('pages.forget-password');
    }

    public function submit(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        return back()->with('status', 'تم إرسال رابط إعادة تعيين كلمة المرور إذا كان البريد مسجلًا لدينا.');
    }
}
