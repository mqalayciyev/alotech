@extends('user.layouts.app')
@section('title', __('footer.Compare'))
@section('head')
@endsection
@section('content')
        <div class="ps-breadcrumb">
            <div class="ps-container">
                <ul class="breadcrumb">
                    <li><a href="/">@lang('content.Home')</a></li>
                <li class="active">@lang('footer.Compare')</li>
                </ul>
            </div>
        </div>
        <div class="ps-page--shop pt-3">
            <div class="ps-container">
                <div class="ps-layout--shop">
                    <div class="ps-shopping ps-tab-root products">
                        
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


        products();

        function products() {
            $('.products').html("<h3 class='text-center'>@lang('content.There is no any product')</h3>");
            $.ajax({
                url: '{{ route("compare.view_compare") }}',
                method: 'GET',
                success: function (data) {
                    $('.products').html(data);
                    owlCarouselConfig()
                }
            });
        };
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

        $(document).on('click', '.add-to-compare', function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('compare.remove_from_compare') }}",
                type: "GET",
                data: {id: id},
                success: function(data){
                    // console.log(data)
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
                    products();
                    $(".modal").hide();
                }
            })
        })
            $(document).on('click', '.add-wish-list', function(){
                var id = $(this).attr("data-id");
                $.ajax({
                    url: '{{ route("add_wish_list") }}',
                    method: 'GET',
                    data: {id: id},
                    success: function (data) {
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
        });
    </script>
@endsection
