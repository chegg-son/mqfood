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
                                <h3>Keterangan</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('action.confirmation') }}" class="needs-validation"
                                    novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="nama" parsley-trigger="change" required
                                            class="form-control" id="nama" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat<span
                                                class="text-danger">*</span></label>
                                        <textarea rows="5" type="text" name="alamat" parsley-trigger="change" required class="form-control"
                                            id="alamat"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telepon" class="form-label">No. HP<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="telepon" parsley-trigger="change" required
                                            placeholder="Isi dengan format awalan 62851xxxxx" class="form-control"
                                            id="telepon" />
                                    </div>
                                    <div class="d-grid mb-2">
                                        <button class="btn btn-primary waves-effect">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-footer">
                                <h3>Rincian Barang</h3>
                            </div>
                            <div class="card-body">
                                {{-- <div class="text-end">
                                    <h4>Faktur # <br>
                                        <strong>{{ $faktur }}</strong>
                                    </h4>
                                </div> --}}
                                {{-- <div>
                                    <p><strong>Order Date: </strong>
                                        {{ \Carbon\Carbon::now()->translatedFormat('F d, Y') }}
                                        <br> <strong>Order Status: </strong> <span class="label label-pink">Pending</span>
                                        <br> <strong>Order ID: </strong> {{ $order_id }}
                                    </p>
                                </div> --}}
                                <table class="table border">
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
                                                <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2"><strong>Subtotal</strong></td>
                                            <td>Rp. {{ number_format($subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><strong>Total</strong></td>
                                            <td><strong>Rp. {{ number_format($subtotal, 0, ',', '.') }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
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
