@extends('manage.layouts.master')
@section('title', 'İstifadəçi Şərtləri')
@section('content')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <section class="content">
        <form action="{{ route('manage.terms.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="pull-left"><h3>İstifadəçi Şərtləri</h3></div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i> Yenilə</button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel panel-default">
                <textarea id="terms" name="terms" placeholder="Your text . . .">{{ old('terms', $terms->terms) }}</textarea>
            </div>
            <div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i> Yenilə</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </section>
@endsection

@section('footer')

@include('manage.layouts.partials.ckeditorService',['uploadUrl'=>route('ckeditorSliderUpload'),'editor'=>"terms"])


@endsection
