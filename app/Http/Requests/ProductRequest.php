<?php

namespace App\Http\Requests;

use App\Models\Product;
use App\Models\Role;
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
            'productName' => 'required|string|min:3|max:255',
            'categoryId' => 'required|numeric|exists:categories,id',
            'cityId' => 'required|numeric|exists:cities,id',
            'subCategoryId' => 'required|numeric|exists:sub_categories,id',
            'description' => 'required|min:30|max:1200',
            'propertyValueId' => 'required|array',
            'startPrice' => 'required|numeric|digits_between:1,10',
            'deadline' => 'required|date|after:now',
            'images' => 'required|array',
            'images.*' => 'mimes:jpg,jpeg,png,bmp|max:20000'
        ];
    }

    public function messages()
    {
        return [
            'images.required' => 'Please upload an image',
            'images.*.mimes' => 'the image must jpg,jpeg,png,bmp',
            'cityId.required' => 'the city field is required',
            'propertyValueId.required' => 'the properties fields is required',
            'subCategoryId.required' => 'the sub category fields is required',
        ];
    }
}
