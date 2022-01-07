@extends('manage.layouts.master')
@section('title', __('admin.Order Manager'))
@section('head')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('manager/bower_components/datatables/datatables.min.css') }}"/>
@endsection
@section('content')
@if (@$manage == 2)
    <!-- Demo Admin -->
        @php
            $display = "none"
        @endphp
    @else
        @php
            $display = ""
        @endphp
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang('admin.Orders')</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('manage.homepage') }}"><i class="fa fa-dashboard"></i> @lang('admin.Home')</a></li>
            <li class="active">@lang('admin.Orders')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @include('common.alert')
                @include('common.errors.validate')
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-header">
                            <!--<a href="{{ route('manage.raports.export', 'products') }}" class="btn btn-primary btn-export" data-type="products">Sifariş edilən məhsullar</a>-->
                            <a href="{{ route('manage.raports.export', 'orders') }}" class="btn btn-primary btn-export" data-type="orders">Sifariş cədvəli Excel</a>
                    </div>
                    <div class="box-body table-responsive">
                        
                        <table id="index_table" class="table table-bordered table-striped table-hover display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('admin.User')</th>
                                    <th>@lang('admin.Order Code')</th>
                                    <th>@lang('admin.Total Price')</th>
                                    <th>@lang('admin.Status')</th>
                                    <th>@lang('admin.Order date')</th>
                                    <th></th>
                                    <th width="125px">@lang('admin.Action')</th>
                                    <th>
                                        <button type="button" title="@lang('admin.Select and Delete')" name="bulk_delete"
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
    
@endsection
@section('footer')
    <!-- DataTables -->
    <script type="text/javascript" src="{{ asset('manager/bower_components/datatables/datatables.min.js') }}"></script>
    <script>
        $(function () {
            // $.fn.dataTable.ext.errMode = 'throw';
            let table = $('#index_table').DataTable({
                aLengthMenu: [[25, 50, 75, 100, 150, 200], [25, 50, 75, 100, 150, 200]],
                iDisplayLength: 25,
                // dom: 'Bfrtip',
                order: [[0, "desc"]],
                processing: true,
                serverSide: true,
                ordering: true,
                paging: true,
                ajax: "{{ route('manage.order.index_data')}}",
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'SP'},
                    {data: 'order_amount'},
                    {data: 'status'},
                    {data: 'created_at'},
                    {data: 'export', name: 'order.exported'},
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
            
            

            $(document).on('click', '#bulk_delete', function () {
                var id = [];
                if (confirm("{{ __('admin.Are you sure you want to delete this data?') }}")) {
                    $('.checkbox:checked').each(function () {
                        id.push($(this).val());
                    });
                    if (id.length > 0) {
                        $.ajax({
                            url: "{{ route('manage.order.mass_remove') }}",
                            method: 'GET',
                            data: {id: id},
                            success: function (data) {
                                alert(data);
                                $('#index_table').DataTable().ajax.reload();
                            }
                        });
                    } else {
                        alert("{{ __('admin.Please select at least one checkbox') }}");
                    }
                } else {
                    return false;
                }
            });
            // $(document).on('click', '.btn-export', function () {
            //     let type = $(this).data('type')
                
            //     $.ajax({
            //         url: "",
            //         method: 'GET',
            //         data: {type},
            //         success: function (data) {
            //             console.log(data);
            //             const url = window.URL.createObjectURL(new Blob([data]));
            //             console.log(url)
            //             const link = document.createElement('a');
            //             link.setAttribute('download', 'orders.xlsx');
            //             document.body.appendChild(link);
            //             link.click();
            //         }
            //     });
            // });

            $("input[name=name]").change(function () {
                var val = $(this).val();
                $("input[name=slug]").val(val);
            });

        });
    </script>
@endsection