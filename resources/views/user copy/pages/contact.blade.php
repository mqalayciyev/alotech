@extends('user.layouts.app')
@section('title', __('header.Contact'))
@section('head')
@endsection
@section('content')
    <div class="ps-page--single" id="contact-us">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/">@lang('content.Home')</a></li>
                    <li class="active">@lang('header.Contact')</li>
                </ul>
            </div>
        </div>
        <div class="ps-contact-info">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Hər hansı bir sualınız üçün bizimlə əlaqə saxlayın</h3>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--contact-info">
                                <h4>Doğrudan əlaqə saxlayın</h4>
                                <p>
                                    <a href="tel:{{ old('mobile', $website_info->mobile) }}">{{ old('mobile', $website_info->mobile) }}</a>
                                    <a href="tel:{{ old('phone', $website_info->phone) }}">{{ old('phone', $website_info->phone) }}</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--contact-info">
                                <h4>Ünvan</h4>
                                <p><span>{{ old('address', $website_info->address) }}</span></p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--contact-info">
                                <h4>Email</h4>
                                <p>
                                    <a href="mailto:{{ old('email', $website_info->email) }}">{{ old('email', $website_info->email) }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-contact-form">
            <div class="container">
                @include('common.alert')
                <form class="ps-form--contact-us" action="{{ route('contact.send') }}" method="post">
                    @csrf
                    <h3>Əlaqədə olmaq</h3>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required id="name" placeholder="Ad *">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required id="email" placeholder="Email *">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <textarea type="text" name="message" class="form-control" rows="5" required id="message" placeholder="Mesaj"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group submit">
                        <button class="ps-btn">Göndər</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
