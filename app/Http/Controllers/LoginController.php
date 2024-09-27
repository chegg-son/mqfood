<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check() || session()->has('user')) {
            return redirect()->route('home');
        } else {
            return view('pages.login.index');
        }
    }

    public function actionlogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('home');
        } else {
            Session::flash('error', 'Username atau Password salah');
            return redirect()->route('login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
