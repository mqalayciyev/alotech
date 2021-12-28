@extends('user.layouts.app')
@section('title', 'Bloglar')
@section('content')
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                <li class="active">Bloglar</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--blog">
        <div class="container">
            <div class="ps-page__header">
                <h1>Bizim Mətbuat</h1>
            </div>
            <div class="ps-blog">
                <div class="ps-blog__content">
                    <div class="row">
                        @if ($blogs)
                            @foreach ($blogs as $blog)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <div class="ps-post">
                                        <div class="ps-post__thumbnail"><a class="ps-post__overlay"
                                                href="{{ route('blog.single', $blog->slug) }}"></a><img src="{{asset('img/blog/' . $blog->blog_image)}}" alt="">
                                        </div>
                                        <div class="ps-post__content">
                                            <a class="ps-post__title" href="{{ route('blog.single', $blog->slug) }}">{{ $blog->blog_title }}</a>

                                            @php

                                                $d = explode(' ', $blog->created_at);
                                                $date = explode('-', $d[0]);
                                                $date = $date[2] . " " . $ay_arr[$date[1]-1] . " " . $date[0];
                                            @endphp
                                            <p>{{ $date }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    {{-- <div class="ps-pagination">
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
