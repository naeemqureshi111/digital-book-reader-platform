<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
   public function login(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $email = $request->input('email');
    $password = $request->input('password');

    // Try to find the user in admin guard first
    $admin = Admin::where('email', $email)->first();
    if ($admin) {
        if (Hash::check($password, $admin->password)) {
            Auth::guard('admin')->login($admin, $request->filled('remember'));
            $request->session()->regenerate();
            return redirect()->intended('/admin-dashboard');
        } else {
            return back()->withErrors(['password' => 'Incorrect password.'])->withInput();
        }
    }

    // Then try to find the user in web guard
    $user = User::where('email', $email)->first();
    if ($user) {
        if (Hash::check($password, $user->password)) {
            Auth::guard('web')->login($user, $request->filled('remember'));
            $request->session()->regenerate();
            return redirect()->intended('/question');
        } else {
            return back()->withErrors(['password' => 'Incorrect password.'])->withInput();
        }
    }

    // If email not found in both
    return back()->withErrors(['email' => 'Email not found.'])->withInput();
}

   public function logout(Request $request)
{
    Auth::guard('admin')->logout();
    Auth::guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

   return redirect()->route('login');

}

}
