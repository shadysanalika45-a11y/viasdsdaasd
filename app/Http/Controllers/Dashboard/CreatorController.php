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
        $user = $request->user();

        return view('dashboard.creator-dashboard', [
            'user' => $user,
            'subscription' => $user->subscriptions()->with('plan')->latest('starts_at')->first(),
        ]);
    }

    public function addVideo(): View
    {
        return view('dashboard.creator.add-video', [
            'categories' => ['تقني', 'تعليمي', 'ترفيهي', 'إعلاني'],
        ]);
    }

    public function blog(): View
    {
        return view('dashboard.creator.blog', [
            'drafts' => ['كيف تخطط لمحتوى أسبوعي', 'أفضل أدوات المونتاج السريعة'],
        ]);
    }

    public function orders(): View
    {
        return view('dashboard.creator.orders', [
            'orders' => [
                ['id' => '#204', 'client' => 'شركة الأفق', 'status' => 'جديد'],
                ['id' => '#205', 'client' => 'منصة سيل', 'status' => 'قيد التنفيذ'],
            ],
        ]);
    }

    public function messages(): View
    {
        return view('dashboard.creator.messages', [
            'threads' => [
                ['name' => 'شركة الأفق', 'last_message' => 'نود معرفة موعد التسليم.', 'status' => 'جديد'],
                ['name' => 'مؤسسة إبداع', 'last_message' => 'تم استلام الفيديو، شكرًا.', 'status' => 'مكتمل'],
            ],
        ]);
    }

    public function notifications(): View
    {
        return view('dashboard.creator.notifications', [
            'notifications' => [
                'تمت إضافة نقاط جديدة بعد رفع الفيديو الأخير.',
                'لديك طلب جديد يحتاج الموافقة.',
                'تم تحويل رصيد إلى حسابك.',
            ],
        ]);
    }

    public function statistics(): View
    {
        return view('dashboard.creator.statistics', [
            'stats' => [
                'views' => 12450,
                'likes' => 820,
                'comments' => 96,
                'points' => 3100,
            ],
        ]);
    }

    public function reels(): View
    {
        return view('dashboard.creator.reels', [
            'reels' => ['ريل توضيحي للمنتج', 'ريل إعلان تخفيضات', 'ريل كواليس التصوير'],
        ]);
    }

    public function ratings(): View
    {
        return view('dashboard.creator.ratings', [
            'ratings' => [
                ['video' => 'فيديو حملة الصيف', 'score' => 4.8, 'count' => 32],
                ['video' => 'مراجعة تطبيق', 'score' => 4.5, 'count' => 18],
            ],
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

    public function storeSupportMessage(Request $request): RedirectResponse
    {
        $request->validate([
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        return back()->with('status', 'تم إرسال رسالة الدعم بنجاح.');
    }

    public function storeOffer(Request $request): RedirectResponse
    {
        $request->validate([
            'price' => ['required', 'numeric', 'min:1'],
            'package' => ['required', 'string', 'max:150'],
        ]);

        return back()->with('status', 'تم حفظ العرض بنجاح.');
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
