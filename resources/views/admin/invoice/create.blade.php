@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                              
                                <li class="breadcrumb-item active">إضافة فاتورة
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
                                    <h4 class="card-title" id="basic-layout-form"> إضافة فاتورة </h4>
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
                                        <form class="form" action="{{route('admin.invoices.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="customer_name">Customer name</label>
                                            <input type="text" name="customer_name" class ="form-control">
                                            @error('customer_name')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            </div>
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="customer_email">Customer email</label>
                                            <input type="text" name="customer_email" class ="form-control">
                                            @error('customer_email')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            </div>
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="customer_mobile">Customer mobile</label>
                                            <input type="text" name="customer_mobile" class ="form-control">
                                            @error('customer_mobile')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="company_name">Company name</label>
                                            <input type="text" name="company_name" class ="form-control">
                                            @error('company_name')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            </div>
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="Invoice_number">Invoice number</label>
                                            <input type="text" name="Invoice_number" class ="form-control">
                                            @error('Invoice_number')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            </div>
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="Invoice_Date">Invoice date</label>
                                            <input type="text" name="Invoice_Date" class ="form-control">
                                            @error('Invoice_Date')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            </div>
                                            </div>
                 <div class="table-responsive">
                  <table class= "table" id ="invoice_details">
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

                <tr class="cloning_row" id="0">
                 <td>#</td>
                 <td>
<input type="text" name="product_name[0]"id="product_name" class="product_name form-control">

                 </td>


                 <td>
<select name="unite[0]"id ="unit" class="unit form-control">
<option ></option>
<option value="piece ">Piece</option>
<option value="g" >Gram</option>
<option value="kg ">Killo gram</option>
</select>

@error('unit')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                 </td>
                 <td>
                 <input type="number" step="0.1" name="quantity[0]"id="quantity" class="quantity form-control">
                 @error('quantity')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                 </td>
               
                 <td>
                 <input type="number" step="0.1" name="unit_price[0]"id="unit_price" class="unit_price form-control">
                 @error('unit_price')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                 </td>
                 <td>
                 <input type="number" name="sub_total[0]"id="sub_total" class="sub_total form-control" readonly="readonly">
                 @error('sub_total')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                 </td>
                </tr>
                </tbody>

                <tfoot>
                <tr>
                <td colspan="6">
                <button type="button" id ="btn_add" class="btn_add btn-primary">Add another product</button>
                </td>
                </tr>
                <tr>
                <td colspan="3"></td>
                <td colspan="2">Sub Total</td>
                <td><input type="number" step="0.1" name="row_sub_total" id= row_sub_total class ="row_sub_total form-control"readonly="readonly" ></td>
                </tr>
<tr>
<td colspan="3"></td>
                <td colspan="2">Discount</td>
                <td><div class="input-group nb-3">
                <select name="discount_type"id="discount_type" class="discount_type custom-select">
                <option value="fixed">SR</option>
                <option value="percentage">percentage</option>
                <div class="input-group-oppend">
                <input type="number" step="0.1" name="discount_value" id= discount_value class ="discount_value  form-control" value="0.00">


</select>
</td>

</tr>
<tr>
                <td colspan="3"></td>
                <td colspan="2">VAT (5%)</td>
                <td><input type="number" step="0.1" name="vat_value" id= vat_value class ="vat_value form-control"readonly="readonly" ></td>
                </tr>
                <tr>
                <td colspan="3"></td>
                <td colspan="2">Shipping</td>
                <td><input type="number" step="0.1" name="shipping" id= shipping class ="shipping form-control" ></td>
                </tr>

                <tr>
                <td colspan="3"></td>
                <td colspan="2">Total Due</td>
                <td><input type="number" step="0.1" name="total_due" id= total_due class ="total_due form-control" readonly="readonly"></td>
                </tr>
           
                </tfoot>

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
let unit_price=$row.find('.unit_price').val() ||0;
$row.find('.sub_total').val((quantity*unit_price).toFixed(2));
$('#row_sub_total').val(row_sub_total('.sub_total'));
$('#vat_value').val(calculate_vat());
$('#total_due').val(sum_due_total());
});


$('#invoice_details').on('keyup blur','.unit_price',function()
{
let $row=$(this).closest('tr');
let quantity=$row.find('.quantity').val() || 0;
let unit_price=$row.find('.unit_price').val() ||0;
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
'<select name="unite[]"id ="unit" class="unit form-control">'+
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
                 '<input type="number" step="0.1" name="unit_price[]"id="unit_price" class="unit_price form-control">'+
               
                 '</td>'+
                '<td>'+
                 '<input type="number" name="sub_total[]"id="sub_total" class="sub_total form-control" readonly="readonly">'+
             
               ' </td>'+
                '</tr>'+
              
''));


});
$(document).on('click','.delegated-btn',function(e)
{
e.preventDefault();
$(this).parent().parent().remove();
$('#row_sub_total').val(row_sub_total('.sub_total'));
$('#vat_value').val(calculate_vat());
$('#total_due').val(sum_due_total());
});

});

</script>
 <div class="text-right pt-3">
<button type="submit" name="save"  class="btn btn-primary" >Save</button>
                                           </div>
@endsection
