<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','confirmed','min:8'],
            'is_admin'=>['required']
        ];
    }
    public function messages()
    {
        return [
            'password.confirmed'=>'password does not match the confirm password',
            'is_admin.required'=>'user role is required'
        ];
    }
}
