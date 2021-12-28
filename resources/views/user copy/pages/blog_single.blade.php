@extends('user.layouts.app')
@section('title', $blog_title)
@section('content')
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                <li><a href="{{ route('blog') }}">Bloglar</a></li>
                <li class="active">{{$blog_title}}</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--blog">
        <div class="ps-post--detail">
            <div class="ps-post__header">
                <div class="container">
                    <h1>{{$blog_title}}</h1>
                    <p>{{$date}}</p>
                </div>
            </div>
            <div class="container">
                <div class="ps-post__carousel justify-content-center d-flex p-0">
                    <div class="col-12 col-md-8">
                        <img src="{{asset("img/blog/" . $blog_image)}}" alt="{{ $blog_image }}">
                    </div>
                </div>
                <div class="ps-post__content">
                    {!! $blog_content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
