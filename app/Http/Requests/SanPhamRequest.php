<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
        $arranAction=$this->route()->getActionMethod();
        switch ($this->method()) {
            case 'POST':
                switch ($arranAction) {
                    case 'add':
                        # code...
                        $rules=[
                            'ten_sp'=>'required',
                            'gia_thitruong'=>'required',
                            'mota_ngan'=>'required',
                            'mota_sp'=>'required',
                            'id_danhmuc'=>'required',
                        ];
                        break;
                    case 'update':
                        $rules=[
                            'ten_sp'=>'required',
                            'gia_thitruong'=>'required',
                            'mota_ngan'=>'required',
                            'mota_sp'=>'required',
                        ];
                        break;
                    default:
                        # code...
                        break;
                }
                # code...
                break;

            default:
                # code...
                break;
        }
        return $rules;
    }
    public function messages()
    {
        return[
            'ten_sp.required'=>'Bạn phải nhập tên sản phẩm',
            'gia_thitruong.required'=>'Bạn phải nhập giá ',
            'mota_ngan.required'=>'Bạn phải nhập mô tả',
            'mota_sp.required'=>'Bạn phải nhập mô tả sản phẩm'
        ];
    }
}
