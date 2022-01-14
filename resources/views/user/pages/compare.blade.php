@extends('user.layouts.app')
@section('title', __('footer.Compare'))
@section('head')
<style>
    .td-col {
        width: 200px;
        min-width: 200px;
    }
    .th-fixed{
        position: sticky;
        left: 0;
        z-index: 10;
    }
</style>
@endsection
@section('content')

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
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
                                @lang('footer.Compare')</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->
        <div class="container">
            @if (count($products ) > 0)
                <div class="table-responsive table-bordered table-compare-list mb-10 border-0">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="min-width-150 th-fixed">Məhsul</th>
                                @foreach ($products as $product)
                                    <td class="td-col">
                                        <a href="{{ route('product', $product->slug) }}" class="product d-block">
                                            <div class="product-compare-image">
                                                <div class="d-flex mb-3">
                                                    <img class="img-fluid mx-auto"
                                        src="{{ $product->image->image_name ? asset('assets/img/products/' . $product->image->image_name) : asset('assets/img/' . old('logo', $website_info->logo)) }}"
                                        alt="{{ $product->product_name }}">
                                                </div>
                                            </div>
                                            <h3 class="product-item__title text-blue font-weight-bold mb-3">{{ $product->product_name }}</h3>
                                        </a>
                                    </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th class="th-fixed">Qiymət</th>
                                @foreach ($products as $product)
                                    @php
                                        $price = [];
                                        foreach ($product->price as $object) {
                                            $price[] = $object->toArray();
                                        }

                                        // echo "<pre>";
                                        //     print_r($price);

                                        $filter = array_filter($price, function ($item) {
                                            if ($item['color_id'] > 1 && $item['size_id'] != null) {
                                                return true;
                                            }
                                        });
                                        if(count($filter) == 0){
                                            $filter = array_filter($price, function ($item) {
                                                if ($item['color_id'] > 1 || $item['size_id'] != null) {
                                                    return true;
                                                }
                                            });
                                        }
                                        if(count($filter) == 0){
                                            $filter = array_filter($price, function ($item) {
                                                if ($item['default_price'] == 1) {
                                                    return true;
                                                }
                                            });
                                        }

                                    @endphp
                                    <td class="td-col">
                                        @if (count($filter))
                                            @foreach ($filter as $item)
                                                @if ($item)
                                                    <ins class="font-size-20 text-red text-decoration-none product_amount currency_azn" data-price-id="{{ $item['id'] }}"
                                                    data-color="{{ $item['color_id'] }}"
                                                    data-size="{{ $item['size_id'] }}">{{ $item['sale_price'] }}</ins>
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif

                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th class="th-fixed">Endirimli qiymət</th>
                                @foreach ($products as $product)
                                    @php
                                        $price = [];
                                        foreach ($product->price as $object) {
                                            $price[] = $object->toArray();
                                        }

                                        // echo "<pre>";
                                        //     print_r($price);

                                        $filter = array_filter($price, function ($item) {
                                            if ($item['color_id'] > 1 && $item['size_id'] != null) {
                                                return true;
                                            }
                                        });
                                        if(count($filter) == 0){
                                            $filter = array_filter($price, function ($item) {
                                                if ($item['color_id'] > 1 || $item['size_id'] != null) {
                                                    return true;
                                                }
                                            });
                                        }
                                        if(count($filter) == 0){
                                            $filter = array_filter($price, function ($item) {
                                                if ($item['default_price'] == 1) {
                                                    return true;
                                                }
                                            });
                                        }

                                    @endphp
                                    <td class="td-col">
                                        @if (count($filter))
                                            @foreach ($filter as $item)
                                                @if ($item)
                                                    <ins class="font-size-20 text-red text-decoration-none product_amount_discount currency_azn" >{{ number_format($item['sale_price'] * ((100 - $product->discount) / 100), 2) }}</ins>
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th class="th-fixed">Endirim</th>
                                @foreach ($products as $product)
                                    @php
                                        $price = [];
                                        foreach ($product->price as $object) {
                                            $price[] = $object->toArray();
                                        }

                                        // echo "<pre>";
                                        //     print_r($price);

                                        $filter = array_filter($price, function ($item) {
                                            if ($item['color_id'] > 1 && $item['size_id'] != null) {
                                                return true;
                                            }
                                        });
                                        if(count($filter) == 0){
                                            $filter = array_filter($price, function ($item) {
                                                if ($item['color_id'] > 1 || $item['size_id'] != null) {
                                                    return true;
                                                }
                                            });
                                        }
                                        if(count($filter) == 0){
                                            $filter = array_filter($price, function ($item) {
                                                if ($item['default_price'] == 1) {
                                                    return true;
                                                }
                                            });
                                        }

                                    @endphp
                                    <td class="td-col">
                                        @if (count($filter))
                                            @foreach ($filter as $item)
                                                @if ($item)
                                                        @if ($product->discount)
                                                            <ins class="font-size-20 text-decoration-none product_amount_discount" >-{{ $product->discount }}%</ins>
                                                        @endif
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th class="th-fixed">Təsvir</th>
                                @foreach ($products as $product)
                                    <td class="td-col">
                                        {!! $product->description !!}
                                    </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th class="th-fixed">Səbətə at</th>

                                @foreach ($products as $product)
                                @php
                                        $price = [];
                                        foreach ($product->price as $object) {
                                            $price[] = $object->toArray();
                                        }

                                        // echo "<pre>";
                                        //     print_r($price);

                                        $filter = array_filter($price, function ($item) {
                                            if ($item['color_id'] > 1 && $item['size_id'] != null) {
                                                return true;
                                            }
                                        });
                                        if(count($filter) == 0){
                                            $filter = array_filter($price, function ($item) {
                                                if ($item['color_id'] > 1 || $item['size_id'] != null) {
                                                    return true;
                                                }
                                            });
                                        }
                                        if(count($filter) == 0){
                                            $filter = array_filter($price, function ($item) {
                                                if ($item['default_price'] == 1) {
                                                    return true;
                                                }
                                            });
                                        }

                                    @endphp
                                    @if (count($filter))
                                        @foreach ($filter as $item)
                                            @if ($item)
                                                        <td class="td-col">
                                                            <div class="">
                                                                <a href="javascript:void(0)" data-price-id="{{ $item['id'] }}" data-id="{{ $product->id }}" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5 add-to-cart">Səbətə at</a>
                                                            </div>
                                                        </td>
                                                    @break
                                            @endif

                                        @endforeach
                                    @endif

                                @endforeach
                            </tr>
                            <tr>
                                <th class="th-fixed">SKU</th>
                                @foreach ($products as $product)
                                    <td class="td-col">{{ $product->sku }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th class="th-fixed">Marka</th>
                                @foreach ($products as $product)
                                    <td class="td-col">{{ $product->brands[0]->name }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th class="th-fixed">Sil</th>
                                @foreach ($products as $product)

                                    <td class="text-center td-col">
                                        <a href="javascript:void(0)" class="text-gray-90 remove-compare" data-id="{{ $product->id }}"><i class="fa fa-times"></i></a>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>    
            @else
            <div class="py-3">
                <h3 class="text-center">Heç bir məhsul yoxdur</h3>
            </div>
            @endif
            
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->



@endsection
@section('script')
    <script>
        $(function() {

            $(document).on('click', '.remove-compare', function() {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: "{{ route('compare.remove_from_compare') }}",
                    type: "GET",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        window.location.reload()
                    }
                })
            })
        });
    </script>
@endsection
