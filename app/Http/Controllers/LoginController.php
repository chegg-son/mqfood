<?php

namespace App\Http\Controllers;

use App\Models\PortalSantri;
use App\Models\User;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        // Contoh validasi dengan hashing
        $userDb1 = User::where('username', $credentials['username'])->first();

        if ($userDb1 && Hash::check($credentials['password'], $userDb1->password)) {
            Auth::login($userDb1);
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Login berhasil!');
            return redirect()->route('home');
        }

        // Contoh validasi dengan hashing
        $userDb2 = PortalSantri::where('username', $credentials['username'])->first();

        if ($userDb2 && Hash::check($credentials['password'], $userDb2->password)) {
            Auth::login($userDb2);
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Login berhasil!');
            return redirect()->route('home');
        }

        // Jika tidak ditemukan di kedua database
        return redirect()->back()->withErrors(['error' => 'Login gagal, username atau password salah!']);
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
