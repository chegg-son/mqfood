<?php

namespace App\Livewire;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Kategori;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class ProductsTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Url]
    public $query = null;
    // cari display items by category with livewire
    protected $queryString = ['search' => ['except' => '']];

    public function render()
    {
        $barangs = Barang::where('nama_barang', 'like', '%' . $this->query . '%')
            ->with('kategori')
            ->latest()
            ->paginate(12);
        $kategoris = Kategori::all();
        $title = 'Hapus Data?';
        $text = 'Apakah anda yakin ingin menghapus data ini?';
        confirmDelete($title, $text);
        return view('livewire.products-table', compact('barangs', 'kategoris'));
    }

    public function searchProducts()
    {
        $this->resetPage();
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
