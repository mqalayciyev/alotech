@extends('manage.layouts.master')
@section('title', __('admin.Product Manager'))
@section('head')
    <link rel="stylesheet" href="{{ asset('manager/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <style>
        .panel{
            margin-top: 25px;
        }
        .images{
            margin: 5px;
            width: max-content;
            border: 1px solid silver;
            padding: 5px;
            border-radius: 5px;
            position: relative;
            float: left;
        }
        .images > img{
            height: 100px;
            width: 100px;
        }
        .images > span{
            font-size: 20px;
            font-weight: bold;
            position: absolute;
            left: -6px;
            top: -13px;
            cursor: pointer;
        }
        .mt-3{
            margin-top: 1rem;
        }
        .images:hover::before{
            content: " ";
            width: 110px;
            height: 110px;
            border-radius: 5px;
            position: absolute;
            top: 0px;
            left: 0px;
            background-color: white;
            opacity: 0.7;
        }
        .cover{
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 110px;
            height: 25px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            background-color: silver;
            text-align: center;
            padding: 5px;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
        #change-color .colors{
            border: 2px solid transparent;
            padding: 0px;
            width: 38px;
            height: 38px;
            border-radius: 100%;
            margin: 0px;
            display: flex;
            justify-content: center;
            transition: 0.4s;
        }
        #change-color .colors:hover{
            border: 2px solid #00A2E8!important;
            padding: 0px;
            width: 38px;
            height: 38px;
            border-radius: 100%;
            margin: 0px;
            display: flex;
            justify-content: center;
        }
        #change-color .colors span{
            align-self: center;
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
        }

    </style>
@endsection


