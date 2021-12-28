@extends('manage.layouts.master')
@section('title', 'API Keys')
@section('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('manager/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <style>
        input.active{
            border-color: #11ff00!important;
            background-color: #49fc3d!important;
            outline-color: #11ff00!important;
            box-shadow: 0 0 3px #11ff00;
            color: #fff;
        }
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="pull-left">Api Keys</h1>
        <div class="pull-right">
            <button class="btn btn-success" id="add_data">
                <i class="fa fa-plus"></i> Yeni Api Keys
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
                                            <h4 class="modal-title">Yeni Api Key</h4>
                                        </div>
                                        <div class="modal-body">
                                            <span id="form_output"></span>
                                            <div class="form-group">
                                                <label for="name">Ad</label> <br>
                                                <input type="text" name="name" class="form-control"
                                                    id="name" placeholder="Ad"
                                                    value="{{ old('name') }}">
                                                <input type="hidden" name="id" value="" id="id">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="button_action" id="button_action" value="insert" />
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">@lang('admin.Close')</button>
                                            <input type="submit"  name="submit" id="action"
                                                class="btn btn-success" value="Saxla" />
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
                                    <th>Ad</th>
                                    <th>Key</th>
                                    <th>@lang('admin.Updated at')</th>
                                    <th>@lang('admin.Action')</th>
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
        $(function() {

            $('#index_table').DataTable({
                order: [
                    [2, "desc"]
                ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('manage.apikey.index_data') }}',
                columns: [
                    {
                        data: 'name'
                    },
                    {
                        data: 'api_token'
                    },
                    {
                        data: 'updated_at'
                    },
                    {
                        data: 'action',
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

            $('#add_data').click(function() {
                $('#form_modal').modal('show');
                $('#form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Saxla');
            });

            $('#form').on('submit', function(event) {
                event.preventDefault();
                var form_data = new FormData($(this)[0]);
                $.ajax({
                    method: 'POST',
                    url: '{{ route('manage.apikey.post_data') }}',
                    data: form_data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        if(data.status === 'success'){
                            window.location.reload();
                        }
                        else if(data.status === 'error'){
                            let msg = "";
                            let message = data.message;
                            for (const [key, value] of Object.entries(message)) {
                                msg = msg + value
                            }
                            swal({
                                icon: 'error',
                                title: msg,
                                showConfirmButton: true,
                            })
                        }
                        else{
                            console.log(data)
                        }
                    }
                });
            });

            $(document).on('click', '.edit', function() {
                var id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('manage.apikey.fetch_data') }}',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#top_id').val(data.top_id);
                        $('#name').val(data.name);
                        $('#category_view').val(data.category_view);
                        $('#category_image_view').attr('src', data.category_image_view);
                        $('#slug').val(data.slug);
                        $('#id').val(id);
                        $('#form_modal').modal('show');
                        $('#action').val('Saxla');
                        $('.modal-title').text('Api Key');
                        $('#button_action').val('update');
                    }
                });
            });

            $("input[name=name]").change(function() {
                var val = $(this).val();
                $("input[name=slug]").val(val);
            });

            $(document).on('click', '.copy-clipboard', function() {

                var copyTextarea = $(this);

                $(this).addClass('active');

                copyTextarea.focus();
                copyTextarea.select();


                try {
                    var successful = document.execCommand('copy');
                    var msg = successful ? 'successful' : 'unsuccessful';
                    console.log('Copying text command was ' + msg);
                } catch (err) {
                    console.log('Oops, unable to copy');
                }

            });

        });
    </script>
@endsection
