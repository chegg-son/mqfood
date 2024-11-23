@extends('app')

@push('styles')
    <style>
        .card-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 17pt;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container">
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
                                <h1>Ahlan wa sahlan!</h1>
                                <p>Silahkan berbelanja di Katalog kami.</p>
                                <p>{{ auth('portal_santri')->user()->kelas()->nama_kelas }}</p>

                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <div>
                    {{-- container list barang --}}
                    @livewire('products-table')

                </div>
            </div> <!-- container-fluid -->
        </div> <!-- content -->
    </div>
@endsection

@push('scripts')
    <!-- Vendor -->
    <script src="{{ url('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ url('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('assets/libs/feather-icons/feather.min.js') }}"></script>

    <!-- isotope filter plugin -->
    <script src="{{ url('assets/libs/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Magnific Popup-->
    <script src="{{ url('assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Gallery Init-->
    <script src="{{ url('assets/js/pages/gallery.init.js') }}"></script>

    <!-- Tippy js-->
    <script src="assets/libs/tippy.js/tippy.all.min.js"></script>

    <!-- App js -->
    <script src="{{ url('assets/js/app.min.js') }}"></script>

    <script></script>
@endpush
