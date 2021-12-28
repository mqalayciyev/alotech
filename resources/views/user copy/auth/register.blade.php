@extends('user.layouts.app')

@section('content')
<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Ana Səhifə</a></li>
                <li>Qeydiyyat</li>
            </ul>
        </div>
    </div>
    <div class="ps-my-account">
        <div class="container">
            <form class="ps-form--account ps-tab-root" method="POST" action="{{ route('user.sign_up') }}">
                @csrf
                <div class="ps-tabs">
                    <div class="ps-tab active" id="register">
                        <div class="ps-form__content">
                            <h5>Yeni Hesab Yaradın</h5>
                            <div class="form-group">
                                <input id="first_name" class="form-control @error('first_name') is-invalid @enderror" type="text" placeholder="Ad" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="last_name" class="form-control @error('last_name') is-invalid @enderror" type="text" placeholder="Soyad" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <input id="mobile" class="form-control @error('mobile') is-invalid @enderror" type="text" placeholder="Mobil nömrə" name="mobile" value="{{ old('mobile') }}" autocomplete="mobile">
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="text" placeholder="E-poçt ünvanı" name="email" value="{{ old('email') }}" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Şifrə" name="password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Şifrənizi təsdiqləyin" autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <!--<div class="col-7 ">-->
                                    <!--    <div class="ps-checkbox  @error('terms') is-invalid @enderror">-->
                                    <!--        <input class="form-control " type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }} >-->
                                    <!--        <label for="terms" ><a href="javascript:void(0)"  data-toggle="modal" data-target="#termsModal">İstifadəçi şərtləri</a></label>-->
                                            
                                    <!--    </div>-->
                                    <!--    @error('terms')-->
                                    <!--        <span class="invalid-feedback" role="alert">-->
                                    <!--            <strong>{{ $message }}</strong>-->
                                    <!--        </span>-->
                                    <!--    @enderror-->
                                    <!--</div>-->
                                    <div class="col-5 text-left">
                                        <a  href="{{ route('user.login') }}">@lang('content.Sign in')</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group submtit">
                                <button class="ps-btn ps-btn--fullwidth">Qeydiyyat</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="termsModalLabel">İstifadəçi şərtləri</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ old('terms', $website_info->terms) }}
        </div>
      </div>
    </div>
  </div>
@endsection
