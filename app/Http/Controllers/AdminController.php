<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function profilepage()
    {
        return view("adminview.profile");
    }
    public function update(Request $request)
{
    $user = auth()->user();

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        'password' => 'nullable|string|min:8|confirmed', // Add validation for the password field
    ]);

    // Update name and email
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];

    // Update password if provided
    if ($request->filled('password')) {
        $user->password = Hash::make($validatedData['password']);
    }

    $user->save();

    return redirect()->route('admin/home')->with('success', 'Profile updated successfully.');
}
}
