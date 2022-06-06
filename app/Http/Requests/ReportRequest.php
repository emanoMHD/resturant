<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;  //admin guard
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        return [


            'vendor_name'=> 'required|string|max:100',
            'report_number' => 'required',
            'report_Date' => 'required',
           'vendor_email' => 'required',
         
           'row_sub_total' => 'required',
           
       
            'discount_type' => 'required',
            'discount_value' => 'required',
            'vat_value' => 'required' ,
            'shipping' => 'required'  ,
            'total_due' => 'required' ,
          // 'product_name[0]'=>'required|exists:sub_categories,name',
         /*   'unite'=> 'required',
            'unite_price'=>'required',
            'sub_total'=>'required',
            'quantity'=>'required',*/
      
        ]; 
       /* $details_list = [];
        for ($i = 0; $i < count($request->product_name); $i++) {
            return[
            $details_list[$i]['product_name'] => 'required|exists:sub_categories,name',
            $details_list[$i]['unite'] =>'required',
            $details_list[$i]['quantity'] =>'required',
            $details_list[$i]['unite_price'] =>'required',
            $details_list[$i]['sub_total'] =>'required',];
        }*/
    }

    


    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'customer_name.string' => 'اسم اللغة لابد ان يكون احرف',
            'customer_mobile.digits' => 'يجب ان يكون هذا الحقل ارقام',
           
        ];
    }
}
