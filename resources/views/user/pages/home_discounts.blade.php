@if (count($products))
    @foreach ($products as $array => $product)
        <div class="js-slide products-group">
            <div class="product-item mx-1 remove-divider">
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
                            <div class="mb-2">
                                <a href="{{ route('product', $product->slug) }}" class="d-block text-center">
                                    <img class="img-fluid"
                                        src="{{ $product->image->image_name ? asset('assets/img/products/' . $product->image->image_name) : asset('assets/img/' . old('logo', $website_info->logo)) }}"
                                        alt="{{ $product->product_name }}">
                                </a>
                            </div>
                            <div class="flex-center-between mb-1">
                                <div class="prodcut-price">
                                    @php
                                        $price = [];
                                        foreach ($product->price as $object) {
                                            $price[] = $object->toArray();
                                        }
                                        
                                        // echo "<pre>";
                                        //     print_r($price);
                                        
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
                                                @if ($product->discount)
                                                <small><del class="text-gray-100"><span class="product_amount"
                                                    data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                    data-size="{{ $item['size_id'] }}">{{ $item['sale_price'] }}</span>₼</del></small>
                                                <div class="text-gray-100 text-red"><span class="product_amount"
                                                    data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                    data-size="{{ $item['size_id'] }}">{{ number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) }}</span>₼</div>
                                                    
                                                @else
                                                    <div class="text-gray-100 text-red"><span class="product_amount"
                                                        data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                        data-size="{{ $item['size_id'] }}">{{ $item['sale_price'] }}</span>₼</div>
                                                @endif
                                                @break
                                            @endif
                                        @endforeach
                                    @elseif (count($filter_2))
                                        @foreach ($filter_2 as $item)
                                            @if ($item)
                                                @if ($product->discount)
                                                <small><del class="text-gray-100"><span class="product_amount"
                                                    data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                    data-size="{{ $item['size_id'] }}">{{ $item['sale_price'] }}</span>₼</del></small>
                                                <div class="text-gray-100 text-red"><span class="product_amount"
                                                    data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                    data-size="{{ $item['size_id'] }}">{{ number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) }}</span>₼</div>
                                                    
                                                @else
                                                    <div class="text-gray-100 text-red"><span class="product_amount"
                                                        data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                        data-size="{{ $item['size_id'] }}">{{ $item['sale_price'] }}</span>₼</div>
                                                @endif
                                                @break
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach ($filter_3 as $item)
                                            @if ($item)
                                                @if ($product->discount)
                                                <small><del class="text-gray-100"><span class="product_amount"
                                                    data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                    data-size="{{ $item['size_id'] }}">{{ $item['sale_price'] }}</span>₼</del></small>
                                                <div class="text-gray-100 text-red"><span class="product_amount"
                                                    data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                    data-size="{{ $item['size_id'] }}">{{ number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) }}</span>₼</div>
                                                    
                                                @else
                                                    <div class="text-gray-100 text-red"><span class="product_amount"
                                                        data-price-id="{{ $item['id'] }}" data-color="{{ $item['color_id'] }}"
                                                        data-size="{{ $item['size_id'] }}">{{ $item['sale_price'] }}</span>₼</div>
                                                @endif
                                                @break
                                            @endif
                                        @endforeach
                                    @endif
                                    
                                </div>
                                <div class="d-none d-xl-block prodcut-add-cart">
                                    <a href="{{ route('product', $product->slug) }}"
                                        class="btn-add-cart btn-primary transition-3d-hover"><i
                                            class="fas fa-cart-arrow-down add-to-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-item__footer">
                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                <a href="../shop/compare.html" class="text-gray-6 font-size-13">
                                    <i class="fa fa-retweet font-size-15"></i>
                                </a>
                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13">
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