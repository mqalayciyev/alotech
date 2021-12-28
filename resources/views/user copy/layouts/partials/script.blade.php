<script src="{{ asset('assets/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/plugins/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/plugins/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.matchHeight-min.js') }}"></script>
<script src="{{ asset('assets/plugins/slick/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('assets/plugins/slick-animation.min.js') }}"></script>
<script src="{{ asset('assets/plugins/lightGallery-master/dist/js/lightgallery-all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sticky-sidebar/dist/sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/plugins/gmap3.min.js') }}"></script>
<!-- custom scripts-->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2@10.js') }}"></script>


<script>
    $(function() {
        $(document).on('input', '.search_form_item', function() {
            let wanted = $(this).val();
            $(".quick_search_form_result .loader").addClass('active')
            $(".quick_search_form_result").css('display', 'flex')
            $(".quick_search_form_result .search_results").html('')
            if(wanted.length > 3){
                $.ajax({
                    url: '{{ route('quick_search_product') }}',
                    method: 'GET',
                    data: {
                        wanted: wanted
                    },
                    success: function(data) {
                        $(".quick_search_form_result .loader").removeClass('active')
                        $(".quick_search_form_result .search_results").html(data)
                    }
                });
            }
            else{
                $(".quick_search_form_result").css('display', 'none')
                $(".quick_search_form_result .loader").removeClass('active')
                $(".quick_search_form_result .search_results").html('')
            }
        })

        $(document).on('click', function(e) {
            if($(e.target).parents(".quick_search_form_result").length == 0){
                if(!$('.search_form_item').is(":focus")){
                    $(".quick_search_form_result").css('display', 'none')
                }
            }

            if($(e.target).parents(".ps-layout__left").length == 0 && !$(e.target).hasClass('filter-show')  && !$(e.target).hasClass('fa-filter')){
                $(".ps-layout__left").removeClass('active')
                $("body").removeClass('filter-active')
            }
        })
        $(document).on('click', '.filter-show', function(e) {
            $(".ps-layout__left").toggleClass('active')
            $("body").toggleClass('filter-active')

        })


    });
</script>

@yield('script')
