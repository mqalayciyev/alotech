@extends('user.layouts.app')
@section('title', __('content.Cart'))
@section('content')
<div class="ps-page--simple">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                <li class="active">@lang('content.My Cart')</li>
            </ul>
        </div>
    </div>
    <div class="container">
        @include('common.alert')
    </div>
    <div class="ps-section--shopping ps-shopping-cart">
        
        <div class="container my_cart">

        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(function () {
            my_cart();

            function my_cart() {
                $.ajax({
                    url: '{{ route('cart.my_cart') }}',
                    type: 'GET',
                    success: function (data) {
                        $('.my_cart').html(data);
                    }
                });
            }

            $(document).on('click', '.ProductQuantity-Minus',  function(){
                var piece = $(this).parent('div.ProductQuantity').find('.input').val()
                 piece = --piece;
                $(this).parent('div.ProductQuantity').find('.input').val(piece);
                var rowID = $(this).parent('div.ProductQuantity').find(".input").attr('data-id');
                var product = $(this).parent('div.ProductQuantity').find(".input").attr('data-product');
                var sale_price = $(this).parent('div.ProductQuantity').find(".input").attr('data-sale-price');
                $.ajax({
                    url: '{{ route('cart.update_cart') }}',
                    method: 'GET',
                    data: {rowID: rowID, piece: piece, product, sale_price},
                    dataType: 'JSON',
                    success: function (data) {
                        // console.log(data)
                        $('.ps-cart__content').html(data.output);
                        $('.ps-cart--mini .show_cartCount').html(data.cart_count);
                        my_cart();
                        // $('.show_cartCount').html(data);
                    }
                });
            })
            $(document).on('click', '.ProductQuantity-Plus',  function(){


                var piece = $(this).parent('div.ProductQuantity').find('.input').val()
                piece = ++piece;
                $(this).parent('div.ProductQuantity').find('.input').val(piece);
                var rowID = $(this).parent('div.ProductQuantity').find(".input").attr('data-id');
                var product = $(this).parent('div.ProductQuantity').find(".input").attr('data-product');
                var sale_price = $(this).parent('div.ProductQuantity').find(".input").attr('data-sale-price');
                $.ajax({
                    url: '{{ route('cart.update_cart') }}',
                    type: 'GET',
                    data: {rowID: rowID, piece: piece, product, sale_price},
                    dataType: 'JSON',
                    success: function (data) {
                        // console.log(data)
                        $('.ps-cart__content').html(data.output);
                        $('.ps-cart--mini .show_cartCount').html(data.cart_count);
                        my_cart();
                    }
                });
            })

            $(document).on('click', '.delete', function () {
                var rowID = $(this).attr('id');
                $.ajax({
                    url: '{{ route('cart.delete') }}',
                    type: 'GET',
                    data: {rowID: rowID},
                    dataType: 'JSON',
                    success: function (data) {
                        my_cart();
                        $('.ps-cart__content').html(data.output);
                        $('.ps-cart--mini .show_cartCount').html(data.cart_count);
                    }
                })
            });

            $(document).on('click', '.trash_cart', function () {
                $.ajax({
                    url: '{{ route('cart.destroy') }}',
                    success: function () {
                        my_cart();
                    }
                })
            })

        });
    </script>
@endsection
