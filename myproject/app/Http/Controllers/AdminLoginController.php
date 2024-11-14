<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminLoginController extends Controller
{
    // Show the admin login form
    public function showLoginForm()
    {
        return view('admin.login'); // Ensure you create this view
    }

    // Handle the login submission
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user as admin
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => true])) {
            return redirect()->intended('/admin/dashboard'); // Redirect to admin dashboard if successful
        }

        // Redirect back with error if login fails
        return redirect()->back()->withErrors([
            'error' => 'Invalid credentials or you do not have admin access.',
        ]);
    }
}
