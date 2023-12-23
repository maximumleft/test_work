<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|nullable',
            'username' => 'string|required|max:255|regex:/^[a-zA-Z0-9]+$/i',
            'email' => 'string|required|email',
            'password' => 'string|required',
            'is_blocked' => 'boolean|nullable',
        ];
    }
}
