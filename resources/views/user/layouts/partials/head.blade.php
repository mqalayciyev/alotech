<!-- Title -->
<title>@yield('title', $website_info->title)</title>
<meta name="description" content="@yield('description', $website_info->description)">
<meta name="keywords" content="@yield('keywords', $website_info->keywords)">
<!-- Required Meta Tags Always Come First -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Favicon -->
<link rel="icon" href="{{ asset('assets/img/' . $website_info->favicon) }}" type="image/png">

<!-- Google Fonts -->
<link
    href="{{ asset('assets/css/css-1.css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap') }}"
    rel="stylesheet">

<!-- CSS Implementing Plugins -->
<link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-5/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/fonts/Linearicons/Linearicons/Font/demo-files/demo.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<link rel="stylesheet" href="{{ asset('assets/vendor/animate.css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/fancybox/jquery.fancybox.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/slick-carousel/slick/slick.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">
<!-- CSS Electro Template -->
<link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">


@yield('head')


<meta property="og:title" content="@yield('title', 'Alotech')">
<meta property="og:locale" content="az_AZ">
<meta property="og:site_name" content="Alotech">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:description" content="@yield('description', 'Alotech')">
<meta property="og:type" content="website">
<meta property="og:image" content="@yield('image', asset('assets/img/' . old('logo', $website_info->logo)) )">
