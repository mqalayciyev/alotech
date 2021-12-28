@extends('user.layouts.app')
@section('title', 'Brendlər')
@section('content')

    <!-- BREADCRUMB -->
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                <li class="active">Brendlər</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->
    <div class="ps-page--shop pt-3">
        <div class="ps-container">
            <div class="ps-layout--shop">

                <div class="ps-layout__right" style="max-width: 100%">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row">
                                        @if (count($brands) > 0)
                                            @foreach ($brands as $array => $brand)
                                                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 " style="height: 200px;">
                                                    <div class="ps-brand" style="height: 100%; cursor: pointer;">
                                                        <div class="ps-product__thumbnail text-center" style="height: 80%">
                                                            <a href="{{ route('brand.product', $brand->slug) }}">
                                                                {!!
                                                                    $brand->image ? "<img style='width: inherit; height: 100%' src='". asset('assets/img/brand/' . $brand->image) ."'>" : "<img style='width: inherit;' src='". asset('assets/img/logo.png') ."'>"
                                                                    !!}
                                                            </a>
                                                        </div>
                                                        <div class="ps-product__container">
                                                            <div class="ps-product__content text-center">
                                                                <a href="{{ route('brand.product', $brand->slug) }}" class="ps-product__title">{{ $brand->name }}</a>
                                                                {{-- <a href="{{ route('brand.product', $brand->name) }}" class="text-dark">{{ $brand->description }}</a> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="w-100 text-center">
                                                <h3 class="text-center">Heç bir brend yoxdur</h3>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
