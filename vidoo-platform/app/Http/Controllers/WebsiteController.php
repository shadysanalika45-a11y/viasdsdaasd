<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.index');
    }

    public function creators()
    {
        $creators = \App\Models\Creator::where('active', true)
            ->where('verified', true)
            ->with('country', 'portfolios')
            ->paginate(12);

        return view('website.creators', compact('creators'));
    }

    public function pricing()
    {
        $packages = \App\Models\Package::where('active', true)
            ->orderBy('order')
            ->get();

        return view('website.pricing', compact('packages'));
    }

    public function brands()
    {
        return view('website.brands');
    }

    public function agencies()
    {
        return view('website.agencies');
    }

    public function ecommerce()
    {
        return view('website.ecommerce');
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function policy()
    {
        return view('website.policy');
    }

    public function conditions()
    {
        return view('website.conditions');
    }

    public function refund()
    {
        return view('website.refund');
    }

    public function packagePolicy()
    {
        return view('website.package-policy');
    }
}
