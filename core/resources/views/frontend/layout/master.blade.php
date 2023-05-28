<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        @if (@$general->sitename)
        {{ __(@$general->sitename) . '-' }}
        @endif
        {{ __(@$pageTitle) }}
    </title>
    <link rel="shortcut icon" type="image/png" href="{{ getFile('icon', @$general->favicon) }}">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('asset/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" rel="stylesheet">
    <link href="{{ asset('asset/frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/frontend/css/videoPopUp.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @stack('style')
</head>

<body>

    @include('frontend.layout.header')

    @yield('content')

    @include('frontend.layout.footer')

    @include('frontend.layout.js')

</body>

</html>