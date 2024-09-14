<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Hashids\Hashids;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Livewire;


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

        if (count($cart_items) == 0) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->error('Keranjang belanja masih kosong!');
            return back();
        }

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
            'kelas' => 'required|string',
            'keterangan' => 'nullable|string',
            'telepon' => 'required|numeric',
        ], [

            'nama.required' => 'Nama harus diisi!',
            'nama.min' => 'Nama minimal 3 karakter!',
            'kelas.required' => 'Kelas harus diisi!',
            'telepon.required' => 'Telepon harus diisi!',
            'telepon.numeric' => 'Telepon harus berupa angka!',
        ]);

        $transaksi = Transaksi::create([
            'user_id' => Auth::user()->id,
            'faktur' => $faktur,
            'tanggal_transaksi' => Carbon::now(),
            'order_id' => $order_id,
            'total' => $subtotal,
            'status' => 'pending',
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'keterangan' => empty($request->keterangan) ? '' : $request->keterangan,
            'telepon' => $request->telepon,
        ]);


        foreach ($cart_items as $item) {
            $transaksi_detail =  TransaksiDetail::create([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $item->id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'attributes' => $item->attributes
            ]);
            $barang = Barang::find($item->id);
            $barang->stok = $barang->stok - $item->quantity;
            $barang->save();
        }

        $cart->clear();
        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Barang berhasil dipesan!');
        return redirect()->route('show.confirmation', [
            'id' => $transaksi->id,
            'detail' => $transaksi_detail->id
        ],);
    }

    public function showconfirmation($id, $detail)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('pages.user.confirmation.show', compact('transaksi'));
    }
}
