@extends('user.layouts.app')

@section('content')
    
<div id="homepage-5">
    @include('common.alert')
    <div class="ps-home-banner pb-20">
        <div class="container">
            <div class="ps-section__left">
                <ul class="menu--dropdown">
                    @foreach ($global_categories_sidemenu as $category)
                                @if ($category->top_id == null)
                                    <li class="menu-item-has-children has-mega-menu">
                                        <a style="cursor: pointer">
                                            <img class="icon-filter" style='width: 20px;' src='{{ $category->image->image_name ? asset('assets/img/category/'. $category->image->image_name) : asset('assets/img/category/product-category-icon.png') }}' alt='{{ $category->image->image_name }}'>
                                            {{ $category->category_name }}
                                        </a>
                                        <div class="mega-menu">
                                            <div class="mega-menu__column">
                                                <a
                                                    href="{{ route('category', $category->slug) }}"><h4>{{ $category->category_name }}<span class="sub-toggle"></span></h4></a>
                                                <ul class="mega-menu__list">
                                                    @foreach ($all_global_categories as $alt_category)
                                                        @if ($alt_category->top_id == $category->id)
                                                            <li>
                                                                <a href="{{ route('category', $alt_category->slug) }}">{{ $alt_category->category_name }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                </ul>
            </div>
            <div class="ps-section__center">
                <div class="ps-carousel--dots owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                    @foreach ($products_slider as $array => $product)
                        <div class="ps-banner--furniture">
                            <img src="{{ asset('assets/img/sliders/' . $product->slider_image) }}"
                                alt="{{ $product->slider_image }}">
                        </div>
                    @endforeach
                    {{-- <img src="http://via.placeholder.com/930x390" alt=""> --}}
                </div>
                <div class="ps-section__right">
                    @foreach ($banner_top as $banner)
                        <a href="{{ $banner->banner_slug }}">
                            {!! $banner->banner_image ? '<img src="' . asset('assets/img/banners/' . $banner->banner_image) . '" alt="' . $banner->banner_image . '">' : null !!}
                        </a>
                    @endforeach
                    {{-- <img src="http://via.placeholder.com/310x188" alt=""> --}}
                </div>
            </div>

        </div>
    </div>


    <div class="ps-deal-of-day py-20">
        <div class="container">
            <div class="ps-section__header">
                <div class="col-10 p-0">
                    <div class="ps-block--countdown-deal">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="ps-block__left">
                                    <h3>Endirimli məhsullar</h3>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="ps-block__right" style="width: 200px">
                                    <figure>
                                        <figcaption>Qalan:</figcaption>
                                        <ul class="ps-countdown" data-time="{{ $discount ? $discount->discount_date : '' }}">
                                            <li><span class="days"></span></li>
                                            <li><span class="hours"></span></li>
                                            <li><span class="minutes"></span></li>
                                            <li><span class="seconds"></span></li>
                                        </ul>
                                    </figure>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-2 p-0 text-right">
                    <a href="{{ route('deal_of_day') }}">Hamsına bax</a>
                </div>

            </div>
            <div class="ps-section__content products_deal_of_day">
                <div class="row justify-content-center">
                    <img src="{{ asset('assets/img/reload.gif') }}" width="250"/>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-deal-of-day py-20">
        <div class="container">
            <div class="ps-section__header">
                <div class="ps-block--countdown-deal">
                    <div class="ps-block__left">
                        <h3>Ən çox satılanlar</h3>
                    </div>
                </div>
                <a href="{{ route('best_selling') }}">Hamsına bax</a>
            </div>
            <div class="ps-section__content products_best_selling">
                <div class="row justify-content-center">
                    <img src="{{ asset('assets/img/reload.gif') }}" width="250"/>
                </div>
            </div>
        </div>
    </div>

    <div class="ps-product-box">
        <div class="container">
            <div class="ps-home-promotions">
                @if ($banner_center)
                    <a href="{{ $banner_center->banner_slug }}">
                        {!! $banner_center->banner_image ? '<img src="' . asset('assets/img/banners/' . $banner_center->banner_image) . '" alt="' . $banner_center->banner_image . '">' : null !!}
                    </a>
                @endif
                {{-- <img src="http://via.placeholder.com/1200x250" alt=""> --}}
            </div>
        </div>
    </div>

    <div class="ps-deal-of-day py-20">
        <div class="container">
            <div class="ps-section__header">
                <div class="ps-block--countdown-deal">
                    <div class="ps-block__left">
                        <h3>Son baxılanlar</h3>
                    </div>
                </div>
                <a href="{{ route('last_view') }}">Hamsına bax</a>
            </div>
            <div class="ps-section__content products_last_view">
                <div class="row justify-content-center">
                    <img src="{{ asset('assets/img/reload.gif') }}" width="250"/>
                </div>
            </div>
        </div>
    </div>

    <div class="ps-product-box">
        <div class="container">
            <div class="ps-home-promotions">
                <div class="row">
                    @foreach ($banner_bottom as $banner)
                        <div class="col-sm-4">
                            <a href="{{ $banner->banner_slug }}">
                                {!! $banner->banner_image ? '<img src="' . asset('assets/img/banners/' . $banner->banner_image) . '" alt="' . $banner->banner_image . '">' : null !!}
                            </a>
                        </div>
                    @endforeach
                    {{-- <img src="http://via.placeholder.com/380x250" alt=""> --}}
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
                        dataAnimateIn = el.data('owl-animate-in') ?
                        el.data('owl-animate-in') :
                        '',
                        dataAnimateOut = el.data('owl-animate-out') ?
                        el.data('owl-animate-out') :
                        '',
                        dataDefaultItem = el.data('owl-item'),
                        dataItemXS = el.data('owl-item-xs'),
                        dataItemSM = el.data('owl-item-sm'),
                        dataItemMD = el.data('owl-item-md'),
                        dataItemLG = el.data('owl-item-lg'),
                        dataItemXL = el.data('owl-item-xl'),
                        dataNavLeft = el.data('owl-nav-left') ?
                        el.data('owl-nav-left') :
                        "<i class='icon-chevron-left'></i>",
                        dataNavRight = el.data('owl-nav-right') ?
                        el.data('owl-nav-right') :
                        "<i class='icon-chevron-right'></i>",
                        duration = el.data('owl-duration'),
                        datamouseDrag =
                        el.data('owl-mousedrag') == 'on' ? true : false;
                    if (
                        target.children('div, span, a, img, h1, h2, h3, h4, h5, h5')
                        .length >= 2
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
            // trigger('next.owl.carousel');

        }

        let price_list = [];
        let color = [];
        let product_amount = [];
        let product_amount_discount = [];
        let size = [];
        // let priceId;

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
                    // priceId = product_amount['id'];
                    if (discount) {
                        let amount = parseFloat(product_amount[type]) - (parseFloat(product_amount[type]) * parseFloat(discount) / 100)
                        $("." + type + " .product_amount_discount").html(amount.toFixed(2))
                    }

                } else {
                    $("." + type + " .product_amount").html(price[0].sale_price)
                    $("." + type + " .product_amount").attr('data-price-id', price[0].id)
                    // priceId = price[0].id;
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
                        // priceId = price[0].id;
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
                        // priceId = product_amount['id'];
                        
                        if (discount) {
                            let amount = parseFloat(product_amount[type]) - (parseFloat(product_amount[type]) * parseFloat(discount) / 100)
                            $("." + type + " .product_amount_discount").html(amount.toFixed(2))
                        }


                    } else {
                        $("." + type + " .product_amount").html(price[0].sale_price)
                        $("." + type + " .product_amount").attr('data-price-id', price[0].id)
                        // priceId = price[0].id;
                        if (discount) {
                            let amount = parseFloat(price[0].sale_price) - (parseFloat(price[0].sale_price) * parseFloat(discount) / 100)
                            $("." + type + " .product_amount_discount").html(amount.toFixed(2))
                        }

                    }
                }
            })

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

            products('products_deal_of_day');
            products('products_best_selling');
            products('products_last_view');

            function products(dynamic_product) {
                $.ajax({
                    url: '{{ route('homepage.products') }}',
                    method: 'GET',
                    data: {
                        product: dynamic_product
                    },
                    success: function  (data) {
                        $('.' + dynamic_product).html(data);
                        owlCarouselConfig();
                    }
                });
            };

            $(document).on('click', '.add-wish-list', function() {
                var id = $(this).attr("data-id");
                $.ajax({
                    url: '{{ route('add_wish_list') }}',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if(data.status == 'success'){
                                Swal.fire({
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 2000
                                })

                        }
                        else{
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

            $(document).on('click', '.add-to-compare', function() {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: "{{ route('compare.add_to_compare') }}",
                    type: "GET",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if(data.status == 'success'){
                            Swal.fire({
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 2000
                                })
                        }
                        else{
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


            $(document).on('click', '.ProductQuantity-Minus',  function(){
                let id = $(this).data('id')
                var piece = parseInt($('.ProductQuantity-Input-' + id).val())
                piece -= 1
                if(piece == 0){
                    piece = 1;
                }
                $('.ProductQuantity-Input-' + id).val(piece);
            })
            $(document).on('click', '.ProductQuantity-Plus',  function(){
                let id = $(this).data('id')
                var piece = parseInt($('.ProductQuantity-Input-' + id).val())
                piece += 1
                $('.ProductQuantity-Input-' + id).val(piece);
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



        });
    </script>
@endsection
