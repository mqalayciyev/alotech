@extends('user.layouts.app')
@section('title', __('content.Order'))
@section('content')
<main class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                <li><a href="/account">@lang('footer.My Account')</a></li>
                <li><a href="/orders">@lang('content.Orders')</a></li>
                <li class="active">{{$order->id}}</li>
            </ul>
        </div>
    </div>
    <section class="ps-section--account">
        <div class="container">
            <div class="ps-section__right">
                <div class="ps-section--account-setting">

                    <div class="ps-section__content">
                        <div class="row">
                            <div class="col-md-3 col-12 pb-3">
                                <figure class="ps-block--invoice">
                                    <figcaption>MƏBLƏĞ</figcaption>
                                    <div class="ps-block__content">
                                        <p>{{ number_format( $order->order_amount - $order->shipping + $order->bonus_amount, 2) }} ₼</p>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-md-3 col-12 pb-3">
                                <figure class="ps-block--invoice">
                                    <figcaption>BONUSLA ÖDƏNİLƏN</figcaption>
                                    <div class="ps-block__content">
                                        <p>{{ $order->bonus_amount }} ₼</p>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-md-3 col-12">
                                <figure class="ps-block--invoice">
                                    <figcaption>ÇATDIRILMA</figcaption>
                                    <div class="ps-block__content">
                                        <p>{{ $order->shipping }}₼</p>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-md-3 col-12">
                                <figure class="ps-block--invoice">
                                    <figcaption>YEKUN MƏBLƏĞ</figcaption>
                                    <div class="ps-block__content">
                                        <p>{{ number_format( $order->order_amount + ($order->order_amount * config('cart.tax')/100), 2) }} ₼</p>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table ps-table table-hover">
                                <thead>
                                    <tr>
                                        <th>@lang('content.Product')</th>
                                        <th class="text-center">@lang('content.Price')</th>
                                        <th class="text-center">Məlumat</th>
                                        <th class="text-center">@lang('content.Quantity')</th>
                                        <th class="text-center">@lang('content.Total')</th>
                                        <th class="text-right">@lang('content.Date')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->cart->cart_products as $cart_product)
                                        <tr>
                                            <td class="thumb">
                                                <div class="ps-product--cart">
                                                    <div class="ps-product__thumbnail"><a href="{{ route('product',$cart_product->product->slug) }}">
                                                        @php
                                                            $image = App\Models\ProductImage::where('product_id', $cart_product->product->id)->where('color_id', $cart_product->color_id)->first();
                                                        @endphp
                                                        <img src="{{ $image ? asset('assets/img/products/' . $image->image_name) : 'http://via.placeholder.com/120x100?text=ProductPhoto' }}" class="img-responsive" style="width: 100px;">
                                                        
                                                    </div>
                                                    <div class="ps-product__content">
                                                        <a href="{{ route('product',$cart_product->product->slug) }}">{{ $cart_product->product->product_name }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="price text-center">
                                                <span>{{ number_format($cart_product->amount, 2) }}‎ <i>₼</i></span>
                                            </td>
                                            <td class="price text-center">
                                                {!! $cart_product->size ? '<p>Ölçü: <span>' . $cart_product->size->name . '</span></p>' : '' !!}
                                                {!! $cart_product->color_id > 1 ? '<p>Rəng: <span style="background-color: ' . $cart_product->color->name . '">' . $cart_product->color->title . '</span></p>' : '' !!}
                                            </td>
                                            <td class="qty text-center">
                                                <span>{{ $cart_product->piece }}</span>
                                            </td>
                                            <td class="total text-center">
                                                <span class="primary-color">{{ number_format($cart_product->amount * $cart_product->piece, 2) }} <i>₼</i></span>
                                            </td>
                                            <td>
                                                <span>{{ $order->created_at }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="ps-section__footer"><a class="ps-btn ps-btn--sm" href="/orders">Sifarişlərə qayıt</a></div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
