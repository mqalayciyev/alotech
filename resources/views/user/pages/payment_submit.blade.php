@extends('user.layouts.app')
@section('title', "Ödənişin təsdiqi")
@section('content')
        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main" class="cart-page">
            <div class="container">
                <div class="mb-4">
                    <h1 class="text-center">Ödənişin təsdiqi</h1>
                    <p class="text-center">Məlumatları təsdiq etdikdən sonra siz ödəniş səhifəsinə yönləndiriləcəksiniz</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <table class="table">

                            <tr><th>Sifariş edən</th><th class="text-right">{{$order['first_name'] . " " . $order['last_name']}}</th></tr>
                            <tr><th>E-Poçt</th><th class="text-right">{{$order['email']}}</th></tr>
                            <tr><th>Ünvan</th><th class="text-right">{{$order['address']}}</th></tr>
                            <tr><th>Mobil</th><th class="text-right">{{$order['mobile']}}</th></tr>
                            <tr><th>Sifariş məbləği</th><th class="text-right">{{ $order['order_amount'] - $order['shipping'] + $order['bonus_amount'] }} AZN</th></tr>
                            <tr><th>Bonusla ödənilən</th><th class="text-right">{{$order['bonus_amount']}} AZN</th></tr>
                            <tr><th>Çatdırılma məbləği</th><th class="text-right">{{$order['shipping']}} AZN</th></tr>
                            <tr><th>Ümumi məbləğ</th><th class="text-right">{{$order['order_amount']}} AZN</th></tr>


                        </table>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        {!! $result !!}
                    </div>
                </div>

                <br>
                <br>

            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

@endsection
