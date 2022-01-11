@extends('user.layouts.app')
@section('title', $brand_name)
@section('content')

    <!-- BREADCRUMB -->
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                <li><a href="{{ route('brands') }}">Brendlər</a></li>
                <li class="active">{{ $brand_name }}</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->
    <div class="ps-page--shop pt-3">
        <div class="ps-container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">


                        <figure class="ps-custom-scrollbar filter-list" data-height="250">
                            <h4 class="widget-title">BREND</h4>
                            @foreach ($brands as $brand)
                                @for ($i = 0; $i < count($brands_count); $i++)
                                    @if ($brand->id === $brands_count[$i]['id'])
                                        <p><a href="{{ route('brand.product', $brand->slug) }}"
                                                id="{{ $brand->id }}">{{ $brand->name }} (
                                                {{ $brands_count[$i]['count'] }} )</a></p>
                                    @endif
                                @endfor
                            @endforeach
                        </figure>
                        <figure class="ps-custom-scrollbar filter-list" data-height="250">
                            <h4 class="widget-title pb-4">QİYMƏT ARALIĞI</h4>
                            <div id="price-slider"></div>
                        </figure>
                        @if (count($colors) > 0)
                            <figure id="by-color">
                                <h4 class="widget-title">@lang('content.Filter By Color')</h4>
                                @foreach ($colors as $color)
                                    <div class="ps-checkbox ps-checkbox--color ps-checkbox--inline">
                                        <label class="colors">
                                            <input type="radio" name="color" class="color_filter"
                                                data-id="{{ $color->id }}" value={{ $color->id }} />
                                            <p><span class="filter_color" data-id="{{ $color->id }}"
                                                    data-color="{{ $color->name }}"
                                                    style="background-color:  {{ $color->name }};"></span></p>
                                        </label>
                                    </div>
                                @endforeach
                            </figure>

                        @endif
                        @if (count($sizes) > 0)
                            <figure class="sizes">
                                <h4 class="widget-title">Ölçü</h4>
                                @foreach ($sizes as $size)
                                    <label style="font-size: 1.8rem; font-weight: 200;">
                                        <input type="radio" name="size" class="size_filter"
                                            data-id="{{ $size->id }}" value={{ $size->id }} />
                                        {{ $size->name }}
                                    </label>
                                @endforeach
                            </figure>
                        @endif

                        <figure>
                            <a href="{{ route('brand.product', $brand_slug) }}"
                                class="ps-btn ps-btn--black text-white">@lang('content.Clear All')</a>
                        </figure>
                    </aside>
                </div>
                <div class="ps-layout__right">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <div class="ps-shopping__actions justify-content-between w-100">
                                <div class=" sort-filter" style="margin: 0px;" role="group">
                                    <select class="ps-select">
                                        <option value="created_at">@lang('content.New')</option>
                                        <option value="sale_price">@lang('content.Price')</option>
                                    </select>
                                    <a href="javascript:void(0);" style="width: 18%; margin: 0px"
                                        class=" ps-btn-sm sort_btn" id="desc">
                                        <i class="fa fa-arrow-down"></i>
                                    </a>
                                </div>
                                <div class="d-xl-none" role="group">
                                    <a class="ps-btn-sm filter-show"><i class="fa fa-filter"></i> Filtr</a>
                                </div>
                            </div>
                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active products" id="tab-1">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        let filter_data = [];

        $(function() {


            $(document).on('click', '.sort_btn', function() {
                var brand_slug = '{{ $brand_slug }}';
                var sorting_name = $('.ps-select').val();
                var order = $(this).attr('id');
                var arrow = '';
                if (order == 'desc') {
                    arrow = '<i class="fa fa-arrow-up"></i>';
                    $('.sort_btn').attr('id', 'asc');
                    order = $(this).attr('id');
                } else {
                    arrow = '<i class="fa fa-arrow-down"></i>';
                    $('.sort_btn').attr('id', 'desc');
                    order = $(this).attr('id');
                }
                filter_data[0] = 'brand_sorting'
                filter_data[1] = sorting_name
                filter_data[2] = order
                products(1, '{{ $brand_slug }}', filter_data);
                $('.sort_btn').html(arrow);
            });

            $(document).on('change', '.select', function() {
                var brand_slug = '{{ $brand_slug }}';
                var sorting_name = $(this).val();
                var order = $('.sort_btn').attr('id');
                var arrow = '';
                if (order == 'desc') {
                    arrow = '<i class="fa fa-arrow-up"></i>';
                    $('.sort_btn').attr('id', 'asc');
                    order = $('.sort_btn').attr('id');
                } else {
                    arrow = '<i class="fa fa-arrow-down"></i>';
                    $('.sort_btn').attr('id', 'desc');
                    order = $('.sort_btn').attr('id');
                }
                filter_data[0] = 'brand_sorting'
                filter_data[1] = sorting_name
                filter_data[2] = order
                products(1, '{{ $brand_slug }}', filter_data);
                $('.sort_btn').html(arrow);
            });



            $(document).on('click', '.pagination-page', function() {
                let page = $(this).data('page')
                if (page != '.') {
                    products(page, '{{ $brand_slug }}', filter_data);
                }
            })


            products(1, '{{ $brand_slug }}', filter_data);

            function products(page, brand_slug, filter_data) {
                $.ajax({
                    url: '{{ route('brands.brands_products') }}',
                    method: 'GET',
                    data: {
                        brand_slug: brand_slug,
                        page: page,
                        filter_data: filter_data
                    },
                    success: function(data) {
                        $('.products').html(data).fadeIn('slow');
                        owlCarouselConfig()
                    }
                });
            };


            $(document).on('change', '.size_filter', function() {
                var id = $(this).val();
                var brand_slug = '{{ $brand_slug }}';
                filter_data[0] = 'size_filter'
                filter_data[1] = id
                products(1, '{{ $brand_slug }}', filter_data);
            });
            $(document).on('change', '.color_filter', function() {
                var id = $(this).val();
                var brand_slug = '{{ $brand_slug }}';
                filter_data[0] = 'color_filter'
                filter_data[1] = id
                products(1, '{{ $brand_slug }}', filter_data);
            });


            // PRICE SLIDER
            var slider = document.getElementById('price-slider');
            if (slider) {
                noUiSlider.create(slider, {
                    start: [0, 1000],
                    connect: true,
                    tooltips: [true, true],
                    format: {
                        to: function(value) {
                            return value.toFixed(2);
                        },
                        from: function(value) {
                            return value
                        },
                    },
                    range: {
                        'min': 0,
                        'max': 3000
                    }
                });


                document.getElementById('price-slider').addEventListener('click', function() {
                    var values = slider.noUiSlider.get();
                    var brand_slug = '{{ $brand_slug }}';
                    filter_data[0] = 'price_filter'
                    filter_data[1] = values
                    products(1, '{{ $brand_slug }}', filter_data);
                });

            }
        });
    </script>
@endsection
