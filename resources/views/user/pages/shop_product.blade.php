@if (count($products) > 0)
    <div class="ps-shopping-product">
        <div class="row ">
            @foreach ($products as $array => $product)
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 ">
                    <div class="ps-product">
                        <div class="ps-product__thumbnail">
                            <a href="{{ route('product', $product->slug) }}" style="min-height: 200px; display: flex; justify-content: center; align-items: center;">
                                <div class="owl-slider-2">
                                    @if (count($product->images) > 0)
                                        @foreach ($product->images as $image)
                                            <img src="{{ asset('assets/img/products/' . $image->image_name) }}" alt="{{ $product->product_name }}">
                                        @endforeach
                                    @else
                                        <img src="{{ asset('assets/img/'  . old('logo', $website_info->logo)) }}" alt="{{ $product->product_name }}">
                                    @endif
                                </div>
                            </a>
                            {!! $product->discount != 0.0 ? '<div class="ps-product__badge">-' . $product->discount . '%</div>' : null !!}
                            <ul class="ps-product__actions">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <li><a href="javascript:void(0)" class="quick-view" data-id="{{ $product->id }}"
                                        data-placement="top" title="Bax" data-toggle="modal" data-target="#product-quickview"><i
                                            class="icon-eye"></i></a></li>
                                <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                                            data-id="{{ $product->id }}" class="add-wish-list" title="Add to Whishlist"><i
                                                class="icon-heart"></i></a></li>
                                <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                                        data-id="{{ $product->id }}" class="add-to-compare" title="Compare"><i
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
                                                            {!! $product->discount ? '<span class="product_amount_discount">' . number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) . '</span>₼<del><span class="product_amount" data-price-id="' . $item['id'] . '" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount" data-price-id="' . $item['id'] . '" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼' !!}
                                                            @break
                                                        @endif
                                                    @endforeach
                                                @elseif (count($filter_2))
                                                    @foreach ($filter_2 as $item)
                                                        @if ($item)
                                                            {!! $product->discount ? '<span class="product_amount_discount">' . number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) . '</span>₼<del><span class="product_amount" data-price-id="' . $item['id'] . '" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount" data-price-id="' . $item['id'] . '" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼' !!}
                                                            @break
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($filter_3 as $item)
                                                        @if ($item)
                                                            {!! $product->discount ? '<span class="product_amount_discount">' . number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) . '</span>₼<del><span class="product_amount" data-price-id="' . $item['id'] . '" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount" data-price-id="' . $item['id'] . '" data-color="'. $item['color_id'] . '" data-size="'. $item['size_id'] . '">' . $item['sale_price'] . '</span>₼' !!}
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
                                                <button type="button" class="ProductQuantity-Plus up" data-id="{{ $product->id }}">
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
                                <p class="ps-btn ps-btn---primary add-to-cart btn-sm" data-piece="1" data-size="{{ count($product->sizes) > 0 ? 'true' : 'false' }}" data-color="{{ count($product->colors) > 0 ? 'true' : 'false' }}" data-id="{{ $product->id }}" >Səbətə at</p>
                            </div>
                        </div>
                        
                        @if(isset($description))
                            <div class="description" style="max-height: 150px; overflow: auto;">
                                {!! $product->product_description !!}
                            </div>
                        @endif
                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="ps-pagination">
        <ul class="pagination">
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
                        $active = ($i == $current) ? 'active' : '';
                        $output.="<li data-page='$i' class='pagination-page $active'><a  href='javascript:void(0)' > $i </a></li>";
                    }
                    $output="<li data-page='$prev' class='pagination-page '><a  href='javascript:void(0)' ><i class='fa fa-chevron-left'></i></a></li>$output<li data-page='$next' class='pagination-page '><a  href='javascript:void(0)' ><i class='fa fa-chevron-right'></i></a></li>";
                }
                else{

                    if($current-ceil($show_limit/2) <= $first){
                        for($i=1;$i<=$show_limit+1;$i++){
                            $active = ($i == $current) ? 'active' : '';
                            $output .= "<li data-page='$i' class='pagination-page $active'><a  href='javascript:void(0)' > $i </a></li>";
                        }
                        $output="<li data-page='$prev' class='pagination-page '><a  href='javascript:void(0)' ><i class='fa fa-chevron-left'></i></a></li>$output<li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li><li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li><li data-page='$pagination' class='pagination-page'><a  href='javascript:void(0)' > $pagination </a></li><li data-page='$next' class='pagination-page '><a  href='javascript:void(0)' ><i class='fa fa-chevron-right'></i></a></li>";
                    }
                    else if($current+ceil($show_limit/2)>=$last){
                        for($i=1; $i<$show_limit+1; $i++){
                            $active = (intval($last-$i) == $current) ? 'active' : '';
                            $output="<li data-page='" . intval($last-$i) ."' class='pagination-page $active'><a  href='javascript:void(0)' > " . intval($last-$i) ." </a></li>". $output;
                        }
                        $active = ($last == $current) ? 'active' : '';
                        $output="<li data-page='$prev' class='pagination-page '><a  href='javascript:void(0)' ><i class='fa fa-chevron-left'></i></a></li><li data-page='1' class='pagination-page '><a  href='javascript:void(0)' > 1 </a></li><li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li><li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li>".$output. "<li data-page='$pagination' class='pagination-page $active'><a  href='javascript:void(0)' > $pagination </a></li><li data-page='$next' class='pagination-page '><a  href='javascript:void(0)' ><i class='fa fa-chevron-right'></i></a></li>";
                    }
                    else{
                        $output="<li data-page='$prev' class='pagination-page '><a  href='javascript:void(0)' ><i class='fa fa-chevron-left'></i></a></li><li data-page='1' class='pagination-page'><a  href='javascript:void(0)' > 1 </a></li><li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li><li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li>";
                        $start=$current-floor($show_limit/2);

                        for($i=0; $i<$show_limit; $i++){

                            $cursor=intval($start+$i);
                            if($cursor==$last){
                                break;
                            }
                            $active = (intval($start+$i) == $current) ? 'active' : '';
                            $output.="<li data-page='$cursor' class='pagination-page $active'><a  href='javascript:void(0)' > $cursor </a></li>";
                        }
                        $output.="<li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li><li data-page='.' class='pagination-page'><a  href='javascript:void(0)' > . </a></li><li data-page='$pagination' class='pagination-page'><a  href='javascript:void(0)' > $pagination </a></li><li data-page='$next' class='pagination-page '><a  href='javascript:void(0)' ><i class='fa fa-chevron-right'></i></a></li>";
                    }
                }


                echo $output."\n";
            @endphp
        </ul>
    </div>
@else
    <div class="w-100 mx-auto">
        <h3 class="text-center">@lang('content.There is no any product')</h3>
    </div>
@endif
