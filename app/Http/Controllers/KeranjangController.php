<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Hashids\Hashids;
use App\Models\Transaksi;
use Illuminate\Http\Request;
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
        return view('pages.user.confirmation.index', compact('cart_items', 'subtotal', 'faktur', 'order_id'));
    }

    public function order(Request $request)
    {
        $time = Carbon::now()->format('H:i:s');
        $time = strtotime($time);
        $faktur = Carbon::now()->format('Y-m-') . $time;
        $order_id = Auth::user()->id . strtotime(Carbon::now()->format('H:i:s'));

        $request->validate([
            'faktur' => 'required',
            'order_id' => 'required',
        ]);
    }
}
