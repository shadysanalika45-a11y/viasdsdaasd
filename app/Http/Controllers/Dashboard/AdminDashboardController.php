<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard.admin.index', [
            'users' => User::count(),
            'subscriptions' => Subscription::count(),
            'payments' => Payment::count(),
        ]);
    }
}
