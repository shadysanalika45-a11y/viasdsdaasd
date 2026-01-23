<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $creator = auth('creator')->user();
        $projects = $creator->projects()->with('client', 'currency')->latest()->paginate(10);
        $portfolios = $creator->portfolios()->latest()->take(6)->get();

        return view('creator.dashboard.index', compact('creator', 'projects', 'portfolios'));
    }
}
