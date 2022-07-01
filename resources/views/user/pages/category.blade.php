@extends('user.layouts.app')
@section('title', $category->category_name)

@section('content')

    <aside id="sidebarCategory">
        <div class="sidebar-category-close bg-overlay"></div>

        <div class="d-block w-75 filter-content">
            <!-- Toggle Button -->
            <div class="d-flex align-items-center py-3 bg-white">
                <button type="button" class="close sidebar-category-close ml-auto">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
            <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                <!-- List -->
                <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
                    <li>

                        @if ($category->top_category->id)
                            <div
                                class="dropdown-current row align-items-center justify-content-between {{ $category->top_category->id == $current_id ? 'active' : null }}">
                                <a
                                    href="{{ route('category', $category->top_category->slug) }}">{{ $category->top_category->category_name }}</a>
                                <i class="fas fa-chevron-down hide-show"></i>
                            </div>
                            <ul class="list-unstyled dropdown-list">
                                <!-- Menu List -->
                                @foreach ($category->top_category->alt_category as $alt_category)
                                    <li><a class="dropdown-item {{ $alt_category->id == $current_id ? 'active' : null }}"
                                           href="{{ route('category', $alt_category->slug) }}">{{ $alt_category->category_name }}</a>
                                    </li>
                                    <ul class="list-unstyled dropdown-list">
                                        @foreach ($alt_category->alt_category as $child)
                                            <li><a class="dropdown-item {{ $child->id == $current_id ? 'active' : null }}"
                                                   href="{{ route('category', $child->slug) }}">{{ $child->category_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endforeach
                                <!-- End Menu List -->
                            </ul>
                        @else
                            <div
                                class="dropdown-current row align-items-center justify-content-between {{ $category->id == $current_id ? 'active' : null }}">
                                <a href="{{ route('category', $category->slug) }}">{{ $category->category_name }}</a>
                                <i class="fas fa-chevron-down hide-show"></i>
                            </div>
                            <ul class="list-unstyled dropdown-list">
                                <!-- Menu List -->
                                @foreach ($category->alt_category as $alt_category)
                                    <li><a class="dropdown-item {{ $alt_category->id == $current_id ? 'active' : null }}"
                                           href="{{ route('category', $alt_category->slug) }}">{{ $alt_category->category_name }}</a>
                                    </li>
                                    <ul class="list-unstyled dropdown-list">
                                        @foreach ($alt_category->alt_category as $child)
                                            <li><a class="dropdown-item {{ $child->id == $current_id ? 'active' : null }}"
                                                   href="{{ route('category', $child->slug) }}">{{ $child->category_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endforeach
                                <!-- End Menu List -->
                            </ul>
                        @endif


                    </li>
                </ul>
                <!-- End List -->
            </div>
            <div class="mb-6">
                <div class="border-bottom border-color-1 mb-5">
                    <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filtr</h3>
                </div>
                <div class="border-bottom pb-4 mb-4">
                    <h4 class="font-size-14 mb-3 font-weight-bold">Marka</h4>
                    <!-- Checkboxes -->
                    @foreach ($brands as $brand)
                        @for ($i = 0; $i < count($brands_count); $i++)
                            @if ($brand->id === $brands_count[$i]['id'])

                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input brands" name='brand'
                                            id="nav-brand-{{ $brand->id }}" value="{{ $brand->id }}">
                                        <label class="custom-control-label"
                                            for="nav-brand-{{ $brand->id }}">{{ $brand->name }}
                                            <span class="text-gray-25 font-size-12 font-weight-normal">
                                                ({{ $brands_count[$i]['count'] }})</span>
                                        </label>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    @endforeach
                    <!-- End Checkboxes -->
                </div>
                @if (count($colors->where('id', '!=', 1)) > 0)
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Rəng</h4>
                        <!-- Checkboxes -->
                        @foreach ($colors->where('id', '!=', 1) as $color)
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input colors" name="color"
                                        id="nav-color-{{ $color->id }}" value="{{ $color->id }}">
                                    <label class="custom-control-label"
                                        for="nav-color-{{ $color->id }}">{{ $color->title }}</label>
                                </div>
                            </div>
                        @endforeach
                        <!-- End Checkboxes -->
                    </div>
                @endif
                @if (count($sizes) > 0)
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Ölçü</h4>
                        <!-- Checkboxes -->
                        @foreach ($sizes as $size)
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input sizes" name="size"
                                        id="nav-size-{{ $size->id }}" value="{{ $size->id }}">
                                    <label class="custom-control-label" for="nav-size-{{ $size->id }}">{{ $size->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        <!-- End Checkboxes -->
                    </div>
                @endif
                <div class="range-slider">
                    <button type="button" class="btn px-4 btn-primary-dark-w py-2 rounded-lg filter-products">Filtr</button>
                    <a href="{{ url()->current() }}" class="btn px-4 btn-secondary py-2 rounded-lg">Təmizlə</a>
                </div>
            </div>
        </div>
    </aside>

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">

        <!-- BREADCRUMB -->
        <div class="ps-breadcrumb">
            <div class="ps-container">
                <ul class="breadcrumb">

                </ul>
            </div>
        </div>
        <!-- /BREADCRUMB -->

        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">@lang('content.Home')</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><i class="fas fa-chevron-right"></i>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                {{ $category->category_name }}</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="row mb-8">
                <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                    <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                        <!-- List -->
                        <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
                            <li>

                                @if ($category->top_category->id)
                                    <div
                                        class="dropdown-current row align-items-center justify-content-between {{ $category->top_category->id == $current_id ? 'active' : null }}">
                                        <a
                                            href="{{ route('category', $category->top_category->slug) }}">{{ $category->top_category->category_name }}</a>
                                        <i class="fas fa-chevron-down hide-show"></i>
                                    </div>
                                    <ul class="list-unstyled dropdown-list">
                                        <!-- Menu List -->
                                        @foreach ($category->top_category->alt_category as $alt_category)
                                                <li><a class="dropdown-item {{ $alt_category->id == $current_id ? 'active' : null }}"
                                                        href="{{ route('category', $alt_category->slug) }}">{{ $alt_category->category_name }}</a>
                                                </li>
                                                <ul class="list-unstyled dropdown-list">
                                                    @foreach ($alt_category->alt_category as $child)
                                                        <li><a class="dropdown-item {{ $child->id == $current_id ? 'active' : null }}"
                                                                href="{{ route('category', $child->slug) }}">{{ $child->category_name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                        @endforeach
                                        <!-- End Menu List -->
                                    </ul>
                                @else
                                    <div
                                        class="dropdown-current row align-items-center justify-content-between {{ $category->id == $current_id ? 'active' : null }}">
                                        <a
                                            href="{{ route('category', $category->slug) }}">{{ $category->category_name }}</a>
                                        <i class="fas fa-chevron-down hide-show"></i>
                                    </div>


                                    <ul class="list-unstyled dropdown-list">
                                        <!-- Menu List -->
                                        @foreach ($category->alt_category as $alt_category)
                                                <li><a class="dropdown-item {{ $alt_category->id == $current_id ? 'active' : null }}"
                                                        href="{{ route('category', $alt_category->slug) }}">{{ $alt_category->category_name }}</a>
                                                </li>
                                                <ul class="list-unstyled dropdown-list">
                                                    @foreach ($alt_category->alt_category as $child)
                                                        <li><a class="dropdown-item {{ $child->id == $current_id ? 'active' : null }}"
                                                                href="{{ route('category', $child->slug) }}">{{ $child->category_name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                        @endforeach
                                        <!-- End Menu List -->
                                    </ul>
                                @endif


                            </li>
                        </ul>
                        <!-- End List -->
                    </div>
                    <div class="mb-6">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filtr</h3>
                        </div>
                        <div class="border-bottom pb-4 mb-4">
                            <h4 class="font-size-14 mb-3 font-weight-bold">Marka</h4>


                            <!-- Checkboxes -->
                            @foreach ($brands as $brand)
                                @for ($i = 0; $i < count($brands_count); $i++)
                                    @if ($brand->id === $brands_count[$i]['id'])

                                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input brands" name='brand'
                                                    id="brand-{{ $brand->id }}" value="{{ $brand->id }}">
                                                <label class="custom-control-label"
                                                    for="brand-{{ $brand->id }}">{{ $brand->name }}
                                                    <span class="text-gray-25 font-size-12 font-weight-normal">
                                                        ({{ $brands_count[$i]['count'] }})</span>
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            @endforeach
                            <!-- End Checkboxes -->

                        </div>
                        @if (count($colors->where('id', '!=', 1)) > 0)
                            <div class="border-bottom pb-4 mb-4">
                                <h4 class="font-size-14 mb-3 font-weight-bold">Rəng</h4>

                                <!-- Checkboxes -->
                                @foreach ($colors->where('id', '!=', 1) as $color)
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input colors" name="color"
                                                id="color-{{ $color->id }}" value="{{ $color->id }}">
                                            <label class="custom-control-label"
                                                for="color-{{ $color->id }}">{{ $color->title }}</label>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- End Checkboxes -->
                            </div>
                        @endif
                        @if (count($sizes) > 0)
                            <div class="border-bottom pb-4 mb-4">
                                <h4 class="font-size-14 mb-3 font-weight-bold">Ölçü</h4>

                                <!-- Checkboxes -->
                                @foreach ($sizes as $size)
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input sizes" name="size"
                                                id="size-{{ $size->id }}" value="{{ $size->id }}">
                                            <label class="custom-control-label"
                                                for="size-{{ $size->id }}">{{ $size->name }} </label>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- End Checkboxes -->
                            </div>
                        @endif
                        <div class="range-slider">

                            <button type="button"
                                class="btn px-4 btn-primary-dark-w py-2 rounded-lg filter-products">Filtr</button>
                            <a href="{{ url()->current() }}" class="btn px-4 btn-secondary py-2 rounded-lg">Təmizlə</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-wd-9gdot5">
                    <!-- Shop-control-bar Title -->
                    <div class="d-block d-md-flex flex-center-between mb-3">
                        <h3 class="font-size-25 mb-2 mb-md-0">{{ $category->category_name }}</h3>
                    </div>
                    <!-- End shop-control-bar Title -->
                    <!-- Shop-control-bar -->
                    <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                        <div class="px-3 d-block">
                            <ul class="nav nav-tab-shop" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-two-example1-tab" data-toggle="pill"
                                        href="#pills-two-example1" role="tab" aria-controls="pills-two-example1"
                                        aria-selected="false">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            <i class="fa fa-align-justify"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-three-example1-tab" data-toggle="pill"
                                        href="#pills-three-example1" role="tab" aria-controls="pills-three-example1"
                                        aria-selected="true">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            <i class="fa fa-list"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>


                        <div class="d-flex">
                            <!-- Select -->
                            <select
                                class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                <option value="created_at" data-order="ASC">Yeni A-Z</option>
                                <option value="created_at" data-order="DESC">Yeni Z-A</option>
                                <option value="sale_price" data-order="ASC">Qiymət A-Z</option>
                                <option value="sale_price" data-order="DESC">Qiymət Z-A</option>
                            </select>
                            <!-- End Select -->
                        </div>
                        <div class="d-xl-none">
                            <!-- Account Sidebar Toggle Button -->
                            <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:void(0)"
                                role="button">
                                <i class="fas fa-sliders-h"></i> <span class="ml-1">Filtr</span>
                            </a>
                            <!-- End Account Sidebar Toggle Button -->
                        </div>
                    </div>
                    <!-- End Shop-control-bar -->
                    <!-- Shop Body -->
                    <div class="products">

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

@endsection



@section('script')
    <script>
        let filter_data = new Object();


        $(function() {

            $(document).on('click', '.pagination-page', function() {
                let page = $(this).data('page')
                if (page != '.') {
                    products(page, '{{ $slug_category_name }}', filter_data);
                }
            })


            products(1, '{{ $slug_category_name }}', filter_data);

            function products(page, category_name, filter_data) {
                $.ajax({
                    url: '{{ route('category.products') }}',
                    method: 'GET',
                    data: {
                        category_name: category_name,
                        page: page,
                        filter_data: filter_data
                    },
                    success: function(data) {
                        $('.products').html(data).fadeIn('slow');
                    }
                });
            };


            $(document).on('click', '.filter-products', function() {
                let brands = [];
                let colors = [];
                let sizes = [];
                $('.brands:checked').each(function() {
                    brands.push($(this).val());
                });
                $('.colors:checked').each(function() {
                    colors.push($(this).val());
                });
                $('.sizes:checked').each(function() {
                    sizes.push($(this).val());
                });
                filter_data['brands'] = brands
                filter_data['colors'] = colors
                filter_data['sizes'] = sizes

                products(1, '{{ $slug_category_name }}', filter_data);
            });

            $(document).on('change', '.selectpicker', function() {
                var category_name = '{{ $slug_category_name }}';
                var sorting_name = $(this).val();
                var order = $(this).find(":selected").attr('data-order');
                let sorting = new Object()
                sorting.sorting_name = sorting_name
                sorting.order = order

                filter_data['sorting'] = sorting
                products(1, '{{ $slug_category_name }}', filter_data);

            });


            $(document).on('click', function(event) {
                if (window.innerWidth < 992) {
                    if (!$(event.target).hasClass('open-filters')) {
                        if ($("#aside.filter-area").css("display") == 'block') {
                            $("#aside.filter-area").css("display", 'none')
                            $("body").css('overflow', 'auto')
                        }
                    }
                }

            })




            $(document).on('click', '#sidebarNavToggler1', function() {
                $("#sidebarCategory").addClass('active')
                $("body").css('overflow', 'hidden')
            })
            $(document).on('click', '.sidebar-category-close', function() {
                $("#sidebarCategory").removeClass('active')
                $("body").css('overflow', 'auto')
            })


            $(document).on('click', '.hide-show', function() {
                $(this).closest("#sidebarNav").find(".dropdown-list").toggleClass('d-none')
                if ($(this).closest("#sidebarNav").find(".dropdown-list").hasClass("d-none")) {
                    $(this).removeClass('fa-chevron-down')
                    $(this).addClass('fa-chevron-up')
                } else {
                    $(this).addClass('fa-chevron-down')
                    $(this).removeClass('fa-chevron-up')
                }
            })


        });
    </script>
@endsection
