@extends('app')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="panel-body ">
                                    <div class="clearfix bg-success rounded">
                                        <div class="text-center rounded-xl d-print-none">
                                            <img src="{{ url('storage/logo/piat7-transparent.png') }}" alt="">
                                        </div>
                                        <div class="text-center rounded-xl d-none d-print-block">
                                            <img src="{{ url('storage/logo/piat7.png') }}" alt="">
                                        </div>
                                        <br>
                                        <div class="float-end d-none d-print-block">
                                            <h4>Faktur # <br>
                                                <strong>{{ $order->faktur }}</strong>
                                            </h4>
                                        </div>
                                        <div class="float-end d-print-none me-3">
                                            <h4 class="text-white">Faktur # <br>
                                                <strong class="text-white">{{ $order->faktur }}</strong>
                                            </h4>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="float-start mt-3">
                                                <address>
                                                    <strong>Pesantren Islam Al Irsyad Tengaran 7</strong><br>
                                                    Jl. Mojowarno No 63, Mojorejo, Junrejo, Kota Batu<br>
                                                    Jawa Timur, ID 65322<br>
                                                    <span class="mdi mdi-phone"></span> (0341) 513-262
                                                </address>
                                            </div>
                                            <div class="float-end mt-3">
                                                <p><strong>Order Date: </strong> {{ $order->tanggal_transaksi }}</p>
                                                <p class="m-t-10"><strong>Order Status: </strong> <span
                                                        class="label label-pink">{{ $order->status }}</span></p>
                                                <p class="m-t-10"><strong>Order ID: </strong> #{{ $order->order_id }}</p>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table mt-4">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-1">#</th>
                                                            <th>Item</th>
                                                            <th>Qty</th>
                                                            <th>Harga Barang</th>
                                                            <th class="col-1">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order_detail as $detail)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $detail->barang->nama_barang }}</td>
                                                                <td>{{ $detail->quantity }}</td>
                                                                <td>Rp.
                                                                    {{ number_format($detail->barang->harga, 0, ',', '.') }}
                                                                </td>
                                                                <td>Rp.
                                                                    {{ number_format($detail->quantity * $detail->barang->harga, 0, ',', '.') }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-6">
                                            <div class="clearfix mt-4">
                                                <h5 class="small text-dark fw-normal">SYARAT PEMBAYARAN DAN KEBIJAKAN</h5>

                                                <small>
                                                    Semua tagihan harus dibayarkan dalam jangka waktu 7 hari sejak
                                                    diterimanya faktur. Pembayaran dapat dilakukan melalui rekening transfer
                                                    langsung secara daring. Jika tagihan tidak
                                                    dibayarkan dalam waktu 1 hari, maka pemesanan barang yang dilakukan akan
                                                    dibatalkan otomatis oleh sistem.
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-6 offset-xl-3">
                                            <p class="text-end"><b>Sub-total:</b>
                                                Rp. {{ number_format($order->total, 0, ',', '.') }}</p>
                                            <hr>
                                            <h3 class="text-end">TOTAL: Rp. {{ number_format($order->total, 0, ',', '.') }}
                                            </h3>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-print-none">
                                        <div class="float-end">
                                            <a href="javascript:window.print()"
                                                class="btn btn-dark waves-effect waves-light"><i
                                                    class="fa fa-print"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> &copy; Adminto theme by <a href="">Coderthemes</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

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
