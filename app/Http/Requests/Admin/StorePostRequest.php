<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'=>'required|min:10|unique:posts,title',
            'slug'=>'required|min:10|unique:posts,slug',
            'content'=>'required|',
        ];
    }

    public function messages()
    {
        return [
            'required'=>':attribute không được để trống',
            'min'=>':attribute phải ít nhất 10 ký tự',
            'unique'=>':attribute đã tồn tại',
        ];
    }

    public function attributes()
    {
        return [
            'title'=>'Tên bài viết',
            'slug'=>'Nội dung tóm tắt bài viết',
            'content'=>'Nội dung chính của bài viết',
        ];
        
    }
}
