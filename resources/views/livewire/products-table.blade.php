<div class="port">
    <div class="row mb-2 justify-content-end">
        <div class="col-md-3">
            <form action="{{ route('search') }}">
                <input class="form-control me-2" type="search" name="query" id="search" placeholder="Cari Barang..."
                    aria-label="Search">
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
                                @if (auth()->check() == 0) d-none @endif"><span
                                    class="mdi mdi-cart"></span></a> --}}
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

    </div>

</div>
