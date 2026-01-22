<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\Video;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VideoController extends Controller
{
    public function points(Request $request): View
    {
        $user = $request->user();

        return view('dashboard.creator-video-points', [
            'user' => $user,
            'videos' => $user->videos()->latest()->take(10)->get(),
            'totalPoints' => $user->videos()->sum('points_awarded'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'is_promoted' => ['nullable', 'boolean'],
        ]);

        $pointsPerVideo = (int) SiteSetting::where('key', 'video_points_per_upload')->value('value') ?: 100;
        $bonusPoints = (int) SiteSetting::where('key', 'video_points_promoted_bonus')->value('value') ?: 0;

        $isPromoted = $request->boolean('is_promoted');
        $pointsAwarded = $pointsPerVideo + ($isPromoted ? $bonusPoints : 0);

        Video::create([
            'user_id' => $request->user()->id,
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'is_promoted' => $isPromoted,
            'points_awarded' => $pointsAwarded,
        ]);

        return back()->with('status', 'تم رفع الفيديو ومنح النقاط بنجاح.');
    }
}
