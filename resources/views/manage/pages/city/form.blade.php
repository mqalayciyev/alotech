@extends('manage.layouts.master')
@section('title', 'Şəhər İdarəetmə')
@section('head')

@endsection
@section('content')
    <form action="{{ route('manage.city.save', @$entry->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <section class="content-header">
            <h1 class="pull-left">Şəhər</h1>
            <div class="pull-right">
                @if ($entry->id > 0)
                    <a href="{{ route('manage.city.new') }}" class="btn btn-success"> Yeni Şəhər Əlavə et</a>
                    <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i> @lang('admin.Update')</button>
                @else
                    <a href="{{ route('manage.city') }}" class="btn btn-default"> @lang('admin.Cancel')</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> @lang('admin.Save')</button>
                @endif
            </div>
            <div class="clearfix"></div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body box-primary">
                        @include('common.errors.validate_admin')
                        @include('common.alert')
                        <div class="container">
                            <div class="jumbotron">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Şəhər adı</label>
                                                    <input type="text" class="form-control" id="name" placeholder="Bakı"
                                                        name="name" value="{{ old('name', $entry->name) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="delivery_amount">Çatdırılma məbləği AZN</label>
                                                    <input type="text" class="form-control" id="delivery_amount"
                                                        placeholder="5" name="delivery_amount"
                                                        value="{{ old('delivery_amount', $entry->delivery_amount) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="delivery_days">Çatdırılma gün aralığı</label>
                                                    <input type="text" class="form-control" id="delivery_days"
                                                        placeholder="3-4 və ya 3" name="delivery_days"
                                                        value="{{ old('delivery_days', $entry->delivery_days) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="button" id="timeButton" class="btn btn-success"><i
                                                            class="fa fa-plus"></i></button> vaxt aralığı əlavə et
                                                </div>
                                            </div>
                                        </div>

                                        <div id="timeSection">
                                            @if ($entry->id > 0)
                                            @foreach ($entry->delivery_time as $key => $item)
                                                <div class='row' id={{ "time_" . $key }}>
                                                    <div class='col-xs-10 col-md-6'>
                                                        <div class='form-group row'>
                                                            <div class='col-xs-6'>
                                                                <label >Başlanğıc </label>
                                                                <input type='time' class='form-control'name={{ "start_time[" . $key . "][time]" }} value="{{ $item['start'] }}">
                                                            </div>
                                                            <div class='col-xs-6'>
                                                                <label>Bitiş</label>
                                                                <input type='time' class='form-control' name={{ "end_time[" . $key . "][time]" }} value="{{ $item['end'] }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='col-xs-2'>
                                                        <button class='btn btn-danger' type='button' onclick='deleteElement("{{ "time_" . $key }}")'><i class='fa fa-trash'></i></button>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            @if ($entry->id > 0)
                                <a href="{{ route('manage.city.new') }}" class="btn btn-success"> Yeni Şəhər Əlavə et</a>
                                <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i>
                                    @lang('admin.Update')</button>
                            @else
                                <a href="{{ route('manage.city') }}" class="btn btn-default"> @lang('admin.Cancel')</a>
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>
                                    @lang('admin.Save')</button>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/i18n/az.js"></script>
    <script>
        function deleteElement(id) {
            console.log(id)
            $("div#" + id).remove();
        }
        $(function() {

            var newId = $("#timeSection .row").length / 2;
            console.log(newId)
            var timeButton = $("button#timeButton");
            var timeSection = $("div#timeSection");


            timeButton.click(function() {
                newId = newId + 1;
                var element = "<div class='row' id='time_"+newId.toString()+"'><div class='col-xs-10 col-md-6'><div class='form-group row'><div class='col-xs-6'><label >Başlanğıc</label><input type='time' class='form-control'name='start_time["+newId.toString()+"][time]'></div><div class='col-xs-6'><label>Bitiş</label><input type='time' class='form-control' name='end_time["+newId.toString()+"][time]' ></div></div></div><div class='col-xs-2'><button class='btn btn-danger' type='button' onclick='deleteElement(\"time_" + newId.toString() + "\")'><i class='fa fa-trash'></i></button></div></div>";
                timeSection.append(element);
            });



        });
    </script>
@endsection
