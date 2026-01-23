<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\Creator;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        $countries = Country::where('active', true)->get();
        return view('creator.register', compact('countries'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:creators,email',
            'phone' => 'required|string|max:20',
            'country_id' => 'required|exists:countries,id',
            'password' => 'required|string|min:8',
            'gender' => 'nullable|in:ذكر,أنثى',
            'birthdate' => 'nullable|date',
            'agree' => 'required|accepted',
        ]);

        $creator = Creator::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
        ]);

        Auth::guard('creator')->login($creator);

        return redirect()->route('creator.dashboard')->with('success', 'تم إنشاء حسابك بنجاح!');
    }

    public function logout(Request $request)
    {
        Auth::guard('creator')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
