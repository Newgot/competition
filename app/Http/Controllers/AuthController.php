<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        }

        $formFields = $request->only(['name', 'password']);
        if (Auth::attempt($formFields)) {
            redirect('/');
        }
        return redirect(route('auth.login'));
    }

    public function registration(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        }
        $validateFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::create($validateFields);
        if($user) {
            Auth::login($user);
        }
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
