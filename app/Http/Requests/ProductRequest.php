<?php

namespace App\Http\Requests;

use Carbon\Carbon;
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
            'name' => 'required|string|min:3|max:255',
            'categoryId' => 'required|numeric|exists:categories,id',
            'location' => 'required|numeric|exists:cities,id',
            'sub_category_id' => 'required|numeric|exists:sub_categories,id',
            'description' => 'required|min:30|max:1200',
            'property_value_id' => 'required|array',
            'start_price' => 'required|numeric|digits_between:1,10',
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
            'location.required' => 'the city field is required',
            'property_value_id.required' => 'the properties fields is required',
            'sub_category_id.required' => 'the sub category fields is required',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'name' => $this->productName,
            'sub_category_id' => $this->subCategoryId,
            'location' => $this->cityId,
            'description' => $this->description,
            'start_price' => $this->startPrice,
            'status' => "active",
            'deadline' => Carbon::parse($this->deadline)->minute(0),
            'property_value_id' => $this->propertyValueId
        ]);
    }
}
