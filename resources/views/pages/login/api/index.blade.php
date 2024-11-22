<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8" />
    <title>Login ke Aplikasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href={{ url('assets/images/favicon.ico') }}>
    <link rel="shortcut icon" href={{ url('assets/images/favicon.ico') }}>
    <link href={{ url('assets/css/app.min.css') }} rel="stylesheet" type="text/css" id="app-style" />
    <link href={{ url('assets/css/icons.min.css') }} rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="{{ url('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">

    <!-- App css -->

    <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages my-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center">
                        <a href="index.html">
                            <img src="assets/images/logo-dark.png" alt="" height="22" class="mx-auto">
                        </a>
                        <p class="text-muted mt-2 mb-4">Responsive Admin Dashboard</p>
                        {{-- dump if auth is true --}}
                        {{ auth()->check() ? 'true' : 'false' }}
                    </div>
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="text-center mb-1">
                                <h4 class="text-uppercase mt-0">LOG IN</h4>
                            </div>

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    <b>Oops!</b> {{ session('error') }}
                                </div>
                            @endif

                            {{-- form submit --}}
                            <form action="{{ route('api.action.login') }}" method="post" novalidate>
                                @csrf
                                {{-- {{ csrf_field() }} --}}
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input name="username" class="form-control" type="text" id="username"
                                        placeholder="">
                                    @error('username')
                                        <div>
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input name="password" class="form-control" type="password" id="password"
                                        placeholder="">
                                    @error('password')
                                        <div></div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                        </div>

                        <div class="mb-3 d-grid text-center">
                            <button class="btn btn-primary" type="submit"> Log In </button>
                        </div>
                        </form>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <h4>Jika lupa password bisa klik<a href="http://wa.me/6285159171553" target="_blank"
                                class="text-muted fw-500 ms-1"><span class="text-primary">di sini </span><span
                                    class="mdi mdi-arrow-right"></span></a>
                        </h4>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    </div>
    <!-- end page -->

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



</body>

</html>
