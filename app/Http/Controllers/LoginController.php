<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PortalSantri;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
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

        // Check first with the default Laravel User model
        $user = User::where('username', $request->username)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); // Log in using Laravel's default authentication
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Berhasil Login!');
            return redirect()->route('home');  // Redirect to home after login
        }

        // If the first check fails, check with PortalSantri model (second database)
        $portalUser = PortalSantri::where('username', $request->username)->first();
        if ($portalUser && Hash::check($request->password, $portalUser->password)) {
            // Ensure login using the custom guard
            Auth::guard('portal_santri')->login($portalUser);
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Berhasil Login!');
            return redirect()->route('home');
        }

        // If both authentication attempts fail
        Session::flash('error', 'Username atau Password salah');
        return back();
    }


    public function actionlogout()
    {
        Auth::logout();
        Auth::guard('portal_santri')->logout();
        return redirect()->route('home');
    }
}