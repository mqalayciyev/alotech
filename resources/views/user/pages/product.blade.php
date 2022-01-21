@extends('user.layouts.app')
@section('title', 'Product - ' . $product->product_name)
@section('description', $product->meta_discription)
@section('image', asset('img/products/' . $images[0]->main_name))
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
                                    href="{{ route('category', $category->slug) }}">{{ $category->category_name }}</a>
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
            <div class="mb-14">
                <div class="row product__single">
                    <div class="col-md-6 col-lg-4 col-xl-5 mb-4 mb-md-0">
                        <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2" data-infinite="true"
                            data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                            data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                            data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                            data-nav-for="#sliderSyncingThumb">
                            @if (count($images))
                                @foreach ($images as $image)
                                    <div class="js-slide image-color-{{ $image->color_id }}" data-filter="{{ $image->color_id }}">
                                        <img class="img-fluid" src="{{ asset('assets/img/products/' . $image->main_name) }}" alt="{{ $image->main_name }}">
                                    </div>
                                @endforeach
                            @else
                                <div class="js-slide image-color-{{ $image->color_id }}" data-filter="{{ $image->color_id }}">
                                    <img class="img-fluid" src="{{ asset('assets/img/' . old('logo', $website_info->logo)) }}" alt="{{ $product->product_name }}">
                                </div>
                            @endif
                        </div>

                        <div id="sliderSyncingThumb"
                            class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                            data-infinite="true" data-slides-show="5" data-is-thumbs="true"
                            data-nav-for="#sliderSyncingNav">
                            @foreach ($images as $image)
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
                                            @if ($count <= $rating->rating_avg)
                                                @php $color = 's' @endphp
                                            @else
                                                @php $color = 'r text-muted' @endphp
                                            @endif
                                            <span title="{{ $count }}" id="{{ $product->id . '-' . $count }}"
                                                data-index="{{ $count }}" data-product_id="{{ $product->id }}"
                                                data-rating="{{ $rating->rating_avg }}"
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
                                <ul class="font-size-14 pl-3 ml-1 text-gray-110">
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



        $(function() {


            products('products_rp');

            function products(dynamic_product) {

                let category = "{{ $category['slug'] }}"
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

        });
    </script>
@endsection
