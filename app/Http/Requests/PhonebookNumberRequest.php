<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhonebookNumberRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phonebook_id' => ['required', 'integer'],
            'phone_number'  => ['nullable', 'string', 'max:20', 'min:10', 'unique:phone_numbers,phone_number'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
