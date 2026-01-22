<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\SiteSetting;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.admin-dashboard', [
            'plans' => Plan::orderBy('price')->get(),
            'users' => User::count(),
            'subscriptions' => Subscription::count(),
            'totalBalance' => Transaction::where('type', 'credit')->sum('amount'),
            'totalPoints' => Video::sum('points_awarded'),
        ]);
    }

    public function videoPoints(): View
    {
        return view('admin.admin-video-points', [
            'pointsPerVideo' => SiteSetting::where('key', 'video_points_per_upload')->value('value') ?? 100,
            'promotedBonus' => SiteSetting::where('key', 'video_points_promoted_bonus')->value('value') ?? 0,
            'pointValue' => SiteSetting::where('key', 'video_point_value')->value('value') ?? 0.1,
        ]);
    }

    public function updateVideoPoints(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'video_points_per_upload' => ['required', 'integer', 'min:0'],
            'video_points_promoted_bonus' => ['required', 'integer', 'min:0'],
            'video_point_value' => ['required', 'numeric', 'min:0'],
        ]);

        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => (string) $value]);
        }

        return back()->with('status', 'تم تحديث إعدادات النقاط بنجاح.');
    }

    public function reports(): View
    {
        $balanceSummary = Transaction::selectRaw('DATE(created_at) as day, SUM(amount) as total')
            ->where('type', 'credit')
            ->groupBy('day')
            ->orderBy('day')
            ->take(14)
            ->get();

        $videoSummary = Video::selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->groupBy('day')
            ->orderBy('day')
            ->take(14)
            ->get();

        return view('admin.reports', [
            'balanceSummary' => $balanceSummary,
            'videoSummary' => $videoSummary,
            'totalBalance' => Transaction::where('type', 'credit')->sum('amount'),
            'totalPoints' => Video::sum('points_awarded'),
            'activeSubscriptions' => Subscription::where('status', 'active')->count(),
        ]);
    }
}
