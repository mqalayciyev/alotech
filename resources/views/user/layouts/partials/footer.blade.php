        <!-- ========== FOOTER ========== -->
        <footer>
            <!-- Footer-bottom-widgets -->
            <div class="pt-8 pb-4 bg-gray-13">
                <div class="container mt-1">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="mb-6">
                                <a href="#" class="d-inline-block">
                                    <img src="{{ asset('assets/img/' . $website_info->logo) }}" style="max-width: 200px;" alt="">
                                </a>
                            </div>
                            <div class="mb-4">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <i class="fas fa-headset text-primary font-size-56"></i>
                                    </div>
                                    <div class="col pl-3">
                                        <div class="font-size-13 font-weight-light">Bizimlə əlaqə saxlayın</div>
                                        <a href="tel:{{ old('mobile', $website_info->mobile) }}" class="font-size-20 text-gray-90">{{ old('mobile', $website_info->mobile) }}, </a><a href="tel:{{ old('phone', $website_info->phone) }}" class="font-size-20 text-gray-90">{{ old('phone', $website_info->phone) }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h6 class="mb-1 font-weight-bold">Ünvan</h6>
                                <address class="">
                                    {{ old('address', $website_info->address) }}
                                </address>
                            </div>
                            <div class="my-4 my-md-4">
                                <ul class="list-inline mb-0 opacity-7">
                                    <li class="list-inline-item mr-0 {{ $website_info->facebook ? '' : 'd-none' }}">
                                        <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="{{ old('facebook', $website_info->facebook) }}">
                                            <span class="fab fa-facebook-f btn-icon__inner"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item mr-0 {{ $website_info->instagram ? '' : 'd-none' }}">
                                        <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="{{ old('instagram', $website_info->instagram) }}">
                                            <span class="fab fa-instagram btn-icon__inner"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item mr-0 {{ $website_info->twitter ? '' : 'd-none' }}">
                                        <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="{{ old('twitter', $website_info->twitter) }}">
                                            <span class="fab fa-twitter btn-icon__inner"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item mr-0 {{ $website_info->youtube ? '' : 'd-none' }}">
                                        <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="{{ old('youtube', $website_info->youtube) }}">
                                            <span class="fab fa-youtube btn-icon__inner"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item mr-0 {{ $website_info->pinterest ? '' : 'd-none' }}">
                                        <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="{{ old('pinterest', $website_info->pinterest) }}">
                                            <span class="fab fa-pinterest btn-icon__inner"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-12 col-md mb-4 mb-md-0">
                                    {{-- <h6 class="mb-3 font-weight-bold">Şәxsi kabinet</h6> --}}
                                    <!-- List Group -->
                                    <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                        <li><a class="list-group-item list-group-item-action" href="{{ route('my_account') }}">Hesabım</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="{{ route('my_wish_list') }}">İstəklərim</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="{{ route('orders') }}">Sifarişlər</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="{{ route('compare') }}">Müqayisə</a></li>
                                    </ul>
                                    <!-- End List Group -->
                                </div>

                                <div class="col-12 col-md mb-4 mb-md-0">
                                    <!-- List Group -->
                                    <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                        <li><a class="list-group-item list-group-item-action" href="{{ route('company') }}">Kompaniyalar</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="{{ route('best_selling') }}">Ən çox satılanlar</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="{{ route('deal_of_day') }}">Endirimli məhsullar</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="{{ route('brands') }}">Brendlər</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="{{ route('last_view') }}">Son baxılanlar</a></li>


                                    </ul>
                                    <!-- End List Group -->
                                </div>

                                <div class="col-12 col-md mb-4 mb-md-0">
                                    {{-- <h6 class="mb-3 font-weight-bold">Müştəri xidmətləri</h6> --}}
                                    <!-- List Group -->
                                    <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                        <li><a class="list-group-item list-group-item-action" href="{{ route('about') }}">Haqqımızda</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="{{ route('contact') }}">Əlaqə</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="{{ route('privacy') }}">Məxfilik siyasəti</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="{{ route('shipping_return') }}">Çatdırılma vә ödəniş</a></li>
                                    </ul>
                                    <!-- End List Group -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer-bottom-widgets -->
            <!-- Footer-copy-right -->
            <div class="bg-gray-14 py-2">
                <div class="container">
                    <div class="flex-center-between d-block d-md-flex">
                        <div class="mb-3 mb-md-0">© <a href="#" class="font-weight-bold text-gray-90">Alotech</a> - Bütün hüquqlar qorunur
                        <p style="vertical-align: baseline">Bu sayt <a href="https://inova.az/"><img src="https://goycay-avm.az/assets/img/inova.webp" target="_blank" style="width: 50px;"></a> E-Ticarət tərəfindən ilə hazırlanmışdır</p></div>
                        <div class="text-md-right">
                            <span class="d-inline-block bg-white border rounded p-1">
                                <img class="max-width-5" src="{{ asset('assets/img/payment/img1.jpg') }}" alt="Image Description">
                            </span>
                            <span class="d-inline-block bg-white border rounded p-1">
                                <img class="max-width-5" src="{{ asset('assets/img/payment/img2.jpg') }}" alt="Image Description">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer-copy-right -->
        </footer>
        <!-- ========== END FOOTER ========== -->
