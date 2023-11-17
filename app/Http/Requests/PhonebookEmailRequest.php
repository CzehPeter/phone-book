<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhonebookEmailRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['nullable', 'email', 'max:128', 'unique:phonebook_emails,email'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
