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
                                    @elseif($order->status=='Your order has been received')
                                        <label class="alert alert-info">@lang('content.' . $order->status)</label>
                                    @elseif($order->status=='Payment approved')
                                        <label class="alert alert-info">@lang('content.' . $order->status)</label>
                                    @elseif($order->status=='Cargoed')
                                        <label class="alert alert-info">@lang('content.' . $order->status)</label>
                                    @elseif($order->status=='Order completed')
                                        <label class="alert alert-success">@lang('content.' . $order->status)</label>
                                    @elseif($order->status=='Your order is canceled')
                                        <label class="alert alert-danger">@lang('content.' . $order->status)</label>
                                    @endif
                                </td>
                                <td>{{ $order->bank }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a href="{{ route('order', $order->id) }}" class="btn btn-xs btn-info">@lang('content.View')</a>
                                    {!! $order->order_status == "PENDING" ? "<a href='" . route('complete', $order->id) . "' class='btn btn-xs btn-success'>Ödənişi tamamla</a>" : ""  !!}
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
@endsection
