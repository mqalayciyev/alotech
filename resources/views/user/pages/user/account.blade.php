@extends('user.layouts.app')
@section('title', __('footer.My Account'))
@section('content')
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Ana
                                    Səhifə</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><i class="fas fa-chevron-right"></i>
                            </li>
                            @if (url()->current() == route('orders'))
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                        href="/account">@lang('footer.My Account')</a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><i
                                        class="fas fa-chevron-right"></i></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                    @lang('content.Orders')</li>
                            @else
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                    @lang('footer.My Account')</li>
                            @endif
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-12 pb-3">
                            <div class="row">
                                <div class="col-auto">
                                    <span style="font-size: 38px;">
                                        <i class="icon-user"></i>
                                    </span>
                                </div>
                                <div class="col-8">
                                    <h5><b>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</b></h5>
                                    <p class="m-0"><a href="javascript:void(0)">{{ auth()->user()->email }}</a></p>
                                    <p class="m-0">Bonus: {{ auth()->user()->bonus }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                                <!-- List -->
                                <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
                                    <li>
                                        <a class="dropdown-item {{ url()->current() == route('my_account') ? 'active' : '' }}"
                                            href="{{ route('my_account') }}">Hesab haqqında məlumat</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ url()->current() == route('orders') ? 'active' : '' }}"
                                            href="{{ route('orders') }}">Sifarişlər</a>
                                    </li>
                                    <li>
                                        <form method="post" id="logout" action="{{ route('logout') }}"> @csrf </form>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="$('#logout').submit()"> Çıxış
                                        </a>
                                    </li>
                                </ul>
                                <!-- End List -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    @yield('content.account')
                    @if (url()->current() == route('my_account'))
                        @include('user.pages.user.informations')
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
