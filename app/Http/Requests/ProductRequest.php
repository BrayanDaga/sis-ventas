<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'nullable | min:5',
            'price' => 'required| min:1',
            'stock' => 'required| min:0',
            'status' => 'required| in:activo,inactivo',
            'image' => 'nullable| image',
            'category_id' => 'required',
            'person_id' => 'required',
        ];
    }
}
