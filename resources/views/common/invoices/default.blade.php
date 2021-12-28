<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>
<body>
    <div style="width: 100%">
        <table style="width: 100%">
            <thead style="width: 100%">
                <tr>
                    <th>{{ config('app.name') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody style="width: 100%">
                <tr>
                    <td>Ünvan</td>
                    <td>{{ old('address', $website_info->address) }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ old('email', $website_info->email) }}</td>
                </tr>
                <tr>
                    <td>Tel</td>
                    <td>{{ old('mobile', $website_info->mobile) }}</td>
                </tr>
            </tbody>
        </table>

        <table style="width: 100%">
            <thead style="width: 100%">
                <tr>
                    <th>Müsteri Melumatlari</th>
                    <th></th>
                </tr>
            </thead>
            <tbody style="width: 100%">
                <tr>
                    <td>Ad</td>
                    <td>{{ isset($client_firstname) ? $client_firstname : '' }}</td>
                </tr>
                <tr>
                    <td>Soyad</td>
                    <td>{{ isset($client_lastname) ? $client_lastname : '' }}</td>
                </tr>
                <tr>
                    <td>Ünvan</td>
                    <td>{{ isset($client_address) ? $client_address : '' }}</td>
                </tr>
                <tr>
                    <td>Tel </td>
                    <td>{{ isset($client_tel) ? $client_tel : '' }}</td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>{{ isset($client_email) ? $client_email : '' }}</td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%">
            <thead style="width: 100%">
                <tr>
                    <th>Ödenis Melumatlari</th>
                    <th></th>
                </tr>
            </thead>
            <tbody style="width: 100%">
                <tr>
                    <td>Ödenis meblegi </td>
                    <td>{{ isset($total_amount) ? $total_amount : '' }} AZN</td>
                </tr>
                <tr>
                    <td>Ödenis növü  </td>
                    <td>{{ isset($payment_type) ? $payment_type : '' }} </td>
                </tr>
                <tr>
                    <td>Ödenis statusu </td>
                    <td> {{ isset($order_status) ? $order_status : '' }} </td>
                </tr>
                <tr>
                    <td>Card </td>
                    <td> {{ isset($card_number) ? $card_number : '' }} </td>
                </tr>
                <tr>
                    <td>Brand  </td>
                    <td>{{ isset($brand) ? $brand : '' }} </td>
                </tr>
                <tr>
                    <td>Sifaris tarixi </td>
                    <td> {{ isset($order_date) ? $order_date : '' }}</td>
                </tr>
                <tr>
                    <td>Ödenis tarixi </td>
                    <td> {{ isset($payment_date) ? $payment_date : '' }}</td>
                </tr>
            </tbody>
        </table>
        {{-- <table class="table table-striped table-bordered table-hover"> --}}


        <table style="width: 100%">
            <thead style="width: 100%">
                <tr>
                    <th>Mehsul adi</th>
                    <th>Miqdari</th>
                    <th>Məlumat</th>
                    <th>Vahid qiymet</th>
                    <th>Cemi</th>
                </tr>
            </thead>
            <tbody style="width: 100%">
                @if (isset($order_items))
                    @foreach ($order_items as $item)
                        <tr>
                            <td style="text-transform: lowercase">{{ $item->product->product_name }}</td>
                            <td>{{ $item->piece }}</td>
                            <td>
                                {!! $item->size ? '<p>Ölçü: <span>' . $item->size->name . '</span></p>' : '' !!}
                                {!! $item->color ? '<p>Rəng: <span style="background-color: ' . $item->color->name . '">' . $item->color->name . '</span></p>' : '' !!}
                            </td>
                            <td>{{ $item->amount / $item->piece }} AZN</td>
                            <td>{{ $item->amount }} AZN</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <h2 style="text-transform: uppercase">Ümumi Mebleg : {{ isset($total_amount) ? $total_amount : '' }} AZN</h2>
    </div>

</body>
</html>

