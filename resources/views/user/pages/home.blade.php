@extends('user.layouts.app')

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- Slider & Banner Section -->
        <div class="mb-4">
            <div class="container overflow-hidden">
                <div class="row">
                    <!-- Slider -->
                    <div class="col-xl pr-xl-2 mb-4 mb-xl-0">
                        <div class="bg-img-hero mr-xl-1 height-410-xl max-width-1060-wd max-width-830-xl overflow-hidden">
                            <div class="js-slick-carousel u-slick" data-autoplay="false" data-speed="7000"
                                data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-start ml-9 mb-3 mb-md-5">
                                @foreach ($sliders as $slider)
                                    <div class="js-slide bg-img-hero-center"
                                        style="background-image: url({{ asset('assets/img/sliders/' . $slider->slider_image) }});">
                                        <div class="row height-410-xl py-7 py-md-0 mx-0 position-relative">
                                            <div class="bg-overlay" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background-color: rgba(0,0,0,0.2); z-index: 0;"></div>
                                            <div class="d-none d-wd-block offset-1"></div>
                                            <div class="col-xl col-6 col-md-6 mt-md-8" >
                                                <div data-scs-animation-in="fadeInDown">
                                                    {!! $slider->slider_name !!}
                                                </div>
                                                <div data-scs-animation-in="fadeInUp" data-scs-animation-delay="300">
                                                    <a href="{{ $slider->slider_slug }}"
                                                        class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16 {{ $slider->slider_slug ? '' : 'd-none' }}"
                                                        data-scs-animation-in="fadeInUp" data-scs-animation-delay="400">
                                                        İndi Al
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-6 d-flex align-items-center ml-auto ml-md-0 justify-content-end" data-scs-animation-in="zoomIn" data-scs-animation-delay="500">
                                                @if ($slider->slider_icon)
                                                <img class="img-fluid" src="{{ asset('assets/img/sliders/' . $slider->slider_icon) }}" alt="Image Description" style="max-width: 500px; max-height:380px;">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End Slider -->
                    <!-- Banner -->
                    <div class="col-xl-auto pl-xl-2 ">
                        <div class="overflow-hidden">
                            <ul
                                class="list-unstyled row flex-nowrap flex-xl-wrap overflow-auto overflow-lg-visble mx-n2 mx-xl-0 d-xl-block mb-0">

                                @foreach ($banner_top as $banner)
                                    <li class="px-2 px-xl-0 flex-shrink-0 flex-xl-shrink-1 mb-3">
                                        <a href="{{ $banner->banner_slug }}"
                                            class="min-height-126 max-width-320 py-1 py-xl-2 py-wd-1 banner-bg d-flex align-items-center text-gray-90">
                                            <div class="col col-lg-6 col-xl-5 col-wd-6 mb-3 mb-lg-0 pr-lg-0">
                                                <img class="img-fluid"
                                                    src="{{ asset('assets/img/banners/' . $banner->banner_image) }}"
                                                    alt="Image Description">
                                            </div>
                                            <div class="col col-lg-6 col-xl-7 col-wd-6 pr-xl-4 pr-wd-3">
                                                <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                                    {{ $banner->banner_name }}</div>
                                                <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                                    İndi Al
                                                    <span class="link__icon ml-1">
                                                        <span class="link__icon-inner">
                                                            <i class="fas fa-chevron-right"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- End Banner -->
                </div>
            </div>
        </div>
        <!-- End Slider & Banner Section -->
        <div class="container">
            <!-- Tab Prodcut Section -->
            <div class="mb-6">
                <!-- Nav Classic -->
                <div class="position-relative bg-white text-center z-index-2">
                    <ul class="nav nav-classic nav-tab justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active js-animation-link" id="pills-one-example1-tab" data-toggle="pill"
                                href="#pills-one-example1" role="tab" aria-controls="pills-one-example1"
                                aria-selected="true" data-target="#pills-one-example1" data-link-group="groups"
                                data-animation-in="slideInUp">
                                <div class="d-md-flex justify-content-md-center align-items-md-center">
                                    Ən çox satılanlar
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-animation-link" id="pills-two-example1-tab" data-toggle="pill"
                                href="#pills-two-example1" role="tab" aria-controls="pills-two-example1"
                                aria-selected="false" data-target="#pills-two-example1" data-link-group="groups"
                                data-animation-in="slideInUp">
                                <div class="d-md-flex justify-content-md-center align-items-md-center">
                                    Son məhsullar
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Classic -->
                <!-- Tab Content -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
                        aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                        <ul class="row list-unstyled products-group no-gutters products_best_selling">
                            <p class="mx-auto">
                                <img src="{{ asset('assets/img/reload.gif') }}" width="250" />
                            </p>
                        </ul>
                    </div>
                    <div class="tab-pane fade pt-2" id="pills-two-example1" role="tabpanel"
                        aria-labelledby="pills-two-example1-tab" data-target-group="groups">
                        <ul class="row list-unstyled products-group no-gutters products_latest">
                            <p class="mx-auto">
                                <img src="{{ asset('assets/img/reload.gif') }}" width="250" />
                            </p>
                        </ul>
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
            <!-- End Tab Prodcut Section -->
            <!-- Full banner -->
            <div class="mb-8">
                <a href="{{ $banner_center->banner_slug }}" class="d-block text-gray-90">
                    <div class="bg-img-hero pt-3"
                        style="background-image: url({{ asset('assets/img/banners/' . $banner_center->banner_image) }}); height: 150px;">
                    </div>
                </a>
            </div>
            <!-- End Full banner -->
        </div>
        <!-- Week Deals limited -->
        <div class="bg-gray-7 mb-6 py-7">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3 col-wd-2">
                        <div class="max-width-244">
                            <div class="d-flex border-bottom border-color-1 mb-3">
                                <h3 class="section-title mb-0 pb-2 font-size-22">Endirimli məhsullar</h3>
                            </div>
                            <div class="mb-3 mb-md-2 text-center text-md-left">
                                <h6 class="text-gray-2 mb-2">Təklifin müddəti:</h6>
                                <div class="js-countdown d-flex mx-n2 justify-content-center justify-content-md-start"
                                    data-end-date="{{ $discount_date }}" data-days-format="%D" data-hours-format="%H"
                                    data-minutes-format="%M" data-seconds-format="%S">
                                    <div class="text-lh-1 px-2 text-center">
                                        <div
                                            class="bg-white rounded-sm border border-width-2 border-primary py-2 px-2 min-width-46">
                                            <div class="text-gray-2 font-size-20 mb-2">
                                                <span class="js-cd-days"></span>
                                            </div>
                                            <div class="text-gray-2 font-size-8 text-center">GÜN</div>
                                        </div>
                                    </div>
                                    <div class="text-lh-1 px-2 text-center">
                                        <div
                                            class="bg-white rounded-sm border border-width-2 border-primary py-2 px-2 min-width-46">
                                            <div class="text-gray-2 font-size-20 mb-2">
                                                <span class="js-cd-hours"></span>
                                            </div>
                                            <div class="text-gray-2 font-size-8 text-center">SAAT</div>
                                        </div>
                                    </div>
                                    <div class="text-lh-1 px-2 text-center">
                                        <div
                                            class="bg-white rounded-sm border border-width-2 border-primary py-2 px-2 min-width-46">
                                            <div class="text-gray-2 font-size-20 mb-2">
                                                <span class="js-cd-minutes"></span>
                                            </div>
                                            <div class="text-gray-2 font-size-8 text-center">DƏQİQƏ</div>
                                        </div>
                                    </div>
                                    <div class="text-lh-1 px-2 text-center">
                                        <div
                                            class="bg-white rounded-sm border border-width-2 border-primary py-2 px-2 min-width-46">
                                            <div class="text-gray-2 font-size-20 mb-2">
                                                <span class="js-cd-seconds"></span>
                                            </div>
                                            <div class="text-gray-2 font-size-8 text-center">SANİYƏ</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-9 col-wd-10">
                        <div class="">
                            <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-5 pt-2 px-1 products_deal_of_day"
                                data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 pt-1 "
                                data-slides-show="5" data-slides-scroll="1" data-responsive='[{
                                                                  "breakpoint": 1400,
                                                                  "settings": {
                                                                    "slidesToShow": 4
                                                                  }
                                                                }, {
                                                                    "breakpoint": 1200,
                                                                    "settings": {
                                                                      "slidesToShow": 3
                                                                    }
                                                                }, {
                                                                  "breakpoint": 992,
                                                                  "settings": {
                                                                    "slidesToShow": 2
                                                                  }
                                                                }, {
                                                                  "breakpoint": 768,
                                                                  "settings": {
                                                                    "slidesToShow": 2
                                                                  }
                                                                }, {
                                                                  "breakpoint": 554,
                                                                  "settings": {
                                                                    "slidesToShow": 2
                                                                  }
                                                                }]'>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Categories this Week -->
        <div class="container">

            @foreach ($home_categories as $category)
                <div class="mb-6">
                    <div class="position-relative text-center z-index-2">
                        <div
                            class=" d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                            <h3 class="section-title mb-0 pb-2 font-size-22">{{ $category->category_name }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-2 pr-lg-2">
                            <div class="min-width-200 mt-xl-5">
                                <ul
                                    class="list-group list-group-flush flex-nowrap flex-xl-wrap flex-row flex-xl-column overflow-auto overflow-xl-visble mb-3 mb-xl-0">
                                    @foreach ($category->alt_category as $alt_category)
                                        <li
                                            class="border-color-1 list-group-item border-lg-down-0 flex-shrink-0 flex-xl-shrink-1">
                                            <a class="hover-on-bold py-1 px-3 text-gray-90 d-block"
                                                href="{{ route('category', $alt_category->slug) }}">{{ $alt_category->category_name }}</a>
                                        </li>
                                    @endforeach
                                    <li
                                        class="border-color-1 list-group-item border-lg-down-0 flex-shrink-0 flex-xl-shrink-1">
                                        <a class="hover-on-bold py-1 px-3 text-gray-90 d-block"
                                            href="{{ route('category', $category->slug) }}">Hammısı</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-xl-10">
                            <div id="{{ $category->slug }}" class="row alt_category">
                                <p class="mx-auto">
                                    <img src="{{ asset('assets/img/reload.gif') }}" width="250" />
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection


@section('script')
    <script>
        $(function() {


            products('products_deal_of_day');
            products('products_best_selling');
            products('products_latest');
            categoryProducts();

            function products(dynamic_product) {
                $.ajax({
                    url: '{{ route('homepage.products') }}',
                    method: 'GET',
                    data: {
                        product: dynamic_product
                    },
                    success: function(data) {
                        $('.' + dynamic_product).html(data);

                        if (dynamic_product == 'products_deal_of_day') {
                            $('.js-slick-carousel').slick('refresh');
                        }
                    }
                });
            };

            function categoryProducts() {
                $(".alt_category").each((index, item) => {
                    $.ajax({
                        url: '{{ route('homepage.category.products') }}',
                        method: 'GET',
                        data: {
                            category_slug: item.id
                        },
                        success: function(data) {
                            $('.alt_category#' + item.id).html(data);
                        }
                    });
                })

            };


        });
    </script>
@endsection
