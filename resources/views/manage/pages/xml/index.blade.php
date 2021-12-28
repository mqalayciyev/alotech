@extends('manage.layouts.master')
@section('title','XML Import')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="pull-left">XML Import</h1>
        <div class="clearfix"></div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @include('common.errors.validate')
                @include('general.back.alert')
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('manage.xml_import.products') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="products">Məhsullar</label>
                                <input type="file" name="products" id="products" class="form-control"/>

                            </div>
                            <div class="form-group">
                                <input type="submit" name="button" class="btn btn-success" value="İmport"/>
                            </div>
                        </form>
                        <form action="{{ route('manage.xml_import.brands') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="brands">Brendlər</label>
                                <input type="file" name="brands" id="brands" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="button" class="btn btn-success" value="İmport"/>
                            </div>
                        </form>
                        <form action="{{ route('manage.xml_import.categories') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="categories">Kateqoriyalar</label>
                                <input type="file" name="categories" id="categories" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="button" class="btn btn-success" value="İmport"/>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
