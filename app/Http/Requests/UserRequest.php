<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Password;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'f_name' => ['required','string', 'max:255'],
            'l_name' => ['required','string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],

            'contact_number' => ['required', 'string', 'max:255', 'unique:users'],
            'whatsapp_number' => ['required', 'string',  'max:255', 'unique:users'],
            'address' => ['required','max:255'],
            'role' => ['required'],
            'status' => ['required'],
            'image' => ['mimes:jpg,png,jpeg', 'max:2048'],
            'password' => ['required', 'confirmed', 'min:4', 'regex:/\d/'],
        ];
    }
}
