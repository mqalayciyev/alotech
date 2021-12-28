<header class="header header--market-place-3" data-sticky="true">
    <div class="header__top shadow">
        <div class="container">
            <div class="header__left">
                <div class="menu--product-categories">
                    <div class="menu__toggle"><i class="fa fa-bars"></i><span> Kategoriyalar</span></div>
                    <div class="menu__content shadow">
                        <ul class="menu--dropdown">
                            @foreach ($global_categories_sidemenu as $category)
                                @if ($category->top_id == null)
                                    <li class="menu-item-has-children has-mega-menu">
                                        <a style="cursor: pointer">
                                            <img class="icon-filter" style='width: 20px;' src='{{ $category->image->image_name ? asset('assets/img/category/'. $category->image->image_name) : asset('assets/img/category/product-category-icon.png') }}' alt='{{ $category->image->image_name }}'>
                                            {{ $category->category_name }}
                                        </a>
                                        <div class="mega-menu">
                                            <div class="mega-menu__column">
                                                <a
                                                    href="{{ route('category', $category->slug) }}"><h4>{{ $category->category_name }}</h4></a>
                                                <ul class="mega-menu__list">
                                                    @foreach ($all_global_categories as $alt_category)
                                                        @if ($alt_category->top_id == $category->id)
                                                            <li>
                                                                <a href="{{ route('category', $alt_category->slug) }}">{{ $alt_category->category_name }}</a>
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
                <a class="ps-logo" href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/' . old('logo', $website_info->logo)) }}" alt="{{ $website_info->logo }}">

                    {{-- <h2 class="text-white">GoycayAVM</h2> --}}
                </a>
            </div>
            <div class="header__center">
                <form class="ps-form--quick-search " action="{{ route('search_product') }}" method="get" autocomplete="off">
                    <input class="form-control search_form_item" type="text" name="wanted" value="{{ old('wanted') }}" placeholder="Axtardığınız hər şey burada">
                    <button type="submit" value="1">Axtar</button>
                    <div class="quick_search_form_result row m-0">
                        <div class="w-100 loader text-center ">
                            <img style="max-height: 80px; height: 100%" src="{{ asset('assets/img/search_loader.gif') }}" />
                        </div>
                        
                        <div class="col-12 search_results">
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="header__right">
                <div class="header__actions">
                    <a class="header__extra" href="{{ route('my_wish_list') }}">
                        <i class="icon-heart"></i>
                        <span><i>{{ $wish_lists }}</i></span>
                    </a>
                    <div class="ps-cart--mini">
                        <a class="header__extra" href="javascript:void(0)">
                            <i class="icon-bag2"></i>
                            <span><i class="show_cartCount">{{ Cart::count() }}</i></span>
                        </a>
                        <div class="ps-cart__content">
                            <div class="ps-cart__items">
                                @if (count(Cart::content()) > 0)
                                    @foreach (Cart::content() as $productCartItem)
                                        <div class="ps-product--cart-mobile">
                                            <div class="ps-product__thumbnail">
                                                <a href="javascript:void(0)">
                                                    <img src="{{ $productCartItem->options->image ? asset('assets/img/products/' . $productCartItem->options->image) : asset('assets/img/logo.png') }}" alt="">
                                                </a>
                                            </div>
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

                                                <p>
                                                    <small>{{ $productCartItem->qty }} x {{ $productCartItem->price }} ₼</small>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h4 class="text-center">
                                        @lang('header.Empty, there is no product')
                                    </h4>
                                @endif
                            </div>
                            @if (count(Cart::content()) > 0)
                                <div class="ps-cart__footer">
                                    <h3>Ümumi: <strong>{{ Cart::total() }}₼</strong></h3>
                                    <figure>
                                        <a class="ps-btn btn-block text-center" href="{{ route('cart') }}">@lang('header.View Cart')</a>
                                    </figure>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="ps-block--user-header">
                        @auth
                        <div class="ps-block__left">
                            <a href="{{ route('my_account') }}"><i class="icon-user"></i></a>
                        </div>
                        @endauth

                        @guest
                            <div class="ps-block__left">
                                <i class="icon-user"></i>
                            </div>
                            <div class="ps-block__right">
                                <a href="{{ route('user.login') }}">Giriş</a>
                                <a href="{{ route('user.register') }}">Qeydiyyat</a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation shadow">
        <div class="container">
            <div class="navigation__left">
                <div class="menu--product-categories">
                    <div class="menu__toggle"><i class="fa fa-bars"></i> <a href="{{ route('categories')}}"><span> Kategoriyalar</span></a> </div>
                    {{-- <div class="menu__content shadow">
                        <ul class="menu--dropdown ">
                            @foreach ($global_categories_sidemenu as $category)
                                @if ($category->top_id == null)
                                    <li class="menu-item-has-children has-mega-menu">
                                        <a style="cursor: pointer;">
                                            <img class="icon-filter" style='width: 20px;' src='{{ $category->image->image_name ? asset('assets/img/category/'. $category->image->image_name) : asset('assets/img/category/product-category-icon.png') }}' alt='{{ $category->image->image_name }}'>
                                            {{ $category->category_name }}
                                        </a>
                                        <div class="mega-menu">
                                            <div class="mega-menu__column">
                                                <a
                                                    href="{{ route('category', $category->slug) }}"><h4>{{ $category->category_name }}<span class="sub-toggle"></span></h4></a>
                                                <ul class="mega-menu__list">
                                                    @foreach ($all_global_categories as $alt_category)
                                                        @if ($alt_category->top_id == $category->id)
                                                            <li>
                                                                <a href="{{ route('category', $alt_category->slug) }}">{{ $alt_category->category_name }}</a>
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
                    </div> --}}
                </div>
            </div>
            <div class="navigation__right">
                <ul class="navigation__extra">
                    <li><a href="{{ route('home') }}">Ana Səhifə</a></li>
                    <li><a href="{{ route('brands') }}">Brendlər</a></li>
                    <li><a href="{{ route('deal_of_day') }}">Endirimlər</a></li>
                    <li><a href="{{ route('best_selling') }}">Çox satılanlar</a></li>
                    <li><a href="{{ route('last_view') }}">Son baxılanlar</a></li>
                    <li><a href="{{ route('compare') }}">Müqayisə</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<header class="header header--mobile shadow" data-sticky="true">
    <div class="navigation--mobile">
        <div class="navigation__left">
            <a class="ps-logo" href="{{ route('home') }}">
                <img src="{{ asset('assets/img/' . old('logo', $website_info->logo)) }}" alt="{{ $website_info->logo }}" style="max-width: 200px">
            </a>
        </div>
        <div class="navigation__right">
            <div class="header__actions">

                <a class="header__extra" href="{{ route('my_wish_list') }}">
                    <i class="icon-heart"></i>
                    <span><i>{{ $wish_lists }}</i></span>
                </a>
                <a class="header__extra" href="{{ route('cart') }}"><i class="icon-bag2"></i><span><i class="show_cartCount">{{ Cart::count() }}</i></span></a>
                <div class="ps-block--user-header">
                    @auth
                        <div class="ps-block__left">
                            <a href="{{ route('my_account') }}"><i class="icon-user"></i></a>
                        </div>
                    @endauth
                    @guest
                        <div class="ps-block__left" onclick="$('.ps-block--user-header .ps-block__right').toggleClass('active')"><i class="icon-user"></i></div>
                        <div class="ps-block__right">
                            <a href="{{ route('user.login') }}">Giriş</a>
                            <a href="{{ route('user.register') }}">Qeydiyyat</a>
                        </div>
                    @endguest

                </div>
            </div>
        </div>
    </div>
    <div class="ps-search--mobile">
        {{-- <form class="" action="index.html" method="get">
            <div class="form-group--nest">
                <input class="form-control" type="text" placeholder="Search something...">
                <button><i class="icon-magnifier"></i></button>
            </div>
        </form> --}}
        <form class="ps-form--search-mobile" action="{{ route('search_product') }}" method="get" autocomplete="off">
            <div class="form-group--nest">
                <input class="form-control search_form_item" type="text" name="wanted" value="{{ old('wanted') }}" placeholder="Axtardığınız hər şey burada">
                <button type="submit" value="1"><i class="icon-magnifier"></i></button>
                <div class="quick_search_form_result row m-0">
                    <div class="w-100 loader text-center ">
                        <img style="max-height: 80px; height: 100%" src="{{ asset('assets/img/search_loader.gif') }}" />
                    </div>
                    
                    <div class="col-12 search_results">
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</header>
