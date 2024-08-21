<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use hash
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        // return json with status success arrray
        return response()->json(['success' => true, 'data' => User::all(), 'message' => 'Users retrieved successfully', 'csrf' => csrf_token()]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'string|nullable',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        $hashedpassword = Hash::make($request->password);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $hashedpassword,
        ]);

        return response()->json(['success' => true, 'message' => 'User created successfully', 'data' => $request->all()]);
    }
}
