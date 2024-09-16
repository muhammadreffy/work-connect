<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSignupRequest extends FormRequest
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
            // 'name' => ['required', 'string', 'min:3', 'max:50'],
            'username' => ['required', 'string', 'min:3', 'max:30', 'regex:/^[a-zA-Z0-9._]+$/', 'unique:users,username'],
            // 'avatar' => ['required', 'mimes:png,jpg,jpeg', 'max:2048'],
            'occupation' => ['nullable', 'string'],
            'connect' => ['integer', 'in:10'],
            'role' => ['required', 'string', 'in:client,freelancer'],
            'email' => ['required', 'string', 'lowercase', 'email:rfc,dns', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
        ];
    }
}
