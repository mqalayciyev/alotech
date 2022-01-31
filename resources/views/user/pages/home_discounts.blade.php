@if (count($products))
    @foreach ($products as $array => $product)
        <div class="js-slide products-group">
            <div class="product-item mx-1 remove-divider products__all">
                <div class="product-item__outer h-100">
                    <div class="product-item__inner bg-white px-wd-4 p-2 p-md-3">
                        <div class="product-item__body pb-xl-2">
                            <div class="mb-2">
                                <a href="{{ route('category', $product->categories[0]->slug) }}"
                                    class="font-size-12 text-gray-5 line-clamp-1"
                                    title="{{ $product->categories[0]->category_name }}">{{ $product->categories[0]->category_name }}</a>
                            </div>
                            <h5 class="mb-1 product-item__title">
                                <a href="{{ route('product', $product->slug) }}"
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
                                        $price = $product->price->where('stock_piece', '>=', 0)->toArray();

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
                                                if ($item['color_id'] == 1 || $item['size_id'] != null) {
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
                                                <small><del class="currency_azn product_amount"
                                                    data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                    data-size="{{ $item['size_id'] }}">{{ $item['sale_price'] }}</del></small>
                                                <div class="text-gray-100 text-red currency_azn product_amount_discount"
                                                    data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                    data-size="{{ $item['size_id'] }}">{{ number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) }}</div>
                                                @else
                                                    <div class="text-gray-100 text-red currency_azn product_amount"
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
                                        data-id="{{ $product->id }}"><i class="fas fa-cart-arrow-down "></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-item__footer">
                            @if ($product->price->sum('stock_piece') > 0)
                            <p class="mb-2 text-center"><i class="fas fa-check text-success"></i> Mövcuddur</p>
                        @else
                            @if ($product->order_arrival)
                                @php
                                    Carbon::setLocale('az');
                                    $arrival = Carbon::createFromDate($product->order_arrival);
                                    $now = Carbon::now();
                                @endphp
                                <p class="mb-2 text-center"><i class="fas fa-truck text-danger"></i> {{ $arrival->diffForHumans($now) }} çatacaq</p>
                            @else
                                <p class="mb-2 text-center"><i class="fas fa-times text-danger"></i> Mövcud deyil</p>
                            @endif
                        @endif
                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                <a href="javascript:void(0)" class="text-gray-6 font-size-13 add-to-compare" data-id="{{ $product->id }}">
                                    <i class="fa fa-retweet font-size-15"></i>
                                </a>
                                <a href="javascript:void(0)" class="text-gray-6 font-size-13 add-wish-list" data-id="{{ $product->id }}">
                                    <i class="fa fa-heart font-size-15 mr-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <h3 class="text-center">Heç bir məhsul yoxdur</h3>
@endif
