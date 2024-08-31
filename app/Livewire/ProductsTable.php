<?php

namespace App\Livewire;

use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Barang;
use Livewire\WithPagination;

class ProductsTable extends Component
{
    use WithPagination;

    public $search;
    // public $barangs;
    public array $qty = [];
    public function mount()
    {
        $barangs = Barang::all();
        foreach ($barangs as $barang) {
            $this->qty[$barang->id] = 1;
        }
    }
    public function render()
    {
        // $search = $this->search === null ?
        //     Barang::latest()->paginate($this->paginate) :
        //     Barang::latest()->where('nama_barang', 'like', '%' . $this->search . '%')
        //     ->paginate($this->paginate);
        $barangs = Barang::latest()->paginate(12);
        $title = 'Hapus Data?';
        $text = 'Apakah anda yakin ingin menghapus data ini?';
        confirmDelete($title, $text);
        return view('livewire.products-table', compact('barangs'));
    }

    public function addToCart($id)
    {
        $barang = Barang::findOrFail($id);
        $cart = Cart::session(session()->getId());
        $cart->add([
            'id' => $id,
            'name' => $barang->nama_barang,
            'price' => $barang->harga,
            'quantity' => 1,
            'attributes' => [],
            'associatedModel' => $barang
        ]);
        $this->dispatch('cart_updated');
    }
}
