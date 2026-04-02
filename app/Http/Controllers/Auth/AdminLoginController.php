<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->hasRole('Admin')) {
            return redirect()->route('admin.dashboard');
        }
        return view('adminlte::auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $user = Auth::user();
            
            if ($user->hasRole('Admin')) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            }

            // If not admin, logout and throw error
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'These credentials do not match our admin records.',
            ]);
        }

        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }
}
