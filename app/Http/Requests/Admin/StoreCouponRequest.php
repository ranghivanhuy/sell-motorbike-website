<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
            'coupon_name'=>'required|min:6|max:255|unique:coupons,coupon_name',
            'coupon_code'=>'required|min:7|max:255|unique:coupons,coupon_code',
            'coupon_time'=>'required',
            'coupon_number'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'coupon_name.required'=> ':attribute không được để trống',
            'coupon_name.min'=> ':attribute phải đủ từ 6 ký tự',
            'coupon_name.max'=>':attribute phải đủ từ 6 đến 10 ký tự',
            'coupon_name.unique'=>':attribute đã tồn tại trong hệ thống',

            'coupon_code.required'=> ':attribute không được để trống',
            'coupon_code.min'=> ':attribute phải đủ từ 6 ký tự',
            'coupon_code.max'=>':attribute phải đủ từ 6 đến 10 ký tự',
            'coupon_code.unique'=>':attribute đã tồn tại trong hệ thống',

            'coupon_time.required'=> ':attribute không được để trống',
            'coupon_number.required'=> ':attribute không được để trống',
        ];
            
    }

    public function attributes()
    {
        return [
            'coupon_name'=> 'Tên loại Giảm giá',
            'coupon_code'=> 'Mã Giảm giá',
            'coupon_time'=> 'Số Lượng Mã Giảm giá',
            'coupon_number'=> 'Số Tiền Giảm giá',
        ];
         
    }
}
