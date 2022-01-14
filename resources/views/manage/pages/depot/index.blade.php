@extends('manage.layouts.master')
@section('title', 'Depo İdarəetmə')
@section('head')
    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{ asset('manager/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="pull-left">Depolar</h1>
        <div class="pull-right">
            <a href="{{ route('manage.depot.new') }}" class="btn btn-success">Yeni Depo Əlavə et</a>
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
                    <div class="box-body">
                        <form id="form">
                            <table id="index_table" class="table table-bordered table-striped table-hover display"
                                style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Depo adı</th>
                                    <th>Default</th>
                                    <th>@lang('admin.Updated at')</th>
                                    <th>@lang('admin.Created at')</th>
                                    <th>@lang('admin.Action')</th>
                                    <th>
                                        <button type="button"  title="@lang('admin.Select and Delete')" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                            </table>
                        </form>
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
                order: [[0, "asc"]],
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: '{{ route('manage.depot.index_data') }}',
                columns: [
                    {data: 'order', searchable: false},
                    {data: 'name', name: 'depots.name'},
                    {data: 'default', name: 'depots.default'},
                    {data: 'updated_at', name: 'depots.updated_at'},
                    {data: 'created_at', name: 'depots.created_at'},
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

            $(document).on('click', '.delete', function () {
                var id = $(this).attr('id');

                if (confirm('{{ __('admin.Are you sure you want to delete this data?') }}')) {
                    $.ajax({
                        url: '{{ route('manage.depot.delete_data') }}',
                        method: 'GET',
                        data: {id: id},
                        success: function (data) {
                            alert(data);
                            $('#index_table').DataTable().ajax.reload();
                        }
                    });
                }
                else {
                    return false;
                };

            });

            $(document).on('click', '#bulk_delete', function () {
                var id = [];

                if (confirm('{{ __('admin.Are you sure you want to delete this data?') }}')) {

                    $('.checkbox:checked').each(function () {
                        id.push($(this).val());
                    });

                    if (id.length > 0) {
                        $.ajax({
                            url: '{{ route('manage.depot.mass_remove') }}',
                            method: 'GET',
                            data: {id: id},
                            success: function (data) {
                                alert(data);
                                $('#index_table').DataTable().ajax.reload();
                            }
                        });
                    }
                    else {
                        alert('{{ __('admin.Please select at least one checkbox') }}');
                    };

                }
                else {
                    return false;
                };

            });
            $('tbody').sortable({
                opacity: 0.6,
                cursor: 'move',
                tolerance: 'pointer',
                revert: true,
                placeholder: 'state',
                forcePlaceholderSize: true,
                update: function () {
                    var serialize = $("form#form").serialize();
                    $.ajax({
                        url: "{{ route('manage.depot.reorder') }}",
                        type: "post",
                        data: {serialize: serialize},
                        success: function () {
                            $('#index_table').DataTable().ajax.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            $.each(jqXHR, function (key, val) {
                                console.log(key);
                                console.log(val);
                            });
                            console.log(jqXHR + textStatus + errorThrown);
                        }
                    });
                }
            });
        });
    </script>
@endsection
