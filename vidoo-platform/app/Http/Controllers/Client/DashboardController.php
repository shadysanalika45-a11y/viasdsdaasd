<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $client = auth('client')->user();
        $projects = $client->projects()->with('creator', 'currency')->latest()->paginate(10);

        return view('client.dashboard.index', compact('client', 'projects'));
    }
}
