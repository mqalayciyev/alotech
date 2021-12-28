@extends('user.layouts.app')
@section('title', 'Product - '.$product->product_name)
@section('description', $product->meta_discription)
@section('image',  asset('img/products/'.$images[0]->main_name))
@section('keywords', $product->meta_title)
@section('head')
    {{-- <link rel="stylesheet" href="{{ asset('plugins/lightGallery-master/dist/css/lightgallery.min.css') }}"> --}}
@endsection
@section('content')
    @php
    $your_products = session('your_products');
    if ($your_products != '') {
        $your_products = $your_products . '-' . $product->id;
    } else {
        $your_products = $product->id;
    }
    session(['your_products' => $your_products]);
    @endphp

    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                <li><a href="{{ route('category', $category->slug) }}">{{ $category->category_name }}</a></li>
                <li class="active">{{ $product->product_name }}</li>
            </ul>
        </div>
    </div>
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="ps-page--product">
        <div class="ps-container">
            <div class="ps-page__container">
                <div class="ps-page__left">
                    <div class="ps-product--detail ps-product--fullwidth">
                        <div class="ps-product__header">
                            <div class="ps-product__thumbnail" data-vertical="true">
                                <figure>
                                    <div class="ps-wrapper">
                                        <div class="ps-product__gallery" data-arrow="true">
                                            @if (count($images))
                                                @foreach ($images as $image)
                                                    <div class="item p-0 image-color-{{ $image->color_id }}" data-filter="{{ $image->color_id }}">
                                                        <a href="{{ asset('assets/img/products/' . $image->main_name) }}">
                                                            <img src="{{ asset('assets/img/products/' . $image->main_name) }}"  alt="{{ $image->main_name }}">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="item p-0">
                                                    <a
                                                        href="{{ asset('assets/img/' . old('logo', $website_info->logo)) }}">
                                                        <img src="{{ asset('assets/img/' . old('logo', $website_info->logo)) }}"
                                                            alt="{{ $product->product_name }}">
                                                    </a>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </figure>
                                <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                    @foreach ($images as $image)
                                        <div class="item image-color-{{ $image->color_id }}" >
                                            <img src="{{ asset('assets/img/products/' . $image->thumb_name) }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="ps-product__info ps-product__amount_parent ps-product__single">
                                <h1>{{ $product->product_name }}</h1>
                                <div class="ps-product__meta">
                                    <p>Marka:
                                        @foreach ($product->brands as $brand)
                                            <a href="{{ route('brand.product', $brand->name) }}">
                                                {{ $brand->name }}
                                            </a>
                                        @endforeach
                                    </p>
                                    <p>Reytinq</p>
                                    <p class="product-rating">

                                        @for ($count = 1; $count <= 5; $count++)
                                            @if ($count <= $rating->rating_avg)
                                                @php $color = '' @endphp
                                            @else
                                                @php $color = '-o empty' @endphp
                                            @endif
                                            <i title="{{ $count }}" id="{{ $product->id . '-' . $count }}"
                                                data-index="{{ $count }}" data-product_id="{{ $product->id }}"
                                                data-rating="{{ $rating->rating_avg }}"
                                                class="rating fa fa-star{{ $color }}"></i>
                                        @endfor
                                    </p>
                                </div>
                                <h4>
                                    <span class="ps-product__price">
                                            @php

                                                $price = [];
                                                foreach ($product->price as $object) {
                                                    $price[] = $object->toArray();
                                                }
                                                

                                                $filter_1 = array_filter($price, function ($item) {
                                                    if ($item['color_id'] != null && $item['size_id'] != null) {
                                                        return true;
                                                    }
                                                });
                                                $filter_2 = array_filter($price, function ($item) {
                                                    if ($item['color_id'] != null || $item['size_id'] != null) {
                                                        return true;
                                                    }
                                                });
                                                $filter_3 = array_filter($price, function ($item) {
                                                    if ($item['default_price'] == 1) {
                                                        return true;
                                                    }
                                                });
                                            @endphp

                                        @if (count($filter_1))
                                            @foreach ($filter_1 as $item)
                                                @if ($item)
                                                    {!! $product->discount ? '<span class="product_amount_discount">' . number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) . '</span>₼<del><span class="product_amount" data-price-id="'. $item['id'] . '">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount" data-price-id="'. $item['id'] . '">' . $item['sale_price'] . '</span>₼' !!}
                                                    @break
                                                @endif
                                            @endforeach
                                        @elseif (count($filter_2))
                                            @foreach ($filter_2 as $item)
                                                @if ($item)
                                                    {!! $product->discount ? '<span class="product_amount_discount">' . number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) . '</span>₼<del><span class="product_amount" data-price-id="'. $item['id'] . '">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount" data-price-id="'. $item['id'] . '">' . $item['sale_price'] . '</span>₼' !!}
                                                    @break
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach ($filter_3 as $item)
                                                @if ($item)
                                                    {!! $product->discount ? '<span class="product_amount_discount">' . number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) . '</span>₼<del><span class="product_amount" data-price-id="'. $item['id'] . '">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount" data-price-id="'. $item['id'] . '">' . $item['sale_price'] . '</span>₼' !!}
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif



                                    </span>
                                </h4>
                                <div class="ps-product__desc">
                                    @if ($product->discount > 0)
                                        <h4 class="sale">{{ -$product->discount }}% endirimdən indi yararlanın
                                        </h4>
                                    @endif
                                </div>
                                <div class="ps-product__shopping d-block">
                                    <figure>
                                        <h4 style="color: rgba(173,51,53,255)">
                                            
                                            @if (count($filter_1))
                                                @foreach ($filter_1 as $item)
                                                    @if ($item)
                                                        @php
                                                        $item_color = App\Models\Color::find($item['color_id']);
                                                        $item_size = App\Models\Size::find($item['size_id']);
                                                        $color_name = $item_color ? '<span style="background-color: ' . $item_color->name . '">' .$item_color->title . '</span>' : '';
                                                        $size_name = $item_size ? $item_size->name : '';
                                                        @endphp
                                                        {!! $item['wholesale_count'] ? '*' . $product->product_name . ' ' . $color_name . ' ' . $size_name . $item['wholesale_count'] . ' ' . $product->detail->measurement . ' yuxarı topdan satış qiməti ' . $item['wholesale_price'] . '₼' : '' !!}
                                                        @break
                                                    @endif
                                                @endforeach
                                            @elseif (count($filter_2))
                                                @foreach ($filter_2 as $item)
                                                    @if ($item)
                                                        @php
                                                        $item_color = App\Models\Color::find($item['color_id']);
                                                        $item_size = App\Models\Size::find($item['size_id']);
                                                        $color_name = $item_color ? '<span style="background-color: ' . $item_color->name . '">' .$item_color->title . '</span>' : '';
                                                        $size_name = $item_size ? $item_size->name : '';
                                                        @endphp
                                                        {!! $item['wholesale_count'] ? '*' . $product->product_name . ' ' . $color_name . ' ' . $size_name . $item['wholesale_count'] . ' ' . $product->detail->measurement . ' yuxarı topdan satış qiməti ' . $item['wholesale_price'] . '₼' : '' !!}
                                                        @break
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($filter_3 as $item)
                                                    @if ($item)
                                                        @php
                                                        $item_color = App\Models\Color::find($item['color_id']);
                                                        $item_size = App\Models\Size::find($item['size_id']);
                                                        $color_name = $item_color ? '<span style="background-color: ' . $item_color->name . '">' .$item_color->title . '</span>' : '';
                                                        $size_name = $item_size ? $item_size->name : '';
                                                        @endphp
                                                        {!! $item['wholesale_count'] ? '*' . $product->product_name . ' ' . $color_name . ' ' . $size_name . $item['wholesale_count'] . ' ' . $product->detail->measurement . ' yuxarı topdan satış qiməti ' . $item['wholesale_price'] . '₼' : '' !!}
                                                        @break
                                                    @endif
                                                @endforeach
                                            @endif
                                            
                                        </h4>
                                    </figure>
                                    <figure>
                                        <h4 style="color: rgba(173,51,53,255)">
                                            {{ $product->one_or_more ? '*Məhsulun 1' . $product->detail->measurement . ' yuxarı alışına ' . $product->one_or_more . ' bonus hesabınıza əlavə olunacaq' : '' }}
                                        </h4>
                                    </figure>
                                    <figure>
                                        <h4 style="color: rgba(173,51,53,255)">
                                            {{ $product->other_count ? '*Məhsulun ' . $product->other_count . $product->detail->measurement . ' yuxarı alışına ' . $product->other_bonus . ' bonus hesabınıza əlavə olunacaq' : '' }}
                                        </h4>
                                    </figure>
                                    <figure>
                                        <figcaption>Miqdari {{ ucfirst($product->detail->measurement) }}</figcaption>
                                        <div class="form-group--number">
                                            <button type="button" class="ProductQuantity-Plus up"
                                                data-id="{{ $product->id }}">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <button type="button" class="ProductQuantity-Minus down "
                                                data-id="{{ $product->id }}">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input {{-- id="qty" --}} type="text" data-id="{{ $product->id }}" min="1"
                                                name="piece" value="1"
                                                autocomplete="off"
                                                class="ProductQuantity-Input-{{ $product->id }} form-control" />
                                        </div>
                                    </figure>
                                    <br>
                                    @if (count($product->stock) > 0)
                                        <figure id="by-color">
                                            @php
                                                $selected_color = '';
                                                $selected_size = '';
                                                $colors_array = array();
                                            @endphp
                                            @foreach ($product->stock as $stock)
                                                @if (!in_array($stock->color_id, $colors_array) && $stock->color_id != 1)
                                                    <div class="ps-checkbox ps-checkbox--color ps-checkbox--inline">
                                                        <label class="colors">
                                                            <input type="radio" class="color-element" name="color"
                                                                data-type="ps-product__single"
                                                                data-id="{{ $stock->color->id }}"
                                                                data-discount="{{ $product->discount }}"
                                                                data-product="{{ $product->id }}"
                                                                data-name="{{ $stock->color->name }}"
                                                                {{ !$selected_color ? 'checked' : ''}}
                                                                value={{ $stock->color->id }} />
                                                            <p><span class="filter_color" data-id="{{ $stock->color->id }}"
                                                                    data-color="{{ $stock->color->name }}"
                                                                    style="background-color:  {{ $stock->color->name }};"></span></p>
                                                        </label>
                                                    </div>
                                                    @php
                                                        $selected_color = $stock->color->id;
                                                        array_push($colors_array, $stock->color_id);
                                                    @endphp
                                                @endif
                                            @endforeach
                                        </figure>
                                        <figure class="sizes">
                                            @foreach ($product->stock as $stock)
                                                @if ($stock->size)
                                                    <label style="font-size: 1.8rem; font-weight: 200;" class="size_label" data-filter="{{ $stock->color->id }}">
                                                        <input type="radio" class="size-element" name="size"
                                                            data-type="ps-product__single"
                                                            data-id="{{ $stock->size->id }}"
                                                            data-product="{{ $product->id }}"
                                                            data-discount="{{ $product->discount }}"
                                                            data-color="{{ $stock->color->id }}"
                                                            data-name="{{ $stock->size->name }}"
                                                            {{ !$selected_size ? 'checked' : ''}}
                                                            value={{ $stock->size->id }} />
                                                        {{ $stock->size->name }}
                                                    </label>
                                                    @php
                                                        $selected_size = $stock->size->id;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        </figure>
                                    @else
                                        <h4>Məhsul anbarda mövcud deyil</h4>
                                    @endif
                                    <figure>
                                        <a class="ps-btn ps-btn--black add-to-cart mt-3"
                                            data-piece="1"
                                            data-amount="{{ $product->default_price->sale_price }}"
                                            data-discount="{{ $product->discount }}"
                                            data-stock="{{ count($product->stock) }}"
                                            data-id="{{ $product->id }}"
                                            data-type="ps-product__single"
                                            href="javascript:void(0)">Səbətə əlavə et</a>
                                        <div class="ps-product__actions">
                                            <a href="javascript:void(0)" class="add-wish-list" title="Məhsullarım"
                                                data-id="{{ $product->id }}"><i class="icon-heart"></i></a>
                                            <a href="javascript:void(0)" class="add-to-compare" title="Müqayisə et"
                                                data-id="{{ $product->id }}"><i class="fa fa-retweet"></i></a>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product__content ps-tab-root pt-0">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#tab-1">Təsvir</a></li>
                                <li><a href="#tab-2">Rəylər <span></span></a></li>
                            </ul>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1">
                                    {!! $product->product_description !!}
                                </div>
                                <div class="ps-tab " id="tab-2">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="product-reviews">
                                                {{-- <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0PM</a></div> --}}
                                                <div class="reviews-div">

                                                </div>
                                                <ul class="reviews-pages"></ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <form action="{{ route('product.review') }}" class="ps-form--review"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <h4>ŞƏRHİNİZİ YAZIN</h4>
                                                <p><sup>*</sup>Elektron poçtunuz dərc olunmayacaq. Zəruri sahələr qeyd
                                                    olunur</p>
                                                <p style="color: rgba(173,51,53,255)">
                                                    {{ $product->bonus_comment ? '*Məhsul üçün bildirilən hər şərh üçün ' . $product->bonus_comment . ' bonus hesabınıza əlavə olunacaq' : '' }}
                                                </p>
                                                <div class="form-group form-group__rating">
                                                    <label>Bu məhsulun reytinqi</label>
                                                    <select class="ps-rating" name="rating" data-read-only="false">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" required rows="6" name="review"
                                                        placeholder="Rəyinizi buraya yazın"></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                        <div class="form-group">
                                                            @auth
                                                                <input class="form-control" required name="name"
                                                                    value="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}"
                                                                    type="text" placeholder="Adınız" />
                                                            @endauth
                                                            @guest
                                                                <input class="form-control" required name="name" type="text"
                                                                    placeholder="Adınız" />
                                                            @endguest
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                        <div class="form-group">
                                                            @auth
                                                                <input class="form-control" required name="email"
                                                                    value="{{ auth()->user()->email }}" type="email"
                                                                    placeholder="Email Address" />
                                                            @endauth
                                                            @guest
                                                                <input class="form-control" required name="email" type="email"
                                                                    placeholder="Email Address" />
                                                            @endguest
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group submit">
                                                    <button type="submit" class="ps-btn">Rəy Göndərin</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-page__right">
                    <aside class="widget widget_product widget_features">
                        {{-- <p><i class="icon-network"></i> Shipping worldwide</p> --}}
                        <p><i class="icon-3d-rotate"></i> Uyğun olduğu təqdirdə 14 günlük pulsuz geri dönüş, bu qədər
                            asandır</p>
                        {{-- <p><i class="icon-receipt"></i> Supplier give bills for this product.</p> --}}
                        <p><i class="icon-credit-card"></i> Onlayn və ya mal alarkən ödəniş edin</p>
                    </aside>
                </div>
            </div>

            <div class="ps-section--default">
                <div class="ps-section__header">
                    <h3>Əlaqədar məhsullar</h3>
                </div>
                <div class="ps-section__content products_rp">
                    <div class="row justify-content-center">
                        <img src="{{ asset('assets/img/reload.gif') }}" width="250" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function owlCarouselConfig() {
            var target = $('.owl-slider');
            if (target.length > 0) {
                target.each(function() {
                    var el = $(this),
                        dataAuto = el.data('owl-auto'),
                        dataLoop = el.data('owl-loop'),
                        dataSpeed = el.data('owl-speed'),
                        dataGap = el.data('owl-gap'),
                        dataNav = el.data('owl-nav'),
                        dataDots = el.data('owl-dots'),
                        dataAnimateIn = el.data('owl-animate-in') ? el.data('owl-animate-in') : '',
                        dataAnimateOut = el.data('owl-animate-out') ? el.data('owl-animate-out') : '',
                        dataDefaultItem = el.data('owl-item'),
                        dataItemXS = el.data('owl-item-xs'),
                        dataItemSM = el.data('owl-item-sm'),
                        dataItemMD = el.data('owl-item-md'),
                        dataItemLG = el.data('owl-item-lg'),
                        dataItemXL = el.data('owl-item-xl'),
                        dataNavLeft = el.data('owl-nav-left') ? el.data('owl-nav-left') :
                        "<i class='icon-chevron-left'></i>",
                        dataNavRight = el.data('owl-nav-right') ? el.data('owl-nav-right') :
                        "<i class='icon-chevron-right'></i>",
                        duration = el.data('owl-duration'),
                        datamouseDrag = el.data('owl-mousedrag') == 'on' ? true : false;
                    if (
                        target.children('div, span, a, img, h1, h2, h3, h4, h5, h5').length >= 2
                    ) {
                        el.addClass('owl-carousel').owlCarousel({
                            animateIn: dataAnimateIn,
                            animateOut: dataAnimateOut,
                            margin: dataGap,
                            autoplay: dataAuto,
                            autoplayTimeout: dataSpeed,
                            autoplayHoverPause: true,
                            loop: dataLoop,
                            nav: dataNav,
                            mouseDrag: datamouseDrag,
                            touchDrag: true,
                            autoplaySpeed: duration,
                            navSpeed: duration,
                            dotsSpeed: duration,
                            dragEndSpeed: duration,
                            navText: [dataNavLeft, dataNavRight],
                            dots: dataDots,
                            items: dataDefaultItem,
                            responsive: {
                                0: {
                                    items: dataItemXS,
                                },
                                480: {
                                    items: dataItemSM,
                                },
                                768: {
                                    items: dataItemMD,
                                },
                                992: {
                                    items: dataItemLG,
                                },
                                1200: {
                                    items: dataItemXL,
                                },
                                1680: {
                                    items: dataDefaultItem,
                                },
                            },
                        });
                    }
                });
            }
        }
        let price_list = [];
        let color = [];
        let product_amount = [];
        let product_amount_discount = [];
        let size = [];


        $(function() {

            $(document).on('change', '.color-element', function () {

                let target = $(this)
                let discount = $(target).data('discount');
                let type = $(target).data('type')
                let sizes_exist = $("." + type + " .size-element[data-color='" + $(target).data('id') +"']").length;
                let product = $(target).data('product')

                if (!product_amount_discount[type]) {
                    product_amount_discount[type] = $("." + type + " .product_amount_discount").html()
                }
                if (!product_amount[type]) {
                    product_amount[type] = $("." + type + " .product_amount").html()
                    product_amount['id'] = $("." + type + " .product_amount").data('price-id')
                }

                $("." + type + " .size_label" ).each(function() {
                    let filter = $( this ).data("filter");
                    if(filter != $(target).data('id')){
                        $( this ).css('display', 'none')
                    }
                    else{
                        $( this ).css('display', 'inline-block')
                    }
                });

                $('.ps-product__gallery').slick('slickUnfilter');
                $('.ps-product__variants ').slick('slickUnfilter');
                let filterClass = '.image-color-' + $(target).data('id')
                if($('.ps-product__gallery ' + filterClass).length > 0){
                    $('.ps-product__gallery').slick('slickFilter', filterClass);
                    $('.ps-product__variants ').slick('slickFilter', filterClass);
                }
                
                
                $("." + type + " .size-element:checked").prop('checked', false);


                color[type] = $(target).data('id')
                let price = []
                if (size[type]) {
                    price = price_list[type].filter(item => item.color_id == color[type]  && item.size_id == size[type] )
                    if(price.length == 0){
                        price = price_list[type].filter(item => item.color_id == color[type]  && item.size_id == null)
                    }
                } else {
                    price = price_list[type].filter(item => item.color_id == color[type]  && item.size_id == null)
                }
                if (price.length == 0) {

                    $("." + type + " .product_amount").html(product_amount[type])
                    $("." + type + " .product_amount").attr('data-price-id', product_amount['id'])
                    if (discount) {
                        let amount = parseFloat(product_amount[type]) - (parseFloat(product_amount[type]) * parseFloat(discount) / 100)
                        $("." + type + " .product_amount_discount").html(amount.toFixed(2))
                    }

                } else {
                    $("." + type + " .product_amount").html(price[0].sale_price)
                        $("." + type + " .product_amount").attr('data-price-id', price[0].id)
                    if (discount) {
                        let amount = parseFloat(price[0].sale_price) - (parseFloat(price[0].sale_price) * parseFloat(discount) / 100)
                        $("." + type + " .product_amount_discount").html(amount.toFixed(2))
                    }
                }
            })
            $(document).on('change', '.size-element', function (){
                let target = $(this)
                let discount = $(target).data('discount');
                let type = $(target).data('type')
                let colors_exist = $("." + type + " .color-element").length;

                if (!product_amount_discount[type]) {
                    product_amount_discount[type] = $("." + type + " .product_amount_discount").html()
                }
                if (!product_amount[type]) {
                    product_amount[type] = $("." + type + " .product_amount").html()
                    product_amount['id'] = $("." + type + " .product_amount").data('price-id')
                }

                if (colors_exist > 0) {
                    if (!color[type] ) {
                        Swal.fire({
                            icon: 'warning',
                            title: "İlk öncə rəng seçin",
                            showConfirmButton: false,
                            timer: 2000
                        })
                        $(target).prop('checked', false);
                        return false;
                    }
                    size[type]  = $(target).data('id')
                    let price = price_list[type].filter(item => item.size_id == size[type]  && item.color_id == color[type] )


                    if (price.length == 0) {
                        size[type]  = undefined
                        // if(!color){
                        //     $(".product_amount").html(product_amount)
                        //     if (product_amount_discount) {
                        //         $(".product_amount_discount").html(product_amount_discount)
                        //     }
                        // }

                    } else {
                        $("." + type + " .product_amount").html(price[0].sale_price)
                        $("." + type + " .product_amount").attr('data-price-id', price[0].id)
                        if (discount) {
                            let amount = parseFloat(price[0].sale_price) - (parseFloat(price[0].sale_price) * parseFloat(discount) / 100)
                            $("." + type + " .product_amount_discount").html(amount.toFixed(2))
                        }
                    }
                } else {
                    size[type]  = $(target).data('id')
                    let price = price_list[type].filter(item => item.size_id == size[type]  && item.color_id == null)


                    if (price.length == 0) {
                        $("." + type + " .product_amount").html(product_amount[type])
                        $("." + type + " .product_amount").attr('data-price-id', product_amount['id'])
                        
                        if (discount) {
                            let amount = parseFloat(product_amount[type]) - (parseFloat(product_amount[type]) * parseFloat(discount) / 100)
                            $("." + type + " .product_amount_discount").html(amount.toFixed(2))
                        }


                    } else {
                        $("." + type + " .product_amount").html(price[0].sale_price)
                        $("." + type + " .product_amount").attr('data-price-id', price[0].id)
                        if (discount) {
                            let amount = parseFloat(price[0].sale_price) - (parseFloat(price[0].sale_price) * parseFloat(discount) / 100)
                            $("." + type + " .product_amount_discount").html(amount.toFixed(2))
                        }

                    }
                }
            })
            priceList("{{ $product->id }}", "ps-product__single");

            function priceList(product_id, type) {
                $.ajax({
                    url: '{{ route('product.price_list') }}',
                    method: 'GET',
                    data: {
                        product_id: product_id
                    },
                    success: function(data) {
                        price_list[type] = data.priceList
                    }
                });
            };
            $(document).on('click', '.quick-view', function() {
                let id = $(this).attr('data-id');

                $.ajax({
                    url: '{{ route('get_product') }}',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        priceList(id, "ps-product--quickview");
                        $("#product-quickview .modal-content").html(data);
                    }
                })
            })
            $(document).on('click', '.add-to-cart', function() {
                let type = $(this).data('type')
                let discount = $(this).data('discount')

                let id = $(this).attr('data-id');


                let amount = $(this).parents(".ps-product__amount_parent").find('.product_amount').html()
                let priceId = $(this).parents(".ps-product__amount_parent").find('.product_amount').attr('data-price-id')
                if(discount){
                    amount = $(this).parents(".ps-product__amount_parent").find('.product_amount_discount').html()
                }

                let piece = 1;
                let selected_size;
                let selected_color;
                let color_exist = 0;
                let size_exist = 0;

                if(type){
                    piece = parseInt($('.' + type + ' .ProductQuantity-Input-' + id).val())
                    if(!piece){
                        piece = 1;
                    }
                    selected_size = $('.' + type + ' .sizes').find("input:checked").val()
                    selected_color = $('.' + type + ' .colors').find("input:checked").val()
                    color_exist = $("." + type + " .color-element").length;
                    size_exist = $("." + type + " .size-element").length;
                    if (color_exist > 0) {
                        if (!selected_color) {
                            Swal.fire({
                                icon: 'warning',
                                title:'Rəng seçilməyib',
                                showConfirmButton: false,
                                timer: 2000
                            })
                            return false;
                        }
                    }
                    if (size_exist > 0) {
                        if (!selected_size) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ölçü seçilməyib',
                                showConfirmButton: false,
                                timer: 2000
                            })
                            return false;
                        }
                    }
                }
                else{
                    piece = parseInt($(' .ProductQuantity-Input-' + id).val())
                    selected_color = $(this).parents(".ps-product__amount_parent").find('.product_amount').data('color')
                    selected_size = $(this).parents(".ps-product__amount_parent").find('.product_amount').data('size')
                }


                $.ajax({
                        url: '{{ route('cart.add_to_cart') }}',
                        method: 'GET',
                        data: {
                            id: id,
                            piece: piece,
                            size: selected_size,
                            color: selected_color,
                            priceId,
                            amount,
                            discount: discount ? discount : 0
                        },
                        // dataType: 'JSON',
                        success: function(data) {
                            if (data.status == 'success') {
                                $('.ps-cart__content').html('');
                                $('.ps-cart__content').html(data.output);
                                $('.show_cartCount').html(data.cart_count);

                                Swal.fire({
                                    icon: 'success',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                            }
                        }
                    });
            });



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
                        owlCarouselConfig();
                    }
                });


            };


            reviews(1)

            function reviews(page) {
                let reviewsPages = $(".reviews-pages")
                $.ajax({
                    url: "{{ route('product.reviews') }}",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        page,
                        product_id: "{{ $product->id }}"
                    },
                    success: function(data) {
                        $(".reviews-div").html('')
                        $(reviewsPages).html("")
                        $(".reviews-div").append(data.reviews)
                        $('.ps-tab-list').find("a[href='#tab-2']").find('span').html(`(${data.count})`)
                        if (data.count > 3) {
                            for (let i = 1; i <= Math.ceil(data.count / 3); i++) {

                                if (i == page) {
                                    $(reviewsPages).append(
                                        `<li class="active pages" data-index="${i}">${i}</li>`)
                                } else {
                                    $(reviewsPages).append(
                                        `<li class="pages" data-index="${i}">${i}</li>`)
                                }

                            }
                        }
                    }

                })
            }

            $(".reviews-pages").on('click', '.pages', function() {
                let index = $(this).attr('data-index');
                $(".reviews-pages").find(".active").removeClass('active')
                $(this).addClass("active")
                reviews(index)
            })


            $(document).on('click', '.ProductQuantity-Minus', function() {
                let id = $(this).data('id')
                var piece = parseInt($('.ProductQuantity-Input-' + id).val())
                if (piece == 1) {
                    return false;
                }
                $('.ProductQuantity-Input-' + id).val(--piece);
            })
            $(document).on('click', '.ProductQuantity-Plus', function() {
                let id = $(this).data('id')
                var piece = parseInt($('.ProductQuantity-Input-' + id).val())
                $('.ProductQuantity-Input-' + id).val(++piece);
            })

            $(document).on('mousemove', '.product-rating', function(event) {
                let target = $(this)
                if (event.target.tagName == "I") {
                    var index = $(event.target).data('index');

                    var product_id = $(event.target).data('product_id');
                    remove_star(target, product_id);
                    for (var count = 1; count <= index; count++) {
                        $(target).find('#' + product_id + '-' + count).attr('class', 'rating fa fa-star');
                    }
                }


            })
            $(document).on('mouseout', '.product-rating', function() {
                let target = $(this)
                if (event.target.tagName == "I") {
                    var index = $(event.target).data('index');
                    var product_id = $(event.target).data('product_id');
                    var rating = $(event.target).data('rating');
                    remove_star(target, product_id);
                    for (var count = 1; count <= rating; count++) {
                        $(target).find('#' + product_id + '-' + count).attr('class', 'rating fa fa-star');
                    }
                }

            })

            function remove_star(target, product_id) {

                for (var count = 1; count <= 5; count++) {
                    $(target).find('#' + product_id + '-' + count).attr('class', 'rating fa fa-star-o empty');
                }
            }


            $(document).on('click', '.rating', function() {
                var index = $(this).data('index');
                var product_id = $(this).data('product_id');
                $.ajax({
                    url: '{{ route('homepage.insert_ratings') }}',
                    method: 'GET',
                    data: {
                        index: index,
                        product_id: product_id
                    },
                    success: function(data) {
                        if (data == 'done') {
                            products('products_dotd');
                            products('products_l');
                            products('products_pfy');
                            alert('{{ __('content.Your rate: ') }}' + index);
                        } else {
                            alert('{{ __('content.There is some problem in System') }}');
                        }
                    }
                })
            })

            $(document).on('click', '.add-to-compare', function() {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: "{{ route('compare.add_to_compare') }}",
                    type: "GET",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 2000
                            })

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 3000
                            })
                        }
                    }
                })
            })
            $(document).on('click', '.add-wish-list', function() {
                var id = $(this).attr("data-id");
                $.ajax({
                    url: '{{ route('add_wish_list') }}',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 2000
                            })

                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 3000
                            })
                        }
                    }
                });
            })

        });
    </script>
@endsection
