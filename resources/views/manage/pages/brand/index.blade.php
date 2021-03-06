@extends('manage.layouts.master')
@section('title', __('admin.Brand Manager'))
@section('head')
    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{ asset('manager/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
    @if (@$manage == 2)
    <!-- Demo Admin -->
        @php
            $disabled = "disabled"
        @endphp
    @else
        @php
            $disabled = ""
        @endphp
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="pull-left">@lang('admin.Brands')</h1>
        <div class="pull-right">
            <a href="{{ route('manage.brand.list.update') }}" class="btn btn-info"><i class="fa fa-refresh"></i>
                Brendləri yenilə</a>
            <a href="{{ route('manage.brand.delete_all') }}" class="btn btn-danger">Hamısını sil</a>
            <button class="btn btn-success" id="add_data">
                <i class="fa fa-plus"></i> @lang('admin.Add New Brand')
            </button>
        </div>
        <div class="clearfix"></div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @include('common.alert')
                @include('common.errors.validate')
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="modal fade" id="form_modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" id="form">
                                        {{ csrf_field() }}
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">@lang('admin.Add New Brand')</h4>
                                        </div>
                                        <div class="modal-body">
                                            <span id="form_output"></span>
                                            <div class="form-group">
                                                <label for="name">@lang('admin.Brand Name')</label> <br>
                                                <input type="text" name="name" class="form-control"
                                                       id="name" placeholder="@lang('admin.Brand Name')"
                                                       value="{{ old('name') }}">
                                                <input type="hidden" name="slug" value="">
                                                <input type="hidden" name="id" value="" id="id">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">@lang('admin.Description')</label> <br>
                                                <textarea class="form-control" name="description" rows="5"
                                                          id="description"
                                                          placeholder="@lang('admin.Description')">{{ old('description') }}</textarea>
                                            </div>
                                                                                        <div class="form-group">
                                                <img id="brand_image_view" width="100" height="100"><br>
                                                <div>
                                                    <label for="brand_image_delete"><input type="checkbox" name="brand_image_delete" value="" id="brand_image_delete"> Şəkli sil</label>

                                                </div>
                                                <div>
                                                    <label for="brand_image">Brend şəkli</label> <br>
                                                    <input type="file" name="brand_image" value="" id="brand_image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="button_action" id="button_action"
                                                   value="insert"/>
                                            <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">@lang('admin.Close')</button>
                                            <input type="submit" {{ $disabled }} name="submit" id="action"
                                                   class="btn btn-success" value="@lang('admin.Save Brand')"/>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="index_table" class="table table-bordered table-striped table-hover display"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>@lang('admin.Image')</th>
                                <th>@lang('admin.Name')</th>
                                <th>@lang('admin.Description')</th>
                                <th>@lang('admin.Number of Products')</th>
                                <th>@lang('admin.Updated at')</th>
                                <th>@lang('admin.Created at')</th>
                                <th>@lang('admin.Action')</th>
                                <th>
                                    <button type="button" id="select_all" data-check="0" title="Hamısını seç" class="btn btn-danger btn-xs">
                                        <i class="fa fa-square"></i>
                                    </button>
                                    <button type="button" {{ $disabled }} title="@lang('admin.Select and Delete')" name="bulk_delete"
                                            id="bulk_delete"
                                            class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
@section('footer')
    <!-- DataTables -->
    <script src="{{ asset('manager/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('manager/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {

            $('#index_table').DataTable({
                aLengthMenu: [[25, 50, 75, 100, 150, 200], [25, 50, 75, 100, 150, 200]],
                iDisplayLength: 25,
                order: [[3, "desc"]],
                processing: true,
                serverSide: true,
                ajax: '{{ route('manage.brand.index_data') }}',
                columns: [
                    {data: 'image', name: 'image'},
                    {data: 'name', name: 'brand.name'},
                    {data: 'description', name: 'brand.description'},
                    {data: 'brand_products', name: 'brand_products', searchable: false},
                    {data: 'updated_at', name: 'brand.updated_at'},
                    {data: 'created_at', name: 'brand.created_at'},
                    {data: 'action', orderable: false, searchable: false},
                    {data: 'checkbox', orderable: false, searchable: false},
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

            $('#add_data').click(function () {
                $('#form_modal').modal('show');
                $('#form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('{{ __('admin.Save Brand') }}');
            });

            $('#form').on('submit', function (event) {
                event.preventDefault();
                // var form_data = $(this).serialize();
                var form_data = new FormData($(this)[0]);
                $.ajax({
                    method: 'POST',
                    url: '{{ route('manage.brand.post_data') }}',
                    data: form_data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (data) {
                        // console.log(data)
                        if (data.error.length > 0) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                            }
                            $('#form_output').html(error_html).hide().fadeIn('slow');
                        } else {
                            // $('#form_output').html(data.success).hide().fadeIn('slow').fadeTo(2000, 0.50);
                            // $('#form')[0].reset();
                            // $('#action').val('{{ __('admin.Save Brand') }}');
                            // $('.modal-title').text('{{ __('admin.Add New Brand') }}');
                            // $('#button_action').val('insert');
                            // $('#index_table').DataTable().ajax.reload();
                            // setTimeout(() => {
                            //     $('#form_modal').modal('hide');
                            // }, 1000)
                            window.location.reload()
                        }
                    }
                });
            });

            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('manage.brand.fetch_data') }}',
                    method: 'GET',
                    data: {id: id},
                    dataType: 'json',
                    success: function (data) {
                        $('#name').val(data.name);
                        $('#description').val(data.description);
                        $('#brand_image_view').attr('src', data.brand_image_view);
                        $('#id').val(id);
                        $('#form_modal').modal('show');
                        $('#action').val('{{ __('admin.Edit') }}');
                        $('.modal-title').text('{{ __('admin.Edit Data') }}');
                        $('#button_action').val('update');
                    }
                });
            });

            $(document).on('click', '.delete', function () {
                var id = $(this).attr('id');
                if (confirm('{{ __('admin.Are you sure you want to delete this data?') }}')) {
                    $.ajax({
                        url: '{{ route('manage.brand.delete_data') }}',
                        method: 'GET',
                        data: {id: id},
                        success: function (data) {
                            alert(data);
                            $('#index_table').DataTable().ajax.reload();
                        }
                    });
                } else {
                    return false;
                }
            });

            $(document).on('click', '#bulk_delete', function () {
                var id = [];
                if (confirm('{{ __('admin.Are you sure you want to delete this data?') }}')) {
                    $('.checkbox:checked').each(function () {
                        id.push($(this).val());
                    });
                    if (id.length > 0) {
                        $.ajax({
                            url: '{{ route('manage.brand.mass_remove') }}',
                            method: 'GET',
                            data: {id: id},
                            success: function (data) {
                                alert(data);
                                $('#index_table').DataTable().ajax.reload();
                            }
                        });
                    } else {
                        alert('{{ __('admin.Please select at least one checkbox') }}');
                    }
                } else {
                    return false;
                }
            });

            $("input[name=name]").change(function () {
                var val = $(this).val();
                $("input[name=slug]").val(val);
            });


        });
    </script>
@endsection
