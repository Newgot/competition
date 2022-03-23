<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        # code...
    }

    public function registration(Request $request)
    {
        if (Auth::check()) {
            redirect('/');
        }

        $validateFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }
}
