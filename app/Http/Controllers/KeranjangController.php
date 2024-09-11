<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Hashids\Hashids;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class KeranjangController extends Controller
{
    public function checkout()
    {
        $time = Carbon::now()->format('H:i:s');
        $time = strtotime($time);
        $sess_id = session()->getId();

        $hashids = new Hashids($sess_id);
        $order_id = $hashids->encode(1, 2, 3);

        $faktur = Carbon::now()->format('Y-m-') . $time;
        return view('pages.user.checkout.index', compact('faktur', 'order_id'));
    }

    public function index()
    {
        // kosong
    }

    public function confirmation()
    {
        $cart = Cart::session(session()->getId());
        $cart_items = $cart->getContent();
        $subtotal = $cart->getSubTotal();
        return view('pages.user.confirmation.index', compact('cart_items', 'subtotal'));
    }

    public function actionconfirm(Request $request)
    {
        $time = strtotime(Carbon::now()->format('H:i:s'));
        $faktur = Carbon::now()->format('Y-m-') . $time;
        $order_id = Auth::user()->id . strtotime(Carbon::now()->format('H:i:s'));
        $cart = Cart::session(session()->getId());
        $cart_items = $cart->getContent();
        $subtotal = $cart->getSubTotal();

        $request->validate([
            'nama' => 'required|string|min:3',
            'alamat' => 'required|string',
            'telepon' => 'required|numeric',
        ], [

            'nama.required' => 'Nama harus diisi!',
            'nama.min' => 'Nama minimal 3 karakter!',
            'alamat.required' => 'Alamat harus diisi!',
            'telepon.required' => 'Telepon harus diisi!',
            'telepon.numeric' => 'Telepon harus berupa angka!',
        ]);

        $transaksi = Transaksi::create([
            'user_id' => Auth::user()->id,
            'faktur' => $faktur,
            'order_id' => $order_id,
            'total' => $subtotal,
            'status' => 'pending',
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        foreach ($cart_items as $item) {
            TransaksiDetail::create([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $item->id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'attributes' => $item->attributes
            ]);
        }

        return redirect()->route('orders');
    }
}
