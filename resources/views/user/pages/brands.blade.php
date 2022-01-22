@extends('user.layouts.app')
@section('title', 'Brendlər')
@section('content')

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">

        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">@lang('content.Home')</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><i class="fas fa-chevron-right"></i>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Brendlər
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>

        <div class="container">
            <div class="row">
                @if (count($brands) > 0)
                    @foreach ($brands as $array => $brand)
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 " style="height: 200px;">
                            <div class="ps-brand" style="height: 100%; cursor: pointer;">
                                <div class="ps-product__thumbnail text-center" style="height: 80%">
                                    <a href="{{ route('brand.product', $brand->slug) }}">
                                        {!! $brand->image ? "<img style='width: 100%; height: auto' src='" . asset('assets/img/brand/' . $brand->image) . "'>" : "<img style='width: 100%;' src='" . asset('assets/img/logo.png') . "'>" !!}
                                    </a>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content text-center">
                                        <a href="{{ route('brand.product', $brand->slug) }}"
                                            class="ps-product__title">{{ $brand->name }}</a>
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
        <!-- End breadcrumb -->
    </main>

@endsection
