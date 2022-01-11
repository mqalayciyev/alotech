<!-- JS Global Compulsory -->
<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('assets/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>

<!-- JS Implementing Plugins -->
<script src="{{ asset('assets/vendor/appear.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
<script src="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/slick-carousel/slick/slick.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('assets/js/toastr.min.js') }}" type="text/javascript"></script>

<!-- JS Electro -->
<script src="{{ asset('assets/js/hs.core.js') }}"></script>
<script src="{{ asset('assets/js/components/hs.countdown.js') }}"></script>
<script src="{{ asset('assets/js/components/hs.header.js') }}"></script>
<script src="{{ asset('assets/js/components/hs.hamburgers.js') }}"></script>
<script src="{{ asset('assets/js/components/hs.unfold.js') }}"></script>
<script src="{{ asset('assets/js/components/hs.focus-state.js') }}"></script>
<script src="{{ asset('assets/js/components/hs.malihu-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/components/hs.validation.js') }}"></script>
<script src="{{ asset('assets/js/components/hs.fancybox.js') }}"></script>
<script src="{{ asset('assets/js/components/hs.onscroll-animation.js') }}"></script>
<script src="{{ asset('assets/js/components/hs.slick-carousel.js') }}"></script>
<script src="{{ asset('assets/js/components/hs.show-animation.js') }}"></script>
<script src="{{ asset('assets/js/components/hs.go-to.js') }}"></script>
<script src="{{ asset('assets/js/components/hs.selectpicker.js') }}"></script>

<script>
    @if (Session::has('message'))

        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>

<!-- JS Plugins Init. -->
<script>
    $(window).on('load', function () {
        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            direction: 'horizontal',
            pageContainer: $('.container'),
            breakpoint: 767.98,
            hideTimeOut: 0
        });
    });

    $(document).on('ready', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#header'));

        // initialization of animation
        $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            afterOpen: function () {
                $(this).find('input[type="search"]').focus();
            }
        });

        // initialization of popups
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of countdowns
        var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
            yearsElSelector: '.js-cd-years',
            monthsElSelector: '.js-cd-months',
            daysElSelector: '.js-cd-days',
            hoursElSelector: '.js-cd-hours',
            minutesElSelector: '.js-cd-minutes',
            secondsElSelector: '.js-cd-seconds'
        });

        // initialization of malihu scrollbar
        $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

        // initialization of forms
        $.HSCore.components.HSFocusState.init();

        // initialization of form validation
        $.HSCore.components.HSValidation.init('.js-validate', {
            rules: {
                confirmPassword: {
                    equalTo: '#signupPassword'
                }
            }
        });

        // initialization of show animations
        $.HSCore.components.HSShowAnimation.init('.js-animation-link');

        // initialization of fancybox
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of hamburgers
        $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            beforeClose: function () {
                $('#hamburgerTrigger').removeClass('is-active');
            },
            afterClose: function() {
                $('#headerSidebarList .collapse.show').collapse('hide');
            }
        });

        $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
            e.preventDefault();

            var target = $(this).data('target');

            if($(this).attr('aria-expanded') === "true") {
                $(target).collapse('hide');
            } else {
                $(target).collapse('show');
            }
        });

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of select picker
        $.HSCore.components.HSSelectPicker.init('.js-select');
    });

    $(".top-category-item").hover(function(e){
        $(".top-category-item").each((index, element) => {
            $(element).find('.sub-menu').removeClass('show')
        })
        $(this).find('.sub-menu').addClass('show')
    })
    $(".menu-nav .category-menu-overlay").on('click', function(){
        $(".menu-nav .category-menu-overlay").removeClass('active')
        $(".menu-nav .category-menu-desktop").removeClass('active')
    })
    $("#sidebarHeaderInvokerMenu").on('click', function(){
        $(".menu-nav .category-menu-overlay").toggleClass('active')
        $(".menu-nav .category-menu-desktop").toggleClass('active')
    })
</script>


{{-- <script>
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
</script> --}}

@yield('script')
