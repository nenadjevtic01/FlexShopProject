<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'=>'required',
            'product_name'=>'required|max:30|min:4',
            'price'=>'required|min:1|max:9999|numeric',
            'material'=>'required|min:5|max:30',
            'coo'=>'required|min:5|max:30'
        ];
    }
}
