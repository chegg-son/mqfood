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
        $subtotal = $cart->getSubTotal();
        return view('livewire.cart-checkout', compact('cart_items', 'subtotal'));
    }

    public function increment($id)
    {
        $cart = Cart::session(session()->getId());
        $cart->update($id, [
            'quantity' => 1,
        ]);
    }

    public function decrement($id)
    {
        $cart = Cart::session(session()->getId());
        $itemCount = $cart->get($id)->quantity;
        $cart->update($id, [
            'quantity' => -1
        ]);
        if ($itemCount == 1) {
            $cart->remove($id);
            unset($item);
            $this->dispatch('cart_updated');
        }
    }

    public function destroy($id)
    {
        $cart = Cart::session(session()->getId());
        $cart->remove($id);
        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Berhasil dihapus!');
    }
}
