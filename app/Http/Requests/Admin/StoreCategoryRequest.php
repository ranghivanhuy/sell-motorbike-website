<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name'=>'required|min:2|max:255|unique:categories,name',
        ];
    }


    public function messages()
    {
        return [
            'name.required'=> ':attribute không được để trống',
            'name.min'=> ':attribute phải đủ từ 2 ký tự',
            'name.max'=>':attribute phải đủ từ 2 đến 255 ký tự',
            'name.unique'=>':attribute đã tồn tại trong hệ thống',
        ];
    }

     public function attributes()
    {
         return [
            'name'=> 'Tên loại sản phẩm',
            
        ];
    }
}
