@extends('user.layouts.app')
@section('title', __('footer.Compare'))
@section('head')
@endsection
@section('content')
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                <li class="active">@lang('footer.Compare')</li>
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
    
@endsection
@section('script')
    <script>
        $(function() {





            products();

            function products() {
                $('.products').html("<h3 class='text-center'>@lang('content.There is no any product')</h3>");
                $.ajax({
                    url: '{{ route('compare.view_compare') }}',
                    method: 'GET',
                    success: function(data) {
                        $('.products').html(data);
                        owlCarouselConfig()
                    }
                });
            };

            $(document).on('click', '.add-to-compare', function() {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: "{{ route('compare.remove_from_compare') }}",
                    type: "GET",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        // console.log(data)
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
                        $(".modal").hide();
                    }
                })
            })
        });
    </script>
@endsection
