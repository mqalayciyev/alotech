@extends('user.layouts.app')
@section('title', 'Product - ' . $product->product_name)
@section('description', $product->meta_description)
@php
    $image = $product->image ? asset('img/products/' . $product->image->main_name) : asset('assets/img/' . $website_info->logo);
@endphp

@section('image', $image)

@section('keywords', $product->meta_title)
@section('head')
    {{-- <link rel="stylesheet" href="{{ asset('plugins/lightGallery-master/dist/css/lightgallery.min.css') }}"> --}}
@endsection
{{-- @section('bodyClass', 'single-product full-width extended') --}}
@section('content')
    @php
    $your_products = session('your_products');
    if ($your_products != '') {
        $your_products = $your_products . '-' . $product->id;
    } else {
        $your_products = $product->id;
    }
    session(['your_products' => $your_products]);


    $price = $product->price->toArray();


    $filter = array_filter($price, function ($item) {
        if ($item['color_id'] > 1 && $item['size_id'] != null) {
            return true;
        }
    });
    if(count($filter) == 0){
        $filter = array_filter($price, function ($item) {
            if ($item['color_id'] > 1 || $item['size_id'] == null) {
                return true;
            }
        });
    }
    if(count($filter) == 0){
        $filter = array_filter($price, function ($item) {
            if ($item['color_id'] == 1 || $item['size_id'] != null) {
                return true;
            }
        });
    }
    if(count($filter) == 0){
        $filter = array_filter($price, function ($item) {
            if ($item['color_id'] == 1 || $item['size_id'] == null) {
                return true;
            }
        });
    }


    @endphp
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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"> <a
                                    href="{{ route('category', $product->categories[0]->slug) }}">{{ $product->categories[0]->category_name }}</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><i class="fas fa-chevron-right"></i>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                {{ $product->product_name }}</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->




        <div class="container">
            <!-- Single Product Body -->
            <div class="single-product-top-info">
                <span class="rating-avarage">
                    {{ $product->rating->avg('rating') > 0 ? $product->rating->avg('rating') : 0 }}
                </span>
                <span class="reviews-count">
                    Rəylər ({{ count( $product->reviews) }})
                </span>
                <span class="reviews-count">
                    {{ $product->best_selling }} müştəri bu məhsulu aldı
                </span>
                <span class="stock-status">
                   {!! $product->price->sum('stock_piece') > 0 ? "<strong class='text-green'><i class='fas fa-check-double'></i> Mövcuddur</strong>" : "<strong class='text-danger'><i class='fas fa-times'></i> Mövcud deyil</strong>" !!}
                </span>
            </div>
            <div class="mb-14">
                <div class="row product__single">
                    <div class="col-md-6 col-lg-4 col-xl-5 mb-4 mb-md-0">
                        <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2" data-infinite="true"
                            data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                            data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                            data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                            data-nav-for="#sliderSyncingThumb">
                            @if (count($product->images))
                                @foreach ($product->images as $image)
                                    <div class="js-slide image-color-{{ $image->color_id }}" data-filter="{{ $image->color_id }}">
                                        <img class="img-fluid" src="{{ asset('assets/img/products/' . $image->main_name) }}" alt="{{ $image->main_name }}">
                                    </div>
                                @endforeach
                            @else
                                <div class="js-slide">
                                    <img class="img-fluid" src="{{ asset('assets/img/' . old('logo', $website_info->logo)) }}" alt="{{ $product->product_name }}">
                                </div>
                            @endif
                        </div>

                        <div id="sliderSyncingThumb"
                            class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                            data-infinite="false" data-slides-show="5" data-is-thumbs="true"
                            data-nav-for="#sliderSyncingNav">
                            @foreach ($product->images as $image)
                                <div class="js-slide image-color-{{ $image->color_id }}" style="cursor: pointer;">
                                    <img class="img-fluid" src="{{ asset('assets/img/products/' . $image->thumb_name) }}" alt="{{ $image->thumb_name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-4 mb-md-6 mb-lg-0">
                        <div class="mb-2">
                            <a href="{{ route('category', $product->categories[0]->slug) }}" class="font-size-12 text-gray-5 mb-2 d-inline-block">{{ $product->categories[0]->category_name }}</a>
                            <h2 class="font-size-25 text-lh-1dot2">{{ $product->product_name }}</h2>
                            <div class="mb-2">
                                <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="javascript:void(0)">

                                    <div class="product-rating text-warning mr-2">
                                        @for ($count = 1; $count <= 5; $count++)
                                            @if ($count <= $product->rating->avg('rating'))
                                                @php $color = 's' @endphp
                                            @else
                                                @php $color = 'r text-muted' @endphp
                                            @endif
                                            <span title="{{ $count }}" id="{{ $product->id . '-' . $count }}"
                                                data-index="{{ $count }}" data-product_id="{{ $product->id }}"
                                                data-rating="{{ $product->rating->avg('rating') }}"
                                                class="rating fa{{ $color }} fa-star"></span>
                                        @endfor
                                    </div>
                                </a>
                            </div>
                            @foreach ($product->brands as $brand)
                                <a class="d-inline-block max-width-150 ml-n2 mb-2" href="{{ route('brand.product', $brand->slug) }}" title="{{ $brand->name }}">
                                    @if ($brand->image)
                                    <img class="img-fluid" src="{{ asset('assets/img/brand/' . $brand->image ) }}" alt="Image Description" >
                                    @else
                                    {{ $brand->name }}
                                    @endif

                                </a>
                            @endforeach

                            <div class="mb-2">
                                <ul class="font-size-14 pl-3 ml-1 text-gray-110" style="line-height: 1.8rem;">
                                    @foreach ($price as $item)
                                            @if ($item)
                                                @if ($item['wholesale_count'])
                                                    <li style="color: rgba(173,51,53,255)">
                                                        @php
                                                            $item_color = App\Models\Color::find($item['color_id']);
                                                            $item_size = App\Models\Size::find($item['size_id']);
                                                            $color_name = $item_color && $item_color->id > 1 ? $item_color->title : '';
                                                            $size_name = $item_size ? $item_size->name : '';
                                                        @endphp
                                                        {!!  '*' . $product->product_name . ' ' . $size_name . ' ' . $color_name . ' ' . $item['wholesale_count'] . ' ' . $product->detail->measurement . ' çox aldıqda satış qiməti ' . $item['wholesale_price'] . '₼' !!}
                                                    </li>
                                                @endif
                                            @endif
                                    @endforeach
                                    @if ($product->one_or_more)
                                        <li style="color: rgba(173,51,53,255)">{{  '*Məhsulun 1' . $product->detail->measurement . ' yuxarı alışına ' . $product->one_or_more . ' bonus hesabınıza əlavə olunacaq' }}</li>
                                    @endif
                                    @if ($product->other_count)
                                        <li style="color: rgba(173,51,53,255)">{{ '*Məhsulun ' . $product->other_count . $product->detail->measurement . ' yuxarı alışına ' . $product->other_bonus . ' bonus hesabınıza əlavə olunacaq' }}</li>
                                    @endif
                                </ul>
                            </div>
                            <p><strong>SKU</strong>: {{ $product->sku }}</p>
                        </div>
                    </div>
                    <div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-3">
                        <div class="mb-2">
                            <div class="card p-5 border-width-2 border-color-1 borders-radius-17">
                                <div class="mb-3">
                                    <div class="ps-product__price">

                                        @if (count($filter))
                                            @foreach ($filter as $item)
                                                @if ($item)
                                                    @if ($product->discount)
                                                        <del class="product_amount currency_azn" data-price-id="{{ $item['id'] }}">{{ $item['sale_price'] }}</del>
                                                        <div class="font-size-36 product_amount_discount currency_azn" >{{ number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) }}</div>
                                                    @else
                                                        <div class="font-size-36 product_amount currency_azn" data-price-id="{{ $item['id'] }}">{{ $item['sale_price'] }}</div>
                                                    @endif
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="font-size-14">Miqdar</h6>
                                    <!-- Quantity -->
                                    <div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1">
                                        <div class="js-quantity row align-items-center">
                                            <div class="col">
                                                <input type="text" data-id="{{ $product->id }}" min="1"
                                                    name="piece" value="1" autocomplete="off"
                                                    class="js-result form-control h-auto border-0 rounded p-0 shadow-none ProductQuantity-Input-{{ $product->id }} form-control" />
                                            </div>
                                            <div class="col-auto pr-1">
                                                <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 ProductQuantity-Minus down"
                                                    href="javascript:;" data-id="{{ $product->id }}">
                                                    <small class="fas fa-minus btn-icon__inner"></small>
                                                </a>
                                                <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 ProductQuantity-Plus up "
                                                    href="javascript:;" data-id="{{ $product->id }}">
                                                    <small class="fas fa-plus btn-icon__inner"></small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Quantity -->
                                </div>
                                <div class="mb-3">
                                    @if (count($product->price->where('color_id', '!=', 1)) > 0)
                                        @php $colors_array = array(); @endphp
                                        <h6 class="font-size-14">Rəng</h6>
                                        <!-- Select -->
                                        <select class="form-control color-element" data-type="product__single" data-discount="{{ $product->discount }}">
                                            @foreach ($product->price->where('color_id', '!=', 1) as $colors)
                                                @if (!in_array($colors->color_id, $colors_array) && $colors->color_id != 1)
                                                    <option value="{{ $colors->color_id }}" data-id="{{ $colors->color_id }}">{{ $colors->color->title }}</option>
                                                    @php array_push($colors_array, $colors->color_id); @endphp
                                                @endif
                                            @endforeach
                                        </select>
                                        <!-- End Select -->
                                    @endif
                                </div>
                                <div class="mb-3">
                                    @if (count($product->price->where('size_id', '!=', null)) > 0)
                                        <h6 class="font-size-14">Ölçü</h6>
                                        <!-- Select -->
                                        <select class="form-control size-element" data-type="product__single" data-discount="{{ $product->discount }}">
                                            @foreach ($product->price->where('size_id', '!=', null) as $sizes)
                                                <option value="{{ $sizes->size_id }}"  data-id="{{ $sizes->color_id }}">{{ $sizes->size->name }}</option>
                                            @endforeach
                                        </select>
                                        <!-- End Select -->
                                    @endif
                                </div>
                                {{-- <h5>Məhsul anbarda mövcud deyil</h5> --}}

                                <div class="mb-2 pb-0dot5">
                                    <a href="javascript:void(0)" data-piece="1" data-type="product__single" data-id="{{ $product->id }}" data-discount="{{ $product->discount }}" class="btn btn-block btn-primary-dark add-to-cart"><i class="ec ec-add-to-cart mr-2 font-size-20"></i>Səbətə at</a>
                                </div>

                                <div class="flex-content-center flex-wrap">
                                    <a href="javascript:void(0)" class="text-gray-6 font-size-13 mr-2 add-wish-list" title="Seçilmişlər" data-id="{{ $product->id }}"><i class="ec ec-favorites mr-1 font-size-15"></i> Seçilmişlər</a>
                                    <a href="javascript:void(0)" class="text-gray-6 font-size-13 ml-2 add-to-compare" title="Müqayisə et" data-id="{{ $product->id }}"><i class="ec ec-compare mr-1 font-size-15"></i> Müqayisə et</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Product Body -->
        </div>
        <div class="bg-gray-7 pt-6 pb-3 mb-6">
            <div class="container">
                <div class="js-scroll-nav">
                    <div class="bg-white pt-4 pb-6 px-xl-11 px-md-5 px-4 mb-6 overflow-hidden">
                        <div class="position-relative mb-6">

                            <ul class="nav nav-classic nav-tabs nav-tab-lg justify-content-xl-center mb-6 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-lg-down-bottom-0 pb-1 pb-xl-0 mb-n1 mb-xl-0">
                                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2 active">
                                    <a data-toggle="tab" class="nav-link active" href="#Description">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            Təsvir
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                    <a data-toggle="tab" class="nav-link" href="#Reviews">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            Rəylər
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="Description" class="tab-pane fade in active show mx-md-2">
                                {!! $product->product_description !!}
                            </div>
                            <div id="Reviews" class="tab-pane fade mx-md-2">
                                <div class="mb-4 px-lg-4">
                                    <div class="row mb-8">
                                        <div class="col-md-6">
                                            <div class="reviews-div">

                                            </div>
                                            <ul class="reviews-pages"></ul>

                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="font-size-18 mb-5">Rəy yaz</h3>

                                            <p><sup>*</sup>Elektron poçtunuz dərc olunmayacaq. Zəruri sahələr qeyd olunur</p>
                                            <p style="color: rgba(173,51,53,255)">
                                                @if ($product->bonus_comment)
                                                {{ '*Məhsul üçün bildirilən hər şərh üçün ' . $product->bonus_comment . ' bonus hesabınıza əlavə olunacaq' }}
                                                @endif
                                            </p>
                                            <!-- Form -->
                                            <form class="js-validate"  action="{{ route('product.review') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <div class="form-group form-group__rating">
                                                    <label>Bu məhsulun reytinqi</label>
                                                    <div class="text-warning">
                                                        <label>
                                                            <i class="far fa-star"></i>
                                                            <input type="radio" name="rating" value="1" style="display: none">
                                                        </label>
                                                        <label>
                                                            <i class="far fa-star"></i>
                                                            <input type="radio" name="rating" value="2" style="display: none">
                                                        </label>
                                                        <label>
                                                            <i class="far fa-star"></i>
                                                            <input type="radio" name="rating" value="3" style="display: none">
                                                        </label>
                                                        <label>
                                                            <i class="far fa-star"></i>
                                                            <input type="radio" name="rating" value="4" style="display: none">
                                                        </label>
                                                        <label>
                                                            <i class="far fa-star"></i>
                                                            <input type="radio" name="rating" value="5s" style="display: none">
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="js-form-message form-group mb-3 row">
                                                    <div class="col-md-4 col-lg-3">
                                                        <label for="descriptionTextarea" class="form-label">Rəyiniz</label>
                                                    </div>
                                                    <div class="col-md-8 col-lg-9">
                                                        <textarea class="form-control" rows="3" name="review" required id="descriptionTextarea"
                                                            data-msg="Zəhmət olmasa rəy yazın"
                                                            data-error-class="u-has-error"
                                                            data-success-class="u-has-success"></textarea>
                                                    </div>
                                                </div>
                                                <div class="js-form-message form-group mb-3 row">
                                                    <div class="col-md-4 col-lg-3">
                                                        <label for="inputName" class="form-label">Ad <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-md-8 col-lg-9">
                                                        @auth
                                                            <input type="text" class="form-control" name="name" id="inputName"
                                                                    aria-label="Alex Hecker" value="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}"
                                                                    required data-msg="Adınızı daxil edin"
                                                                    data-error-class="u-has-error"
                                                                    data-success-class="u-has-success">
                                                        @endauth
                                                        @guest
                                                            <input type="text" class="form-control" name="name" id="inputName"
                                                                    aria-label="Alex Hecker" required data-msg="Adınızı daxil edin"
                                                                    data-error-class="u-has-error"
                                                                    data-success-class="u-has-success">
                                                        @endguest

                                                    </div>
                                                </div>
                                                <div class="js-form-message form-group mb-3 row">
                                                    <div class="col-md-4 col-lg-3">
                                                        <label for="emailAddress" class="form-label">Email <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-md-8 col-lg-9">
                                                        @auth
                                                            <input type="email" class="form-control" value="{{ auth()->user()->email }}" name="email"
                                                                id="emailAddress" aria-label="alexhecker@pixeel.com" required
                                                                data-msg="Zəhmət olmasa email adresinizi daxil edin"
                                                                data-error-class="u-has-error"
                                                                data-success-class="u-has-success">
                                                        @endauth
                                                        @guest
                                                            <input type="email" class="form-control" name="email"
                                                                id="emailAddress" aria-label="alexhecker@pixeel.com" required
                                                                data-msg="Zəhmət olmasa email adresinizi daxil edin"
                                                                data-error-class="u-has-error"
                                                                data-success-class="u-has-success">
                                                        @endguest

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="offset-md-4 offset-lg-3 col-auto">
                                                        <button type="submit" class="btn btn-primary-dark btn-wide transition-3d-hover">Göndər</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- End Form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @if (count($company) > 0)
                <div class="mb-8">
                    <!-- Tab Content -->
                    <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                        <div class="tab-content" id="Jpills-tabContent">
                            <div class="tab-pane fade active show" id="Jpills-one-example1" role="tabpanel" aria-labelledby="Jpills-one-example1-tab">
                                <div class="row no-gutters">
                                    <div class="col mb-6 mb-md-0">
                                        <ul class="row list-unstyled products-group no-gutters border-bottom border-md-bottom-0">
                                            <li class="col-4 col-md-4 col-xl-3 product-item remove-divider-sm-down border-0">
                                                <div class="product-item__outer h-100">
                                                    <div class="remove-prodcut-hover product-item__inner px-xl-4 p-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2 d-none d-md-block">
                                                                <a href="{{ route('category', $product->categories[0]->slug) }}"
                                                                    class="font-size-12 text-gray-5 line-clamp-1"
                                                                    title="{{ $product->categories[0]->category_name }}">{{ $product->categories[0]->category_name }}</a>
                                                            </div>
                                                            <h5 class="mb-1 product-item__title d-none d-md-block">
                                                                <a href="{{ route('product', $product->slug) }}"
                                                                    class="text-blue font-weight-bold line-clamp-1"
                                                                    title="{{ $product->product_name }}">{{ $product->product_name }}</a>
                                                            </h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route('product', $product->slug) }}" class="d-block text-center">
                                                                    <img class="img-fluid" src="{{ $product->image->image_name ? asset('assets/img/products/' . $product->image->image_name) : asset('assets/img/' . old('logo', $website_info->logo)) }}"
                                                                    alt="{{ $product->product_name }}">
                                                                </a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    @if ($product->discount)
                                                                        <del class="currency_azn" data-price-id="{{ $company->first()->mainPrice->id }}">{{ $company->first()->mainPrice->sale_price }}</del>
                                                                        <div class="font-size-20 text-red currency_azn" >{{ number_format($company->first()->mainPrice->sale_price * ((100 - $product->discount) / 100), 2) }}</div>
                                                                    @else
                                                                        <div class="font-size-20 text-red currency_azn" data-price-id="{{ $company->first()->mainPrice->id }}">{{ $company->first()->mainPrice->sale_price }}</div>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @foreach ($company as $item)
                                            @php
                                                $price = $item->price;
                                            @endphp

                                                <li class="col-4 col-md-4 col-xl-3 product-item remove-divider-sm-down">
                                                    <div class="product-item__outer h-100">
                                                        <div class="remove-prodcut-hover add-accessories product-item__inner px-xl-4 p-3">
                                                            <div class="product-item__body pb-xl-2">
                                                                <div class="mb-2 d-none d-md-block">
                                                                    <a href="{{ route('category', $item->product->categories[0]->slug) }}"
                                                                    class="font-size-12 text-gray-5 line-clamp-1"
                                                                    title="{{ $item->product->categories[0]->category_name }}">{{ $item->product->categories[0]->category_name }}</a>
                                                                </div>
                                                                <h5 class="mb-1 product-item__title d-none d-md-block">
                                                                    <a href="{{ route('product', $item->product->slug) }}"
                                                                        class="text-blue font-weight-bold line-clamp-1"
                                                                        title="{{ $item->product->product_name }}">{{ $item->product->product_name }}</a>
                                                                </h5>
                                                                <div class="mb-2">
                                                                    <a href="{{ route('product', $item->product->slug) }}" class="d-block text-center">
                                                                        <img class="img-fluid" src="{{ $item->product->image->image_name ? asset('assets/img/products/' . $item->product->image->image_name) : asset('assets/img/' . old('logo', $website_info->logo)) }}"
                                                                        alt="{{ $item->product->product_name }}">
                                                                    </a>
                                                                </div>
                                                                <div class="flex-center-between mb-1">
                                                                    <div class="prodcut-price">
                                                                        @if ($item->product->discount)
                                                                            <del class="product_amount currency_azn" data-price-id="{{ $item->price['id'] }}">{{ $item->price['sale_price'] }}</del>
                                                                            <div class="font-size-20 text-red product_amount_discount currency_azn" >{{ number_format($item->price['sale_price'] * ((100 - $item->product->discount) / 100), 2) }}</div>
                                                                        @else
                                                                            <div class="font-size-20 text-red product_amount currency_azn" data-price-id="{{ $item->price['id'] }}">{{ $item->price['sale_price'] }}</div>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="mr-xl-15">
                                            <div class="mb-3">
                                                <del class="font-size-20 text-lh-1dot2  currency_azn">{{ number_format(($company->first()->mainPrice->sale_price + $price_company), 2) }}</del>
                                                <div class="text-red font-size-26 text-lh-1dot2  currency_azn">{{ number_format(($company->first()->mainPrice->sale_price + $price_company) - $company->first()->discount, 2) }}</div>
                                                <div class="text-gray-6">{{ count($company) + 1 }} məhsul üçün</div>
                                            </div>
                                            <a href="javascript:void(0)" data-size="{{ $company->first()->mainPrice->size_id }}" data-color="{{ $company->first()->mainPrice->color_id }}" data-id="{{ $product->id }}" data-price-id="{{ $company->first()->mainPrice->id }}" data-amount="{{ $company->first()->mainPrice->sale_price }}" data-discount="{{ $product->discount }}" class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover add-cart">Hamısını səbətə at</a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <!-- End Tab Content -->
                </div>
            @endif

            @if (count($related) > 0)
                <!-- Related products -->
                <div class="mb-6">
                    <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                        <h3 class="section-title mb-0 pb-2 font-size-22">Bu məhsulla birlikdə alınanlar</h3>
                    </div>
                    <ul class="row list-unstyled products-group no-gutters ">
                        @foreach ($related as $item)
                            <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item products__all">
                                <div class="product-item__outer h-100">
                                    <div class="product-item__inner px-xl-4 p-3">
                                        <div class="product-item__body pb-xl-2">
                                            <div class="mb-2">
                                                <a href="{{ route('category', $item->product->categories[0]->slug) }}"
                                                    class="font-size-12 text-gray-5 line-clamp-1"
                                                    title="{{ $item->product->categories[0]->category_name }}">{{ $item->product->categories[0]->category_name }}</a>
                                                </div>
                                            <h5 class="mb-1 product-item__title">
                                                <a href="{{ route('product', $item->product->slug) }}"
                                                    class="text-blue font-weight-bold line-clamp-1"
                                                    title="{{ $item->product->product_name }}">{{ $item->product->product_name }}</a>
                                                </h5>
                                                <div class="mb-2 position-relative">
                                                    <a href="{{ route('product', $item->product->slug) }}" class="d-block text-center">
                                                        <img class="img-fluid"
                                                            src="{{ $item->product->image->image_name ? asset('assets/img/products/' . $item->product->image->image_name) : asset('assets/img/' . old('logo', $website_info->logo)) }}"
                                                            alt="{{ $item->product->product_name }}">
                                                    </a>
                                                    @if (count($item->product->price) > 1)
                                                        <div style="position: absolute; right: 0; bottom: 0;">
                                                            <img src="{{ asset('assets/img/colorwheel-circle-icon-256.png') }}" style="width: 25px; height: 25px;" alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                            <div class="flex-center-between mb-1">
                                                <div class="prodcut-price">
                                                    @php
                                                        $price = $item->product->price->where('stock_piece', '>', 0)->toArray();

                                                        // echo "<pre>";
                                                        //     print_r($price);

                                                        $filter = array_filter($price, function ($item) {
                                                            if ($item['color_id'] > 1 && $item['size_id'] != null) {
                                                                return true;
                                                            }
                                                        });
                                                        if(count($filter) == 0){
                                                            $filter = array_filter($price, function ($item) {
                                                                if ($item['color_id'] > 1 || $item['size_id'] == null) {
                                                                    return true;
                                                                }
                                                            });
                                                        }
                                                        if(count($filter) == 0){
                                                            $filter = array_filter($price, function ($item) {
                                                                if ($item['color_id'] == 1 || $item['size_id'] != null) {
                                                                    return true;
                                                                }
                                                            });
                                                        }
                                                        if(count($filter) == 0){
                                                            $filter = array_filter($price, function ($item) {
                                                                if ($item['color_id'] == 1 || $item['size_id'] == null) {
                                                                    return true;
                                                                }
                                                            });
                                                        }
                                                    @endphp

                                                    @if (count($filter))
                                                    @foreach ($filter as $price)
                                                        @if ($price)
                                                            @if ($item->product->discount)
                                                                <del class="product_amount currency_azn" data-price-id="{{ $price['id'] }}">{{ $price['sale_price'] }}</del>
                                                                <div class="font-size-20 text-red product_amount_discount currency_azn" >{{ number_format($price['sale_price'] * ((100 - $price->product->discount) / 100), 2) }}</div>
                                                            @else
                                                                <div class="font-size-20 text-red product_amount currency_azn" data-price-id="{{ $price['id'] }}">{{ $price['sale_price'] }}</div>
                                                            @endif
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                </div>
                                                <div class="d-block prodcut-add-cart">
                                                    <a href="javascript:void(0)" class="btn-add-cart btn-primary transition-3d-hover add-to-cart"
                                                        data-type="products__all" data-piece="1" data-discount="{{ $item->product->discount }}"
                                                        data-id="{{ $item->product->id }}"><i class="fas fa-cart-arrow-down "></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item__footer">
                                            @if ($item->product->price->sum('stock_piece') > 0)
                                            <p class="mb-2 text-center"><i class="fas fa-check text-success"></i> Mövcuddur</p>
                                        @else
                                            @if ($item->product->order_arrival)
                                                @php
                                                    Carbon::setLocale('az');
                                                    $arrival = Carbon::createFromDate($item->product->order_arrival);
                                                    $now = Carbon::now();
                                                @endphp
                                                <p class="mb-2 text-center"><i class="fas fa-truck text-danger"></i> {{ $arrival->diffForHumans($now) }} çatacaq</p>
                                            @else
                                                <p class="mb-2 text-center"><i class="fas fa-times text-danger"></i> Mövcud deyil</p>
                                            @endif
                                        @endif
                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                <a href="javascript:void(0)" class="text-gray-6 font-size-13 add-to-compare" data-id="{{ $item->product->id }}"><i class="fa fa-retweet font-size-15"></i></a>
                                                <a href="javascript:void(0)" class="text-gray-6 font-size-13 add-wish-list" data-id="{{ $item->product->id }}"><i class="fa fa-heart font-size-15 mr-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- End Related products -->
            @endif
            <!-- Related products -->
            <div class="mb-6">
                <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                    <h3 class="section-title mb-0 pb-2 font-size-22">Əlaqədar məhsullar</h3>
                </div>
                <ul class="row list-unstyled products-group no-gutters products_rp">

                </ul>
            </div>
            <!-- End Related products -->
        </div>
    </main>

