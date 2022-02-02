@extends('user.pages.user.account')
@section('title', __('content.Orders'))
@section('content.account')
    @include('common.alert')
    <div class="ps-section--account-setting">
        <div class="ps-section__header">
            <h3>Sifarişlər</h3>
        </div>
        <div class="ps-section__content">
            @if (count($orders) > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('content.Amount')</th>
                                <th>Status</th>
                                <th>Ödəniş metodu</th>
                                <th>@lang('content.Date')</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1 @endphp
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <label class="label label-danger">{{ $order->order_amount }} ‎₼</label>
                                    </td>
                                    <td>

                                        @if ($order->status == 'Payment is expected')
                                            <label class="alert alert-warning">@lang('content.' . $order->status)</label>
                                        @elseif($order->status == 'Your order has been received')
                                            <label class="alert alert-info">@lang('content.' . $order->status)</label>
                                        @elseif($order->status == 'Payment approved')
                                            <label class="alert alert-info">@lang('content.' . $order->status)</label>
                                        @elseif($order->status == 'Cargoed')
                                            <label class="alert alert-info">@lang('content.' . $order->status)</label>
                                        @elseif($order->status == 'Order completed')
                                            <label class="alert alert-success">@lang('content.' . $order->status)</label>
                                        @elseif($order->status == 'Your order is canceled')
                                            <label class="alert alert-danger">@lang('content.' . $order->status)</label>
                                        @endif
                                    </td>
                                    <td>{{ $order->bank }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        <a href="{{ route('order', $order->id) }}"
                                            class="btn btn-xs btn-info">@lang('content.View')</a>
                                        <a href="javascript:void(0)" data-id="{{ $order->id }}" role="button"
                                            class="btn btn-xs btn-warning" data-toggle="modal"
                                            data-target="#returnOrder">Sifarişi
                                            Qaytar</a>
                                        {!! $order->order_status == 'PENDING' ? "<a href='" . route('complete', $order->id) . "' class='btn btn-xs btn-success'>Ödənişi tamamla</a>" : '' !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h4 class="text-center">Sifariş yoxdur</h4>
            @endif

        </div>
    </div>

    <div class="modal fade" id="returnOrder" tabindex="-1" role="dialog" aria-labelledby="returnOrderLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="returnOrderForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="returnOrderLabel">Sifarişi Qaytarma Səbəbiniz</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="order_id" value="0">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <textarea name="description" id="description" class="form-control"
                            placeholder="Mətn daxil edin"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Ləğv et</button>
                        <button type="submit" class="btn btn-success">Təsdiqlə</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("#returnOrderForm").submit(function(e) {
            e.preventDefault()

            let data = new FormData(e.target);
            // data.append("_token", "{{ csrf_token() }}");
            console.log(data)
            $.ajax({
                url: '{{ route('return.order') }}',
                method: 'POST',
                data: data,
                cache: false,
                async: true,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data)
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    if (data.status == 'success') {
                        toastr.success(data.message);
                        $('#returnOrder').modal('hide')
                    } else if (data.status == 'warning') {
                        let message = data.message;

                        for (const value of Object.values(message)) {
                            toastr.warning(value);
                        }
                    }
                }
            });
        })
        $('#returnOrder').on('show.bs.modal', function(e) {
            let id = $(e.relatedTarget).data('id')
            $('#returnOrderForm input[name="order_id"]').val(id)
        })
        $('#returnOrder').on('hidden.bs.modal', function(e) {
            $('#returnOrderForm')[0].reset()
            $('#returnOrderForm input[name="order_id"]').val(0)
        })
    </script>
@endsection
