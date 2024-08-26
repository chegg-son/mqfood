@extends('app')

@push('styles')
@endpush

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-center">{{ $barang->nama_barang }}</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card p-3 align-items-center">
                            <img class="rounded" src="{{ asset('assets/images/gallery/11.jpg') }}" alt="Card cap"
                                style="width: 40%">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <p>dibuatkan table</p>
                                <h3 class="card-text">Stok : {{ $barang->stok }}</h3>
                                <h3 class="card-text"> Harga : {{ $barang->harga }}</h3>
                                <h3 class="card-text"> Kelas : {{ $barang->kelas }}</h3>
                                <h3 class="card-text"> Kategori : {{ $barang->kategori->jenis }}</h3>
                            </div>
                            <div class="card-footer">
                                <a class="card-link" href="{{ url()->previous() }}"><span class="mdi mdi-home"></span>
                                    Kembali
                                    ke Beranda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
@endpush
