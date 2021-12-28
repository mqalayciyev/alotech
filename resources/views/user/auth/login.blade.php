@extends('user.layouts.app')

@section('content')
<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Ana Səhifə</a></li>
                <li>Giriş</li>
            </ul>
        </div>
    </div>
    <div class="ps-my-account">
        <div class="container">
            <form class="ps-form--account ps-tab-root" method="POST" action="{{ route('user.authenticate') }}">
                @csrf
                

                <div class="ps-tabs">
                    <div class="ps-tab active" id="sign-in">
                        <div class="ps-form__content">
                            <h5>Hesabınıza Daxil Olun</h5>
                            @if(session()->has('message'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                   {{ session('message') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="E-poçt ünvanı">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-forgot">
                                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password"  name="password" autocomplete="current-password" placeholder="Şifrə">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="ps-checkbox">
                                            <input class="form-control" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember">Məni xatırla</label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('user.password.request.form') }}">Şifrəni unutmusan?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group submtit">
                                <button class="ps-btn ps-btn--fullwidth">Daxil Ol</button>
                            </div>
                            <div class="form-group submtit">
                                <p class="text-center">Hesabınız yoxdur? <a class="text-primary" href="{{ route('user.register') }}">Yeni hesab yaradın.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
