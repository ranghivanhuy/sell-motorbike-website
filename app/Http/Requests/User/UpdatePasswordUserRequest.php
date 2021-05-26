<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordUserRequest extends FormRequest
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
            'password_old'=>'required|min:6|max:40',
            'password_new'=>'required|min:6|max:40',
            'repassword_new'=>'required|min:6|max:40',
            
        ];   
    }

    public function messages()
    {
        return [
            
            'password_old.required'=> ':attribute không được để trống',
            'password_old.min' => ':attribute phải đủ từ 6 đển 40 ký tự',
            'password_old.max' => ':attribute phải đủ từ 6 đến 40 ký tự',
            'password_new.required'=> ':attribute không được để trống',
            'password_new.min' => ':attribute phải đủ từ 6 đển 40 ký tự',
            'password_new.max' => ':attribute phải đủ từ 6 đến 40 ký tự',
            'repassword_new.required'=> ':attribute không được để trống',
            'repassword_new.min' => ':attribute phải đủ từ 6 đển 40 ký tự',
            'repassword_new.max' => ':attribute phải đủ từ 6 đến 40 ký tự',
            
        ];
    }
    public function attributes()
    {
        return [
            'password_old' => 'Mật Khẩu Cũ',
            'password_new'=> 'Mật Khẩu Mới',
            'repassword_new'=>' Nhập Lại Mật Khẩu Mới',

            
        ];

    }
}
