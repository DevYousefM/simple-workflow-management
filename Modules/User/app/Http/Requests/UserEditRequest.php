<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->route('user')],
            'password' => ['nullable', 'string', 'min:8'],
            'department_id' => ['required', 'exists:departments,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'department_id.required' => 'Department is required',
            'department_id.exists' => 'Department does not exist',
        ];
    }
}
