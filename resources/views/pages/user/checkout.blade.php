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
                                            <h3>Adminto</h3>
                                        </div>
                                        <div class="float-end">
                                            <h4>Faktur # <br>
                                                <strong>2016-04-23654789</strong>
                                            </h4>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="float-start mt-3">
                                                <address>
                                                    <strong>Yayasan Permata Sunnah</strong><br>
                                                    Jl. Mojowarno No 63, Mojorejo, Junrejo, Kota Batu<br>
                                                    Jawa Timur, ID 65322<br>
                                                    <span class="mdi mdi-phone">:</span> (0341) 513-262
                                                </address>
                                            </div>
                                            <div class="float-end mt-3">
                                                <p><strong>Order Date: </strong> Jan 17, 2016</p>
                                                <p class="m-t-10"><strong>Order Status: </strong> <span
                                                        class="label label-pink">Pending</span></p>
                                                <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
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
                                                            <th>#</th>
                                                            <th>Item</th>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>LCD</td>
                                                            <td>Lorem ipsum dolor sit amet.</td>
                                                            <td>1</td>
                                                            <td>$380</td>
                                                            <td>$380</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Mobile</td>
                                                            <td>Lorem ipsum dolor sit amet.</td>
                                                            <td>5</td>
                                                            <td>$50</td>
                                                            <td>$250</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>LED</td>
                                                            <td>Lorem ipsum dolor sit amet.</td>
                                                            <td>2</td>
                                                            <td>$500</td>
                                                            <td>$1000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>LCD</td>
                                                            <td>Lorem ipsum dolor sit amet.</td>
                                                            <td>3</td>
                                                            <td>$300</td>
                                                            <td>$900</td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Mobile</td>
                                                            <td>Lorem ipsum dolor sit amet.</td>
                                                            <td>5</td>
                                                            <td>$80</td>
                                                            <td>$400</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-6">
                                            <div class="clearfix mt-4">
                                                <h5 class="small text-dark fw-normal">PAYMENT TERMS AND POLICIES</h5>

                                                <small>
                                                    All accounts are to be paid within 7 days from receipt of
                                                    invoice. To be paid by cheque or credit card or direct payment
                                                    online. If account is not paid within 7 days the credits details
                                                    supplied as confirmation of work undertaken will be charged the
                                                    agreed quoted fee noted above.
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-6 offset-xl-3">
                                            <p class="text-end"><b>Sub-total:</b> 2930.00</p>
                                            <p class="text-end">Discout: 12.9%</p>
                                            <p class="text-end">VAT: 12.9%</p>
                                            <hr>
                                            <h3 class="text-end">USD 2930.00</h3>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-print-none">
                                        <div class="float-end">
                                            <a href="javascript:window.print()"
                                                class="btn btn-dark waves-effect waves-light"><i
                                                    class="fa fa-print"></i></a>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
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
