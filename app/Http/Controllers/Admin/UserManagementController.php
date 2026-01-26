<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::latest()->paginate(20),
        ]);
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        AuditLog::record('admin.user.update', auth()->user(), ['user_id' => $user->id]);

        return redirect()->route('admin.users.index')->with('status', 'User updated.');
    }
}
