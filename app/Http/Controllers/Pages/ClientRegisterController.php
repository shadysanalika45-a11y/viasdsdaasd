<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ClientRegisterController extends Controller
{
    public function index(): View
    {
        return view('pages.client-register');
    }
}
