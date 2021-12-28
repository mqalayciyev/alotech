@if (count($products))
    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="true" data-owl-speed="3000"
        data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2"
        data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000"
        data-owl-mousedrag="on">

        @foreach ($products as $array => $product)
            <div class="ps-product ps-product--inner">
                <div class="ps-product__thumbnail">
                    <a href="{{ route('product', $product->slug) }}" style="min-height: 200px; display: flex; justify-content: center; align-items: center;">
                        <img src="{{ $product->image->image_name ? asset('assets/img/products/' . $product->image->image_name) : asset('assets/img/'  . old('logo', $website_info->logo)) }}" alt="{{ $product->product_name }}">
                    </a>
                    {!! $product->discount != 0.0 ? '<div class="ps-product__badge">-' . $product->discount . '%</div>' : null !!}
                    <ul class="ps-product__actions">
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <li><a href="javascript:void(0)" class="quick-view" data-id="{{ $product->id }}"
                                data-placement="top" title="Bax" data-toggle="modal" data-target="#product-quickview"><i
                                    class="icon-eye"></i></a></li>
                        <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                                data-id="{{ $product->id }}" class="add-wish-list" title="İstəklərim"><i
                                    class="icon-heart"></i></a></li>
                        <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                                data-id="{{ $product->id }}" class="add-to-compare" title="Müqayisə"><i
                                    class="fa fa-retweet"></i></a></li>
                    </ul>
                </div>
                <div class="ps-product__container ps-product__amount_parent">
                    <div class="ps-product__content">

                        <p class="ps-product__price sale">
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
                                                    {!! $product->discount ? '<span class="product_amount_discount"  data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) . '</span>₼<del><span class="product_amount" data-price-id="' . $item['id'] . '" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount" data-price-id="' . $item['id'] . '" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼' !!}
                                                    @break
                                                @endif
                                            @endforeach
                                        @elseif (count($filter_2))
                                            @foreach ($filter_2 as $item)
                                                @if ($item)
                                                    {!! $product->discount ? '<span class="product_amount_discount" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) . '</span>₼<del><span class="product_amount" data-price-id="' . $item['id'] . '" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount" data-price-id="' . $item['id'] . '" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼' !!}
                                                    @break
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach ($filter_3 as $item)
                                                @if ($item)
                                                    {!! $product->discount ? '<span class="product_amount_discount" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) . '</span>₼<del><span class="product_amount" data-price-id="' . $item['id'] . '" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount" data-price-id="' . $item['id'] . '" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼' !!}
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif
                        </p>
                        <p><a class="ps-product__title" href="{{ route('product', $product->slug) }}">{{ $product->product_name }}</a></p>
                        <div class="col-12">
                            <div class="row py-3 justify-content-center">
                                <div class="col-12 col-md-8">
                                    <div class="form-group--number">
                                        <button type="button" class="ProductQuantity-Plus up"  data-id="{{ $product->id }}">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                        <button type="button" class="ProductQuantity-Minus down "  data-id="{{ $product->id }}">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input
                                            {{-- id="qty" --}}
                                            type="text"
                                            data-id="{{ $product->id }}"
                                            min="1"
                                            name="piece"
                                            value="1"
                                            autocomplete="off"
                                            class="ProductQuantity-Input-{{ $product->id }} form-control"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="ps-btn ps-btn---primary add-to-cart btn-sm" data-size="{{ count($product->sizes) > 0 ? 'true' : 'false' }}" data-color="{{ count($product->colors) > 0 ? 'true' : 'false' }}" data-piece="1" data-id="{{ $product->id }}" >Səbətə at</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <h3 class="text-center">Heç bir məhsul yoxdur</h3>
@endif
