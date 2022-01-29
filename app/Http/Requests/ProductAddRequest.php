<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'ten_sp' => 'bail|required|unique:san_phams|max:255|min:5',
           /* 'gia_nhap_sp' => 'required',
            'gia_ban_sp' => 'required',

                'anh_sp' => 'mimes:jpeg,jpg,png,gif',

            array(
                'link' => 'mimes:jpeg,jpg,png,gif'
            ),
            'trang_thai'=>'required'*/
        ];
    }
    public function messages()
    {
        return [
            'ten_sp.required' => 'Vui lòng nhập tên sản phẩm',
            'ten_sp.unique' => 'Tên sản phẩm không được trùng nhau',
            'ten_sp.max' => 'Tên sản phẩm không được quá 255 kí tự',
            'ten_sp.min' => 'Tên sản phẩm không được dưới 5 kí tự',
            /*'gia_nhap_sp.required' => 'Vui lòng nhập giá nhập sản phẩm',
            'gia_ban_sp.required' => 'Vui lòng nhập giá bán sản phẩm',
            'anh_sp.mimes' => 'Ảnh không đúng định dạng',
            'link.mimes' => 'Ảnh không đúng định dạng',
            'trang_thai.required' => 'Nhập trạng thái!',*/
        ];
    }
}
