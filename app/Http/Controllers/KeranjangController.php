<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Request;
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

    public function konfirmasi()
    {
        $cart = Cart::session(session()->getId());
        $cart_items = $cart->getContent();
        $subtotal = $cart->getSubTotal();
        return view('pages.user.confirmation.index', compact('cart_items', 'subtotal'));
    }
}
