@extends('app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="card">
                            <h1 class="text-center my-3">Konfirmasi</h1>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-footer">
                                <h3>Detail</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama<span class="text-danger">*</span></label>
                                    <input type="text" name="nama" parsley-trigger="change" required
                                        placeholder="Mohon mengisi Nama di sini!" class="form-control" id="nama" />
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="alamat" parsley-trigger="change" required
                                        placeholder="Mohon mengisi alamat di sini!" class="form-control" id="alamat" />
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">No. HP<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="telepon" parsley-trigger="change" required
                                        placeholder="Mohon mengisi telepon di sini!" class="form-control" id="telepon" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-footer">
                                <h3>Daftar Keranjang</h3>
                                <table class="table">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>Barang</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart_items as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->price }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2">Total</td>
                                            <td>11</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-end">
                                    <button class="btn btn-secondary waves-effect">Kembali</button>
                                    <button class="btn btn-primary waves-effect">Submit</button>
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
