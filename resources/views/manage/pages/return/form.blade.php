@extends('manage.layouts.master')
@section('title', __('admin.Order Manager'))
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    @if (@$manage == 2)
        <!-- Demo Admin -->
        @php
            $disabled = 'disabled';
        @endphp
    @else
        @php
            $disabled = '';
        @endphp
    @endif
    <section class="content-header">
        <h1>@lang('admin.Orders')</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('manage.homepage') }}"><i class="fa fa-dashboard"></i> @lang('admin.Home')</a></li>
            <li class="active">@lang('Order Manager ')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-body box-primary">
                    @include('common.errors.validate')
                    @include('common.alert')
                    <form action="{{ route('manage.order.save', @$entry->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="pull-right">
                            @if ($entry->id > 0)
                                <button type="submit" {{ $disabled }} class="btn btn-info"><i
                                        class="fa fa-refresh"></i> @lang('admin.Update')</button>
                            @endif
                        </div>
                        <h4 class="sub-header">{{ $entry->id > 0 ? $entry->first_name . ' ' . $entry->last_name : '' }}
                        </h4>
                        <hr>
                        <input type="hidden" name="cart_id" value="{{ $entry->cart_id }}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name">@lang('admin.First Name')</label>
                                    <input type="text" class="form-control" id="first_name"
                                        placeholder="@lang('admin.Name')" name="first_name"
                                        value="{{ old('name', $entry->first_name) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name">@lang('admin.Last Name')</label>
                                    <input type="text" class="form-control" id="last_name"
                                        placeholder="@lang('admin.Name')" name="last_name"
                                        value="{{ old('name', $entry->last_name) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone">@lang('admin.Phone')</label>
                                    <input type="text" class="form-control" id="phone" placeholder="@lang('admin.Phone')"
                                        name="phone" value="{{ old('phone', $entry->phone) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile">@lang('admin.Mobile')</label>
                                    <input type="text" class="form-control" id="mobile"
                                        placeholder="@lang('admin.Mobile')" name="mobile"
                                        value="{{ old('mobile', $entry->mobile) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email" name="email"
                                        value="{{ old('email', $entry->email) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">????h??r</label>
                                    <select name="city" class="form-control" id="city">
                                        <option value="">????h??r</option>
                                        @foreach ($city as $item)
                                            <option value="{{ $item->id }}"
                                                {{ isset($entry->city) && $entry->city == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control" id="city" placeholder="????h??r" name="city"
                                        value="{{ old('city', $entry->city) }}"> --}}
                                </div>
                            </div>
                            <!--<div class="col-md-4">-->
                            <!--    <div class="form-group">-->
                            <!--        <label for="country">??lk??</label>-->
                            <!--        <input type="text" class="form-control" id="country" placeholder="??lk??" name="country"-->
                            <!--            value="{{ old('country', $entry->country) }}">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="zip_code">Po??t kodu</label>
                                    <input type="text" class="form-control" id="zip_code" placeholder="Po??t kodu"
                                        name="zip_code" value="{{ old('zip_code', $entry->zip_code) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">@lang('admin.Address')</label>
                                    <input type="text" class="form-control" id="address"
                                        placeholder="@lang('admin.Address')" name="address"
                                        value="{{ old('address', $entry->address) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="address">Qeydl??r</label>
                                    @if ($entry->delivery_day || $entry->delivery_time)
                                        <p style="color: red; font-weight: bold;">*M????t??ri m??hsulu bu tarix?? ??atd??r??lmas??n?? ist??yir: {{ $entry->delivery_time }} {{ $entry->delivery_day }}</p>
                                    @endif
                                    @if ($entry->call_me == 1)
                                        <p style="color: red; font-weight: bold;">*M????t??ri menejerl?? ??laq?? saxlamaq ist??yir</p>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <p style="color: red; font-weight: bold;" >
                                    {{ old('status', $entry->status) == 'Payment is expected' ? 'M????t??ri sifari??in ??d??ni??ini tamamlamay??b. ??d??ni?? tamamlanana q??d??r statusu d??yi??dir?? bim??iniz.' : '' }}
                                    </p>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status">@lang('admin.Status')</label>
                                    
                                    
                                    <select name="status" id="status" class="form-control" 
                                        {{ old('status', $entry->status) == 'Payment is expected' ? 'disabled' : '' }}>
                                        <!--<option value="Payment is expected"-->
                                        <!--    {{ old('status', $entry->status) == 'Payment is expected' ? 'selected' : '' }}>-->
                                        <!--   ??d??ni?? g??zl??nilir-->
                                        <!--</option>-->
                                        <option value="Your order has been received"
                                            {{ old('status', $entry->status) == 'Your order has been received' ? 'selected' : '' }}>
                                            @lang('content.Your order has been received')
                                        </option>
                                        <option value="Payment approved"
                                            {{ old('status', $entry->status) == 'Payment approved' ? 'selected' : '' }}>
                                            @lang('content.Payment approved')
                                        </option>
                                        <option value="Cargoed"
                                            {{ old('status', $entry->status) == 'Cargoed' ? 'selected' : '' }}>
                                            @lang('content.Cargoed')
                                        </option>
                                        <option value="Order completed"
                                            {{ old('status', $entry->status) == 'Order completed' ? 'selected' : '' }}>
                                            @lang('content.Order completed')
                                        </option>
                                        <option value="Your order is canceled"
                                            {{ old('status', $entry->status) == 'Your order is canceled' ? 'selected' : '' }}>
                                            @lang('content.Your order is canceled')
                                        </option>
                                    </select>
                                    @if ($entry->id > 0)
                                        <button type="submit" {{ $disabled }} class="btn btn-info" style="margin-top: 10px;"><i
                                                class="fa fa-refresh"></i> @lang('admin.Update')</button>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <p style="color: red;">*Sifari?? statusu "Tamamland??" olaraq se??il??n sifari??in m??hsullar??n??n say?? stokdak?? m??hsul say??ndan silin??c??k</p>
                                    <p style="color: red;">*??vv??lki sifari?? statusu "Tamamland??" olan sifari??in statusu "L????v edildi" olaraq se??ildiyi halda m??hsullar??n??n say?? stokdak?? m??hsul say??na geri ??lav?? edilir</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" data-id="{{ $entry->id }}" class="btn btn-default view_invoice"><i class="fa fa-arrow-down"></i> Invoice</button>
                                <button type="button" data-id="{{ $entry->id }}" class="btn btn-success send_customer">M????t??riy?? m??lumat g??nd??r</button>
                                <button type="button" data-id="{{ $entry->id }}" class="btn btn-primary send_warehouse">Anbara m??lumat g??nd??r</button>
                                <button type="button" data-id="{{ $entry->id }}" class="btn btn-info send_courier">Kuriyer?? m??lumat g??nd??r</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-body box-info">

                    <h3>Sifari?? (SP-{{ $entry->id }})</h3>
                    <div class="table-responsive">
                        <table class="table table-bordererd table-hover">
                            <tr>
                                <th colspan="2">M??hsul</th>
                                <th>Qiym??ti</th>
                                <th>M??lumat</th>
                                <th>Miqdar</th>
                                <th>??mumi qiym??t</th>
                                <th>Status</th>
                            </tr>
                            @foreach ($entry->cart->cart_products as $cart_product)
                                <tr>
                                    <td style="widht:120px;">
                                        <a href="{{ route('product', $cart_product->product->slug) }}" target="_blank">
                                            @php
                                                $image = App\Models\ProductImage::where('product_id', $cart_product->product->id)->where('color_id', $cart_product->color_id)->first();
                                            @endphp
                                            <img src="{{ $image ? asset('assets/img/products/' . $image->image_name) : 'http://via.placeholder.com/120x100?text=ProductPhoto' }}"
                                                class="img-responsive" style="width: 100px;">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('product', $cart_product->product->slug) }}" target="_blank">
                                            {{ $cart_product->product->product_name }}
                                        </a>
                                    </td>
                                    <td>{{ $cart_product->amount  }}</td>
                                    <td>
                                        {!! $cart_product->size ? '<p>??l????: ' . $cart_product->size->name . '</p>' : '' !!}
                                        {!! $cart_product->color_id > 1 ? '<p>R??ng: ' . $cart_product->color->title . '</p>' : '' !!}
                                    </td>
                                    <td>{{ $cart_product->piece }}</td>
                                    <td>{{ $cart_product->amount * $cart_product->piece }} ???</td>
                                    <td>
                                        @lang('content.' . $entry->status)
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="6" class="text-right">M??bl????</th>
                                <td colspan="2">
                                    {{ number_format( $entry->order_amount - $entry->shipping + $entry->bonus_amount, 2) }}???
                                </td>
                            </tr>
                            <tr>
                                <th colspan="6" class="text-right">Bonusla ??d??nil??n</th>
                                <td colspan="2">{{ $entry->bonus_amount }} ???</td>
                            </tr>
                            <tr>
                                <th colspan="6" class="text-right">??atd??r??lma</th>
                                <td colspan="2">
                                    {{ $entry->shipping }} ???
                                </td>
                            </tr>
                            <tr>
                                <th colspan="6" class="text-right">Yekun m??bl????</th>
                                <td colspan="2">{{ $entry->order_amount }} ???</td>
                            </tr>
                            <tr>
                                <th colspan="6" class="text-right">??d??ni?? statusu</th>
                                <td colspan="2">{{ $entry->bank }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"
        integrity="sha512-ToRWKKOvhBSS8EtqSflysM/S7v9bB9V0X3B1+E7xo7XZBEZCPL3VX5SFIp8zxY19r7Sz0svqQVbAOx+QcLQSAQ=="
        crossorigin="anonymous"></script>
    <script>
        function pdfFromHTML(data) {
            var pdf = new jsPDF('p', 'pt', 'letter');
            pdf.setFont("Times New Roman");
            pdf.setFontType("normal");
            source = data;
            var specialElementHandlers = {
                'body': function (element, renderer) {
                    return true;
                }
            };
            margins = {
                top: 40,
                bottom: 40,
                left: 40,
                width: 800
            };
            pdf.fromHTML(
                source,
                margins.left,
                margins.top, {
                    'width': margins.width,
                    'elementHandlers': specialElementHandlers
                },

                function(dispose) {
                    pdf.save('invoice.pdf');
                }, margins);
        }
        $(document).on('click', '.view_invoice', function() {
            let id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('manage.order.invoice_view') }}",
                type: "GET",
                xhrFields: {
                    responseType: 'blob'
                },
                data: {
                    id
                },
                success: function(data) {
                    var a = document.createElement('a');
                    var url = window.URL.createObjectURL(data);
                    a.href = url;
                    a.download = 'invoice.pdf';
                    document.body.append(a);
                    a.click();
                    a.remove();
                    window.URL.revokeObjectURL(url);

                }
            })
        })
        $(document).on('click', '.send_customer', function() {
            let id = $(this).attr('data-id');
            
            $.ajax({
                url: "{{ route('manage.order.invoice_send_customer') }}",
                type: "GET",
                data: {
                    id
                },
                success: function(data) {
                    if(data.status == 'success'){
                        swal({
                            icon: 'success',
                            title: "M??lumat m????t??riy?? g??nd??rildi",
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                }
            })
        })
        $(document).on('click', '.send_warehouse', function() {
            let number = prompt("Anbar n??mr??si?", "");
            let id = $(this).attr('data-id');
            if(number){
                $.ajax({
                    url: "{{ route('manage.order.invoice_send_warehouse') }}",
                    type: "GET",
                    data: {
                        id,
                        number: number
                    },
                    success: function(data) {
                        console.log(data)
                        if(data.status == 'success'){
                            swal({
                                icon: 'success',
                                title: "M??lumat anbara g??nd??rildi",
                                showConfirmButton: false,
                                timer: 3000
                            })
                        }
                        else{
                            swal({
                                icon: 'error',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 3000
                            })
                        }
                    }
                })
            }
        })
        $(document).on('click', '.send_courier', function() {
            let courierNumber = prompt("Kuriyerin n??mr??si?", "");
            let id = $(this).attr('data-id');
            if(courierNumber){
                $.ajax({
                    url: "{{ route('manage.order.invoice_send_courier') }}",
                    type: "GET",
                    data: {
                        id,
                        number: courierNumber
                    },
                    success: function(data) {
                        console.log(data)
                        if(data.status == 'success'){
                            swal({
                                icon: 'success',
                                title: "M????t??ri ??nvan?? kuriyer?? g??nd??rildi",
                                showConfirmButton: false,
                                timer: 3000
                            })
                        }
                        else{
                            swal({
                                icon: 'error',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 3000
                            })
                        }
                    }
                })
            }
            
            
        })
    </script>
@endsection
