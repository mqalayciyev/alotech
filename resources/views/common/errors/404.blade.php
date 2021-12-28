@extends('user.layouts.app')
@section('content')
    <div class="ps-page--404">
        <div class="container">
            <div class="ps-section__content"><img src="{{ asset('assets/img/404.png') }}" alt="">
                <h3>ohh! səhifə tapılmadı</h3>
                <p>@lang('content.Sorry, the page you are looking for could not be found!') <a href="{{ route('home') }}">@lang('content.Go to Homepage')</a></p>
            </div>
        </div>
    </div>
@endsection
