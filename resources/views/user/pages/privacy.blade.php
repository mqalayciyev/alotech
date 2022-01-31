@extends('user.layouts.app')
@section('title', 'Məxfilik siyasəti')
@section('content')
    <main id="content" role="main">

        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">@lang('content.Home')</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><i class="fas fa-chevron-right"></i>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Məxfilik
                                siyasəti</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>

        <div class="container">
            {!! $privacy->privacy !!}
        </div>
    </main>
@endsection
