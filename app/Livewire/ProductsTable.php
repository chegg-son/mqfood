<?php

namespace App\Livewire;

use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Barang;
use Livewire\WithPagination;
use App\Models\Kategori;
use Livewire\Attributes\Url;

class ProductsTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    #[Url]
    public $query = null;

    protected $queryString = ['search' => ['except' => '']];

    public array $qty = [];
    // public function mount()
    // {
    //     $barangs = Barang::all();
    //     foreach ($barangs as $barang) {
    //         $this->qty[$barang->id] = 1;
    //     }
    // }

    public function render()
    {
        // $barangs = $this->query === null ?
        //     Barang::latest()->paginate(12) :
        //     Barang::latest()->where('nama_barang', 'like', '%' . $this->query . '%')
        //     ->paginate(12);
        $barangs = Barang::where('nama_barang', 'like', '%' . $this->query . '%')
            ->latest()
            ->paginate(12);

        $title = 'Hapus Data?';
        $text = 'Apakah anda yakin ingin menghapus data ini?';
        confirmDelete($title, $text);
        return view('livewire.products-table', compact('barangs'));
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
