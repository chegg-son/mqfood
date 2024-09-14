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
    public $category = null;

    protected $queryString = ['query', 'category' => ['except' => '']];

    public function render()
    {
        $cart = Cart::session(session()->getId())->getContent();
        $kategoris = Kategori::all();
        $barangs = Barang::query()
            ->when($this->category, function ($query) {
                $query->whereHas('kategori', function ($kategoriQuery) {
                    $kategoriQuery->where('id', 'like', '%' . $this->category . '%');
                });
            })
            ->when($this->query, function ($query) {
                $query->where('nama_barang', 'like', '%' . $this->query . '%');
            })
            ->with('kategori')
            ->latest()
            ->paginate(12);
        return view('livewire.products-table', compact('barangs', 'kategoris', 'cart'));
    }

    public function searchProducts()
    {
        // untuk mentrigger submit button
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

    public function showCart()
    {
        dd(Cart::session(session()->getId())->getContent());
    }
}
