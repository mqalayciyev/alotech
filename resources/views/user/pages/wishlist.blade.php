@extends('user.layouts.app')
@section('title', __('footer.My Wishlist'))
@section('head')
@endsection
@section('content')
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                <li class="active">@lang('footer.My Wishlist')</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--shop pt-3">
        <div class="ps-container">
            <div class="ps-layout--shop">
                <div class="ps-shopping ps-tab-root products">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {

            products();

            function products() {
                $.ajax({
                    url: '{{ route('view_my_wish_list') }}',
                    method: 'GET',
                    success: function(data) {
                        $('.products').html(data);
                        owlCarouselConfig()
                    }
                });
            };
            $(document).on('click', '.add-wish-list', function() {
                var id = $(this).attr("data-id");
                $.ajax({
                    url: '{{ route('remove_wish_list') }}',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 2000
                            })
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 3000
                            })
                        }
                        products();
                    }
                });
            })

        });
    </script>
@endsection
