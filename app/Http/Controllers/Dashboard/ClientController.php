<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        return view('dashboard.client-dashboard', [
            'user' => $user,
            'subscription' => $user->subscriptions()->with('plan')->latest('starts_at')->first(),
            'plans' => Plan::where('is_active', true)->orderBy('price')->get(),
            'payments' => Payment::where('user_id', $user->id)->latest()->take(5)->get(),
            'balance' => $user->balance,
        ]);
    }

    public function search(): View
    {
        return view('dashboard.client.search', [
            'filters' => ['الفيديوهات', 'المبدعون', 'الحملات الإعلانية'],
            'recentSearches' => ['حملة موسم الصيف', 'مراجعة تطبيق', 'مبدع تقني'],
        ]);
    }

    public function notifications(): View
    {
        return view('dashboard.client.notifications', [
            'notifications' => [
                'تم إرسال رسالة جديدة من أحد المبدعين.',
                'تم تحديث حالة طلب الفيديو #102.',
                'تم تفعيل خطة الاشتراك السنوية.',
            ],
        ]);
    }

    public function messages(): View
    {
        return view('dashboard.client.messages', [
            'threads' => [
                ['name' => 'سارة أحمد', 'last_message' => 'سأرسل النسخة الأولى غدًا.', 'status' => 'نشط'],
                ['name' => 'أحمد يوسف', 'last_message' => 'هل يمكن تعديل مدة الفيديو؟', 'status' => 'بانتظار رد'],
            ],
        ]);
    }

    public function subscription(Request $request): View
    {
        $user = $request->user();

        return view('dashboard.client.subscription', [
            'subscription' => $user->subscriptions()->with('plan')->latest('starts_at')->first(),
            'plans' => Plan::where('is_active', true)->orderBy('price')->get(),
        ]);
    }

    public function marketing(): View
    {
        return view('dashboard.client.marketing', [
            'campaigns' => [
                ['name' => 'حملة إطلاق المنتج', 'views' => 1200, 'engagement' => '4.2%'],
                ['name' => 'حملة العروض الموسمية', 'views' => 860, 'engagement' => '3.7%'],
            ],
        ]);
    }

    public function orders(): View
    {
        return view('dashboard.client.orders', [
            'orders' => [
                ['id' => '#101', 'status' => 'مكتمل', 'creator' => 'ريم خالد'],
                ['id' => '#102', 'status' => 'قيد التنفيذ', 'creator' => 'محمد علي'],
            ],
        ]);
    }

    public function requestVideo(): View
    {
        return view('dashboard.client.request-video');
    }
}
