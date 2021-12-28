@extends('user.layouts.app')
@section('title', __('content.Search result'))
@section('content')

    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">@lang('content.Home')</a></li>
                <li class="active">@lang('content.Search result') ({{ $count }})</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--shop pt-3">
        <div class="ps-container">
            <div class="ps-layout--shop">
                <div class="ps-shopping ps-tab-root">
                    <div class="ps-shopping-product">
                        <h2 class="title">@lang('content.Search result') ({{ $count }})</h2>

                            @if(count($products)>0)
                            <div class="row products">
                                @foreach($products as $array => $product)
                                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                        <div class="ps-product" style="max-height: max-content">
                                            <div class="ps-product__thumbnail">
                                                <a href="{{ route('product', $product->slug) }}" style="min-height: 200px; display: flex; justify-content: center; align-items: center;">
                                                    <div class="owl-slider-2">
                                                        @if (count($product->images) > 0)
                                                            @foreach ($product->images as $image)
                                                                <img src="{{ asset('assets/img/products/' . $image->image_name) }}" alt="{{ $product->product_name }}">
                                                            @endforeach
                                                        @else
                                                            <img src="{{ asset('assets/img/'  . old('logo', $website_info->logo)) }}" alt="{{ $product->product_name }}">
                                                        @endif
                                                    </div>
                                                </a>
                                                <ul class="ps-product__actions">
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <li><a href="javascript:void(0)" class="quick-view" data-id="{{ $product->id }}" data-placement="top" title="Bax" data-toggle="modal"
                                                        data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-id="{{ $product->id }}" class="add-wish-list" title="Add to Whishlist"><i class="icon-heart"></i></a></li>

                                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-id="{{ $product->id }}" class="add-to-compare" title="Compare"><i class="fa fa-retweet"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__container ps-product__amount_parent">
                                                <div class="ps-product__content">
                                                    <a class="ps-product__title" href="{{ route('product', $product->slug) }}">{{ $product->product_name }}</a>
                                                    <p class="ps-product__price">
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
                                                                                {!! $product->discount ? '<span class="product_amount_discount">' . number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) . '</span>₼<del><span class="product_amount" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼' !!}
                                                                                @break
                                                                            @endif
                                                                        @endforeach
                                                                    @elseif (count($filter_2))
                                                                        @foreach ($filter_2 as $item)
                                                                            @if ($item)
                                                                                {!! $product->discount ? '<span class="product_amount_discount">' . number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) . '</span>₼<del><span class="product_amount" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼' !!}
                                                                                @break
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        @foreach ($filter_3 as $item)
                                                                            @if ($item)
                                                                                {!! $product->discount ? '<span class="product_amount_discount">' . number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) . '</span>₼<del><span class="product_amount" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼' !!}
                                                                                @break
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                    </p>
                                                    <div class="col-12">
                                                        <div class="row py-3 justify-content-center">
                                                            <div class="col-12 col-md-8">
                                                                <div class="form-group--number">
                                                                    <button type="button" class="ProductQuantity-Plus up"  data-id="{{ $product->id }}">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                    <button type="button" class="ProductQuantity-Minus down "  data-id="{{ $product->id }}">
                                                                        <i class="fa fa-minus"></i>
                                                                    </button>
                                                                    <input
                                                                        {{-- id="qty" --}}
                                                                        type="text"
                                                                        data-id="{{ $product->id }}"
                                                                        min="1"
                                                                        name="piece"
                                                                        value="1"
                                                                        autocomplete="off"
                                                                        class="ProductQuantity-Input-{{ $product->id }} form-control"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="ps-btn ps-btn---primary add-to-cart btn-sm" data-piece="1" data-size="{{ count($product->sizes) > 0 ? 'true' : 'false' }}" data-color="{{ count($product->colors) > 0 ? 'true' : 'false' }}" data-id="{{ $product->id }}" >Səbətə at</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                                <div class="ps-pagination">
                                    <ul class="pagination">
                                        @php
                                            $last=(int)$pagination;
                                            $url = url()->current() . '?wanted=' . $wanted;
                                            $current=(int)$page;
                                            $first=1;
                                            $next = $current + 1;
                                            if($current+1 > $pagination){
                                                $next = $pagination;
                                            }
                                            $prev = $current - 1;
                                            if($current-1 == 0){
                                                $prev = 1;
                                            }
                                            $output="";
                                            $show_limit=3;
                                            $active = '';


                                            if($show_limit + 1 >= $last){

                                                for($i=1;$i<=$last;$i++){
                                                    $active = ($i == $current) ? 'active' : '';
                                                    $output.="<li class='pagination-page $active'><a  href='$url&page=$i' > $i </a></li>";
                                                }
                                                $output="<li class='pagination-page '><a  href='$url&page=$prev' ><i class='fa fa-chevron-left'></i></a></li>$output<li class='pagination-page '><a  href='$url&page=$next' ><i class='fa fa-chevron-right'></i></a></li>";
                                            }
                                            else{

                                                if($current-ceil($show_limit/2) <= $first){
                                                    for($i=1;$i<=$show_limit+1;$i++){
                                                        $active = ($i == $current) ? 'active' : '';
                                                        $output .= "<li class='pagination-page $active'><a  href='$url&page=$i' > $i </a></li>";
                                                    }
                                                    $output="<li class='pagination-page '><a  href='$url&page=$prev' ><i class='fa fa-chevron-left'></i></a></li>$output<li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li><li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li><li data-page='$pagination' class='pagination-page'><a  href='$url&page=$pagination' > $pagination </a></li><li class='pagination-page '><a  href='$url&page=$next' ><i class='fa fa-chevron-right'></i></a></li>";
                                                }
                                                else if($current+ceil($show_limit/2)>=$last){
                                                    for($i=1; $i<$show_limit+1; $i++){
                                                        $active = (intval($last-$i) == $current) ? 'active' : '';
                                                        $output="<li class='pagination-page $active'><a  href='$url&page=" . intval($last-$i) ."' > " . intval($last-$i) ." </a></li>". $output;
                                                    }
                                                    $active = ($last == $current) ? 'active' : '';
                                                    $output="<li class='pagination-page '><a  href='$url&page=$prev' ><i class='fa fa-chevron-left'></i></a></li><li data-page='1' class='pagination-page '><a  href='$url&page=1' > 1 </a></li><li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li><li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li>".$output. "<li data-page='$pagination' class='pagination-page $active'><a  href='$url&page=$pagination' > $pagination </a></li><li class='pagination-page '><a  href='$url&page=$next' ><i class='fa fa-chevron-right'></i></a></li>";
                                                }
                                                else{
                                                    $output="<li class='pagination-page '><a  href='$url&page=$prev' ><i class='fa fa-chevron-left'></i></a></li><li data-page='1' class='pagination-page'><a  href='$url&page=1' > 1 </a></li><li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li><li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li>";
                                                    $start=$current-floor($show_limit/2);

                                                    for($i=0; $i<$show_limit; $i++){

                                                        $cursor=intval($start+$i);
                                                        if($cursor==$last){
                                                            break;
                                                        }
                                                        $active = (intval($start+$i) == $current) ? 'active' : '';
                                                        $output.="<li data-page='$cursor' class='pagination-page $active'><a  href='$url&page=$cursor' > $cursor </a></li>";
                                                    }
                                                    $output.="<li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li><li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li><li data-page='$pagination' class='pagination-page'><a  href='$url&page=$pagination' > $pagination </a></li><li class='pagination-page '><a  href='$url&page=$next' ><i class='fa fa-chevron-right'></i></a></li>";
                                                }
                                            }


                                            echo $output."\n";
                                        @endphp
                                    </ul>
                                </div>
                            @else
                                    <div class="col-12">
                                        <h3 class="alert alert-warning text-center">@lang('content.No Result')</h3>
                                    </div>
                            @endif


                    </div>
                    {{-- {{ $products->appends(['wanted'=>old('wanted')])->links() }} --}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function owlCarouselConfig() {
            var target = $('.owl-slider-2');
            if (target.length > 0) {
                target.each(function() {
                    var el = $(this);
                    if (
                        target.children('div, span, a, img, h1, h2, h3, h4, h5, h5')
                        .length >= 2
                    ) {
                        el.addClass('owl-carousel').owlCarousel({
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: false,
                            loop: true,
                            nav: false,
                            mouseDrag: true,
                            touchDrag: false,
                            autoplaySpeed: 1000,
                            navSpeed: 1000,
                            dotsSpeed: 1000,
                            dragEndSpeed: 1000,
                            dots: false,
                            items: 1,
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
         let priceId;

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


            $(document).on('click', '.ProductQuantity-Minus',  function(){
                let id = $(this).data('id')
                var piece = parseInt($('.ProductQuantity-Input-' + id).val())
                if(piece == 1){
                    return false;
                }
                $('.ProductQuantity-Input-' + id).val(--piece);
            })
            $(document).on('click', '.ProductQuantity-Plus',  function(){
                let id = $(this).data('id')
                var piece = parseInt($('.ProductQuantity-Input-' + id).val())
                $('.ProductQuantity-Input-' + id).val(++piece);
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
        });
    </script>
@endsection
