<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


    @include('user.layouts.partials.head')

</head>

<body class="@yield('bodyClass')">

    @include('user.layouts.partials.panel')
    @include('user.layouts.partials.header')

    @yield('content')

    @include('user.layouts.partials.footer')

    @include('user.layouts.partials.script')
    @include('user.layouts.partials.javascript')
</body>

</html>
