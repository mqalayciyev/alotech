@extends('user.layouts.app')
@section('title', __('content.Payment'))

@section('content')
    <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('home') }}">@lang('content.Home')</a></li>
                    <li class="active">@lang('content.Payment')</li>
                </ul>
            </div>
        </div>

        <div class="ps-checkout ps-section--shopping">
            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><b>{{ $error }}</b></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="ps-section__content">
                    <form class="ps-form--checkout" action="{{ route('quick.pay') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  ">
                                <div class="ps-form__billing-info">
                                    <h3 class="ps-form__heading">@lang('content.Billing Details')</h3>
                                    <div class="form-group">
                                        <label>Ad<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="first_name"
                                                placeholder="@lang('content.First Name')"
                                                value="{{ old('first_name') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Soyad<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="last_name"
                                                placeholder="@lang('content.Last Name')"
                                                value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="email" name="email"
                                                placeholder="@lang('content.Email')"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Telefon</label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="tel" name="phone"
                                                placeholder="@lang('content.Phone')"
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobil <sup>*</sup></label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="tel" name="mobile"
                                                placeholder="@lang('content.Mobile')"
                                                value="{{ old('mobile') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Ünvan<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="address"
                                                placeholder="@lang('content.Address')"
                                                value="{{ old('address') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Ölkə<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" type="text" name="country"
                                                placeholder="@lang('content.Country')"
                                                value="{{ old('country') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Şəhər<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="city"
                                                placeholder="@lang('content.City')"
                                                value="{{ old('city') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Poçt kodu<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="zip_code"
                                                placeholder="@lang('content.ZIP Code')"
                                                value="{{ old('zip_code') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12  ">
                                <h4>Ödəmə Metodları</h4>
                                <div class="ps-block--payment-method">
                                    <input type="hidden" name="payment_method" value="1" id="paymentMethod">


                                    <ul class="ps-tab-list">
                                        <li class="active"><a class="ps-btn ps-btn--sm method" href="#shipping"
                                                data-method="1">Çatdırıldıqda nağd ödə</a></li>
                                        {{-- <li><a class="ps-btn ps-btn--sm method" href="#visa"
                                                data-method="2">@lang('content.Direct Bank Transfer')</a></li> --}}
                                    </ul>
                                    <div class="ps-tabs">
                                        <div class="ps-tab active" id="shipping">

                                            {{ old('delivery', $website_info->delivery) }}
                                        </div>
                                        <div class="ps-tab" id="visa">
                                            <p>Ödənişi Bank kartı vasitəsilə tamamlayın</p>
                                            <select name="installment_number" class="form-control">
                                                <option value="0">Taksitsiz</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="6">6</option>
                                                <option value="9">9</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group submit">
                                        <div class="col-12 pt-3">
                                            <button type="submit" value="1" class="ps-btn ps-btn--fullwidth">ÖDƏ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(".ps-tab-list").on('click', '.method', function() {
            $("#paymentMethod").val($(this).data('method'));
        });
    </script>
@endsection
