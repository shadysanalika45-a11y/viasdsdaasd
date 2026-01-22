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
}
