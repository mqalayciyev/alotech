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
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Ana Səhifə</a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><i class="fas fa-chevron-right"></i></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">404</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- End breadcrumb -->
                </div>
            </div>
            <!-- End breadcrumb -->

            <div class="container">
                <div class="mb-5 text-center pb-3 border-bottom border-color-1">
                    <img src="{{ asset('assets/img/404.png') }}" alt="">
                    <p class="text-gray-90 font-size-20 mb-0 font-weight-light">Axtardığınız səhifə tapılmadı</p>
                    <div class="py-3">
                        <a href="{{ route('home') }}" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5 add-to-cart">@lang('content.Go to Homepage')</a>
                    </div>
                </div>
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

@endsection
