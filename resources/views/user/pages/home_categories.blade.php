@if (count($products) > 0)
@php
    $product = $products[0]
@endphp
    <div class="col-md-5 col-xl-3gdot9 min-height-630">
        <div class="products-group bg-white h-100">
            <div class="product-item remove-divider products__all">
                <div class="product-item__outer h-100">
                    <div class="product-item__inner bg-white p-3 ">
                        <div class="product-item__body d-flex flex-column">
                            <div class="mb-1">
                                <div class="mb-2">
                                    <a href="{{ route('category', $product->categories[0]->slug) }}"
                                        class="font-size-12 text-gray-5 line-clamp-1" title="{{ $product->categories[0]->category_name }}">{{ $product->categories[0]->category_name }}</a>
                                </div>
                                <h5 class="mb-0 product-item__title">
                                    <a href="{{ route('product', $product->slug) }}"
                                        class="text-blue font-weight-bold line-clamp-1"
                                        title="{{ $product->product_name }}">{{ $product->product_name }}</a>
                                </h5>
                            </div>
                            <div class="mb-1 min-height-xl-450 position-relative">
                                <a href="{{ route('category', $product->categories[0]->slug) }}"
                                    class="d-block text-center my-4 mt-lg-0 mb-xl-5 mb-lg-0 mt-xl-0 mb-xl-0 mt-wd-0 mb-wd-3">
                                    <img class="img-fluid" src="{{ $product->image->image_name ? asset('assets/img/products/' . $product->image->image_name) : asset('assets/img/' . old('logo', $website_info->logo)) }}"
                                    alt="{{ $product->product_name }}">
                                </a>
                                @if (count($product->price) > 1)
                                    <div style="position: absolute; right: 0; bottom: 0;">
                                        <img src="{{ asset('assets/img/colorwheel-circle-icon-256.png') }}" style="width: 25px; height: 25px;" alt="">
                                    </div>
                                @endif
                            </div>
                            <div class="flex-center-between mb-2">
                                <div class="prodcut-price">
                                    @php
                                        $price = $product->price->where('depot_id', $default_depot)->where('stock_piece', '>', 0)->toArray();

                                        // echo "<pre>";
                                        //     print_r($price);

                                        $filter = array_filter($price, function ($item) {
                                            if ($item['color_id'] > 1 && $item['size_id'] != null) {
                                                return true;
                                            }
                                        });
                                        if(count($filter) == 0){
                                            $filter = array_filter($price, function ($item) {
                                                if ($item['color_id'] > 1 || $item['size_id'] == null) {
                                                    return true;
                                                }
                                            });
                                        }
                                        if(count($filter) == 0){
                                            $filter = array_filter($price, function ($item) {
                                                if ($item['color_id'] == 1 || $item['size_id'] == null) {
                                                    return true;
                                                }
                                            });
                                        }

                                    @endphp

                                    @if (count($filter))
                                        @foreach ($filter as $item)
                                            @if ($item)
                                                @if ($product->discount)
                                                <small><del class="product_amount currency_azn"
                                                    data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                    data-size="{{ $item['size_id'] }}">{{ $item['sale_price'] }}</del></small>
                                                <div class="text-gray-100 text-red product_amount currency_azn"
                                                    data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                    data-size="{{ $item['size_id'] }}">{{ number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) }}</div>

                                                @else
                                                    <div class="text-gray-100 text-red product_amount currency_azn"
                                                        data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                        data-size="{{ $item['size_id'] }}">{{ $item['sale_price'] }}</div>
                                                @endif
                                                @break
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <div class="d-none d-xl-block prodcut-add-cart">
                                    <a href="javascript:void(0)" class="btn-add-cart btn-primary transition-3d-hover add-to-cart"
                                        data-type="products__all" data-piece="1" data-discount="{{ $product->discount }}"
                                        data-id="{{ $product->id }}"><i class="fas fa-cart-arrow-down "></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-item__footer">
                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <a href="javascript:void(0)" class="text-gray-6 font-size-13 add-to-compare" data-id="{{ $product->id }}"><i class="fa fa-retweet font-size-15"></i> Müqayisə</a>
                                <a href="javascript:void(0)" class="text-gray-6 font-size-13 add-wish-list" data-id="{{ $product->id }}"><i class="fa fa-heart font-size-15 mr-1"></i> Seçilmişlər</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md pl-md-0">
        <!-- Tab Content -->
        <div class="tab-content" id="Qpills-tabContent">
            <div class="tab-pane fade pt-2 show active" id="Qpills-one-example1" role="tabpanel"
                aria-labelledby="Qpills-one-example1-tab">
                <ul class="row list-unstyled products-group no-gutters mb-0">
                    @foreach ($products as $index => $product)
                        @if ($index > 0)
                        <li class="col-12 col-sm-6 col-lg-4 product-item products__all">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner bg-white p-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2">
                                            <a href="{{ route('category', $product->categories[0]->slug) }}"
                                                class="font-size-12 text-gray-5 line-clamp-1"
                                                title="{{ $product->categories[0]->category_name }}">{{ $product->categories[0]->category_name }}</a>
                                            </div>
                                        <h5 class="mb-1 product-item__title">
                                            <a
                                                href="{{ route('product', $product->slug) }}"
                                                class="text-blue font-weight-bold line-clamp-1"
                                                title="{{ $product->product_name }}">{{ $product->product_name }}</a>
                                            </h5>
                                            <div class="mb-2 position-relative">
                                                <a href="{{ route('product', $product->slug) }}" class="d-block text-center">
                                                    <img class="img-fluid"
                                                        src="{{ $product->image->image_name ? asset('assets/img/products/' . $product->image->image_name) : asset('assets/img/' . old('logo', $website_info->logo)) }}"
                                                        alt="{{ $product->product_name }}">
                                                </a>
                                                @if (count($product->price) > 1)
                                                    <div style="position: absolute; right: 0; bottom: 0;">
                                                        <img src="{{ asset('assets/img/colorwheel-circle-icon-256.png') }}" style="width: 25px; height: 25px;" alt="">
                                                    </div>
                                                @endif
                                            </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                @php
                                                    $price = $product->price->where('depot_id', $default_depot)->where('stock_piece', '>', 0)->toArray();

                                                    // echo "<pre>";
                                                    //     print_r($price);

                                                    $filter = array_filter($price, function ($item) {
                                                        if ($item['color_id'] > 1 && $item['size_id'] != null) {
                                                            return true;
                                                        }
                                                    });
                                                    if(count($filter) == 0){
                                                        $filter = array_filter($price, function ($item) {
                                                            if ($item['color_id'] > 1 || $item['size_id'] == null) {
                                                                return true;
                                                            }
                                                        });
                                                    }
                                                    if(count($filter) == 0){
                                                        $filter = array_filter($price, function ($item) {
                                                            if ($item['color_id'] == 1 || $item['size_id'] == null) {
                                                                return true;
                                                            }
                                                        });
                                                    }

                                                @endphp

                                                @if (count($filter))
                                                    @foreach ($filter as $item)
                                                        @if ($item)
                                                            @if ($product->discount)
                                                            <small><del class="product_amount currency_azn"
                                                                data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                                data-size="{{ $item['size_id'] }}">{{ $item['sale_price'] }}</del></small>
                                                            <div class="text-gray-100 text-red product_amount currency_azn"
                                                                data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                                data-size="{{ $item['size_id'] }}">{{ number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) }}</div>

                                                            @else
                                                                <div class="text-gray-100 text-red product_amount currency_azn"
                                                                    data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                                    data-size="{{ $item['size_id'] }}">{{ $item['sale_price'] }}</div>
                                                            @endif
                                                            @break
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="d-block prodcut-add-cart">
                                                <a href="javascript:void(0)" class="btn-add-cart btn-primary transition-3d-hover add-to-cart"
                                                    data-type="products__all" data-piece="1" data-discount="{{ $product->discount }}"
                                                    data-id="{{ $product->id }}"><i class="fas fa-cart-arrow-down "></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <a href="javascript:void(0)" class="text-gray-6 font-size-13 add-to-compare" data-id="{{ $product->id }}"><i class="fa fa-retweet font-size-15"></i></a>
                                            <a href="javascript:void(0)" class="text-gray-6 font-size-13 add-wish-list" data-id="{{ $product->id }}"><i class="fa fa-heart font-size-15 mr-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
