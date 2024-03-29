@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.reports')}}">الفواتير </a>
                                </li>
                                <li class="breadcrumb-item active">عرض فاتورة
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> عرض تقرير </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.reports.update',$report-> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="vendor_name">vendor name</label>
                                            <input type="text" name="vendor_name" class ="form-control"value="{{$report->vendor_name}}">
                                            @error('vendor_name')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            </div>
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="vendor_email">vendor email</label>
                                            <input type="text" name="vendor_email" class ="form-control"
                                            value="{{$report->vendor_email}}">
                                            @error('vendor_email')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            </div>
                                           

                                           
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="report_number">report number</label>
                                            <input type="text" name="report_number" class ="form-control"
                                            value="{{$report->report_number}}">
                                            @error('report_number')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            </div>
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="report_Date">report date</label>
                                            <input type="text" name="report_Date" class ="form-control"
                                            value="{{$report->report_date}}">
                                            @error('report_Date')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            </div>
                                            </div>
                 <div class="table-responsive">
                  <table class= "table" id ="report_details">
                  <thead>
                  <tr>
                  <th></th>
                  <th> Product name</th>
                  <th>  Unite</th>
                  <th>Quantity</th>
                  <th>Unite price</th>
                  <th>Subtotal</th>
                </tr>
                </thead>

                <tbody>

                @foreach($report->details as $item)
                                <tr class="cloning_row" id="{{ $loop->index }}">
                                    <td>
                                        @if($loop->index == 0)
                                        {{ '#' }}
                                        @else
                                            <button type="button" class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" name="product_name[{{ $loop->index }}]" id="product_name" value="{{ old('product_name', $item->product_name) }}" class="product_name form-control">
                                        @error('product_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <select name="unite[{{ $loop->index }}]" id="unite" class="unit form-control">
                                            <option></option>
                                            <option value="piece" {{ $item->unite == 'piece' ? 'selected' : '' }}>{{ __('piece') }}</option>
                                            <option value="g" {{ $item->unite == 'g' ? 'selected' : '' }}>{{ __('gram') }}</option>
                                            <option value="kg" {{ $item->unite == 'kg' ? 'selected' : '' }}>{{ __('kilo_gram') }}</option>
                                        </select>
                                        @error('unite')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" name="quantity[{{ $loop->index }}]" step="0.01" id="quantity" value="{{ old('quantity', $item->quantity) }}" class="quantity form-control">
                                        @error('quantity')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" name="unite_price[{{ $loop->index }}]" step="0.01" id="unite_price" value="{{ old('unite_price', $item->unite_price) }}" class="unite_price form-control">
                                        @error('unite_price')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" name="sub_total[{{ $loop->index }}]" id="sub_total" value="{{ old('sub_total', $item->sub_total) }}" class="sub_total form-control" readonly="readonly">
                                        @error('sub_total')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                </tr>
                                @endforeach
                </tbody>

                <tfoot>
                <tr>
               
                </tr>
                <tr>
                <td colspan="3"></td>
                <td colspan="2">Sub Total</td>
                <td><input type="number" step="0.1"value="{{$report->row_sub_total}}" name="row_sub_total" id= row_sub_total class ="row_sub_total form-control"readonly="readonly" ></td>
                </tr>
<tr>
<td colspan="3"></td>
                <td colspan="2">Discount</td>
                <td><div class="input-group nb-3">
                <select name="discount_type"id="discount_type"value="{{$report->discount_type}}" class="discount_type custom-select">
                <option value="fixed">SR</option>
                <option value="percentage">percentage</option>
                <div class="input-group-oppend">
                <input type="number" step="0.1" name="discount_value" value="{{$report->discount_value}}"id= discount_value class ="discount_value  form-control" value="0.00">


</select>
</td>

</tr>
<tr>
                <td colspan="3"></td>
                <td colspan="2">VAT (5%)</td>
                <td><input type="number" step="0.1" name="vat_value"value="{{$report->VAT_value}}" id= vat_value class ="vat_value form-control"readonly="readonly" ></td>
                </tr>
                <tr>
                <td colspan="3"></td>
                <td colspan="2">Shipping</td>
                <td><input type="number" step="0.1" name="shipping"value="{{$report->shipping}}" id= shipping class ="shipping form-control" ></td>
                </tr>

                <tr>
                <td colspan="3"></td>
                <td colspan="2">Total Due</td>
                <td><input type="number" step="0.1" name="total_due" id= total_due value="{{$report->total_due}}"class ="total_due form-control" readonly="readonly"></td>
                </tr>

                </tfoot>
                <div class="row">
                        <div class="col-12 text-center">
                            <a href="{{ route('admin.invoices.print', $report->id) }}" class="btn btn-primary btn-sm ml-auto"><i class="fa fa-print"></i> {{ __('print') }}</a>
                            <a href="{{ route('admin.invoices.pdf', $report->id) }}" class="btn btn-secondary btn-sm ml-auto"><i class="fa fa-file-pdf"></i> {{ __('export pdf') }}</a>
                            <a href="{{ route('admin.reports.sendEmail', $report->id) }}" class="btn btn-success btn-sm ml-auto"><i class="fa fa-envelope"></i> {{ __('send to email') }}</a>
                        </div>
                    </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
@section('script')
<script>
$(document).ready(function(){
$('#invoice_details').on('keyup blur','.quantity',function()
{
let $row=$(this).closest('tr');
let quantity=$row.find('.quantity').val() ||0;
let unit_price=$row.find('.unite_price').val() ||0;
$row.find('.sub_total').val((quantity*unit_price).toFixed(2));
$('#row_sub_total').val(row_sub_total('.sub_total'));
$('#vat_value').val(calculate_vat());
$('#total_due').val(sum_due_total());
});


$('#invoice_details').on('keyup blur','.unite_price',function()
{
let $row=$(this).closest('tr');
let quantity=$row.find('.quantity').val() || 0;
let unit_price=$row.find('.unite_price').val() ||0;
$row.find('.sub_total').val((quantity*unit_price).toFixed(2));
$('#row_sub_total').val(row_sub_total('.sub_total'));
$('#vat_value').val(calculate_vat());
$('#total_due').val(sum_due_total());
});
$('#invoice_details').on('keyup blur','.discount_value',function()
{

$('#vat_value').val(calculate_vat());
$('#total_due').val(sum_due_total());
});

$('#invoice_details').on('keyup blur','.discount_type',function()
{

$('#vat_value').val(calculate_vat());
$('#total_due').val(sum_due_total());
});
$('#invoice_details').on('keyup blur','.shipping',function()
{

$('#vat_value').val(calculate_vat());
$('#total_due').val(sum_due_total());
});


let row_sub_total=function($selector)
{
let sum=0;
$($selector).each(function()
{

    let selectvalue=$(this).val()!=''? $(this).val(): 0;
    sum+=parseFloat(selectvalue);
    
}
);
return sum.toFixed(2);
}

let calculate_vat=function(){


    let sub_totalv=$('.row_sub_total').val()||0;
    let discount_type=$('.discount_type').val();
    let discount_value=parseFloat($('.discount_value').val())||0;
    let discountval=discount_value!=0?discount_type='percentage'?sub_totalv*(discount_value/100):discountval:0;
let vat_value=(sub_totalv-discountval)*0.05;
return vat_value.toFixed(2);
}
let sum_due_total=function(){
let sum=0;

let sub_totalv=$('.row_sub_total').val()||0;
let discount_type=$('.discount_type').val();
let discount_value=parseFloat($('.discount_value').val())||0;
let discountval=discount_value!=0?discount_type='percentage'?sub_totalv*(discount_value/100):discountval:0;
let vat_value=parseFloat($('.vat_value').val())||0;
let  shipping_value=parseFloat($('.shipping').val())||0;
sum+=sub_totalv;
sum-=discount_value;
sum+=vat_value;
sum+=shipping_value;
return sum.toFixed(2);
}


$(document).on('click','.btn_add',function()
{

let trcount=$('#invoice_details').find('tr.cloning_row:last').lengh;
let numinc=trcount>0?parseInt($('#invoice_details').find('tr.cloning_row:last').attr('id'))+1:0;
$('#invoice_details').find('tbody').append($(''+
'<tr class="cloning_row" id="' +numinc+ '">' +
                '<td><button type="button" class ="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></button></td>' +
                 '<td>' +
'<input type="text" name="product_name[]"id="product_name" class="product_name form-control">'+

                '</td>'+


                '<td>'+
'<select name="unite[]"id ="unite" class="unite form-control">'+
'<option ></option>'+
'<option value="piece ">Piece</option>'+
'<option value="g" >Gram</option>'+
'<option value="kg ">Killo gram</option>'+
'</select>'+


                '</td>'+
                 '<td>'+
                 '<input type="number" step="0.1" name="quantity[]"id="quantity" class="quantity form-control">'+
               
                 '</td>'+
               
                 '<td>'+
                 '<input type="number" step="0.1" name="unite_price[]"id="unite_price" class="unite_price form-control">'+
               
                 '</td>'+
                '<td>'+
                 '<input type="number" name="sub_total[]"id="sub_total" class="sub_total form-control" readonly="readonly">'+
             
               ' </td>'+
                '</tr>'+
''));


});


});
</script>

@endsection
