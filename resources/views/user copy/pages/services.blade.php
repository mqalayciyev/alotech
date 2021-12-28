@extends('user.layouts.app')
@section('title', 'Xidmətlər')
@section('content')
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                <li class="active">Xidmətlər</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--single">
        <div class="ps-faqs">
            <div class="container">
                <div class="ps-section__header">
                    <h1>Xidmətlərimiz</h1>
                </div>
                <div class="ps-section__content">
                    <div class="table-responsive">
                        <table class="table ps-table--faqs">
                            <tbody class="text-center">
                                @if (count($services) > 0)
                                    @foreach ($services as $service)
                                        <tr>
                                            <td class="question"> {{ $service->services_name }}</td>
                                            <td class="heading">
                                                <h4 class="m-0">{{ $service->services_price }}</h4>
                                            </td>
                                            <td>
                                                <a href="tel:{{ old('mobile', $website_info->mobile) }}" class="ps-btn ps-btn-sm">Sifarişet</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
