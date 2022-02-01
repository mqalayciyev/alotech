@extends('user.layouts.app')
@section('title', __('content.Cart'))
@section('content')
        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main" class="cart-page">
            <!-- breadcrumb -->
            <div class="bg-gray-13 bg-md-transparent">
                <div class="container">
                    <!-- breadcrumb -->
                    <div class="my-md-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">@lang('content.Home')</a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><i class="fas fa-chevron-right"></i></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">@lang('content.My Cart')</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- End breadcrumb -->
                </div>
            </div>
            <!-- End breadcrumb -->

            <div class="container">
                <div class="mb-4">
                    <h1 class="text-center">Cart</h1>
                </div>
                <div class="mb-10 cart-table">
                    <form class="mb-4" action="#" method="post">
                        <table class="table" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Məhsulun adı</th>
                                    <th class="product-price">QİYMƏT</th>
                                    <th class="product-quantity w-lg-15">MİQDAR</th>
                                    <th class="product-subtotal">ÜMUMİ</th>
                                </tr>
                            </thead>
                            <tbody class="my_cart">
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="mb-8 cart-total">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7 col-md-8 offset-md-4">
                            <div class="border-bottom border-color-1 mb-3">
                                <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Səbətin cəmi</h3>
                            </div>
                            <table class="table mb-3 mb-md-0">
                                <tbody>
                                    @if (session()->get('discount'))
                                        <tr class="order-total">
                                            <th>Kompaniya Endirimi</th>
                                            <td data-title="Total"><strong class="total-discount currency_azn">{{ session()->get('discount') }}</strong></td>
                                        </tr>
                                    @endif

                                    <tr class="order-total">
                                        <th>Ümumi məbləğ</th>
                                        <td data-title="Total"><strong class="total-amount currency_azn">{{ Cart::total() }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            @if (Cart::count() > 0)
                                <a href="{{ route('payment') }}" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-md-none">Sifariş Ver</a>
                                @if (!auth()->check())
                                <a href="{{ route('quickPayment') }}" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-md-none mt-3">Qeydiyyatsız Sifariş Ver</a>
                                @endif
                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->



    {{-- <div class="form-group mb-4">
        <select class="js-select selectpicker dropdown-select right-dropdown-0-all w-100" data-style="bg-white font-weight-normal border border-color-1 text-gray-20">
            <option value="">Select a country…</option>
        </select>
    </div> --}}
@endsection
@section('script')
    <script>
        $(function() {
            my_cart();

            function my_cart() {
                $.ajax({
                    url: '{{ route('cart.my_cart') }}',
                    type: 'GET',
                    success: function(data) {
                        $('.my_cart').html(data.output);
                        $('.total-amount').html(data.total);
                        $('.total-discount').html(data.discount);
                        $('.show_cartCount').html(data.count);
                    }
                });
            }

            $(document).on('click', '.cartProductQuantityMinus', function() {
                var rowID = $(this).data('id')
                var piece = $(".input-" + rowID).val()
                piece = --piece;
                $(".input-" + rowID).val(piece);
                var product = $(".input-" + rowID).attr('data-product');
                var sale_price = $(".input-" + rowID).attr(
                    'data-sale-price');
                $.ajax({
                    url: '{{ route('cart.update_cart') }}',
                    method: 'GET',
                    data: {
                        rowID: rowID,
                        piece: piece,
                        product,
                        sale_price
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data)
                        $('.my_cart').html(data.output);
                        $('.total-amount').html(data.total);
                        $('.total-discount').html(data.discount);
                        $('.show_cartCount').html(data.count);
                    }
                });
            })
            $(document).on('click', '.cartProductQuantityPlus', function() {
                var rowID = $(this).data('id')
                var piece = $(".input-" + rowID).val()
                piece = ++piece;
                $(".input-" + rowID).val(piece);
                var product = $(".input-" + rowID).attr('data-product');
                var sale_price = $(".input-" + rowID).attr(
                    'data-sale-price');
                $.ajax({
                    url: '{{ route('cart.update_cart') }}',
                    type: 'GET',
                    data: {
                        rowID: rowID,
                        piece: piece,
                        product,
                        sale_price
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data)
                        $('.my_cart').html(data.output);
                        $('.total-amount').html(data.total);
                        $('.total-discount').html(data.discount);
                        $('.show_cartCount').html(data.count);
                    }
                });
            })

            $(document).on('click', '.delete', function() {
                var rowID = $(this).attr('id');
                $.ajax({
                    url: '{{ route('cart.delete') }}',
                    type: 'GET',
                    data: {
                        rowID: rowID
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        // my_cart();
                        $('.my_cart').html(data.output);
                        $('.total-amount').html(data.total);
                        $('.total-discount').html(data.discount);
                        $('.show_cartCount').html(data.count);
                    }
                })
            });

            $(document).on('click', '.trash_cart', function() {
                $.ajax({
                    url: '{{ route('cart.destroy') }}',
                    success: function() {
                        my_cart();
                    }
                })
            })

        });
    </script>
@endsection
