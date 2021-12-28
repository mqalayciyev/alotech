@extends('user.layouts.app')
@section('title', __('footer.Shipping & Return'))
@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">@lang('content.Home')</a></li>
            <li class="active">@lang('footer.Shipping & Return')</li>
        </ul>
    </div>
</div>
<div class="ps-page--single" id="about-us">
    <div class="ps-about-intro">
        <div class="container">
            {!! old('shipping_return', $shipping_return->shipping_return) !!}
        </div>
    </div>
</div>
@endsection
