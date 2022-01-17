@if (count($products) > 0)
    <!-- Tab Content -->
    <div class="tab-content" id="pills-tabContent">

        <div class="tab-pane fade pt-2 active show" id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab" data-target-group="groups">
            <ul class="row list-unstyled products-group no-gutters">
                @foreach ($products as $array => $product)
                <li class="col-6 col-md-4 col-lg-3 col-wd-2gdot4 product-item products__all">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
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
                                {{-- <ul class="font-size-12 p-0 text-gray-110 mb-4">
                                    <li class="line-clamp-1 mb-1 list-bullet">Brand new and high quality</li>
                                    <li class="line-clamp-1 mb-1 list-bullet">Made of supreme quality, durable EVA crush
                                        resistant, anti-shock material.</li>
                                    <li class="line-clamp-1 mb-1 list-bullet">20 MP Electro and 28 megapixel CMOS rear camera
                                    </li>
                                </ul> --}}
                                {{-- <div class="text-gray-20 mb-2 font-size-12">SKU: FW511948218</div> --}}
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
                                                    <small><del class="product_amount currency_azn" data-price-id="{{ $item['id'] }}">{{ $item['sale_price'] }}</del></small>
                                                    <div class="text-gray-100 text-red product_amount_discount currency_azn" >{{ number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) }}</div>
                                                @else
                                                    <div class="text-gray-100 text-red product_amount currency_azn" data-price-id="{{ $item['id'] }}">{{ $item['sale_price'] }}</div>
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
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <a href="javascript:void(0)" class="text-gray-6 font-size-13 add-to-compare" data-id="{{ $product->id }}"><i class="fa fa-retweet font-size-15"></i></a>
                                    <a href="javascript:void(0)" class="text-gray-6 font-size-13 add-wish-list" data-id="{{ $product->id }}"><i class="fa fa-heart font-size-15 mr-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab" data-target-group="groups">
            <ul class="d-block list-unstyled products-group prodcut-list-view">
                @foreach ($products as $array => $product)
                <li class="product-item remove-divider products__all">
                    <div class="product-item__outer w-100">
                        <div class="product-item__inner remove-prodcut-hover py-4 row">
                            <div class="product-item__header col-6 col-md-4">
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
                            </div>
                            <div class="product-item__body col-6 col-md-5">
                                <div class="pr-lg-10">
                                    <div class="mb-2">
                                        <a href="{{ route('category', $product->categories[0]->slug) }}"
                                            class="font-size-12 text-gray-5 line-clamp-1"
                                            title="{{ $product->categories[0]->category_name }}">{{ $product->categories[0]->category_name }}</a>
                                        </div>
                                    <h5 class="mb-2 product-item__title">
                                        <a href="{{ route('product', $product->slug) }}"
                                            class="text-blue font-weight-bold line-clamp-1"
                                            title="{{ $product->product_name }}">{{ $product->product_name }}</a>
                                        </h5>
                                    <div class="prodcut-price mb-2 d-md-none">
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
                                                    <small><del class="product_amount currency_azn" data-price-id="{{ $item['id'] }}">{{ $item['sale_price'] }}</del></small>
                                                    <div class="text-gray-100 text-red product_amount_discount currency_azn" >{{ number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) }}</div>
                                                @else
                                                    <div class="text-gray-100 text-red product_amount currency_azn" data-price-id="{{ $item['id'] }}">{{ $item['sale_price'] }}</div>
                                                @endif
                                                @break
                                            @endif
                                        @endforeach
                                        @endif
                                    </div>
                                    {{-- <ul class="font-size-12 p-0 text-gray-110 mb-4 d-none d-md-block">
                                        <li class="line-clamp-1 mb-1 list-bullet">Brand new and high quality</li>
                                        <li class="line-clamp-1 mb-1 list-bullet">Made of supreme quality, durable EVA crush
                                            resistant, anti-shock material.</li>
                                        <li class="line-clamp-1 mb-1 list-bullet">20 MP Electro and 28 megapixel CMOS rear
                                            camera</li>
                                    </ul> --}}
                                </div>
                            </div>
                            <div class="product-item__footer col-md-3 d-md-block">
                                <div class="mb-3">
                                    <div class="prodcut-price mb-2">
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
                                                    <small><del class="product_amount currency_azn" data-price-id="{{ $item['id'] }}">{{ $item['sale_price'] }}</del></small>
                                                    <div class="text-gray-100 text-red product_amount_discount currency_azn" >{{ number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) }}</div>
                                                @else
                                                    <div class="text-gray-100 text-red product_amount currency_azn" data-price-id="{{ $item['id'] }}">{{ $item['sale_price'] }}</div>
                                                @endif
                                                @break
                                            @endif
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="prodcut-add-cart">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover add-to-cart"
                                            data-type="products__all" data-piece="1" data-discount="{{ $product->discount }}"
                                            data-id="{{ $product->id }}">Səbətə at</a>
                                    </div>
                                </div>
                                <div class="flex-horizontal-center justify-content-between justify-content-wd-center flex-wrap">
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <a href="javascript:void(0)" class="text-gray-6 font-size-13 add-to-compare" data-id="{{ $product->id }}"><i class="fa fa-retweet font-size-15"></i> Müqaisə</a>
                                    <a href="javascript:void(0)" class="text-gray-6 font-size-13 add-wish-list" data-id="{{ $product->id }}"><i class="fa fa-heart font-size-15 mr-1"></i> Seçilmişlər</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
    <!-- End Tab Content -->
    <!-- End Shop Body -->
    <!-- Shop Pagination -->
    <nav class="d-md-flex justify-content-between align-items-center border-top pt-3" aria-label="Page navigation example">
        <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
            @php
                $last=(int)$pagination;
                $current=(int)$page;
                $first=1;
                $next = $current + 1;
                if($current+1 > $pagination){
                    $next = $pagination;
                }
                $prev = $current - 1;
                if($current-1 == 0){
                    $prev = 1;
                }
                $output="";
                $show_limit=3;
                $active = '';

                if($show_limit + 1 >= $last){
                    for($i=1;$i<=$last;$i++){
                        $active = ($i == $current) ? 'current' : '';
                        $output.="<li data-page='$i' class='pagination-page page-item '><a class='page-link $active' href='javascript:void(0)' > $i </a></li>";
                    }
                    $output="<li data-page='$prev' class='pagination-page page-item '><a class='page-link' href='javascript:void(0)' ><i class='fa fa-chevron-left'></i></a></li>$output<li data-page='$next' class='pagination-page page-item '><a class='page-link' href='javascript:void(0)' ><i class='fa fa-chevron-right'></i></a></li>";
                }
                else{
                    if($current-ceil($show_limit/2) <= $first){
                        for($i=1;$i<=$show_limit+1;$i++){
                            $active = ($i == $current) ? 'current' : '';
                            $output .= "<li data-page='$i' class='pagination-page page-item '><a class='page-link $active' href='javascript:void(0)' > $i </a></li>";
                        }
                        $output="<li data-page='$prev' class='pagination-page page-item '><a class='page-link' href='javascript:void(0)' ><i class='fa fa-chevron-left'></i></a></li>$output<li data-page='.' class='pagination-page page-item'><a class='page-link' href='javascript:void(0)' > . </a></li><li data-page='.' class='pagination-page page-item'><a class='page-link' href='javascript:void(0)' > . </a></li><li data-page='$pagination' class='pagination-page page-item'><a  href='javascript:void(0)' > $pagination </a></li><li data-page='$next' class='pagination-page page-item '><a class='page-link' href='javascript:void(0)' ><i class='fa fa-chevron-right'></i></a></li>";
                    }
                    else if($current+ceil($show_limit/2)>=$last){
                        for($i=1; $i<$show_limit+1; $i++){
                            $active = (intval($last-$i) == $current) ? 'current' : '';
                            $output="<li data-page='" . intval($last-$i) ."' class='pagination-page page-item'><a class='page-link $active' href='javascript:void(0)' > " . intval($last-$i) ." </a></li>". $output;
                        }
                        $active = ($last == $current) ? 'current' : '';
                        $output="<li data-page='$prev' class='pagination-page page-item '><a class='page-link' href='javascript:void(0)' ><i class='fa fa-chevron-left'></i></a></li><li data-page='1' class='pagination-page page-item '><a class='page-link' href='javascript:void(0)' > 1 </a></li><li data-page='.' class='pagination-page page-item'><a class='page-link' href='javascript:void(0)' > . </a></li><li data-page='.' class='pagination-page page-item'><a  href='javascript:void(0)' > . </a></li>".$output. "<li data-page='$pagination' class='pagination-page page-item '><a class='page-link $active' href='javascript:void(0)' > $pagination </a></li><li data-page='$next' class='pagination-page page-item '><a class='page-link' href='javascript:void(0)' ><i class='fa fa-chevron-right'></i></a></li>";
                    }
                    else{
                        $output="<li data-page='$prev' class='pagination-page page-item '><a class='page-link' href='javascript:void(0)' ><i class='fa fa-chevron-left'></i></a></li><li data-page='1' class='pagination-page page-item'><a class='page-link' href='javascript:void(0)' > 1 </a></li><li data-page='.' class='pagination-page page-item'><a class='page-link' href='javascript:void(0)' > . </a></li><li data-page='.' class='pagination-page page-item'><a  href='javascript:void(0)' > . </a></li>";
                        $start=$current-floor($show_limit/2);

                        for($i=0; $i<$show_limit; $i++){

                            $cursor=intval($start+$i);
                            if($cursor==$last){
                                break;
                            }
                            $active = (intval($start+$i) == $current) ? 'current' : '';
                            $output.="<li data-page='$cursor' class='pagination-page page-item '><a class='page-link $active' href='javascript:void(0)' > $cursor </a></li>";
                        }
                        $output.="<li data-page='.' class='pagination-page page-item'><a  href='javascript:void(0)' > . </a></li><li data-page='.' class='pagination-page page-item'><a  href='javascript:void(0)' > . </a></li><li data-page='$pagination' class='pagination-page page-item'><a  href='javascript:void(0)' > $pagination </a></li><li data-page='$next' class='pagination-page page-item '><a  href='javascript:void(0)' ><i class='fa fa-chevron-right'></i></a></li>";
                    }
                }

                echo $output."\n";
            @endphp
        </ul>
    </nav>
    <!-- End Shop Pagination -->

@else
    <div class="w-100 mx-auto">
        <h3 class="text-center">@lang('content.There is no any product')</h3>
    </div>
@endif
