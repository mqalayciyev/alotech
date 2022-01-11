@extends('user.layouts.app')

@section('content')

    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Ana Səhifə</a></li>
                <li>Endirimli Məhsullar</li>
            </ul>
        </div>
    </div>


    <div class="ps-page--shop pt-5">
        <div class="ps-container">
            <div class="ps-layout--shop justify-content-center">
                <div class="ps-layout__right" style="max-width: 100%">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <h3 class="m-0">Endirimli Məhsullar</h3>
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
                        owlCarouselConfig()
                    }
                });
            };

        });
    </script>
@endsection
