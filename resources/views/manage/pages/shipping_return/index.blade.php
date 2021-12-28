@extends('manage.layouts.master')
@section('title', 'Göndərmə və Qaytarma')
@section('head')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection
@section('content')
    <section class="content">
        <form action="{{ route('manage.shipping_return.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="pull-left"><h3>Göndərmə və Qaytarma</h3></div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i> Yenilə</button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel panel-default" >
                <textarea id="shipping_return" name="shipping_return" placeholder="Your text . . .">{{ old('shipping_return', $shipping_return->shipping_return) }}</textarea>
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
  <script>
        CKEDITOR.replace('shipping_return', {
            autoGrow_onStartup: true,
            enterMode: CKEDITOR.ENTER_BR,
            FullPage : false,
            // allowedContent: true,
            allowedContent : "p a div tr td img span font b u strong i [*]{*}(*)",
        });
    </script>
    
@endsection