@section('content')
    <div class="modal" id="category_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="category_form">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">@lang('admin.Add New Category')</h4>
                    </div>
                    <div class="modal-body">
                        <span class="form_output"></span>
                        <div class="form-group">
                            <label for="top_id">@lang('admin.Top Category')</label>
                            <select name="top_id" id="top_id" class="form-control">
                                <option value="">@lang('admin.Parent Category')</option>
                                @foreach($categories->where('top_id', 'null') as $category)
                                    <option style="color:#000;"
                                            value="{{ $category->id }}" {{ $entry_category->top_category->id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}</option>

                                    @foreach ($category->alt_category as $alt_category)
                                        <option value="{{ $alt_category->id }}"
                                            {{ $entry_category->top_category->id == $alt_category->id ? 'selected' : '' }}>
                                            - - {{ $alt_category->category_name }}</option>

                                        @foreach ($alt_category->alt_category as $child)
                                            <option value="{{ $child->id }}"
                                                {{ $entry_category->top_category->id == $child->id ? 'selected' : '' }}>
                                                - - - - {{ $child->category_name }}</option>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_name">@lang('admin.Category Name')</label> <br>
                            <input type="text" name="category_name" class="form-control category_name"
                                   id="category_name" placeholder="@lang('admin.Category Name')">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="button_action" id="button_action"
                               value="insert"/>
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">@lang('admin.Close')</button>
                        <input type="submit" name="submit"  id="action"
                               class="btn btn-success add_category"
                               value="@lang('admin.Save Category')"/>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="form_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="form" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">@lang('admin.Add New Brand')</h4>
                    </div>
                    <div class="modal-body">
                        <span class="form_output"></span>
                        <div class="form-group">
                            <label for="name">@lang('admin.Brand Name')</label> <br>
                            <input type="text" name="name" class="form-control name"
                                   id="name" placeholder="@lang('admin.Brand Name')"
                                   value="{{ old('name') }}">
                            <input type="hidden" name="slug" value="">
                            <input type="hidden" name="id" value="" id="id">
                        </div>
                        <div class="form-group">
                            <label for="description">@lang('admin.Description')</label>
                            <br>
                            <textarea class="form-control" name="description" rows="5"
                                      id="description"
                                      placeholder="@lang('admin.Description')">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="button_action" id="button_action" value="insert"/>
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">@lang('admin.Close')</button>
                        <input type="submit" name="submit"  id="action"
                               class="btn btn-success add_brand"
                               value="@lang('admin.Save Brand')"/>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="PriceList" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="price_form">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modalLabel">Dig??r qiym??t d??yi????nl??ri</h4>
                    </div>
                    <div class="modal-body">
                        <span class="form_output"></span>
                        <div class="form-group">
                            <select class="form-control" name="color" id="form_color_id">
                                @foreach ($entry->colors as $color)
                                    <option value="{{ $color->id }}" style="background-color: {{ $color->name }}">{{ $color->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="size" id="form_size_id">
                                <option value="">??l???? se??</option>
                                @foreach ($entry->sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input placeholder="Sat???? Qiym??ti" class="form-control" name="sale_price" id="form_sale_price"/>
                        </div>
                        <div class="form-group">
                            <input placeholder="Topdan sat???? miqdar??" class="form-control" name="wholesale_count" id="form_wholesale_count"/>
                        </div>
                        <div class="form-group">
                            <input placeholder="Topdan sat???? qiym??ti" class="form-control" name="wholesale_price" id="form_wholesale_price"/>
                        </div>
                        <div class="form-group">
                            <input placeholder="Stok say??" class="form-control" name="stock_piece" id="form_stock_piece"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="0">
                        <input type="hidden" name="product_id" value="{{ @$entry->id }}">

                        {{-- <input type="hidden" name="button_action" id="price_button_action" value="insert"/> --}}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">L????v et</button>
                        <button type="submit" class="btn btn-success">Saxla</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <form id="product-form" action="{{ route('manage.product.save', @$entry->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <section class="content-header">
            <h1 class="pull-left">@lang('admin.Product')</h1>
            <div class="pull-right">
                @if($entry->id>0)
                    <a href="{{ route('manage.product.new') }}"
                       class="btn btn-success"> @lang('admin.Add New Product')</a>
                    <button type="submit"  class="btn btn-info"><i
                                class="fa fa-refresh"></i> @lang('admin.Update')</button>
                @else
                    <a href="{{ route('manage.product') }}"
                       class="btn btn-default"> @lang('admin.Cancel')</a>
                    <button type="submit"  class="btn btn-success"><i
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
                        @if($entry->id>0)
                            @if (count($entry->price) == 0)
                                <div class="alert alert-danger">M??hsulun qiym??t v?? stok parametrl??ri se??ilm??yib</div>
                            @endif
                        @endif

                        <div class="container">

                            <div class="jumbotron">

                                <div class="row">
                                    <div class="col-md-4">
                                        <h3>@lang('admin.General')</h3>
                                        <span>@lang('admin.Change general information for this product.')</span>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="product_name">@lang('admin.Product Name')</label>
                                                    <input type="text" class="form-control" id="product_name"
                                                           placeholder="@lang('admin.Product Name')"
                                                           name="product_name"
                                                           value="{{ old('product_name', $entry->product_name) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="slug">@lang('admin.Slug')</label>
                                                    <input type="text" class="form-control" id="slug"
                                                           placeholder="@lang('admin.Slug')"
                                                           readonly
                                                           name="slug"
                                                           value="{{ old('slug', $entry->slug) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="product_description">@lang('admin.Description')</label>
                                                    <textarea class="form-control product_description" id="product_description"
                                                              placeholder="@lang('admin.Description')"
                                                              name="product_description">{{ old('product_description', $entry->product_description) }}</textarea>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="meta-view" class="panel panel-default" style="border-radius: 0px;">
                                            <div class="panel-body">
                                                <p class="title" style="margin: 0; color: blue;"></p>
                                                <p class="url" style="word-wrap: break-word; color: green; font-size: 15px; font-weight: 200; margin: 0;">
                                                    {{ env('APP_URL') . 'product/' . $entry->slug }}
                                                </p>
                                                <small class="description"></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="meta-description">Seo description</label>
                                                    <input type="text" id="meta-description" name="meta_description" placeholder="M??hsulun t??sviri q??sa m??tn." class="form-control" value="{{ old('meta_title', $entry->meta_description) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="meta-title">Seo keywords</label>
                                                    <input type="text" id="meta-title" name="meta_title" placeholder="m??hsul, m??hsul-a????qlama, keywords, product, m??hsul ad??," class="form-control" value="{{ old('meta_title', $entry->meta_title) }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="categories">@lang('admin.Categories')</label>
                                                    <select name="categories" id="categories"
                                                            class="form-control select2"
                                                            data-placeholder="@lang('admin.Select category')"
                                                            style="width: 100%;">
                                                        <option></option>
                                                        @foreach($categories->where('top_id', null) as $category)
                                                            <option class="text text-primary"
                                                                    value="{{ $category->id }}" {{ collect(old('categories', $product_categories))->contains($category->id) ? 'selected' : '' }}>{{ $category->category_name }}</option>

                                                            @foreach ($category->alt_category as $alt_category)

                                                                <option value="{{ $alt_category->id }}"
                                                                    {{ collect(old('categories', $product_categories))->contains($alt_category->id) ? 'selected' : '' }}>
                                                                    - - {{ $alt_category->category_name }}</option>
                                                                @foreach ($alt_category->alt_category as $child)
                                                                    <option value="{{ $child->id }}"
                                                                        {{ collect(old('categories', $product_categories))->contains($child->id) ? 'selected' : '' }}>
                                                                        - - - - {{ $child->category_name }}</option>
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="brand">@lang('admin.Brand')</label>
                                                    <select class="form-control select2" style="width: 100%;"
                                                            id="brand"
                                                            name="brand"
                                                            data-placeholder="@lang('admin.Choose a brand')">
                                                        <option></option>
                                                        @foreach($brands as $brand)
                                                            <option value="{{ old('brand',$brand->name) }}" {{ collect(old('brand', $product_brands))->contains($brand->id) ? 'selected' : '' }}>{{ old('brand',$brand->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">

                                                    <p><i class="fa fa-info-circle text-info"></i> T??vsiyy?? edil??n ????kil ??l????s?? 1000x943</p>
                                                    <label for="product_images">@lang('admin.Upload Images')</label><br>
                                                    <small>@lang('admin.Drag to rearrange. Drop an image outside of the upload area to delete.')</small>
                                                    <input type="file" id="product_images" name="product_images[]"
                                                           multiple="true">
                                                    <hr>
                                                    <table id="index_table" class="table table-bordered table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>????kil</th>
                                                                <th>R??ng</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3>??l???? v?? SKU</h3>
                                        <span>Se??diyiniz m??hsulun ??l???? vahidi v?? SKU artikulu</span>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="measurement">??l???? formas??</label>
                                                    <input type="text" placeholder="??l???? formas??" name="measurement" id="measurement" class="form-control" value="{{ old('measurement', $entry->detail ? $entry->detail->measurement : '') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sku">SKU</label>
                                                    <input type="text" placeholder="SKU" name="sku" id="sku" class="form-control" value="{{ old('sku', $entry->sku) }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3>@lang('admin.Price & Loyalty')</h3>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label style="padding: 7px 0 0 0" for="discount"
                                                           class="col-md-6 text-left">@lang('admin.Discount')</label>
                                                    <div class="input-group col-md-6 text-right">
                                                        <input type="text" class="form-control text-right numeric"
                                                               id="discount"
                                                               name="discount"
                                                               value="{{ old('discount', $entry->discount) }}"
                                                               placeholder="0.00">
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label style="padding: 7px 0 0 0" for="discount_date" class="col-md-6 text-left">Endirimin Son tarixi</label>
                                                    <div class="input-group col-md-6">
                                                        <input type="datetime-local" class="form-control"
                                                               id="discount_date"
                                                               name="discount_date"
                                                               value="{{ old('discount_date', $entry->discount_date) ? date('Y-m-d\TH:i', strtotime(old('discount_date', $entry->discount_date))) : '' }}"
                                                               >
                                                               <span class="input-group-addon"><i class="fa fa-times" onclick="document.getElementById('discount_date').value = null"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>

                                        @if($entry->id>0)

                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <button type="button" class="btn btn-primary add_price" data-toggle="modal" data-target="#PriceList">Qiym??tl??r</button>
                                                </div>
                                                <hr />
                                                <div class="col-xs-12">
                                                    <table class="table table-bordered table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Sat???? qiym??ti</th>
                                                                <th>Stok say??</th>
                                                                <th>Topdan sat???? miqdar??</th>
                                                                <th>Topdan sat???? qiym??ti</th>
                                                                <th>R??ngi</th>
                                                                <th>??l????s??</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($entry->price as $price)
                                                                @if ($price->default_price == 0)
                                                                    <tr>
                                                                        <td>{{ $price->sale_price }}</td>
                                                                        <td>{{ $price->stock_piece }}</td>
                                                                        <td>{{ $price->wholesale_count }}</td>
                                                                        <td>{{ $price->wholesale_price }}</td>
                                                                        <td><span style="background-color: {{ $price->color ? $price->color->name : '' }}">{{ $price->color ? $price->color->name : '' }}</span></td>
                                                                        <td>{{ $price->size ? $price->size->name : '' }}</td>
                                                                        <td class="text-right">
                                                                            <button type="button" class="btn btn-sm btn-primary edit_price" data-toggle="modal" data-target="#PriceList" data-id="{{ $price->id }}"><i class="fa fa-edit"></i></button>
                                                                            <button type="button" class="btn btn-sm btn-danger delete_price" data-id="{{ $price->id }}"> <i class="fa fa-remove"></i></b>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        @endif
                                        <hr>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3>Bonuslar v?? endirim tarixi</h3>
                                        {{-- <span>@lang('admin.The type of product we choose determines how we manage inventory and reporting.')</span> --}}
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="one_or_more">1 v?? ya daha ??ox m??hsul ??????n</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control text-right numeric"
                                                               id="one_or_more"
                                                               name="one_or_more"
                                                               placeholder="0 bonus"
                                                               value="{{ old('one_or_more', $entry->one_or_more) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="other_count">{x} v?? ya daha ??ox m??hsul</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control text-right numeric"
                                                               id="other_count"
                                                               name="other_count"
                                                               placeholder="0 v?? ya daha ??ox m??hsul"
                                                               value="{{ old('other_count', $entry->other_count) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="other_bonus">{x} v?? ya daha ??ox m??hsul ??????n bonus</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control text-right numeric"
                                                               id="other_bonus"
                                                               name="other_bonus"
                                                               value="{{ old('other_bonus', $entry->other_bonus) }}"
                                                               placeholder="0 v?? ya daha ??ox m??hsul ??????n bonus">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bonus_comment" title="1 ????rh ??????n veril??n bonus say??">????rh</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control numeric"
                                                               id="bonus_comment"
                                                               name="bonus_comment"
                                                               title="1 ????rh ??????n veril??n bonus say??"
                                                               placeholder="0 bonus"
                                                               value="{{ old('bonus_comment', $entry->bonus_comment) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="size">@lang('admin.Size')</label>
                                                    <select class="form-control size" id="size" name="size[]"
                                                            data-placeholder="??l???? se??in"
                                                            multiple="multiple">
                                                        @foreach($sizes as $size)
                                                            <option value="{{ old('size',$size->name) }}" {{ collect(old('size', $product_sizes))->contains($size->id) ? 'selected' : '' }}>{{ old('size',$size->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="color">R??ngl??r</label>
                                                    <select class="form-control color" id="color" name="color[]"
                                                            data-placeholder="R??ng se??in"
                                                            multiple="multiple">
                                                        @foreach($colors as $color)
                                                            <option  style="background-color: red" value="{{ old('color',$color->name) }}" {{ collect(old('color', $product_colors))->contains($color->id) ? 'selected' : '' }}>{{ old('color',$color->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label style="padding: 7px 0 0 0" for="order_arrival" class="col-md-6 text-left">Sifari??in g??lm?? vaxt??</label>
                                                    <div class="input-group col-md-6">
                                                        <input type="datetime-local" class="form-control"
                                                               id="order_arrival"
                                                               name="order_arrival"
                                                               value="{{ old('order_arrival', $entry->order_arrival) ? date('Y-m-d\TH:i', strtotime(old('order_arrival', $entry->order_arrival))) : '' }}"
                                                               >
                                                               <span class="input-group-addon"><i class="fa fa-times" onclick="document.getElementById('order_arrival').value = null"></i></span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3>T??vsiyy?? edil??n m??hsullar v?? Kompaniya m??hsullar??</h3>
                                        <span>Bu m??hsula t??vsiyy?? olunan dig??r m??hsullar?? kompaniya m??hsullar??n?? v?? kompaniyan??n endirim faizini daxil edin</span>
                                    </div>
                                    <div class="col-md-8">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="product_related">Bu m??hsulla al??nanlar</label>
                                                    <select class="form-control" id="product_related" name="related_id[]"
                                                            data-placeholder="M??hsullar?? se??in"
                                                            multiple="multiple">
                                                        @foreach($products as $product)
                                                            <option  value="{{ old('related_id', $product->id) }}" {{ collect(old('related_id', $product_related))->contains($product->id) ? 'selected' : '' }}>{{ $product->product_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="main_product_price">??sas m??hsul</label>
                                                    <select class="form-control" id="main_product_price" name="main_product_price_id"
                                                            data-placeholder="M??hsullar?? se??in">
                                                        @if ($entry->id > 0)
                                                            @foreach($entry->price as $price)
                                                                <option  value="{{ old('main_product_price_id', $price->id) }}" {{  old('main_product_price_id', $main_product ? $main_product->id : null) == $price->id ? 'selected' : ''  }}>{{ $price->product->product_name }} ( {{ $price->sale_price }} AZN ) ( {{ $price->stock_piece }} ) {{ $price->color ? '( ' . $price->color->title . ' )' : null }} {{ $price->size ? '( ' . $price->size->name . ' )' : null }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="product_company">Birlikd?? sat??lan m??hsullar</label>
                                                    <select class="form-control" id="product_company" name="price_id[]"
                                                            data-placeholder="M??hsullar?? se??in"
                                                            multiple="multiple">
                                                        @foreach($company_product_price as $price)
                                                            <option  value="{{ old('price_id', $price->id) }}" {{ collect(old('price_id', $product_company))->contains($price->id) ? 'selected' : '' }}>{{ $price->product->product_name }} ( {{ $price->sale_price }} AZN ) ( {{ $price->stock_piece }} ) {{ $price->color ? '( ' . $price->color->title . ' )' : null }} {{ $price->size ? '( ' . $price->size->name . ' )' : null }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label style="padding: 7px 0 0 0" for="company_discount" class="col-md-6 text-left">Kompaniya endirim m??bl????i: </label>
                                                    <div class="input-group col-md-6">
                                                        <input type="text" id="company_discount" placeholder="Kompaniya endirim m??bl????i" class="form-control" style="max-width: 250px" name="company_discount" value="{{ $entry->company_discount ? $entry->company_discount->discount : null  }}">
                                                        <span class="input-group-addon">???</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            @if($entry->id>0)
                                <a href="{{ route('manage.product.new') }}"
                                   class="btn btn-success"> @lang('admin.Add New Product')</a>
                                <button type="submit"  class="btn btn-info"><i
                                            class="fa fa-refresh"></i> @lang('admin.Update')</button>
                            @else
                                <a href="{{ route('manage.product') }}"
                                   class="btn btn-default"> @lang('admin.Cancel')</a>
                                <button type="submit"  class="btn btn-success"><i
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
    @include('manage.layouts.partials.ckeditorService',['uploadUrl'=>route('ckeditorProductUpload'),'editor'=>"product_description"])

    <script src="{{ asset('manager/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('manager/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/i18n/az.js"></script>
    <script>

        function categories(){
            $.ajax({
                url: "{{ route('manage.product.categories') }}",
                type: "GET",
                success: function(data){
                    // console.log(data)
                    $("#category_modal").find("#top_id").html('');
                    $("#category_modal").find("#top_id").html('<option value="">{{ __('admin.Parent Category') }}</option>');
                    $("#category_modal").find("#top_id").append(data)
                }
            })
        }



        $(function () {





            if($("#product_name").val() !== '' || $("#meta-discription").val() !== ''){
                let metaView = $("#meta-view")
                $(metaView).find(".title").html($("#product_name").val())
                $(metaView).find(".description").html($("#meta-description").val())
            }

            $("#product_name").on('keyup', function(event){
                let title = $(event.target).val()
                let metaView = $("#meta-view")
                $(metaView).find(".title").html(title)
            })
            $("#meta-description").on('keyup', function(event){
                let discription = $(event.target).val()
                let metaView = $("#meta-view")
                $(metaView).find(".description").html(discription)
            })

            @if($entry->id > 0)
            $('#index_table').DataTable({
                    order: [[0, "asc"]],
                    processing: true,
                    serverSide: true,
                    searching: false,
                    info: false,
                    paging: false,
                    ajax: '{{ route('manage.product.load_images',  $entry->id) }}',
                    columns: [
                        {data: 'cover', searchable: false, orderable: false},
                        {data: 'image', orderable: false, searchable: false},
                        {data: 'colors', orderable: false, searchable: false},
                        {data: 'action', orderable: false, searchable: false},
                    ],
                    language: {
                        "sEmptyTable": "{{ __('admin.No data available in table') }}",
                        "sInfo": "{{ __('admin.Showing _START_ to _END_ of _TOTAL_ entries') }}",
                        "sInfoEmpty": "{{ __('admin.Showing 0 to 0 of 0 entries') }}",
                        "sInfoFiltered": "({{ __('admin.filtered from _MAX_ total entries') }})",
                        "sInfoPostFix": "",
                        "sInfoThousands": ",",
                        "sLengthMenu": "{{ __('admin.Show _MENU_ entries') }}",
                        "sLoadingRecords": "{{ __('admin.Loading...') }}",
                        "sProcessing": "{{ __('admin.Processing...') }}",
                        "sSearch": "{{ __('admin.Search:') }}",
                        "sZeroRecords": "{{ __('admin.No matching records found') }}",
                        "oPaginate": {
                            "sFirst": "{{ __('admin.First') }}",
                            "sLast": "{{ __('admin.Last') }}",
                            "sNext": "{{ __('admin.Next') }}",
                            "sPrevious": "{{ __('admin.Previous') }}"
                        },
                        "oAria": {
                            "sSortAscending": "{{ __('admin.: activate to sort column ascending') }}",
                            "sSortDescending": "{{ __('admin.: activate to sort column descending') }}"
                        }
                    }
                });

            @endif



            $(document).on('click', '.down-up', function () {
                var id = $(this).data('id');
                $.ajax({
                        url: '{{ route('manage.product.images.cover_change') }}',
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            $('#index_table').DataTable().ajax.reload();
                        }
                });
            });
            $(document).on('change', '.change_color', function () {
                console.log('ok')
                var id = $(this).data('id');
                var color_id = $(this).val();
                $.ajax({
                        url: '{{ route('manage.product.images.change_color') }}',
                        method: 'POST',
                        data: {id: id, color_id: color_id},
                        success: function () {
                            $('#index_table').DataTable().ajax.reload();
                        }
                });
            });
            $(document).on('click', '.btn_close', function () {
                var id = $(this).attr('id');
                if (confirm('{{ __('admin.Are you sure you want to delete this data?') }}')) {
                    $.ajax({
                        url: '{{ route('manage.product.remove_image') }}',
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            $('#index_table').DataTable().ajax.reload();
                        }
                    });

                } else {
                    return false;
                }
            });

            $('.select3').select2();

            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'

            });

            // $("#tag").select2({
            //     tags: true,
            //     tokenSeparators: [',', ' '],
            //     language: 'az'
            // });

            $("#size").select2({
                tags: true,
                tokenSeparators: [',', ' '],
                language: 'az'
            });
            $("#product_related").select2({
                tags: true,
                tokenSeparators: [',', ' '],
                language: 'az'
            });
            $("#product_company").select2({
                tags: true,
                tokenSeparators: [',', ' '],
                language: 'az'
            });

            function formatState (state) {
                if (!state.id) {
                    return state.text;
                }
                var $state = $(
                    '<span style="background-color: '+state.text+'">' + state.text + '</span>'
                );
                return $state;
            };

            $("#color").select2({
                tags: true,
                tokenSeparators: [',', ' '],
                language: 'az',
                templateResult: formatState,
                templateSelection: function(selection) {
                    if(selection.selected) {
                        return $.parseHTML('<span class="im_selected" style="font-weight: bold; color: '+selection.text+'">' + selection.text + '</span>');
                    }
                    else {
                        return $.parseHTML('<span class="im_writein" style="font-weight: bold; color: '+selection.text+'">' + selection.text + '</span>');
                    }
                },
            }).on('select2:select', function(){
                console.log($(this))
                // $(this).next().find('.select2-selection').css({
                //     backgroundColor: this.value
                // });
            })

            $('#brand').select2({
                tags: true,
                escapeMarkup: function (markup) {
                    return markup;
                },
                insertTag: function (data, tag) {
                    $('#form_modal #name').val(tag.text);
                    tag.text = '<div><i class="fa fa-plus"></i> {{ __('admin.Add') }}: ' + tag.text + '</div>';
                    data.push(tag);
                },
                language: 'az'
            }).on('select2:select', function () {
                if ($(this).find("option:selected").data("select2-tag") == true) {
                    $('#form_modal').modal('show');
                    $('#form_output').html('');
                    $('#button_action').val('insert');
                    $('#action').val('{{ __('admin.Save Brand') }}');
                }
            });



            $(document).on('click', '.add_price', function() {
                $('form#price_form')[0].reset();
                $("form#price_form").find('input[name="id"]').val(0)
            })
            $(document).on('click', '.edit_price', function() {
                var id = $(this).attr('data-id');

                $.ajax({
                    method: 'GET',
                    url: '{{ route('manage.product.price_fetch_data') }}',
                    data: {id},
                    success: function (data) {
                        $('#form_color_id').val(data.color_id);
                        $('#form_size_id').val(data.size_id);
                        $('#form_sale_price').val(data.sale_price);
                        $('#form_stock_piece').val(data.stock_piece);
                        $('#form_wholesale_count').val(data.wholesale_count);
                        $('#form_wholesale_price').val(data.wholesale_price);
                        $("form#price_form").find('input[name="id"]').val(id)
                    }
                });
            })
            $(document).on('click', '.delete_price', function() {
                var id = $(this).attr('data-id');
                $.ajax({
                    method: 'GET',
                    url: '{{ route('manage.product.price_delete_data') }}',
                    data: {id},
                    success: function (data) {
                        window.location.reload()
                    }
                });
            })
            $('form#price_form').submit(function (event) {
                event.preventDefault();
                var form_data = $(this).serialize();

                $.ajax({
                    method: 'POST',
                    url: '{{ route('manage.product.price_post_data') }}',
                    data: form_data,
                    success: function (data) {
                        if (data.error.length > 0) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                            }
                            $('#price_form .form_output').html(error_html).hide().fadeIn('slow');
                        } else {
                            window.location.reload()

                        }
                    }
                });
            });


            $('form#form').submit(function (event) {
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('manage.brand.post_data') }}',
                    data: form_data,
                    dataType: 'json',
                    success: function (data) {
                        if (data.error.length > 0) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                            }
                            $('#form_modal .form_output').html(error_html).hide().fadeIn('slow');
                        } else {
                            $('#form_modal .form_output').html(data.success).hide().fadeIn('slow').fadeTo(5000, 0.50);
                            $('#form_modal #form')[0].reset();
                            $('#form_modal #action').val('{{ __('admin.Save Brand') }}');
                            $('#form_modal .modal-title').text('{{ __('admin.Add New Brand') }}');
                            $('#form_modal #button_action').val('insert');
                            setTimeout(() => {
                                $('#form_modal').modal('hide');
                            }, 1000)

                        }
                    }
                });
            });

            $('#categories').select2({
                tags: true,
                escapeMarkup: function (markup) {
                    return markup;
                },
                insertTag: function (data, tag) {
                    $('#category_modal #category_name').val(tag.text);
                    tag.text = '<div><i class="fa fa-plus"></i> {{ __('admin.Add') }}: ' + tag.text + '</div>';
                    data.push(tag);
                },
                language: 'az'
            }).on('select2:select', function () {
                if ($(this).find("option:selected").data("select2-tag") == true) {
                    $('#category_modal').modal('show');
                    categories()
                    $('#category_modal .form_output').html('');
                    $('#category_modal #button_action').val('insert');
                    $('#category_modal #action').val('{{ __('admin.Save Category') }}');
                }
            });

            $('form#category_form').submit(function (event) {
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('manage.category.post_data') }}',
                    data: form_data,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if (data.error.length > 0) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                            }
                            $('#category_modal .form_output').html(error_html).hide().fadeIn('slow');
                        } else {
                            $('#category_modal .form_output').html(data.success).hide().fadeIn('slow').fadeTo(5000, 0.50);
                            $('#category_modal form#category_form')[0].reset();
                            $('#category_modal #action').val('{{ __('admin.Save Category') }}');
                            $('#category_modal .modal-title').text('{{ __('admin.Add New Category') }}');
                            $('#category_modal #button_action').val('insert');
                            setTimeout(() => {
                                $('#category_modal').modal('hide');
                            }, 1000)
                        }
                    }
                });
            });



            $("input.numeric").keydown(function (event) {
                if (event.shiftKey == true) {
                    event.preventDefault();
                }

                if ((event.keyCode >= 48 && event.keyCode <= 57) ||
                    (event.keyCode >= 96 && event.keyCode <= 105) ||
                    event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 ||
                    event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

                } else {
                    event.preventDefault();
                }

                if ($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
                    event.preventDefault();
                //if a decimal has been added, disable the "."-button

            });

        });

    </script>
@endsection
