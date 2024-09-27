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
        return view('pages.login.api.index');
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username harus diisi! (API Response)',
            'password.required' => 'Password harus diisi! (API Response)',
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

                flash()->option('position', 'bottom-right')->option('timeout', 3000)->success($data['meta']['message']);
                return redirect()->route('home');
            } else {
                flash()->option('position', 'bottom-right')->option('timeout', 3000)->error($data['meta']['message']);
                return redirect()->route('api.login');
            }
        } elseif ($response->status() == 401) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->error($response->json()['meta']['message']);
            return redirect()->route('api.login');
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
