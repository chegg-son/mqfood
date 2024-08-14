<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>PIAT7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href={{ asset('assets/images/favicon.ico') }}>
    <link href={{ asset("assets/css/app.min.css")}} rel="stylesheet" type="text/css" id="app-style" />
    <link href={{ asset("assets/css/icons.min.css")}} rel="stylesheet" type="text/css" />
</head>

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="default" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>
    <div id="wrapper">
        @include('layouts.navbar')
        @include('layouts.leftbar')
        @yield('content')
        @include('layouts.footer')

    