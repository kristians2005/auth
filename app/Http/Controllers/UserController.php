<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return Inertia::render('Admin/Users', [
            'users' => $users
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,admin'
        ]);

        $user->update([
            'role' => $request->role
        ]);

        return redirect()->back()->with('success', 'User role updated successfully.');
    }
}