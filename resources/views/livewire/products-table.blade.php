<div>
    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="portfolioFilter">
                <a href="#" data-filter="*" class="waves-effect waves-primary current">Semua</a>
                @foreach ($kategoris as $kategori)
                    <a href="#" data-filter=".{{ $kategori->jenis }}"
                        class="waves-effect waves-primary">{{ $kategori->jenis }}</a>
                @endforeach
            </div>
        </div>
    </div> --}}

    <div class="port">
        <div class="row mt-2 mb-4 justify-content-end">
            <div class="col-md-3">
                <button wire:click="showCart" class="btn btn-primary">cek isi keranjang</button>
            </div>
            <div class="col-md-3">
                <select wire:click="resetPage" name="category" wire:model="category" class="form-select">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->jenis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <form wire:submit="searchProducts">
                    <input type="text" wire:model="query" wire:keydown.enter='resetPage' class="form-control"
                        placeholder="Cari Barang...">
                </form>
            </div>
        </div>
        <div class="row portfolioContainer">
            @forelse ($barangs as $barang)
                {{-- list barang --}}
                <div class="col-md-6 col-xl-3 {{ $barang->kategori->jenis }}">

                    <div class="card p-1">
                        <a href="{{ route('show.product', $barang->id) }}">
                            <img class="card-img-top img-fluid"
                                src="{{ asset('/storage/barangs/' . $barang->gambar_barang) }}" alt=""
                                width="150px">
                        </a>
                        <div class="card-body">
                            <h2 class="card-title">{{ $barang->nama_barang }}</h2>
                            <h4 class="fw-bold"><strong> Rp. {{ number_format($barang->harga, 0, ',', '.') }}</strong>
                            </h4>
                            <p>Stok: {{ $barang->stok }}</p>
                            @if ($cart->where('id', $barang->id)->count() > 0)
                                <button class="btn btn-bordered-success w-100 " disabled>Barang sudah di
                                    Keranjang</button>
                            @else
                                <form id="addProduct" wire:submit.prevent='addToCart({{ $barang->id }})'>
                                    @csrf
                                    <button
                                        class="btn btn-danger w-100
                                            @if (auth()->check() && auth()->user()->is_admin == 1) d-none @endif
                                            @if (auth()->check() == 0) d-none @endif"><span
                                            class="mdi mdi-cart">Tambah ke Keranjang</span></button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div><!-- end col -->

            @empty
                <h3 class="text-center">Afwan, Barang tidak ditemukan.</h3>
            @endforelse

            {{ $barangs->links() }}
        </div>

    </div>

</div>
