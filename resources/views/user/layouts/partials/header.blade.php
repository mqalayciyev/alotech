        <!-- ========== HEADER ========== -->
        <header id="header" class="u-header u-header-left-aligned-nav mb-4">
            <div class="u-header__section">
                <!-- Logo-Search-header-icons -->
                <div class="bg-primary">
                    <div class="container">
                        <div class="row min-height-64 align-items-center position-relative">
                            <!-- Logo-offcanvas-menu -->
                            <div class="col-auto">
                                <!-- Nav -->
                                <nav class="navbar navbar-expand u-header__navbar py-0 max-width-200 min-width-200">
                                    <!-- Logo -->
                                    <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center"
                                        href="{{ route('home') }}" aria-label="Electro">
                                        <img src="{{ asset('assets/img/' . $website_info->logo) }}" alt="">
                                    </a>
                                    <!-- End Logo -->

                                    <!-- Fullscreen Toggle Button -->
                                    <button id="sidebarHeaderInvokerMenu" type="button"
                                        class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0"
                                        aria-controls="sidebarHeader" aria-haspopup="true" aria-expanded="false"
                                        data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                        data-unfold-target="#sidebarHeader1" data-unfold-type="css-animation"
                                        data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                                        data-unfold-duration="500">
                                        <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                            <span class="u-hamburger__inner"></span>
                                        </span>
                                    </button>
                                    <!-- End Fullscreen Toggle Button -->
                                </nav>
                                <!-- End Nav -->

                                <!-- ========== HEADER SIDEBAR ========== -->
                                <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left"
                                    aria-labelledby="sidebarHeaderInvokerMenu">
                                    <div class="u-sidebar__scroller">
                                        <div class="u-sidebar__container">
                                            <div class="u-header-sidebar__footer-offset pb-0">
                                                <!-- Toggle Button -->
                                                <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-7">
                                                    <button type="button" class="close ml-auto"
                                                        aria-controls="sidebarHeader" aria-haspopup="true"
                                                        aria-expanded="false" data-unfold-event="click"
                                                        data-unfold-hide-on-scroll="false"
                                                        data-unfold-target="#sidebarHeader1"
                                                        data-unfold-type="css-animation"
                                                        data-unfold-animation-in="fadeInLeft"
                                                        data-unfold-animation-out="fadeOutLeft"
                                                        data-unfold-duration="500">
                                                        <span aria-hidden="true">
                                                            <i class="fas fa-times text-gray-90 font-size-20"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                                <!-- End Toggle Button -->

                                                <!-- Content -->
                                                <div class="js-scrollbar u-sidebar__body">
                                                    <div id="headerSidebarContent"
                                                        class="u-sidebar__content u-header-sidebar__content">
                                                        <!-- Logo -->
                                                        <a class="d-flex ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical"
                                                            href="{{ route('home') }}" aria-label="Electro">
                                                            <img src="{{ asset('assets/img/' . $website_info->logo) }}" alt="">
                                                        </a>
                                                        <!-- End Logo -->

                                                        <!-- List -->
                                                        <ul id="headerSidebarList" class="u-header-collapse__nav">
                                                            @foreach ($global_categories_sidemenu as $category)
                                                                @if ($category->top_id == null)
                                                                    <li
                                                                        class="u-has-submenu u-header-collapse__submenu">
                                                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                                                            href="javascript:;" role="button"
                                                                            data-toggle="collapse" aria-expanded="false"
                                                                            aria-controls="{{ $category->slug }}"
                                                                            data-target="#{{ $category->slug }}">
                                                                            {{ $category->category_name }}
                                                                        </a>
                                                                        <div id="{{ $category->slug }}"
                                                                            class="collapse pl-2"
                                                                            data-parent="#headerSidebarContent">
                                                                            <a href="{{ route('category', $category->slug) }}">
                                                                                <span class="u-header__sub-menu-title">{{ $category->category_name }}</span>
                                                                            </a>
                                                                            <ul class="u-header-collapse__nav-list">
                                                                                @foreach ($all_global_categories as $alt_category)
                                                                                    @if ($alt_category->top_id == $category->id)
                                                                                        <li>
                                                                                            <a class="u-header-collapse__submenu-nav-link"
                                                                                                href="{{ route('category', $alt_category->slug) }}">{{ $alt_category->category_name }}</a>
                                                                                        </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach

                                                        </ul>
                                                        <!-- End List -->
                                                    </div>
                                                </div>
                                                <!-- End Content -->
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <!-- ========== END HEADER SIDEBAR ========== -->
                            </div>
                            <!-- End Logo-offcanvas-menu -->
                            <!-- Search Bar -->
                            <div class="col d-none d-xl-block">
                                <form class="js-focus-state">
                                    <label class="sr-only" for="searchproduct">Axtar</label>
                                    <div class="input-group">
                                        <input type="email"
                                            class="form-control py-2 pl-5 font-size-15 border-right-0 height-42 border-width-0 rounded-left-pill border-primary"
                                            name="email" id="searchproduct-item" placeholder="Məhsulları axtar"
                                            aria-label="Məhsulları axtar" aria-describedby="searchProduct1" required="">
                                        <div class="input-group-append">
                                            <button class="btn btn-dark height-42 py-2 px-3 rounded-right-pill"
                                                type="button" id="searchProduct1">
                                                <i class="fas fa-search font-size-20"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Search Bar -->
                            <!-- Header Icons -->
                            <div class="col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                                <div class="d-inline-flex">
                                    <ul class="d-flex list-unstyled mb-0 align-items-center">
                                        <!-- Search -->
                                        <li class="col d-xl-none px-2 px-sm-3 position-static">
                                            <a id="searchClassicInvoker"
                                                class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary"
                                                href="javascript:;" role="button" data-toggle="tooltip"
                                                data-placement="top" title="Axtar" aria-controls="searchClassic"
                                                aria-haspopup="true" aria-expanded="false"
                                                data-unfold-target="#searchClassic" data-unfold-type="css-animation"
                                                data-unfold-duration="300" data-unfold-delay="300"
                                                data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp"
                                                data-unfold-animation-out="fadeOut">
                                                <i class="fas fa-search"></i>
                                            </a>

                                            <!-- Input -->
                                            <div id="searchClassic"
                                                class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2"
                                                aria-labelledby="searchClassicInvoker">
                                                <form class="js-focus-state input-group px-3">
                                                    <input class="form-control" type="search"
                                                        placeholder="Məhsulları axtar">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary px-3" type="button">
                                                            <i class="fas fa-search font-size-18"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- End Input -->
                                        </li>
                                        <!-- End Search -->
                                        {{-- <li class="col d-none d-xl-block">
                                            <a href="../shop/compare.html" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Müqayisə">
                                                <i class="font-size-22 fas fa-retweet"></i>
                                            </a>
                                        </li> --}}
                                        <li class="col d-block">
                                            <a href="{{ route('my_wish_list') }}" class="text-gray-90" data-toggle="tooltip"
                                                data-placement="top" title="Seçilmişlər">
                                                <i class="font-size-22 far fa-heart"></i>
                                            </a>
                                        </li>
                                        <li class="col d-block px-2 px-sm-3">
                                            <a href="{{ route('my_account') }}" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Hesabım">
                                                <i class="font-size-22 far fa-user"></i>
                                            </a>

                                        </li>
                                        <li class="col pr-xl-0 px-2 px-sm-3">
                                            <a href="{{ route('cart') }}" class="text-gray-90 position-relative d-flex "
                                                data-toggle="tooltip" data-placement="top" title="Səbət">
                                                <i class="font-size-22 icon-bag2"></i>
                                                <span class="width-22 height-22 bg-dark position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 text-white show_cartCount">{{ Cart::count() }}</span>
                                                <span class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3 show_cart_total">{{ Cart::total() > 0 ? Cart::total() . ' ₼' : '' }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Header Icons -->
                        </div>
                    </div>
                </div>
                <!-- End Logo-Search-header-icons -->

                <!-- Vertical-and-secondary-menu -->
                <div class="box-shadow-1 d-none d-xl-block">
                    <div class="container">
                        <div class="row">
                            <!-- Vertical Menu -->
                            <div class="col-md-auto d-none d-xl-block align-self-center">
                                <div class="max-width-200 min-width-200">
                                    <!-- Basics Accordion -->
                                    <div id="basicsAccordion">
                                        <!-- Card -->
                                        <div class="card border-0">
                                            <div class="card-header card-collapse btn-remove-bg-hover border-0"
                                                id="basicsHeadingOne">
                                                <button type="button"
                                                    class="btn-link btn-remove-bg-hover btn-block d-flex card-btn pyc-10 text-lh-1 pl-0 pr-4 shadow-none btn-primary bg-transparent rounded-top-lg border-0 font-weight-bold text-gray-90"
                                                    data-toggle="collapse" data-target="#basicsCollapseOne"
                                                    aria-expanded="true" aria-controls="basicsCollapseOne">
                                                    <span class="text-gray-90">Kateqoriyalar</span>
                                                    <span class="ml-2 text-gray-90">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </span>
                                                </button>
                                            </div>
                                            <div id="basicsCollapseOne" class="collapse vertical-menu v2"
                                                aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion">
                                                <div class="card-body p-0">
                                                    <nav
                                                        class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space hs-menu-initialized">
                                                        <div id="navBar"
                                                            class="collapse navbar-collapse u-header__navbar-collapse">
                                                            <ul
                                                                class="navbar-nav u-header__navbar-nav border-top-primary">
                                                                @foreach ($global_categories_sidemenu as $category)
                                                                    @if ($category->top_id == null)
                                                                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                                                            data-event="hover"
                                                                            data-animation-in="slideInUp"
                                                                            data-animation-out="fadeOut"
                                                                            data-position="left">
                                                                            <a id="basicMegaMenu"
                                                                                class="nav-link u-header__nav-link u-header__nav-link-toggle"
                                                                                href="javascript:;" aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                {{ $category->category_name }}
                                                                            </a>
                                                                            <div class="hs-mega-menu vmm-tfw u-header__sub-menu "
                                                                                aria-labelledby="basicMegaMenu"
                                                                                style="height: max-content">
                                                                                <div
                                                                                    class="row u-header__mega-menu-wrapper">
                                                                                    <div class="col mb-3 mb-sm-0">
                                                                                        <a
                                                                                            href="{{ route('category', $category->slug) }}">
                                                                                            <span
                                                                                                class="u-header__sub-menu-title">{{ $category->category_name }}</span>
                                                                                        </a>
                                                                                        <ul
                                                                                            class="u-header__sub-menu-nav-group mb-3">
                                                                                            @foreach ($all_global_categories as $alt_category)
                                                                                                @if ($alt_category->top_id == $category->id)
                                                                                                    <li>
                                                                                                        <a class="nav-link u-header__sub-menu-nav-link"
                                                                                                            href="{{ route('category', $alt_category->slug) }}">{{ $alt_category->category_name }}</a>
                                                                                                    </li>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>
                                    <!-- End Basics Accordion -->
                                </div>
                            </div>
                            <!-- End Vertical Menu -->
                            <!-- Secondary Menu -->
                            <div class="col secondary-menu">
                                <!-- Nav -->
                                <nav
                                    class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                                    <!-- Navigation -->
                                    <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                        <ul class="navbar-nav u-header__navbar-nav">
                                            <li class="nav-item u-header__nav-item">
                                                <a class="nav-link u-header__nav-link" href="{{ route('brands') }}" aria-haspopup="true"
                                                    aria-expanded="false" aria-labelledby="pagesSubMenu">Brendlər</a>
                                            </li>
                                            <li class="nav-item u-header__nav-item">
                                                <a class="nav-link u-header__nav-link" href="{{ route('compare') }}" aria-haspopup="true"
                                                    aria-expanded="false" aria-labelledby="pagesSubMenu">Müqayisə</a>
                                            </li>
                                            <!-- Endirimli Məhsullar -->
                                            <li class="nav-item u-header__nav-item">
                                                <a class="nav-link u-header__nav-link" href="{{ route('deal_of_day') }}" aria-haspopup="true"
                                                    aria-expanded="false" aria-labelledby="pagesSubMenu">Endirimli
                                                    məhsullar</a>
                                            </li>
                                            <!-- End Endirimli Məhsullar -->

                                            <!-- Ən çox satılanlar -->
                                            <li class="nav-item u-header__nav-item">
                                                <a class="nav-link u-header__nav-link" href="{{ route('best_selling') }}" aria-haspopup="true"
                                                    aria-expanded="false" aria-labelledby="blogSubMenu">Ən çox
                                                    satılanlar</a>
                                            </li>
                                            <!-- End Ən çox satılanlar -->

                                            <!-- Gift Cards -->
                                            <li class="nav-item u-header__nav-item">
                                                <a class="nav-link u-header__nav-link" href="{{ route('last_view') }}" aria-haspopup="true" aria-expanded="false">Son baxılanlar</a>
                                            </li>
                                            <!-- End Gift Cards -->

                                        </ul>
                                    </div>
                                    <!-- End Navigation -->
                                </nav>
                                <!-- End Nav -->
                            </div>
                            <!-- End Secondary Menu -->
                        </div>
                    </div>
                </div>
                <!-- End Vertical-and-secondary-menu -->
            </div>
        </header>
        <!-- ========== END HEADER ========== -->
