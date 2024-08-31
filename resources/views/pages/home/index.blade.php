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
                @livewire('products-table')

            </div> <!-- container-fluid -->

        </div> <!-- content -->
        {{ $barangs->links() }}
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
