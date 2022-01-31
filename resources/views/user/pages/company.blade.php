@extends('user.layouts.app')
@section('title', 'Kompaniyalar')
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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Kompaniyalar</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>

        <div class="container">
            <div class="row">
                @if (count($companies) > 0)
                    @foreach ($companies as $array => $company)
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 py-3" >
                            <div class="ps-brand" style="cursor: pointer;">
                                <div class="ps-product__thumbnail text-center">
                                    <a href="{{ $company->slug }}">
                                        {!! $company->image ? "<img style='width: 100%; height: auto' src='" . asset('assets/img/company/' . $company->image) . "'>" : "<img style='width: 100%;' src='" . asset('assets/img/logo.png') . "'>" !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="w-100 text-center">
                        <h3 class="text-center">Heç bir komaniya yoxdur</h3>
                    </div>
                @endif

            </div>
            <div class="row justify-content-center">
                {{ $companies->links() }}
            </div>
        </div>
        <br>
        <!-- End breadcrumb -->
    </main>

@endsection
