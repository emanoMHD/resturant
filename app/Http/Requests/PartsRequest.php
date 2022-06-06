<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartsRequest extends FormRequest
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


            'part_name'=> 'required|string|max:100',
          
           'part_email' => 'required',
         
         
            'part_mobile' => 'required' ,
            'part_city' => 'required' ,
            'Category_name' => 'required' ,
           'company_name' => 'required',
       
          
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
            'part_name.string' => 'اسم اللغة لابد ان يكون احرف',
            'part_mobile.digits' => 'يجب ان يكون هذا الحقل ارقام',
           
        ];
    }
}
