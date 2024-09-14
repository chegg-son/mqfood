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
                                <div class="panel-body">
                                    <div class="clearfix">
                                        <div class="float-start">
                                            <h3>Daftar Barang</h3>
                                        </div>
                                        {{-- <div class="float-end">
                                            <h4>Faktur # <br>
                                                <strong>{{ $faktur }}</strong>
                                            </h4>
                                        </div> --}}
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
                                            {{-- <div class="float-end mt-3">
                                                <p><strong>Order Date: </strong>
                                                    {{ \Carbon\Carbon::now()->translatedFormat('F d, Y') }}</p>
                                                <p class="m-t-10"><strong>Order Status: </strong> <span
                                                        class="label label-pink">Pending</span></p>
                                                <p class="m-t-10"><strong>Order ID: </strong> {{ $order_id }}</p>
                                            </div> --}}
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            @livewire('cart-checkout')
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-print-none">
                                        <div class="float-end">
                                            {{-- <a href="javascript:window.print()"
                                                class="btn btn-dark waves-effect waves-light"><i
                                                    class="fa fa-print"></i></a> --}}
                                            <a href="{{ route('confirmation') }}"
                                                class="btn btn-primary waves-effect waves-light">Check Out</a>
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
