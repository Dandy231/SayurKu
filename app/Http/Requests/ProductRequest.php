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
            'category_id' => 'required|integer',
            'title' => 'required|max:255|string',
            'subtitle' => 'required|string',
            'price' => 'required|integer',
            'unit' => 'required|string',
            'description' => 'required|string',
            'stock' => 'required|integer',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'picturePath' => 'required|image',
        ];
    }
}
