<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRegisterUserRequest extends FormRequest
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
            're_email'=>'required|min:5|max:35|unique:users,email',
            're_password'=>'required|min:6|max:40',
            'address'=>'required|min:10',
            'phone'=>'required',
        ];   
    }

    public function messages()
    {
        return [
            'name.required' => ':attributes không được để trống',
            'name.max' => ':attributes không quá 35 kí tự',
            're_email.required'=> ':attributes không được để trống',
            're_email.min'=> ':attribute phải đủ từ 5 ký tự đến 35 kí tự',
            're_email.max'=>':attribute phải đủ từ 5 đến 35 ký tự',
            're_email.unique'=>':attribute đã tồn tại',
            're_password.required'=> ':attribute không được để trống',
            're_password.min' => ':attribute phải đủ từ 6 đển 40 ký tự',
            're_password.max' => ':attribute phải đủ từ 6 đến 40 ký tự',
            'address.required ' => ':attributes không được để trống',
            'address.min' => ':attributes phải ít nhất 10 kí tự',
            'phone.required' => ':attributes không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên đắng kí',
            're_email'=> 'Email đăng kí',
            're_password'=>'Password đăng kí',
            'address'=>'Địa chỉ đăng kí',
            'phone'=>'Số điện thoại',
            
        ];

    }
}
