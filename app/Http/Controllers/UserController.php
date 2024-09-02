<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        $title = 'Hapus Data?';
        $text = 'Apakah anda yakin ingin menghapus data ini?';
        confirmDelete($title, $text);
        return view('pages.admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.admin.user.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|',
            'username' => 'required|string|unique:users',
            'password' => 'required|string',
            'is_admin' => 'required|boolean'
        ], [
            'name.required' => 'Nama tidak boleh kosong!',
            'username.required' => 'Username tidak boleh kosong!',
            'username.unique' => 'Username sudah digunakan :(',
            'password.required' => 'Password harap diisi!',
            'is_admin.required' => 'Role mohon untuk diisi!',
        ]);

        $hashedpassword = Hash::make($request->password);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $hashedpassword,
            'is_admin' => $request->is_admin,
        ]);
        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('User berhasil ditambahkan!');
        return redirect()->route('users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.user.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|',
            'username' => 'required|string|unique:users',
            'password' => 'required|string',
            'is_admin' => 'required|boolean'
        ], [
            'name.required' => 'Nama tidak boleh kosong!',
            'username.required' => 'Username tidak boleh kosong!',
            'username.unique' => 'Username sudah digunakan :(',
            'password.required' => 'Password harap diisi!',
            'is_admin.required' => 'Role mohon untuk diisi!',
        ]);

        $hashedpassword = Hash::make($request->password);
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $hashedpassword,
            'is_admin' => $request->is_admin,
        ]);

        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Barang berhasil diubah!');
        return redirect()->route('master.product');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('User berhasil dihapus!');
        }
        return redirect()->route('users');
    }
}
