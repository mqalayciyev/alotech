@extends('user.layouts.app')
@section('title', $category->category_name)

@section('content')

    <!-- BREADCRUMB -->
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                <li class="active">{{ $category->category_name }}</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->
    <div class="ps-page--shop pt-3 ">


                <div class="ps-container">
                    <div class="ps-layout--shop">
                        <div class="ps-layout__left">
                            <aside class="widget widget_shop">
                                <h4 class="widget-title">{{ $category->category_name }}</h4>
                                <figure class="ps-custom-scrollbar filter-list" data-height="250">
                                    @foreach($sub_categories as $sub_category)
                                        @for($i=0; $i< count($sub_categories_count); $i++)
                                                @if($sub_category->id === $sub_categories_count[$i]['id'])
                                                <p><a href="{{ $sub_category->slug }}">{{ $sub_category->category_name }} ( {{ $sub_categories_count[$i]['count'] }} )</a></p>
                                                @endif
                                        @endfor
                                    @endforeach
                                </figure>


                                <figure class="ps-custom-scrollbar filter-list" data-height="250">
                                    <h4 class="widget-title">MARKA</h4>
                                    @foreach($brands as $brand)
                                        @for($i=0; $i< count($brands_count); $i++)
                                            @if($brand->id === $brands_count[$i]['id'])
                                                <p><a class="filter_brand" href="javascript:void(0)" id="{{ $brand->id }}">{{ $brand->name }} ( {{ $brands_count[$i]['count'] }} )</a></p>
                                            @endif
                                        @endfor

                                    @endforeach
                                </figure>
                                @if (count($colors) > 0)
                                        <figure id="by-color">
                                            <h4 class="widget-title">@lang('content.Filter By Color')</h4>
                                            @foreach ($colors as $color)
                                                <div class="ps-checkbox ps-checkbox--color ps-checkbox--inline">
                                                    <label class="colors">
                                                        <input type="radio" name="color"
                                                            class="color_filter"
                                                            data-id="{{ $color->id }}"
                                                            value={{ $color->id }} />
                                                        <p><span class="filter_color" data-id="{{ $color->id }}"
                                                                data-color="{{ $color->name }}"
                                                                style="background-color:  {{ $color->name }};"></span></p>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </figure>

                                    @endif
                                    @if (count($sizes) > 0)
                                        <figure class="sizes">
                                            <h4 class="widget-title">Ölçü</h4>
                                            @foreach ($sizes as $size)
                                                <label style="font-size: 1.8rem; font-weight: 200;">
                                                    <input type="radio" name="size"
                                                        class="size_filter"
                                                        data-id="{{ $size->id }}"
                                                        value={{ $size->id }} />
                                                    {{ $size->name }}
                                                </label>
                                            @endforeach
                                        </figure>
                                    @endif
                                <figure class="ps-custom-scrollbar filter-list" data-height="250">
                                    <h4 class="widget-title pb-4">QİYMƏT ARALIĞI</h4>
                                    <div id="price-slider" ></div>
                                </figure>
                                <figure>
                                    <a href="{{ route('category', $slug_category_name) }}" class="ps-btn ps-btn--black text-white">@lang('content.Clear All')</a>
                                </figure>
                            </aside>
                        </div>
                        <div class="ps-layout__right">
                            <div class="ps-shopping ps-tab-root">
                                <div class="ps-shopping__header">
                                    <div class="ps-shopping__actions justify-content-between w-100">
                                        <div class="sort-filter" role="group">
                                            <select class="ps-select">
                                                <option value="created_at">@lang('content.New')</option>
                                                <option value="sale_price">@lang('content.Price')</option>
                                            </select>
                                            <a href="javascript:void(0);" style="width: 18%; margin: 0px"
                                                class=" ps-btn-sm sort_btn" id="desc">
                                                <i class="fa fa-arrow-down"></i>
                                            </a>
                                        </div>
                                        <div class="d-xl-none" role="group">
                                            <a class="ps-btn-sm filter-show"><i class="fa fa-filter"></i> Filtr</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-tabs">
                                    <div class="ps-tab active products" id="tab-1">

                                    </div>
                                </div>

                            </div>
                        </div>
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

        let filter_data = [];

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


            $(document).on('click', '.sort_btn', function() {
                var category_name = '{{ $slug_category_name }}';
                var sorting_name = $(".ps-select").val();
                var order = $(this).attr('id');
                var arrow = '';
                if (order == 'desc') {
                    arrow = '<i class="fa fa-arrow-up"></i>';
                    $('.sort_btn').attr('id', 'asc');
                    order = $(this).attr('id');
                } else {
                    arrow = '<i class="fa fa-arrow-down"></i>';
                    $('.sort_btn').attr('id', 'desc');
                    order = $(this).attr('id');
                }
                filter_data[0] = 'category_sorting'
                filter_data[1] = sorting_name
                filter_data[2] = order
                products(1, '{{ $slug_category_name }}', filter_data);
                $('.sort_btn').html(arrow);
            });

            $(document).on('change', '.ps-select', function() {
                var category_name = '{{ $slug_category_name }}';
                var sorting_name = $(this).val();
                var order = $('.sort_btn').attr('id');
                var arrow = '';
                if (order == 'desc') {
                    arrow = '<i class="fa fa-arrow-up"></i>';
                    $('.sort_btn').attr('id', 'asc');
                    order = $('.sort_btn').attr('id');
                } else {
                    arrow = '<i class="fa fa-arrow-down"></i>';
                    $('.sort_btn').attr('id', 'desc');
                    order = $('.sort_btn').attr('id');
                }
                filter_data[0] = 'category_sorting'
                filter_data[1] = sorting_name
                filter_data[2] = order
                products(1, '{{ $slug_category_name }}', filter_data);
                $('.sort_btn').html(arrow);
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

            $(document).on('click', '.pagination-page',  function(){
                let page = $(this).data('page')
                if(page != '.'){
                    products(page, '{{ $slug_category_name }}', filter_data);
                }
            })



            products(1, '{{ $slug_category_name }}', filter_data);

            function products(page, category_name, filter_data) {
                $.ajax({
                    url: '{{ route('category.products') }}',
                    method: 'GET',
                    data: {
                        category_name: category_name,
                        page: page,
                        filter_data: filter_data
                    },
                    success: function(data) {
                        // console.log(data)
                        $('.products').html(data).fadeIn('slow');
                        owlCarouselConfig()
                    }
                });
            };

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

            $(document).on('mouseenter', '.rating', function() {
                var index = $(this).data('index');
                var product_id = $(this).data('product_id');
                remove_star(product_id);
                for (var count = 1; count <= index; count++) {
                    $('#' + product_id + '-' + count).attr('class', 'rating fa fa-star');
                }
            })

            function remove_star(product_id) {
                for (var count = 1; count <= 5; count++) {
                    $('#' + product_id + '-' + count).attr('class', 'rating fa fa-star-o empty');
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

            $(document).on('mouseleave', '.rating', function() {
                var index = $(this).data('index');
                var product_id = $(this).data('product_id');
                var rating = $(this).data('rating');
                remove_star(product_id);
                for (var count = 1; count <= rating; count++) {
                    $('#' + product_id + '-' + count).attr('class', 'rating fa fa-star');
                }
            })

            $(document).on('click', '.filter_brand', function() {
                var id = $(this).attr('id');
                var category_name = '{{ $slug_category_name }}';
                filter_data[0] = 'brand_filter'
                filter_data[1] = id
                products(1, '{{ $slug_category_name }}', filter_data);
            });
            $(document).on('change', '.size_filter', function() {
                var id = $(this).val();
                var category_name = '{{ $slug_category_name }}';
                filter_data[0] = 'size_filter'
                filter_data[1] = id
                products(1, '{{ $slug_category_name }}', filter_data);
            });
            $(document).on('change', '.color_filter', function() {
                var id = $(this).val();
                var category_name = '{{ $slug_category_name }}';
                filter_data[0] = 'color_filter'
                filter_data[1] = id
                products(1, '{{ $slug_category_name }}', filter_data);
            });

            $(document).on('click', function(event) {
                if (window.innerWidth < 992) {
                    if (!$(event.target).hasClass('open-filters')) {
                        if ($("#aside.filter-area").css("display") == 'block') {
                            $("#aside.filter-area").css("display", 'none')
                            $("body").css('overflow', 'auto')
                        }
                    }

                }

            })


            // PRICE SLIDER
            var slider = document.getElementById('price-slider');
            if (slider) {
                noUiSlider.create(slider, {
                    start: [0, 1000],
                    connect: true,
                    tooltips: [true, true],
                    format: {
                        to: function(value) {
                            return value.toFixed(2);
                        },
                        from: function(value) {
                            return value
                        },
                    },
                    range: {
                        'min': 0,
                        'max': 5000
                    }
                });


                document.getElementById('price-slider').addEventListener('click', function() {
                    var values = slider.noUiSlider.get();
                    var category_name = '{{ $slug_category_name }}';
                    filter_data[0] = 'price_filter'
                    filter_data[1] = values
                    products(1, '{{ $slug_category_name }}', filter_data);
                });

            }


        });
    </script>
@endsection
