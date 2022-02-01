@extends('user.layouts.app')


@section('content')

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Şifrəni
                                yenilə</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="container">
                <div class="my-4 my-xl-8">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-5 mb-8 mb-md-0">
                            <!-- Title -->
                            <div class="border-bottom border-color-1 mb-6">
                                <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Şifrəni yenilə</h3>
                            </div>
                            <!-- End Title -->
                            <form class="js-validate" method="POST" action="{{ route('user.password.request') }}">
                                @csrf
                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="email">Email<span
                                            class="text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Email"
                                        value="{{ old('email') }}" autocomplete="email" autofocus>
                                </div>
                                <!-- End Form Group -->

                                <!-- Button -->
                                <div class="mb-1">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary-dark-w px-5">Parol Sıfırlama Linkini
                                            Göndər</button>
                                    </div>
                                </div>
                                <!-- End Button -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
