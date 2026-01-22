<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreatorRegisterController extends Controller
{
    public function index(): View
    {
        return view('pages.creator-register');
    }
}
