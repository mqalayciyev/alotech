<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', config('app.name'))</title>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="author" content="Goycay AVM">
<meta name="keywords" content="@yield('keywords')">
<meta name="description" content="@yield('description')">
<link rel="icon" href="{{ asset('assets/img/title.png') }}" type="image/png">
{{-- <link rel="icon" href="{{ asset('assets/img/' . old('logo', $website_info->logo)) }}" type="image/png"> --}}
<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/fonts/Linearicons/Linearicons/Font/demo-files/demo.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/owl-carousel/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick/slick.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/nouislider/nouislider.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/lightGallery-master/dist/css/lightgallery.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/market-place-3.css') }}">


@yield('head')


<meta property="og:title" content="@yield('title', 'Watt.az')">
    <meta property="og:locale" content="az_AZ">
    <meta property="og:site_name" content="Watt.az">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:description" content="@yield('description', 'Watt.az')">
    <meta property="og:type" content="website">
    <meta property="og:image" content="@yield('image', asset('img/' . old('logo', $website_info->logo)) )">