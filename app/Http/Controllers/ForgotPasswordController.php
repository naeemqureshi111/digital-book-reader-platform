<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Admin;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
{
    session()->flash('status', 'Enter your <b>Email</b> and instructions will be sent to you!');
    return view('forgot-password');
}


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        $admin = Admin::where('email', $request->email)->first();

        $broker = $user ? 'users' : ($admin ? 'admins' : null);

        if (!$broker) {
            return back()->withErrors(['email' => 'We can\'t find a user with that email address.']);
        }

        $status = Password::broker($broker)->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('reset-password')->with([
            'token' => $token,
            'email' => $request->email
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $admin = Admin::where('email', $request->email)->first();

        $broker = $user ? 'users' : ($admin ? 'admins' : null);
        $model = $user ?: $admin;

        if (!$broker || !$model) {
            return back()->withErrors(['email' => 'User not found.']);
        }

        $status = Password::broker($broker)->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        return $status == Password::PASSWORD_RESET
                    ? redirect('/')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
