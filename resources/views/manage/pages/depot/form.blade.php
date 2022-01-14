@extends('manage.layouts.master')
@section('title', __('admin.Customer Manager'))
@section('head')

@endsection
@section('content')
    <form action="{{ route('manage.depot.save', @$entry->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <section class="content-header">
            <h1 class="pull-left">Depo</h1>
            <div class="pull-right">
                @if($entry->id>0)
                    <a href="{{ route('manage.depot.new') }}"
                       class="btn btn-success"> Yeni Depo Əlavə et</a>
                    <button type="submit" class="btn btn-info"><i
                                class="fa fa-refresh"></i> @lang('admin.Update')</button>
                @else
                    <a href="{{ route('manage.depot') }}"
                       class="btn btn-default"> @lang('admin.Cancel')</a>
                    <button type="submit" class="btn btn-success"><i
                                class="fa fa-plus"></i> @lang('admin.Save')</button>
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
                                                    <label for="name">Ad</label>
                                                    <input type="text" class="form-control" id="name"
                                                           placeholder="Ad"
                                                           name="name"
                                                           value="{{ old('name', $entry->name) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address">Ünvan</label>
                                                    <input type="text" class="form-control" id="address"
                                                           placeholder="Ünvan"
                                                           name="address"
                                                           value="{{ old('address', $entry->address) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">@lang('admin.Mobile')</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="phone"
                                                               placeholder="@lang('admin.Mobile')"
                                                               name="phone"
                                                               value="{{ old('phone', $entry->phone) }}">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-mobile"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        <input type="checkbox" class="flat-red" name="default"
                                                               value="1" {{ old('default', $entry->default) ? 'checked' : null }}> Default təyin et
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            @if($entry->id>0)
                                <a href="{{ route('manage.depot.new') }}"
                                   class="btn btn-success"> Yeni Depo Əlavə et</a>
                                <button type="submit" class="btn btn-info"><i
                                            class="fa fa-refresh"></i> @lang('admin.Update')</button>
                            @else
                                <a href="{{ route('manage.depot') }}"
                                   class="btn btn-default"> @lang('admin.Cancel')</a>
                                <button type="submit" class="btn btn-success"><i
                                            class="fa fa-plus"></i> @lang('admin.Save')</button>
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

        $(function () {

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });

        });

    </script>
@endsection
