<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'email' => 'bail|required|unique:users',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập tên sản phẩm',
            'email.unique' => 'Mail đã tồn tại vui lòng kiểm tra lại',
        ];
    }
}
