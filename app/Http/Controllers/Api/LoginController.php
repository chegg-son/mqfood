<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function login()
    {
        if (session()->has('user') || Auth::check()) {
            return redirect()->route('home');
        }
        return view('pages.login.index');
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username harus diisi!',
            'password.required' => 'Password harus diisi!',
        ]);

        $response = Http::post('http://santri.pesantrenalirsyad7.org/api/loginUser', [
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ($response->status() == 200) {
            $data = $response->json();
            if ($data['meta']['status'] == 'success') {
                $request->session()->put('access_token', $data['data']['access_token']);
                $request->session()->put('user', $data['data']['user']);
                $request->session()->put('role', $data['data']['user']['role']);
                return redirect()->route('home');
            } else {
                return redirect()->route('login')->with('error', $data['message']);
            }
        }
    }

    public function actionLogout(Request $request)
    {
        $response = Http::post('https://www.santri.pesantrenalirsyad7.org/api/logout', [
            'token' => $request->session()->get('access_token'),
        ]);

        if ($response->status() == 200) {
            $data = $response->json();
            if ($data['meta']['status'] == 'success') {
                $request->session()->forget('access_token');
                $request->session()->forget('user');
                return redirect()->route('login');
            }
        }
    }
}
