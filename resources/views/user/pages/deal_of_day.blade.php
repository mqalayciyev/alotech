@extends('user.layouts.app')

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
                                <li  class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">@lang('content.Home')</a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><i class="fas fa-chevron-right"></i></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Endirimli Məhsullar</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- End breadcrumb -->
                </div>
            </div>
            <!-- End breadcrumb -->
    
            <div class="container">
                <div class="row mb-8">
                    <div class="col-12 col-wd-9gdot5">
                        <!-- Shop-control-bar -->
                        <div class="bg-gray-1 flex-center-between borders-radius-9 py-2">
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
        $(function() {

            $(document).on('click', '.pagination-page', function() {
                let page = $(this).data('page')
                if (page != '.') {
                    products(page, 'deal_of_day');
                }
            })
            products(1, 'deal_of_day');

            function products(page, page_type) {
                $.ajax({
                    url: '{{ route('menu.products') }}',
                    method: 'GET',
                    data: {
                        page_type: page_type,
                        page: page,
                    },
                    success: function(data) {
                        $('.products').html(data).fadeIn('slow');
                    }
                });
            };

        });
    </script>
@endsection
