@extends('user.layouts.app')

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Ana
                                    Səhifə</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><i class="fas fa-chevron-right"></i>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Qeydiyyat
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="my-4 my-xl-8">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('message') }}
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-5">
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-6">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Qeydiyyat</h3>
                        </div>
                        <p class="text-gray-90 mb-4">Fərdi alış-veriş təcrübəsindən yararlanmaq üçün yeni hesab yaradın.</p>
                        <!-- End Title -->
                        <!-- Form Group -->
                        <form class="js-validate" novalidate="novalidate" method="POST"
                            action="{{ route('user.sign_up') }}">
                            @csrf
                            <div class="js-form-message form-group mb-5">
                                <label class="form-label" for="RegisterSrEmailExample3">Ad<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="first_name" placeholder="Ad"
                                    value="{{ old('first_name') }}" autocomplete="first_name" autofocus>
                            </div>
                            <div class="js-form-message form-group mb-5">
                                <label class="form-label" for="RegisterSrEmailExample3">Soyad<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="last_name" placeholder="Soyad"
                                    value="{{ old('last_name') }}" autocomplete="last_name">
                            </div>
                            <div class="js-form-message form-group mb-5">
                                <label class="form-label" for="RegisterSrEmailExample3">Mobil<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="mobile" placeholder="Mobil"
                                    value="{{ old('mobile') }}" autocomplete="mobile">
                            </div>
                            <div class="js-form-message form-group mb-5">
                                <label class="form-label" for="RegisterSrEmailExample3">Email<span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                    value="{{ old('email') }}" autocomplete="email">
                            </div>
                            <div class="js-form-message form-group mb-5">
                                <label class="form-label" for="RegisterSrEmailExample3">Şifrə<span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Şifrə"
                                    autocomplete="new-password">
                            </div>
                            <div class="js-form-message form-group mb-5">
                                <label class="form-label" for="RegisterSrEmailExample3">Şifrənizi təsdiqəyin<span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Şifrənizi təsdiqəyin" autocomplete="new-password">
                            </div>
                            <div class="js-form-message mb-3">
                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" name="terms" id="terms"
                                        {{ old('terms') ? 'checked' : '' }} data-error-class="u-has-error"
                                        data-success-class="u-has-success">
                                    <label class="custom-control-label form-label" for="terms">
                                        <a href="javascript:void(0)"  data-toggle="modal" data-target="#termsModal">İstifadəçi şərtləri</a>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-6">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary-dark-w px-5">Qeydiyyat</button>
                                </div>
                            </div>

                            <div class="mb-1">
                                <div class="mb-2">
                                    <a class="text-blue" href="{{ route('user.login') }}">Giriş</a>
                                </div>
                            </div>
                            <!-- End Button -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
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
                {!! $terms->terms !!}
            </div>
          </div>
        </div>
      </div>
@endsection
