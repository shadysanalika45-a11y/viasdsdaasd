<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }

        $request->session()->regenerate();

        AuditLog::record('auth.login', Auth::user(), ['ip' => $request->ip()]);

        return redirect()->intended(route('profile'));
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'status' => 'active',
        ]);

        Auth::login($user);

        AuditLog::record('auth.register', $user, ['ip' => $request->ip()]);

        return redirect()->route('profile');
    }

    public function logout(Request $request): RedirectResponse
    {
        AuditLog::record('auth.logout', $request->user(), ['ip' => $request->ip()]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function profile(Request $request): View
    {
        return view('pages.profile', ['user' => $request->user()]);
    }

    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());
        $user->save();

        AuditLog::record('profile.update', $user, ['ip' => $request->ip()]);

        return back()->with('status', 'Profile updated.');
    }
}
