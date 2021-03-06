<script>



    $(function() {




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
            let company = $(this).data('company')
            let discount = $(this).data('discount')
            let id = $(this).data('id');



            let amount, priceId, selected_size, selected_color;

            if (type == 'product__single') {
                piece = parseInt($('.ProductQuantity-Input-' + id).val())

                amount = $("." + type).find('.product_amount').html()
                if (discount) {
                    amount = $("." + type).find('.product_amount_discount').html()
                }
                priceId = $("." + type).find('.product_amount').attr('data-price-id')

                selected_color = $('.' + type).find(".color-element").val()
                selected_size = $('.' + type).find(".size-element").val()
            } else {
                piece = 1
                amount = $(this).closest("." + type).find('.product_amount').html()

                if (discount) {
                    amount = $(this).closest("." + type).find('.product_amount_discount').html()
                }

                priceId = $(this).closest("." + type).find('.product_amount').attr('data-price-id')
                selected_color = $(this).closest("." + type).find('.product_amount').data('color')
                selected_size = $(this).closest("." + type).find('.product_amount').data('size')
            }

            if(amount){
                amount = amount.replace(',', '')
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
                    } else if (data.status == 'info') {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.info(data.message);
                    }
                    window.location.reload()
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
                        // products('products_dotd');
                        // products('products_l');
                        // products('products_pfy');
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
