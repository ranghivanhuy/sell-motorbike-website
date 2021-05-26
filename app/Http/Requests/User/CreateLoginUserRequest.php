<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateLoginUserRequest extends FormRequest
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
            'email'=>'required|min:5|max:35',
            'password'=>'required|min:6|max:25',
        ];   
    }

    public function messages()
    {
        return [
            'email.required'=> 'không được để trống',
            'email.min'=> ':attribute phải đủ từ 5 ký tự đến 35 kí tự',
            'email.max'=>':attribute phải đủ từ 5 đến 35 ký tự',
            'password.required'=> ':attribute không được để trống',
            'password.min'=> ':attribute phải đủ từ 2 ký tự',
            'password.max'=>':attribute phải đủ từ 2 đến 255 ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'email'=> 'Email Đăng Nhập',
            'password'=>'Password',
        ];

    }
}
