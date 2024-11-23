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
                    <div class="col">
                        <div class="card">
                            <div class="card-footer">
                                <h2>Checkout Sukses!</h2>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-lg-8">
                                        <h3>Order ID: {{ $transaksi->order_id }}</h3>
                                    </div>
                                    <div class="col-lg-4 text-end">
                                        <h3>Faktur: {{ $transaksi->faktur }}</h3>
                                        <h3>Tanggal Transaksi: {{ $transaksi->tanggal_transaksi }}</h3>
                                    </div>
                                </div>

                                <p>Syukran, jazakumullahu khairan sudah berbelanja di sini. <br> Tafadhal lakukan pembayaran
                                    berikut ini untuk bisa kami proses:</p>
                                <ul>
                                    <li>Lakukan pembayaran pada rekening <strong>BANK Fulan 111111111</strong> a/n
                                        <strong>Pesantren
                                            Islam Al Irsyad Tengaran 7</strong>
                                    </li>
                                    <li>Sertakan bukti pembayaran dengan order id:
                                        <strong>{{ $transaksi->order_id }}</strong>
                                    </li>
                                    <li>Total Pembayaran: <strong>Rp.
                                            {{ number_format($transaksi->total, 0, ',', '.') }}</strong></li>
                                </ul>
                                <p>Sudah melakukan pembayaran? bisa upload bukti pembayaran <a
                                        href="{{ route('show.payment', $transaksi->id) }}">disini</a> 👈
                                </p>
                                <div>
                                    <a href="{{ route('checkout') }}" class="btn btn-danger"><span
                                            class="fa fa-arrow-left"></span> Kembali</a>
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
