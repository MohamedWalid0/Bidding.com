<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNotificationReques extends FormRequest
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
            'message' => ['required', 'string'],
            'ids' => ['required_without:all', 'array'],
            'ids.*' => ['exists:users,id'],
            'all' => ['nullable'],
            'type' => ['required', Rule::in(['mail', 'database', 'broadcast'])]
        ];
    }

    public function messages()
    {
        return [
            'ids.required_without' => 'select at least one user',
            'type.in' => 'Please select Type Of Notification'
        ];
    }
}