@endsection

@section('script')
    <script>

    function priceList (product_id) {
        $.ajax({
            url: '{{ route('product.price_list') }}',
            method: 'GET',
            data: {
                product_id: product_id
            },
            success: function(data) {
                price_list = data.priceList
            }
        });
    };

    let price_list = [];
    let companyAmount = parseFloat("{{ $price_company }}");
    let companyDiscount = parseFloat("{{ count($company) > 0 ? $company->first()->discount : 0 }}");

    priceList("{{ $product->id }}")



        $(function() {

        let product_price_id;
        let product_amount;
        let product_amount_discount;

        $(document).on('change', '.color-element', function() {

            let target = $(this)
            let id = $(this).val()
            let discount = parseFloat($(target).data('discount'));

            let sizes_exist = $(".product__single .size-element[data-color='" + id + "']").length;
            let product = $(target).data('product')

            if (!product_amount_discount) {
                product_amount_discount = $(".product__single .product_amount_discount").html()
            }
            if (!product_amount) {
                product_amount = $(".product__single .product_amount").html()
                product_price_id = $(".product__single .product_amount").data('price-id')
            }



            $(".product__single .size-element option").each(function() {
                let filter = $(this).data('id');
                if (filter != id) {
                    $(this).addClass('d-none')
                    $(this).prop('disabled', true);
                } else {
                    $(this).removeClass('d-none')
                    $(this).prop('disabled', false);
                }
                $(this).removeAttr('selected')
            });

            $(".product__single .size-element option").not(':disabled').first().prop('selected', true)


            $('#sliderSyncingNav').slick('slickUnfilter');
            $('#sliderSyncingThumb ').slick('slickUnfilter');
            let filterClass = '.image-color-' + id
            if ($('#sliderSyncingNav ' + filterClass).length > 0) {
                $('#sliderSyncingNav').slick('slickFilter', filterClass);
                $('#sliderSyncingThumb ').slick('slickFilter', filterClass);
            }



            let color = id
            let size = $(".product__single .size-element").val()

            let price = []
            if (size) {
                price = price_list.filter(item => item.color_id == color && item.size_id == size)

                if (price.length == 0) {
                    price = price_list.filter(item => item.color_id == color && item.size_id == null)
                }
            } else {
                price = price_list.filter(item => item.color_id == color && item.size_id == null)
            }

            if (price.length == 0) {
                let amount = parseFloat(product_amount)
                $(".product__single .product_amount").html(product_amount)
                $(".product__single .product_amount").attr('data-price-id', product_price_id)
                $(".company_product_amount").html(product_amount)

                let total = amount + companyAmount
                let totalWithDiscount = total - companyDiscount

                if (discount) {
                    amount = amount * ((100 - discount) / 100)
                    $(".product__single .product_amount_discount").html(amount.toFixed(2))
                    $(".company_product_amount_discount").html(amount.toFixed(2))
                    total = amount + companyAmount
                    totalWithDiscount = total - companyDiscount

                }

                $(".company_total_amount").html(total.toFixed(2))
                $(".company_total_amount_discount").html(totalWithDiscount.toFixed(2))

            } else {
                let amount = parseFloat(price[0].sale_price)
                $(".product__single .product_amount").html(amount)
                $(".product__single .product_amount").attr('data-price-id', price[0].id)
                $(".company_product_amount").html(amount)

                let total = amount + companyAmount
                let totalWithDiscount = total - companyDiscount


                if (discount) {
                    amount = amount * ((100 - discount) / 100)
                    $(".product__single .product_amount_discount").html(amount.toFixed(2))
                    $(".company_product_amount_discount").html(amount.toFixed(2))

                    total = amount + companyAmount
                    totalWithDiscount = total - companyDiscount
                }

                $(".company_total_amount").html(total.toFixed(2))
                $(".company_total_amount_discount").html(totalWithDiscount.toFixed(2))
            }
        })
        $(document).on('change', '.size-element', function() {
            let target = $(this)
            let id = $(this).val()
            let discount = $(target).data('discount');
            let type = $(target).data('type')
            let colors_exist = $(".product__single .color-element").length;


            if (!product_amount_discount) {
                product_amount_discount = $(".product__single .product_amount_discount").html()
            }
            if (!product_amount) {
                product_amount = $(".product__single .product_amount").html()
                product_price_id = $(".product__single .product_amount").data('price-id')
            }

            if (colors_exist > 0) {
                let size = id
                let color = $(".product__single .color-element").val()
                let price = price_list.filter(item => item.size_id == size && item.color_id == color)


                if (price.length != 0) {
                    let amount = parseFloat(price[0].sale_price)
                    $(".product__single .product_amount").html(amount)
                    $(".product__single .product_amount").attr('data-price-id', price[0].id)
                    $(".company_product_amount").html(amount)

                    let total = amount + companyAmount
                    let totalWithDiscount = total - companyDiscount

                    if (discount) {
                        amount = amount * ((100 - discount) / 100)
                        $(".product__single .product_amount_discount").html(amount.toFixed(2))
                        $(".company_product_amount_discount").html(amount.toFixed(2))

                        total = amount + companyAmount
                        totalWithDiscount = total - companyDiscount
                    }

                    $(".company_total_amount").html(total.toFixed(2))
                    $(".company_total_amount_discount").html(totalWithDiscount.toFixed(2))

                }

            } else {
                let size = id
                let price = price_list.filter(item => item.size_id == size && item.color_id == 1)


                if (price.length == 0) {
                    let amount = parseFloat(product_amount)

                    $(".product__single .product_amount").html(amount)
                    $(".product__single .product_amount").attr('data-price-id', product_price_id)
                    $(".company_product_amount").html(amount)

                    let total = amount + companyAmount
                    let totalWithDiscount = total - companyDiscount

                    if (discount) {
                        amount = amount * ((100 - discount) / 100)
                        $(".product__single .product_amount_discount").html(amount.toFixed(2))
                        total = amount + companyAmount
                        totalWithDiscount = total - companyDiscount
                    }

                    $(".company_total_amount").html(total.toFixed(2))
                    $(".company_total_amount_discount").html(totalWithDiscount.toFixed(2))


                } else {
                    let amount = parseFloat(price[0].sale_price)

                    $(".product__single .product_amount").html(amount)
                    $(".product__single .product_amount").attr('data-price-id', price[0].id)
                    $(".company_product_amount").html(amount)

                    let total = amount + companyAmount
                    let totalWithDiscount = total - companyDiscount

                    if (discount) {
                        amount = amount * ((100 - discount) / 100)
                        $(".product__single .product_amount_discount").html(amount.toFixed(2))
                        $(".company_product_amount_discount").html(amount.toFixed(2))
                        total = amount + companyAmount
                        totalWithDiscount = total - companyDiscount
                    }

                    $(".company_total_amount").html(total.toFixed(2))
                    $(".company_total_amount_discount").html(totalWithDiscount.toFixed(2))

                }
            }
        })



            products('products_rp');

            function products(dynamic_product) {

                let category = "{{ $product->categories[0]->slug }}"
                let product_id = "{{ $product->id }}"
                $.ajax({
                    url: '{{ route('homepage.products') }}',
                    method: 'GET',
                    data: {
                        product: dynamic_product,
                        category,
                        product_id
                    },
                    success: function(data) {
                        $('.' + dynamic_product).html(data);
                    }
                });


            };

            reviews()

            function reviews() {
                $.ajax({
                    url: "{{ route('product.reviews') }}",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        product_id: "{{ $product->id }}"
                    },
                    success: function(data) {
                        $(".reviews-div").html('')
                        $(".reviews-div").append(data.reviews)
                        $('.review_count').html(`(${data.count})`)
                    }

                })
            }

            $(document).on('click', '.add-cart', function() {
            let discount = parseFloat($(this).data('discount'))
            let priceId = parseInt($(this).data('price-id'))
            let amount = parseFloat($(this).data('amount'))
            let size = parseInt($(this).data('size'))
            let color = parseInt($(this).data('color'))
            let id = parseInt($(this).data('id'));
            let piece = 1
            let company = 1
            if (discount) {
                amount = amount * ((100 - discount) / 100)
            }


            $.ajax({
                url: '{{ route('cart.add_to_cart') }}',
                method: 'GET',
                data: {
                    id: id,
                    piece: piece,
                    size: size,
                    color: color,
                    priceId,
                    amount,
                    company,
                    discount: discount ? discount : 0
                },
                success: function(data) {
                    console.log(data)
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    if (data.status == 'success') {
                        $('.total-amount').html(data.total);
                        $('.show_cartCount').html(data.count);

                        toastr.success(data.message);
                    } else {
                        let msg = "";
                        let message = data.message;

                        for (const value of Object.values(message)) {
                            toastr.error(value);
                        }
                    }
                }
            });
        });

        });
    </script>
@endsection
