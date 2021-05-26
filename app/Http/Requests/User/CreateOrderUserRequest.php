<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderUserRequest extends FormRequest
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
            'name'=>'required|max:35',
            'address'=>'required',
            'phone'=>'required',
        ];   
    }

    public function messages()
    {
        return [
            'name.required' => ':attributes không được để trống',
            'name.max' => ':attributes không quá 35 kí tự',
            'address.required ' => ':attributes không được để trống',
            'phone.required' => ':attributes không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên đắng kí',
            'address'=>'Địa chỉ đăng kí',
            'phone'=>'Số điện thoại',
            
        ];

    }
}
