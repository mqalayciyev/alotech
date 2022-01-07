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
                    <form class="ps-form--checkout" action="{{ route('pay') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  ">
                                <div class="ps-form__billing-info">
                                    <h3 class="ps-form__heading">@lang('content.Billing Details')</h3>
                                    <div class="form-group">
                                        <label>Ad<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" readonly name="first_name"
                                                placeholder="@lang('content.First Name')"
                                                value="{{ old('first_name', auth()->user()->first_name) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Soyad<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" readonly type="text" name="last_name"
                                                placeholder="@lang('content.Last Name')"
                                                value="{{ old('last_name', auth()->user()->last_name) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" readonly type="email" name="email"
                                                placeholder="@lang('content.Email')"
                                                value="{{ old('email', auth()->user()->email) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Telefon</label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="tel" name="phone"
                                                placeholder="@lang('content.Phone')"
                                                value="{{ old('phone', $user_detail->phone) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobil <sup>*</sup></label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="tel" name="mobile"
                                                placeholder="@lang('content.Mobile')"
                                                value="{{ old('mobile', auth()->user()->mobile) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Ünvan<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="address"
                                                placeholder="@lang('content.Address')"
                                                value="{{ old('address', $user_detail->address) }}">
                                        </div>
                                    </div>
                                    <!--<div class="form-group">-->
                                    <!--    <label>Ölkə<sup>*</sup>-->
                                    <!--    </label>-->
                                    <!--    <div class="form-group__content">-->
                                    <!--        <input class="form-control" type="text" type="text" name="country"-->
                                    <!--            placeholder="@lang('content.Country')"-->
                                    <!--            value="{{ old('country', $user_detail->country) }}">-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="form-group">
                                        <label>Şəhər<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="city"
                                                placeholder="@lang('content.City')"
                                                value="{{ old('city', $user_detail->city) }}">
                                        </div>
                                    </div>
                                    <!--<div class="form-group">-->
                                    <!--    <label>Poçt kodu</label>-->
                                    <!--    <div class="form-group__content">-->
                                    <!--        <input class="form-control" type="text" name="zip_code"-->
                                    <!--            placeholder="@lang('content.ZIP Code')"-->
                                    <!--            value="{{ old('zip_code', $user_detail->zip_code) }}">-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12  ">
                                <h4>Ödəmə Metodları</h4>
                                <div class="ps-block--payment-method">
                                    <input type="hidden" name="payment_method" value="1" id="paymentMethod">


                                    <ul class="ps-tab-list">
                                        <li class="active"><a class="ps-btn ps-btn--sm method" href="#shipping"
                                                data-method="1">Çatdırıldıqda nağd ödə</a></li>
                                        <li><a class="ps-btn ps-btn--sm method" href="#visa"
                                                data-method="2">Bank Kartı Vasitəsilə</a></li>
                                    </ul>
                                    <div class="ps-tabs">
                                        <input type="hidden" class="standart_delivery_amount" name="standart_delivery_amount" value="{{ number_format($website_info->standart_delivery_amount, 2) }}" />
                                        <input type="hidden" class="fast_delivery_amount" name="fast_delivery_amount" value="{{ number_format($website_info->fast_delivery_amount, 2) }}" />
                                        <input type="hidden" class="bonus_amount" name="bonus_amount" value="{{ number_format($website_info->bonus_amount * auth()->user()->bonus, 2) }}" />
                                        @php
                                        
                                        $total = Cart::total();
                                        $delivery = $method == 1 ? $website_info->standart_delivery_amount : $website_info->fast_delivery_amount;
                                        $end = $total + $delivery;
                                        @endphp
                                        <div class="row">
                                            <div class="col-6"><h4>Ümumi məbləğ: </h4></div>
                                            <div class="col-6"><h4 class="total-amount">{{ number_format($total, 2) }}</h4></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6"><h4>Çatdırılma məbləği: </h4></div>
                                            <div class="col-6"><h4 class="delivery-amount">{{ number_format($delivery, 2) }}</h4></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6"><h4>Yekun məbləğ: </h4></div>
                                            <div class="col-6"><h4 class="end-amount">{{ number_format($end, 2) }}</h4></div>
                                        </div>
                                        
                                        <label for="delivery_method-1">Çatdırılma forması</label>
                                        <select class="form-control delivery_method" name="delivery_method">
                                            <option value="1" {{ $method == 1 ? 'selected' : null }}>Standart</option>
                                            <option value="2" {{ $method == 2 ? 'selected' : null }}>Sürətli</option>
                                        </select>
                                        <br />
                                        <h4>
                                            1 bonus {{ $website_info->bonus_amount }} AZN təşkil edir
                                        </h4>
                                        <h4>
                                            Sizin bonuslarınız {{ auth()->user()->bonus }} bonus ( {{ number_format($website_info->bonus_amount * auth()->user()->bonus, 2) }} AZN )
                                        </h4>
                                        <h4>
                                            <div class="ps-checkbox">
                                                <input class="form-control" value="1" type="checkbox" id="with_bonus" name="with_bonus" />
                                                <label for="with_bonus">Bonuslardan istifadə etmək istəyirsiniz?</label>
                                            </div>
                                        </h4>
                                        <div class="ps-tab active" id="shipping">
                                            {{ old('payment_door', $website_info->payment_door) }}
                                        </div>
                                        <div class="ps-tab" id="visa">
                                            {{ old('payment_door', $website_info->payment_door) }}
                                            <input type="hidden" name="installment_number" value="0" />
                                            <!--<select name="installment_number" class="form-control">-->
                                            <!--    <option value="0">Taksitsiz</option>-->
                                            <!--    <option value="2">2</option>-->
                                            <!--    <option value="3">3</option>-->
                                            <!--    <option value="6">6</option>-->
                                            <!--    <option value="9">9</option>-->
                                            <!--    <option value="12">12</option>-->
                                            <!--</select>-->
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
        
        $(".delivery_method").on('change', function() {
            let standart_delivery_amount = parseFloat($(".standart_delivery_amount").val())
            let fast_delivery_amount = parseFloat($(".fast_delivery_amount").val())
            let total = parseFloat($(".total-amount").text());
            let end = parseFloat($(".end-amount").text());
            let delivery_method = parseFloat($(this).val());
            let bonus_amount = $("#with_bonus").prop('checked') ? parseFloat($(".bonus_amount").val()) : 0
            let amount = 0
            
            if(delivery_method == 1){
                amount = (total + standart_delivery_amount - bonus_amount).toFixed(2)
                $(".delivery-amount").html(standart_delivery_amount.toFixed(2));
                $(".end-amount").html(amount < 0 ? 0 : amount);
            }
            else if(delivery_method == 2){
                amount = (total + fast_delivery_amount - bonus_amount).toFixed(2)
                $(".delivery-amount").html(fast_delivery_amount.toFixed(2));
                $(".end-amount").html(amount < 0 ? 0 : amount);
            }
        });
        $("#with_bonus").on('click', function() {
            let bonus_amount = parseFloat($(".bonus_amount").val())
            // let fast_delivery_amount = parseInt($(".fast_delivery_amount").val())
            let total = parseFloat($(".total-amount").text());
            let end = parseFloat($(".end-amount").text());
            let delivery = parseFloat($(".delivery-amount").text());
            let amount = 0
            if($(this).prop('checked')){
                amount = (total + delivery - bonus_amount).toFixed(2)
                $(".end-amount").html(amount < 0 ? 0 : amount);
            }
            else{
                amount = (total + delivery).toFixed(2)
                $(".end-amount").html(amount < 0 ? 0 : amount);
            }
        });
    </script>
@endsection
