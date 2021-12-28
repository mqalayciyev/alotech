@extends('user.layouts.app')
@section('title', __('footer.My Account'))
@section('content') 
<main class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                {!! url()->current() == route('orders') ? ' / <li"><a href="/account">' . __('footer.My Account').'</a></li><li class="active">'.__('content.Orders'). '</li>' : '<li class="active">'.__('footer.My Account').'</li>' !!}
                
            </ul>
        </div>
    </div>
    <section class="ps-section--account">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ps-section__left">
                        <aside class="ps-widget--account-dashboard">
                            <div class="ps-widget__header">
                                <span style="font-size: 38px;">
                                    <i class="icon-user"></i>
                                </span>
                                {{-- <img src="img/users/3.jpg" alt=""> --}}
                                <figure>
                                    <figcaption>Salam <b>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</b></figcaption>
                                    <p><a href="javascript:void(0)">{{ auth()->user()->email }}</a></p>
                                    <p>Bonus: {{ auth()->user()->bonus }}</p>
                                </figure>
                            </div>
                            <div class="ps-widget__content">
                                <ul>
                                    <li class="{{ url()->current() == route('my_account') ? 'active' : '' }}">
                                        <a href="{{ route('my_account') }}">
                                            Hesab haqqında məlumat
                                        </a>
                                    </li>
                                    <li class="{{ url()->current() == route('orders') ? 'active' : '' }}">
                                        <a
                                            href="{{ route('orders') }}">
                                            Sifarişlər
                                        </a>
                                    </li>
                                    <li class="sign_out">
                                        <form method="post" id="logout" action="{{ route('logout') }}"> @csrf </form>
                                        <a
                                            href="javascript:void(0)" onclick="$('#logout').submit()">
                                            Çıxış
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="ps-section__right" id="orders">
                        @yield('content.account')
                        @if (url()->current() == route('my_account'))
                            @include('user.pages.user.informations')
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
