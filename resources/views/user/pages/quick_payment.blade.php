@extends('user.layouts.app')
@section('title', __('content.Payment'))

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="checkout-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                    href="{{ route('home') }}">@lang('content.Home')</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><i class="fas fa-chevron-right"></i>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                @lang('content.Payment')</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <form class="js-validate" novalidate="novalidate" action="{{ route('quickPay') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                        <div class="pl-lg-3 ">
                            <div class="bg-gray-1 rounded-lg">
                                <!-- Order Summary -->
                                <div class="p-4 mb-4 checkout-table">
                                    @php
                                        $total = Cart::total();
                                        $delivery = 0;
                                        $end = $total + $delivery;
                                    @endphp
                                    <!-- Title -->
                                    <div class="border-bottom border-color-1 mb-5">
                                        <h3 class="section-title mb-0 pb-2 font-size-25">Sifarişiniz</h3>
                                    </div>
                                    <!-- End Title -->
                                    <input type="hidden" class="total_amount" name="total_amount" value="{{ Cart::total() }}" />
                                    <input type="hidden" class="delivery_amount" name="delivery_amount" value="{{ $delivery }}" />


                                    <!-- Product Content -->
                                    <table class="table">
                                        <tfoot>
                                            <tr>
                                                <th>Ümumi məbləğ</th>
                                                <td><span
                                                        class="currency_azn total-amount">{{ number_format($total, 2) }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Çatdırılma məbləği</th>
                                                <td><span
                                                        class="currency_azn delivery-amount">{{ number_format($delivery, 2) }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Yekun məbləğ</th>
                                                <td><strong
                                                        class="currency_azn end-amount">{{ number_format($end, 2) }}</strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- End Product Content -->
                                    <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                                        <!-- Basics Accordion -->
                                        <div id="basicsAccordion1">
                                            <!-- Card -->
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingOne">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" value="1"
                                                            id="payment_method-door" name="payment_method" checked="">
                                                        <label class="custom-control-label form-label"
                                                            for="payment_method-door" data-toggle="collapse"
                                                            data-target="#basicsCollapseOnee" aria-expanded="true"
                                                            aria-controls="basicsCollapseOnee">
                                                            Çatdırıldıqda nağd ödə
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseOnee"
                                                    class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                    aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion1">
                                                    <div class="p-4">
                                                        {{ $website_info->payment_door }}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Card -->

                                            <!-- Card -->
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingTwo">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" value="2"
                                                            id="payment_method-bank" name="payment_method">
                                                        <label class="custom-control-label form-label"
                                                            for="payment_method-bank" data-toggle="collapse"
                                                            data-target="#basicsCollapseTwo" aria-expanded="false"
                                                            aria-controls="basicsCollapseTwo">
                                                            Bank Kartı Vasitəsilə
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseTwo"
                                                    class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                    aria-labelledby="basicsHeadingTwo" data-parent="#basicsAccordion1">
                                                    <div class="p-4">
                                                        <input type="hidden" name="installment_number" value="0" />
                                                        {{ $website_info->payment_door }}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Card -->



                                        </div>
                                        <div class="py-3">
                                            {{ $website_info->delivery }}
                                        </div>
                                        <!-- End Basics Accordion -->
                                    </div>
                                    <div class="form-group row align-items-center justify-content-between px-3 mb-5">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" name="call_me" id="call_me">
                                                <label class="form-check-label form-label" for="call_me">Menejerlə əlaqə saxlamaq isttəyirsiniz?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3">ÖDƏ</button>
                                </div>
                                <!-- End Order Summary -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 order-lg-1">
                        <div class="pb-7 mb-7">
                            <!-- Title -->
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title mb-0 pb-2 font-size-25">Faktura Məlumatları</h3>
                            </div>
                            <!-- End Title -->

                            <!-- Billing Form -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Ad
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="first_name" placeholder="Ad"
                                            value="{{ old('first_name') }}">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Soyad
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="last_name" placeholder="Soyad"
                                            value="{{ old('last_name') }}">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-12">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Email
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            value="{{ old('email') }}">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="w-100"></div>

                                <div class="col-md-12">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Ünvan
                                        </label>
                                        <input type="text" class="form-control" name="address" placeholder="Ünvan"
                                            value="{{ old('address') }}">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Şəhər
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="city" class="form-control" id="city">
                                            <option value="">Şəhər</option>
                                            @foreach ($city as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text"  name="city" placeholder="Şəhər" value="{{ old('city', $user_detail->city) }}"> --}}
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Poçt Kodu
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="zip_code" placeholder="AZ1000"
                                            value="{{ old('zip_code') }}">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="w-100"></div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Mobil <small>Whatsapp nömrənizi qeyd etməyiniz məsəhət görülür</small>
                                        </label>
                                        <input type="text" class="form-control" name="mobile"
                                            placeholder="+994 ** *** ** **"
                                            value="{{ old('mobile') }}">
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Telefon
                                        </label>
                                        <input type="text" class="form-control" name="phone"
                                            placeholder="+994 ** *** ** **"
                                            value="{{ old('phone') }}">
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <div class="w-100"></div>
                                <div class="col-12">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Çatdırılma Zamanı
                                        </label>
                                        <div class="row delivery-days-time">
                                                <div class="col-12 delivery-days-section">
                                                </div>
                                                <div class="col-12 delivery-time-section">
                                                </div>

                                        </div>
                                    </div>
                                    <!-- End Input -->
                                </div>


                            </div>
                            <!-- End Billing Form -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->


@endsection
@section('script')
    <script>

        function amount () {
            // let bonus_amount = parseFloat($(".bonus_amount").val())
            let total = parseFloat($(".total_amount").val());
            let delivery = parseFloat($(".delivery_amount").val());
            console.log(delivery)
            let amount = 0
            if ($("#with_bonus").prop('checked')) {
                amount = (total + delivery).toFixed(2)
                $(".end-amount").html(amount < 0 ? 0 : amount);
            } else {
                amount = (total + delivery).toFixed(2)
                $(".end-amount").html(amount < 0 ? 0 : amount);
            }
        }

        // $("#with_bonus").on('click', function() {
        //     amount()
        // });

        $("#city").on('change', function() {
            let city = $(this).val();
            $.ajax({
                url: "{{ route('payment.city') }}",
                type: "GET",
                data: {
                    city
                },
                success: function(data) {
                    $(".delivery-days-section").html(data.delivery_days)
                    $(".delivery-time-section").html(data.delivery_time)
                    $(".delivery_amount").val(data.delivery_amount)
                    $(".delivery-amount").html(data.delivery_amount)
                    amount()
                }
            })
        });
    </script>
@endsection
