<footer class="ps-footer ps-footer--3">
    <div class="container">
        <div class="ps-footer__widgets" style="padding-top: 70px">
            <aside class="widget widget_footer widget_contact-us">
                <h4 class="widget-title">Bizimlə əlaqə saxlayın</h4>
                <div class="widget_content">
                    <h3>{{ old('mobile', $website_info->mobile) }}</h3>
                    <p>{{ old('address', $website_info->address) }} <br>
                        <a
                            href="mailto:{{ old('email', $website_info->email) }}">{{ old('email', $website_info->email) }}</a>
                    </p>
                    <ul class="ps-list--social">
                        <li><a class="facebook" href="{{ old('facebook', $website_info->facebook) }}"><i
                                    class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="{{ old('twitter', $website_info->twitter) }}"><i
                                    class="fa fa-twitter"></i></a>
                        </li>
                        <li><a class="google-plus" href="{{ old('youtube', $website_info->youtube) }}"><i
                                    class="fa fa-youtube"></i></a></li>
                        <li><a class="instagram" href="{{ old('instagram', $website_info->instagram) }}"><i
                                    class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Şәxsi kabinet</h4>
                <ul class="ps-list--link">
                    <li><a href="{{ route('my_account') }}">Mənim Hesabım</a></li>
                    <li><a href="{{ route('my_wish_list') }}">Mənim istəklərim</a></li>
                    <li><a href="{{ route('compare') }}">Müqayisə</a></li>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Müştəri xidmətləri</h4>
                <ul class="ps-list--link">
                    <li><a href="{{ route('about') }}">Haqqımızda</a></li>
                    <li><a href="{{ route('contact') }}">Əlaqə</a></li>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Alıcıya kömәk</h4>
                <ul class="ps-list--link">
                    <li><a href="{{ route('privacy') }}">Məxfilik siyasəti</a></li>
                    <li><a href="{{ route('shipping_return') }}">Çatdırılma vә ödəniş</a></li>
                </ul>
            </aside>
        </div>
        <div class="ps-footer__copyright">
            <div class="col-12 px-0 pb-5 mb-5 p-xl-0 m-xl-0">
                <div class="row">
                    <div class="col-12 col-md-6 text-center text-md-left ">
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        @lang('footer.All rights reserved')
                        <br>
                        <span>Bu sayt</span> <a href="https://inova.az/"><img src="{{ asset('assets/img/inova.webp') }}"
                                target="_blank" style="width: 50px;" /></a> <span>E-Ticarət sistemləri ilə
                            hazırlanmışdır</span>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-right">
                        <div class="row">
                            <div class="col-12 col-md-7 col-lg-8 col-xl-9 text-md-right">
                                <span>Etibarlı Ödəniş üçün istifadə edirik:</span>
                            </div>
                            <div class="col-12 col-md-5 col-lg-4 col-xl-3">
                                <a><img src="{{ asset('assets/img/payment-method/1.jpg') }}" alt=""></a>
                                <a><img src="{{ asset('assets/img/payment-method/2.jpg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
