<div id="back2top"><i class="icon icon-arrow-up"></i></div>
<div class="ps-site-overlay"></div>
<div id="loader-wrapper">
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
    <div class="ps-search__content">
        <form class="ps-form--primary-search" action="{{ route('search_product') }}" method="get" autocomplete="off">
            <input class="form-control search_form_item" type="text" name="wanted" value="{{ old('wanted') }}" placeholder="Axtardığınız hər şey burada">
            <button type="submit" value="1"><i class="aroma-magnifying-glass"></i></button>
            <div class="quick_search_form_result row m-0">
                <div class="w-100 loader text-center ">
                    <img style="max-height: 80px; height: 100%" src="{{ asset('assets/img/search_loader.gif') }}" />
                </div>
                
                <div class="col-12 search_results">
                    
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade p-0" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="row justify-content-center">
                    <img src="{{ asset('assets/img/reload.gif') }}" width="250"/>
                </div>
            </div>
        </div>
    </div>

    <div class="whatsapp-button">
        <a href="https://wa.me/{{ str_replace([' ', '+'], '', old('mobile', $website_info->mobile)) }}" target="_blank" class="wp-button-circle">
            <span class="text">Bizə yazın</span>
            <div class="img-button">
                <img src="{{ asset('assets/img/Whatsapp-Icon.jpg') }}" alt="" >
            </div>
        </a>
    </div>


<div class="ps-panel--sidebar" id="cart-mobile">
    <div class="ps-panel__header">
        <h3>Səbət</h3>
    </div>
    <div class="navigation__content">
        <div class="ps-cart--mobile">
            <div class="ps-cart__content">
                <div class="ps-cart__items">
                    @if (count(Cart::content()) > 0)
                        @foreach (Cart::content() as $productCartItem)
                            <div class="ps-product--cart-mobile">
                                <div class="ps-product__thumbnail"><a href="#"><img
                                            src="{{ $productCartItem->options->image ? asset('assets/img/products/' . $productCartItem->options->image) : asset('assets/img/logo.png') }}"
                                            alt=""></a></div>
                                <div class="ps-product__content">
                                    @php
                                        $color = '';
                                        if($productCartItem->options->color > 1){
                                            $colors = App\Models\Color::where('id', $productCartItem->options->color)->first();
                                            $color = $colors ? '<span style="background-color: ' . $colors->name .'">' . $colors->title . '</span>' : '';
                                        }
                                        $size = '';
                                        if($productCartItem->options->size > 0){
                                            $sizes = App\Models\Size::where('id', $productCartItem->options->size)->first();
                                            $size = $sizes ? $sizes->name : '';
                                        }
                                    @endphp
                                    <a href="{{ route('product', $productCartItem->options->slug) }}">{{ $productCartItem->name }} {!! $size . ' ' .$color !!}</a>

                                    <p><small>{{ $productCartItem->qty }} x {{ $productCartItem->price }} ₼</small>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        <div class="shopping-cart-btns">
                            <a href=class="main-btn btn-block text-center"></a>
                        </div>
                    @else
                        <h4 class="text-center">
                            Səbət boşdur
                        </h4>
                    @endif
                </div>
            </div>
            @if (count(Cart::content()) > 0)
                <div class="ps-cart__footer">
                    <h3>Ümumi: <strong>{{ Cart::total() }}₼</strong></h3>
                    <figure><a class="ps-btn btn-block text-center" href="{{ route('cart') }}">Səbətə bax</a></figure>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
        <h3>Categories</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            @foreach ($global_categories_sidemenu as $category)
                @if ($category->top_id == null)
                    <li class="menu-item-has-children has-mega-menu">
                        <a style="cursor: pointer" class="toggle-tag"><img class="icon-filter" style='width: 30px;' src='{{ $category->image->image_name ? asset('assets/img/category/'. $category->image->image_name) : asset('assets/img/category/product-category-icon.png') }}' alt='{{ $category->image->image_name }}'> {{ $category->category_name }} <span class="sub-toggle"></span></a>
                        <div class="mega-menu">
                            <div class="mega-menu__column">
                                <a href="{{ route('category', $category->slug) }}">
                                    <h4 style="font-size: 19px;">{{ $category->category_name }}</h4>
                                </a>
                                <ul class="pl-3">
                                    @foreach ($all_global_categories as $alt_category)
                                        @if ($alt_category->top_id == $category->id)
                                            <li>
                                                <a style="font-size: 17px;" href="{{ route('category', $alt_category->slug) }}">{{ $alt_category->category_name }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
<div class="navigation--list">
    <div class="navigation__content">
        <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile">
            <i class="icon-menu"></i>
            <span> Menyu</span>
        </a>
        <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile">
            <i class="icon-list4"></i>
            <span> Kateqoriyalar</span>
        </a>
        <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar">
            <i class="icon-magnifier"></i>
            <span>Axtar</span>
        </a>
        <a class="navigation__item ps-toggle--sidebar" href="#cart-mobile">
            <i class="icon-bag2"></i>
            <span> Səbət</span>
        </a>
    </div>
</div>


<div class="ps-panel--sidebar" id="search-sidebar">
    <div class="ps-panel__header">
        <form class="ps-form--search-mobile" action="{{ route('search_product') }}" method="get" autocomplete="off">
            <div class="form-group--nest">
                <input class="form-control search_form_item" type="text" name="wanted" value="{{ old('wanted') }}" placeholder="Axtardığınız hər şey burada">
                <button type="submit" value="1"><i class="icon-magnifier"></i></button>
            </div>
            <div class="quick_search_form_result row m-0">
                <div class="w-100 loader text-center ">
                    <img style="max-height: 80px; height: 100%" src="{{ asset('assets/img/search_loader.gif') }}" />
                </div>
                
                <div class="col-12 search_results">
                    
                </div>
            </div>
        </form>
    </div>
    <div class="navigation__content"></div>
</div>
<div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header">
        <h3>Menu</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            <li><a href="{{ route('home') }}">Ana Səhifə</a></li>
            <li><a href="{{ route('brands') }}">Brendlər</a></li>
            <li><a href="{{ route('deal_of_day') }}">Endirimlər</a></li>
            <li><a href="{{ route('best_selling') }}">Çox satılanlar</a></li>
            <li><a href="{{ route('last_view') }}">Son baxılanlar</a></li>
            <li><a href="{{ route('compare') }}">Müqayisə</a></li>
        </ul>
    </div>
</div>
