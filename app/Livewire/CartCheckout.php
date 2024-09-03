<?php

namespace App\Livewire;

use App\Models\Barang;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartCheckout extends Component
{
    public $barangs;
    public $qty = [];

    public function mount()
    {
        $this->barangs = Barang::all();
        foreach ($this->barangs as $barang) {
            $this->qty[$barang->id] = 1;
        }
    }

    public function render()
    {
        $cart = Cart::session(session()->getId());
        $cart_items = $cart->getContent();
        return view('livewire.cart-checkout', compact('cart_items'));
    }

    public function increment($id)
    {
        $cart = Cart::session(session()->getId());
        $item = $this->qty[$id];
        ++$item;
        $cart->update($id, [
            'quantity' => $item,
        ]);
    }

    public function decrement($id)
    {
        $cart = Cart::session(session()->getId());
        $item = $this->qty[$id];

        if ($item >= 1) {
            --$item;
            $cart->update($id, [
                'quantity' => $item
            ]);
        } else {
            $cart->remove($id);
            unset($item);
        }
    }
}
