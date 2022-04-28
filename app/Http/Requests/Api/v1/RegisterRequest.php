<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:users,email|email|max:255|min:3',
            'password' => 'required|string|min:8|max:255|confirmed',
            'name' => 'required|string|min:3|max:255',
            'surname' => 'required|string|min:3|max:255'
        ];
    }
}
