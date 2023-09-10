<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'f_name' => ['required','string', 'max:255'],
            'l_name' => ['required','string', 'max:255'],
            'email' => ['required','email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'contact_number' => ['required','string', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'whatsapp_number' => ['required','string', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'address' => ['max:255'],
            
        ];
    }
}
