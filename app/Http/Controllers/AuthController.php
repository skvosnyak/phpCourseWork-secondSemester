<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    private string $login = 'admin';
    private string $password = 'admin123';

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        if ($request->login === $this->login && $request->password === $this->password) {
            $request->session()->put('is_admin', true);
            return redirect()->route('movies.index');
        }

        return back()->withErrors(['login' => 'Неверный логин или пароль']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_admin');
        return redirect()->route('movies.index');
    }
}