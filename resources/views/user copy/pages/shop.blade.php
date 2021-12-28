@extends('user.layouts.app')
@section('title', 'Kategoriyalar')
@section('head')
    <link rel="stylesheet" href="{{ asset('plugins/lightGallery-master/dist/css/lightgallery.min.css') }}">
@endsection
@section('content')
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                <li class="active">Kategoriyalar</li>
            </ul>
        </div>
    </div>
    <div class="home-category--catalog">
        <div class="container">
            <div class="ps-tab active" id="tab-1">
                <div class="ps-shopping-product">
                    <div class="row products m-0">
                        @if (count($categories) > 0)
                            @foreach ($categories as $array => $category)
                                @if ($category->top_id == null)
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 p-1" style="height: 200px;">
                                        <div class="ps-product" style="height: 100%">
                                            <div class="ps-product__thumbnail text-center" style="height: 80%">
                                                <a href="{{ route('category', $category->slug) }}">
                                                    @if ($category->image->image_name)
                                                        <img class="icon-filter" style="width: inherit; height: 100%"
                                                            src="{{ asset('assets/img/category/' . $category->image->image_name) }}"
                                                            alt="{{ $category->image->image_name }}">
                                                    @else
                                                        <img style="width: inherit;" src="{{ asset('assets/img/woocommerce-placeholder-300x300.png') }}"
                                                            alt="{{ $category->category_name }}">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="ps-product__container">
                                                <div class="ps-product__content text-center ">
                                                    <a class="ps-product__title"
                                                        href="{{ route('category', $category->slug) }}"
                                                        title="{{ $category->category_name }}">{{ $category->category_name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
