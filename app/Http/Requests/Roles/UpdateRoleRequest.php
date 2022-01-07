<?php

namespace App\Http\Requests\Roles;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    protected $errorBag = 'updateRole';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', Role::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'unique:roles,id,' . $this->role_id ],
            'abilities' => ['required' , 'array']
        ];

    }

    public function prepareForValidation()
    {
        $this->merge([
            'name' => $this->role_name
        ]);
    }

}
