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
        <div class="row mb-2 justify-content-end">
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
                    <input type="text" wire:model="query" class="form-control" placeholder="Cari Barang...">
                </form>
            </div>
        </div>
        <div class="row portfolioContainer">
            @forelse ($barangs as $barang)
                {{-- list barang --}}
                <div class="col-md-6 col-xl-3 {{ $barang->kategori->jenis }}">
                    <a href="{{ route('show.product', $barang->id) }}">
                        <div class="card p-1">
                            <img class="card-img-top img-fluid" src="assets/images/gallery/11.jpg" alt="Card cap">
                            <div class="card-body">
                                <h2 class="card-title">{{ $barang->nama_barang }}</h2>
                                <h4 class="fw-bold">Harga: Rp. {{ number_format($barang->harga, 0, ',', '.') }}
                                </h4>
                                <p>Stok: {{ $barang->stok }}</p>
                                <p class="fw-bold text-end">Terjual: no-data</p>
                                {{-- <a href="@if (auth()->check() == 0) {{ route('login') }} @endif"
                            class="btn btn-danger w-100
                            @if (auth()->check() && auth()->user()->is_admin == 1) d-none @endif
                            @if (auth()->check() == 0) d-none @endif"><span class="mdi mdi-cart"></span>
                </a> --}}
                                <form id="addProduct" wire:submit.prevent='addToCart({{ $barang->id }})'>
                                    @csrf
                                    <button
                                        class="btn btn-danger w-100
                                            @if (auth()->check() && auth()->user()->is_admin == 1) d-none @endif
                                            @if (auth()->check() == 0) d-none @endif"><span
                                            class="mdi mdi-cart"></span></button>
                                </form>
                            </div>
                        </div>
                    </a>

                </div><!-- end col -->

            @empty
                <h3 class="text-center">Afwan, Barang tidak ditemukan.</h3>
            @endforelse

            {{ $barangs->links() }}
        </div>

    </div>

</div>
