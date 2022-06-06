@extends('layouts.emails-r')
@section('content')

    <h3>{{ __('Emails/emails.dear_user', ['name' => $report->vendor_name]) }}</h3>
    <h4>{{ __('Emails/emails.greetings') }}</h4>
    <p>{!! __('Emails/emails.find_an_report') !!}</p>
    <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$report->report_number}} </title>

    <style>
        body {
            font-family: 'XBRiyaz', sans-serif;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            font-size: 9px;
            line-height: 24px;
            font-family: 'XBRiyaz', sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: right;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td {
            text-align: left;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 30px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: 'XBRiyaz', sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td {
            text-align: right;
        }

        @page {
            header: page-header;
            footer: page-footer;
        }
    </style>
</head>

<body>
<div class="invoice-box {{ config('app.locale') == 'ar' ? 'rtl' : '' }}">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="6">
                <table>
                    <tr>
                       
                   
                        <td colspan="2" align="center"><h2>{{ __('***report information***') }}</h2></td>
                    </tr>

                </table>
            </td>
        </tr>


       

        <tr class="information">
            <td colspan="6">
                <table>
                    <tr>
                        <td width="50%">
                            <h2>{{ __('vendor_email ') }}</h2>{{$report->vendor_email}}
                            <h2> {{ __('vendor_name ') }} </h2>{{ $report->vendor_name}}
                            
                        </td>

                       
                    </tr> 
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td></td>
            <td>{{ __('product_name') }}</td>
            <td>{{ __('unit') }}</td>
            <td>{{ __('quantity') }}</td>
            <td>{{ __('unit_price') }}</td>
            <td>{{ __('sub_total') }}</td>
        </tr>

        @foreach($report->details as $item)
                                <tr class="cloning_row" id="{{ $loop->index }}">
                                    <td>
                                       
                                    </td>
                                    <td>
                                        {{$item->product_name}}
                                        @error('product_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                      
                                            {{ $item->unite }}
                                        @error('unite')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        {{$item->quantity }}
                                        @error('quantity')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        {{$item->unite_price}}
                                        @error('unite_price')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        {{$item->sub_total}}
                                        @error('sub_total')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                </tr>
                                @endforeach
                </tbody>


        <tr class="total">
            <td colspan="4"></td>
            <td>{{ __('sub_total') }}</td>
            <td> {{$report->row_sub_total}}</td>
        </tr>

        <tr class="total">
            <td colspan="4"></td>
            <td>{{ __('discount') }}</td>
            <td> {{$report->discount_value}}</td>
        </tr>
        <tr class="total">
            <td colspan="4"></td>
            <td>{{ __('vat') }}</td>
            <td>{{ $report-> VAT_value}}</td>
        </tr>
        <tr class="total">
            <td colspan="4"></td>
            <td>{{ __('shipping') }}</td>
            <td>{{ $report-> shipping }}</td>
        </tr>
        <tr class="total">
            <td colspan="4"></td>
            <td>{{ __('total_due') }}</td>
            <td>{{ $report-> total_due }}</td>
        </tr>
    </table>
</div>
</body>
</html>


   

@endsection
