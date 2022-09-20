<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use function Termwind\ValueObjects\p;

class CheckOutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
       $rules=[];
       $acction=$this->route()->getActionMethod();
       switch ($this->method()){
           case'POST':
               switch ($acction){
                   case'postCheckOut':
                       $rules=[
                           'name'=>'required',
                           'email'=>'required',
                           'province_id'=>'required|not_in:0',
                           'district_id'=>'required',
                           'address'=>'required',
                           'phone'=>'required',
                       ];
                       break;
                   default:
                       break;
               }
               break;
           default:
               break;
       }
       return $rules;
//       dd($acction);
    }
    public function messages()
    {
        return[
            'name.required'=>'Bạn phải nhập tên',
            'email.required'=>'Bạn phải nhập email',
            'province_id.required'=>'Bạn phải chọn Tỉnh/Thành',
            'district_id.required'=>'Bạn phải chọn Quận/Huyện',
            'address.required'=>'Bạn phải nhập địa chỉ',
            'phone.required'=>'Bạn phải nhập số điện thoại',
        ];
    }
}
