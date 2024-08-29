<?php

namespace App\Livewire;

use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartCheckout extends Component
{
    public function render()
    {
        $cart = Cart::session(session()->getId());
        $cart_items = $cart->getContent();
        return view('livewire.cart-checkout', compact('cart_items'));
    }
}
