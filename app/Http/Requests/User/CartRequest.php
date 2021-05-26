<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'quantity'=>'min:1|max:10',
        ];   
    }

    public function messages()
    {
        return [
            'quantity.min'=> ':attribute phải có giá trị trong khoảng từ 1 đến 10',
            'quantity.max'=>':attribute phải có giá trị trong khoảng từ 1 đến 10',
        ];
    }
    public function attributes()
    {
        return [
            'quantity'=> ' Số Lượng',

        ];

    }
}
