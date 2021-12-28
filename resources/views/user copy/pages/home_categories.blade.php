@if (count($categories) > 0)
    @foreach ($categories as $arr => $category)
        <div class="ps-home-trending-products ps-section--furniture">
            <div class="container">
                <div class="ps-section__header">
                    <h3>{{ $category['name'] }}</h3>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="true"
                        data-owl-loop="{{count($category['products']) < 5 ? false : true}}" data-owl-speed="5000"
                        data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2"
                        data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000"
                        data-owl-mousedrag="on">
                        @foreach ($category['products'] as $array => $product)
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a href="{{ route('product', $product->slug) }}">
                                        @if ($product->product_id)
                                            @php $image = App\Models\ProductImage::where('product_id', $product->product_id)->first()  @endphp

                                            <img src="{{ asset('img/products/' . $image->image_name) }}"
                                                alt="{{ $product->product_name }}">
                                        @elseif($product->image->image_name)
                                            <img src="{{ $product->image->image_name ? asset('img/products/' . $product->image->image_name) : 'http://via.placeholder.com/1200x1200?text=ProductPhoto' }}"
                                                alt="{{ $product->product_name }}">
                                        @else
                                            <img src="{{ 'http://via.placeholder.com/1200x1200?text=ProductPhoto' }}"
                                                alt="{{ $product->product_name }}">
                                        @endif
                                    </a>
                                    {!! $product->discount != 0.0 ? '<div class="ps-product__badge" style="left: 0; width: max-content">-' . $product->discount . '%</div>' : null !!}

                                    <ul class="ps-product__actions">
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <li><a href="javascript:void(0)" class="quick-view"
                                                data-id="{{ $product->id }}" data-placement="top" title="Bax"
                                                data-toggle="modal" data-target="#product-quickview"><i
                                                    class="icon-eye"></i></a></li>
                                        @auth
                                            <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                                                    data-id="{{ $product->id }}" class="add-wish-list"
                                                    title="İstəklərim"><i class="icon-heart"></i></a></li>
                                        @endauth
                                        <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                                                data-id="{{ $product->id }}" class="add-to-compare"
                                                title="Müqayisə"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="{{ route('product', $product->slug) }}">{{ $product->product_name }}</a>

                                        <p class="ps-product__price sale">{{ $product->sale_price }} ₼
                                            {!! $product->discount != 0.0 ? '‎<del>' . $product->retail_price . ' ₼ </del>' : null !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
