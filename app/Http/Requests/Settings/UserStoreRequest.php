<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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

        $rules = [
            'name' => 'required|string|max:255|min:3',
            'roles' => 'required'
        ];
        if ($this->getMethod() == 'POST') {
            $rules += [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:password_confirmation',
            ];
        } else {

            $rules += [
                'email' => 'nullable|email',
                'password' => 'nullable|same:password_confirmation',
            ];
        }
        return $rules;
    }
}
