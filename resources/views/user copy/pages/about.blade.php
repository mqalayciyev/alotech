@extends('user.layouts.app')
@section('title', __('footer.About Us'))
@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">@lang('content.Home')</a></li>
            <li class="active">@lang('footer.About Us')</li>
        </ul>
    </div>
</div>
<div class="ps-page--single" id="about-us">
    <div class="ps-about-intro">
        <div class="container">
            {!! old('about', $about->about) !!}
        </div>
    </div>
</div>
@endsection