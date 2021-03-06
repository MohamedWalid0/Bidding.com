<?php

namespace App\Http\Requests;

use App\Models\Support;
use Illuminate\Foundation\Http\FormRequest;

class SupportMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => ['required' , 'string' ]
        ];
    }

    public function authorize(): bool
    {
        return $this->user()->can('reply', Support::class);
    }
}
