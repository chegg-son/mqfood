@extends('app')

@push('styles')
    <style>
        .card-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endpush

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                </div>
                                <h3>Ahlan wa sahlan!</h3>
                                <p>Silahkan berbelanja di toko katalog kami.</p>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>

                {{-- filter barang --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portfolioFilter">
                            <a href="#" data-filter="*" class="waves-effect waves-primary current">Semua</a>
                            {{-- menambahkan kategori disini --}}
                            @foreach ($kategoris as $kategori)
                                <a href="#" data-filter=".{{ $kategori->jenis }}"
                                    class="waves-effect waves-primary">{{ $kategori->jenis }}</a>
                            @endforeach
                        </div>

                    </div>
                </div>

                {{-- container list barang --}}
                <div class="port">
                    <div class="row mb-2 justify-content-end">
                        <div class="col-md-3">
                            <form action="{{ route('search') }}">
                                <div class="input-group rounded">
                                    <input class="form-control me-2" type="search" name="query" id="search"
                                        placeholder="Cari Barang..." aria-label="Search"
                                        value="{{ isset($searchBarang) ? $searchBarang : '' }}">
                                    <button class="btn btn-outline-primary" type="submit">Search</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="row portfolioContainer">
                        @foreach ($barangs as $barang)
                            {{-- list barang --}}
                            <div class="col-md-6 col-xl-3 {{ $barang->kategori->jenis }}">
                                <div class="card p-1">
                                    <img class="card-img-top img-fluid" src="assets/images/gallery/11.jpg" alt="Card cap">
                                    <div class="card-body">
                                        <h2 class="card-title">{{ $barang->nama_barang }}</h2>
                                        <h4 class="fw-bold">Harga: Rp. {{ $barang->harga }}</h4>
                                        <p>Stok: {{ $barang->stok }}</p>
                                        <p class="fw-bold text-end">Terjual: no-data</p>
                                        <a href="@if (auth()->check() == 0) {{ route('login') }} @endif"
                                            class="btn btn-danger w-100
                                            @if (auth()->check() && auth()->user()->is_admin == 1) d-none @endif
                                            @if (auth()->check() == 0) d-none @endif"><span
                                                class="mdi mdi-cart"></span></a>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        @endforeach
                    </div>
                </div>
            </div> <!-- container-fluid -->





        </div> <!-- content -->
        <div class="pagination-container">
            {{ $barangs->links() }}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Vendor -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>

    <!-- isotope filter plugin -->
    <script src="{{ asset('assets/libs/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Magnific Popup-->
    <script src="{{ asset('assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Gallery Init-->
    <script src="{{ asset('assets/js/pages/gallery.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <script></script>
@endpush
