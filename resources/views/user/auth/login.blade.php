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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Ana Səhifə</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><i class="fas fa-chevron-right"></i>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Giriş</li>
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
                    <div class="col-md-8 col-lg-5 mb-8 mb-md-0">
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-6">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Giriş</h3>
                        </div>
                        <p class="text-gray-90 mb-4">Yenidən xoş gəlmisiniz! Hesabınıza daxil olun.</p>
                        <!-- End Title -->
                        <form class="js-validate" novalidate="novalidate" method="POST"
                            action="{{ route('user.authenticate') }}">
                            @csrf
                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrEmailExample3">Email<span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                    value="{{ old('email') }}" autocomplete="email" autofocus>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrPasswordExample2">Şifrə <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Şifrə"
                                    autocomplete="current-password">
                            </div>
                            <!-- End Form Group -->

                            <!-- Checkbox -->
                            <div class="js-form-message mb-3">
                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                                    <label class="custom-control-label form-label" for="remember">
                                        Məni Xatırla
                                    </label>
                                </div>
                            </div>
                            <!-- End Checkbox -->

                            <!-- Button -->
                            <div class="mb-1">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary-dark-w px-5">Giriş</button>
                                </div>
                                <div class="mb-2">
                                    <a class="text-blue" href="{{ route('user.password.request.form') }}">Şifrənizi
                                        unutmusunuz?</a>
                                </div>
                                <div class="mb-2">
                                    <span>Hesabınız yoxdur?</span> <a class="text-blue"
                                        href="{{ route('user.register') }}">Qeydiyyat</a>
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

@endsection
