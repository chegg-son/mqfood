@extends('app')

@push('styles')
@endpush

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                {{-- Nama Barang --}}
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-center">{{ $barang->nama_barang }}</h1>
                            </div>
                        </div>
                    </div>

                    {{-- data barang --}}
                    <div>
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card p-3 align-items-center">
                                    <img class="rounded" src="{{ url('storage/barangs/' . $barang->gambar_barang) }}"
                                        alt="Card cap" style="width: 100%">
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="text-center fw-bold">Detail Barang</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    {{-- <tr>
                                                        <td>{{ $barang->stok }}</td>
                                                        <td>{{ $barang->harga }}</td>
                                                        <td>{{ $barang->kelas }}</td>
                                                        <td>{{ $barang->kategori->jenis }}</td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td class="fw-bold fs-4 col-1">
                                                            Stok
                                                        </td>
                                                        <td class="col-1">:</td>
                                                        <td class="fs-4 col-10 text-start">
                                                            {{ $barang->stok }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold fs-4 col-1">
                                                            Harga
                                                        </td>
                                                        <td class="col-1">:</td>
                                                        <td class="fs-4 col-10 text-start">
                                                            {{ $barang->harga }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold fs-4 col-1">
                                                            Kelas
                                                        </td>
                                                        <td class="col-1">:</td>
                                                        <td class="fs-4 col-10 text-start">
                                                            {{ $barang->kelas }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold fs-4 col-1">
                                                            Kategori
                                                        </td>
                                                        <td class="col-1">:</td>
                                                        <td class="fs-4 col-10 text-start">
                                                            {{ $barang->kategori->jenis }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a class="card-link" href="{{ url()->previous() }}"><span
                                                class="mdi mdi-arrow-left"></span>
                                            Kembali</a>
                                    </div>
                                </div>

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
    <script src="{{ url('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ url('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('assets/libs/feather-icons/feather.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('assets/js/app.min.js') }}"></script>
@endpush
