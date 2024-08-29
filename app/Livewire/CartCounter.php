<?php

namespace App\Livewire;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use GuzzleHttp\Middleware;
use Illuminate\Validation\Rules\Can;
use Livewire\Component;

class CartCounter extends Component
{

    protected $listeners = ['cart_updated' => 'render'];

    public function render()
    {
        $cart = Cart::session(session()->getId());
        $cart_count = $cart->getContent()->count();

        return view('livewire.cart-counter', compact('cart_count'));
    }
}
