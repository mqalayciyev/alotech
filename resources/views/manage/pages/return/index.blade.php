@extends('manage.layouts.master')
@section('title', 'Sifariş Qaytarma İdarəetmə')
@section('head')
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('manager/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Sifariş Qaytarma Tələbləri</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('manage.homepage') }}"><i class="fa fa-dashboard"></i> @lang('admin.Home')</a></li>
            <li class="active">Sifariş Qaytarma Tələbləri</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @include('common.alert')
                @include('common.errors.validate')
                <div class="box box-primary">
                    <div class="box-body table-responsive">

                        <table id="index_table" class="table table-bordered table-striped table-hover display"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('admin.User')</th>
                                    <th>@lang('admin.Order Code')</th>
                                    <th>@lang('admin.Status')</th>
                                    <th>Tarix</th>
                                    <th width="125px">@lang('admin.Action')</th>
                                    <th>
                                        <button type="button" id="select_all" data-check="0" title="Hamısını seç"
                                            class="btn btn-danger btn-xs">
                                            <i class="fa fa-square"></i>
                                        </button>
                                        <button type="button" title="@lang('admin.Select and Delete')" name="bulk_delete"
                                            id="bulk_delete" class="btn btn-danger btn-xs"><i
                                                class="fa fa-trash"></i></button>
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

        <div class="modal fade" id="viewModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Təsvir</h4>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Bağla</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="mailModal" role="dialog">
            <div class="modal-dialog">

                <form id="sendMail">
                    @csrf
                    <input type="hidden" value="0" name="id" >
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Müştəriyə məlumat göndərin</h4>
                        </div>
                        <div class="modal-body">
                            <textarea name="message" class="form-control" placeholder="Mesajı daxil edin"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Bağla</button>
                            <button type="submit" class="btn btn-success">Göndər</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>

@endsection
@section('footer')
    <!-- DataTables -->
    <script src="{{ asset('manager/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('manager/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function() {
            // $.fn.dataTable.ext.errMode = 'throw';

            let table = $('#index_table').DataTable({
                aLengthMenu: [
                    [25, 50, 75, 100, 150, 200],
                    [25, 50, 75, 100, 150, 200]
                ],
                iDisplayLength: 25,
                order: [
                    [0, "desc"]
                ],
                processing: true,
                serverSide: true,
                ordering: true,
                paging: true,
                ajax: "{{ route('manage.return.index_data') }}",
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'SP'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'checkbox',
                        orderable: false,
                        searchable: false
                    },
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





            $(document).on('click', '#bulk_delete', function() {
                var id = [];
                if (confirm("{{ __('admin.Are you sure you want to delete this data?') }}")) {
                    $('.checkbox:checked').each(function() {
                        id.push($(this).val());
                    });
                    if (id.length > 0) {
                        $.ajax({
                            url: "{{ route('manage.order.mass_remove') }}",
                            method: 'GET',
                            data: {
                                id: id
                            },
                            success: function(data) {
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

            $("input[name=name]").change(function() {
                var val = $(this).val();
                $("input[name=slug]").val(val);
            });

            $(document).on('click', '.mail', function(e) {
                $("#mailModal").modal('show');
                $("#mailModal textarea[name='message']").val('');
                $("#mailModal input[name='id']").val($(this).data('id'));
            })
            $("#sendMail").submit(function(e) {
                e.preventDefault()
                let data = new FormData(e.target);
                $.ajax({
                    url: "{{ route('manage.return.mail') }}",
                    type: "POST",
                    data: data,
                    cache: false,
                    async: true,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        // console.log(data)
                        if(data.status == 'success'){
                            alert('Məlumat müştəriyə göndərildi')
                            $("#mailModal").modal('hide');
                        }
                        else{
                            alert('Məlumat göndərilmədi')
                        }
                    }
                })
            })
            $(document).on('click', '.view', function() {
                let id = $(this).attr('data-id');

                $.ajax({
                    url: "{{ route('manage.return.view') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id
                    },
                    success: function(data) {
                        $("#viewModal").modal('show');
                        $("#viewModal").find('.modal-body').html('')
                        $("#viewModal").find('.modal-body').append(`<p>${data.description}</p>`)
                    }
                })
            })

        });
    </script>
@endsection
