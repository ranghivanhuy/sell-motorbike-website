<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileUserRequest extends FormRequest
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
            'email'=>'required|min:5|max:35',
            'address'=>'required|min:10',
            'phone'=>'required',
        ];   
    }

    public function messages()
    {
        return [
            'name.required' => ':attributes không được để trống',
            'name.max' => ':attributes không quá 35 kí tự',
            'email.required'=> ':attributes không được để trống',
            'email.min'=> ':attribute phải đủ từ 5 ký tự đến 35 kí tự',
            'email.max'=>':attribute phải đủ từ 5 đến 35 ký tự',
            'address.required ' => ':attributes không được để trống',
            'address.min' => ':attributes phải ít nhất 10 kí tự',
            'phone.required' => ':attributes không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên đắng kí',
            'email'=> 'Email đăng kí',
            'address'=>'Địa chỉ đăng kí',
            'phone'=>'Số điện thoại',
            
        ];

    }
}
