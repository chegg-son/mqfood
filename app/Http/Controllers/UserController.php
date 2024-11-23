<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Hashids\Hashids;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'password' => 'required|string',
            'is_admin' => 'required'
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
        return redirect()->route('master.user');
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
            'username' => 'required|string',
            'is_admin' => 'required'
        ], [
            'name.required' => 'Nama tidak boleh kosong!',
            'username.required' => 'Username tidak boleh kosong!',
            'is_admin.required' => 'Role mohon untuk diisi!',
        ]);

        $user = User::findOrFail($id);

        if ($request->password == '') {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'is_admin' => $request->is_admin,
            ]);
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('User berhasil diubah!');
            return redirect()->route('master.user');
        } else {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'is_admin' => $request->is_admin,
            ]);
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('User berhasil diubah!');
            return redirect()->route('master.user');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('User berhasil dihapus!');
        }
        return redirect()->route('master.user');
    }

    public function showPayment($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('pages.user.order.payment', compact('transaksi'));
    }

    public function actionPayment(Request $request, $id)
    {
        $request->validate(
            [
                'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            ],
            [
                'bukti_transfer.required' => 'Bukti transfer harus diisi!',
                'bukti_transfer.image' => 'Bukti transfer harus berupa gambar!',
                'bukti_transfer.mimes' => 'Bukti transfer harus berupa jpeg,png,jpg!',
                'bukti_transfer.max' => 'Bukti transfer maksimal 1 MB!',
            ]
        );

        $transaksi = Transaksi::findOrFail($id);

        $file = $request->file('bukti_transfer');
        $file->storeAs('public/payments/' . Auth::user()->id . '/' . $transaksi->id, $file->hashName());
        $transaksi->update([
            'bukti_transfer' => $file->hashName(),
            'status' => 'paid',
        ]);

        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Transaksi berhasil diupdate!');
        return redirect()->route('orders');
    }

    public function orders()
    {
        $id = Auth::user()->id;
        $orders = Transaksi::where('user_id', $id)->get();
        $admin_orders = Transaksi::all();
        if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2) {
            return view('pages.admin.order.index', compact('admin_orders'));
        }
        return view('pages.user.order.index', compact('orders'));
    }

    public function orderdetail($id)
    {
        $order = Transaksi::findOrFail($id);
        $order_detail = TransaksiDetail::where('transaksi_id', $id)->get();
        if (Auth::user()->is_admin == 1) {
            return view('pages.admin.order.detail', compact('order', 'order_detail'));
        }
        return view('pages.user.order.detail', compact('order', 'order_detail'));
    }

    public function cancelOrder($id)
    {
        $order = Transaksi::findOrFail($id);
        $order->update([
            'status' => 'canceled',
        ]);
        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Order berhasil dibatalkan!');
        return redirect()->route('orders');
    }

    public function actionConfirm($id)
    {
        $order = Transaksi::findOrFail($id);
        $order->update([
            'status' => 'success',
        ]);

        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Order berhasil dikonfirmasi!');
        return redirect()->route('orders');
    }

    public function showInvoice($id)
    {
        $order = Transaksi::findOrFail($id);
        $order_detail = TransaksiDetail::where('transaksi_id', $id)->get();
        return view('pages.user.order.invoice', compact('order', 'order_detail'));
    }
}