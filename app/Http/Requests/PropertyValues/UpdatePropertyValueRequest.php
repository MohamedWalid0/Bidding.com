<?php

namespace App\Http\Requests\PropertyValues;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePropertyValueRequest extends FormRequest
{
    protected $errorBag = 'updatePropertyValue';

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
            'value' => ['required', 'string', Rule::unique('property_values')
                ->where(function ($query) {
                    return $query->where('property_id', $this->property->id)
                        ->where('value', $this->value);
                })]
        ];
    }
}
