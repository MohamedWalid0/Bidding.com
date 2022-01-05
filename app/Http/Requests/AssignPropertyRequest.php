<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AssignPropertyRequest extends FormRequest
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

    public function messages() {
        return [
            'property_id.unique' => 'The property you want add already exist',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'property_id'=>  [
                'required',
                Rule::unique('properties_sub_categories')
                ->where(function ($query) {
                    return $query->where('sub_category_id', $this->sub_category->id)
                    ->where('property_id', $this->property_id);
                }),
            ]
        ];
    }
}
