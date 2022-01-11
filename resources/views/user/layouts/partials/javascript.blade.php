<script>
    $(function() {
        let price_list = [];
        let color = [];
        let product_amount = [];
        let product_amount_discount = [];
        let size = [];
        $(document).on('change', '.color-element', function() {

            let target = $(this)
            let discount = $(target).data('discount');
            let type = $(target).data('type')
            let sizes_exist = $("." + type + " .size-element[data-color='" + $(target).data('id') +
                "']").length;
            let product = $(target).data('product')

            if (!product_amount_discount[type]) {
                product_amount_discount[type] = $("." + type + " .product_amount_discount").html()
            }
            if (!product_amount[type]) {
                product_amount[type] = $("." + type + " .product_amount").html()
                product_amount['id'] = $("." + type + " .product_amount").data('price-id')
            }

            $("." + type + " .size_label").each(function() {
                let filter = $(this).data("filter");
                if (filter != $(target).data('id')) {
                    $(this).css('display', 'none')
                } else {
                    $(this).css('display', 'inline-block')
                }
            });

            if (type == "ps-product--quickview") {
                $('.quick-view-slider').slick('slickUnfilter');
                let filterClass = '.image-color-' + $(target).data('id')
                if ($('.quick-view-slider ' + filterClass).length > 0) {
                    $('.quick-view-slider').slick('slickFilter', filterClass);
                }
            } else {
                $('.ps-product__gallery').slick('slickUnfilter');
                $('.ps-product__variants ').slick('slickUnfilter');
                let filterClass = '.image-color-' + $(target).data('id')
                if ($('.ps-product__gallery ' + filterClass).length > 0) {
                    $('.ps-product__gallery').slick('slickFilter', filterClass);
                    $('.ps-product__variants ').slick('slickFilter', filterClass);
                }
            }




            $("." + type + " .size-element:checked").prop('checked', false);


            color[type] = $(target).data('id')
            let price = []
            if (size[type]) {
                price = price_list[type].filter(item => item.color_id == color[type] && item.size_id ==
                    size[type])
                if (price.length == 0) {
                    price = price_list[type].filter(item => item.color_id == color[type] && item
                        .size_id == null)
                }
            } else {
                price = price_list[type].filter(item => item.color_id == color[type] && item.size_id ==
                    null)
            }
            if (price.length == 0) {

                $("." + type + " .product_amount").html(product_amount[type])
                $("." + type + " .product_amount").attr('data-price-id', product_amount['id'])
                if (discount) {
                    let amount = parseFloat(product_amount[type]) - (parseFloat(product_amount[type]) *
                        parseFloat(discount) / 100)
                    $("." + type + " .product_amount_discount").html(amount.toFixed(2))
                }

            } else {
                $("." + type + " .product_amount").html(price[0].sale_price)
                $("." + type + " .product_amount").attr('data-price-id', price[0].id)
                if (discount) {
                    let amount = parseFloat(price[0].sale_price) - (parseFloat(price[0].sale_price) *
                        parseFloat(discount) / 100)
                    $("." + type + " .product_amount_discount").html(amount.toFixed(2))
                }
            }
        })
        $(document).on('change', '.size-element', function() {
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
                if (!color[type]) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    toastr.warning("İlk öncə rəng seçin");
                    $(target).prop('checked', false);
                    return false;
                }
                size[type] = $(target).data('id')
                let price = price_list[type].filter(item => item.size_id == size[type] && item
                    .color_id == color[type])


                if (price.length == 0) {
                    size[type] = undefined
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
                        let amount = parseFloat(price[0].sale_price) - (parseFloat(price[0]
                            .sale_price) * parseFloat(discount) / 100)
                        $("." + type + " .product_amount_discount").html(amount.toFixed(2))
                    }
                }
            } else {
                size[type] = $(target).data('id')
                let price = price_list[type].filter(item => item.size_id == size[type] && item
                    .color_id == null)


                if (price.length == 0) {
                    $("." + type + " .product_amount").html(product_amount[type])
                    $("." + type + " .product_amount").attr('data-price-id', product_amount['id'])

                    if (discount) {
                        let amount = parseFloat(product_amount[type]) - (parseFloat(product_amount[
                            type]) * parseFloat(discount) / 100)
                        $("." + type + " .product_amount_discount").html(amount.toFixed(2))
                    }


                } else {
                    $("." + type + " .product_amount").html(price[0].sale_price)
                    $("." + type + " .product_amount").attr('data-price-id', price[0].id)
                    if (discount) {
                        let amount = parseFloat(price[0].sale_price) - (parseFloat(price[0]
                            .sale_price) * parseFloat(discount) / 100)
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

                    $('.quick-view-slider').slick({
                        dots: false,
                        slidesToShow: 1,
                        centerMode: true,
                        infinite: true,
                        speed: 500,
                        fade: true,
                        cssEase: 'linear',
                        prevArrow: "<a href='#'><i class='fa fa-angle-left'></i></a>",
                        nextArrow: "<a href='#'><i class='fa fa-angle-right'></i></a>",
                    });
                }
            })
        })
        $(document).on('click', '.add-to-cart', function() {
            let type = $(this).data('type')
            let discount = $(this).data('discount')

            let id = $(this).attr('data-id');


            let amount = $(this).parents(".ps-product__amount_parent").find('.product_amount').html()
            let priceId = $(this).parents(".ps-product__amount_parent").find('.product_amount').attr(
                'data-price-id')
            if (discount) {
                amount = $(this).parents(".ps-product__amount_parent").find('.product_amount_discount')
                    .html()
            }

            let piece = 1;
            let selected_size;
            let selected_color;
            let color_exist = 0;
            let size_exist = 0;

            if (type) {
                piece = parseInt($('.' + type + ' .ProductQuantity-Input-' + id).val())
                if (!piece) {
                    piece = 1;
                }
                selected_size = $('.' + type + ' .sizes').find("input:checked").val()
                selected_color = $('.' + type + ' .colors').find("input:checked").val()
                color_exist = $("." + type + " .color-element").length;
                size_exist = $("." + type + " .size-element").length;
                if (color_exist > 0) {
                    if (!selected_color) {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.warning('Rəng seçilməyib');
                        return false;
                    }
                }
                if (size_exist > 0) {
                    if (!selected_size) {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.warning('Ölçü seçilməyib');
                        return false;
                    }
                }
            } else {
                piece = parseInt($(' .ProductQuantity-Input-' + id).val())
                selected_color = $(this).parents(".ps-product__amount_parent").find('.product_amount')
                    .data('color')
                selected_size = $(this).parents(".ps-product__amount_parent").find('.product_amount')
                    .data('size')
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

                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.success(data.message);
                    } else {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.error(data.message);
                    }
                }
            });
        });
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

                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.success(data.message);

                    } else {

                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.error(data.message);
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
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.success(data.message);
                    } else {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.warning(data.message);
                    }
                }
            });
        })
        $(document).on('click', '.ProductQuantity-Minus', function() {
            let id = $(this).data('id')
            var piece = parseInt($('.ProductQuantity-Input-' + id).val())
            if (piece <= 0) {
                piece = 1;
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
        $(document).on('mouseleave', '.rating', function() {
            var index = $(this).data('index');
            var product_id = $(this).data('product_id');
            var rating = $(this).data('rating');
            remove_star(product_id);
            for (var count = 1; count <= rating; count++) {
                $('#' + product_id + '-' + count).attr('class', 'rating fa fa-star');
            }
        })
    });
</script>
