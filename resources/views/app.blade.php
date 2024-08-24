<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>PIAT7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href={{ asset('assets/images/favicon.ico') }}>
    <link href={{ asset('assets/css/app.min.css') }} rel="stylesheet" type="text/css" id="app-style" />
    <link href={{ asset('assets/css/icons.min.css') }} rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @stack('styles')
</head>

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="default"
    data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default'
    data-sidebar-user='true'>
    <div id="wrapper">
        @include('layouts.navbar')
        @include('layouts.leftbar')
        @yield('content')
        @include('layouts.footer')
