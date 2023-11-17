<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidPhoneNumber;

class PhonebookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'                    => ['required', 'max:128'],
            'zip_code'                => ['nullable', 'max:4'],
            'city'                    => ['nullable', 'max:128'],
            'street'                  => ['nullable', 'max:128'],
            'address_details'         => ['nullable', 'max:128'],
            'mailing_zip_code'        => ['nullable', 'max:4'],
            'mailing_city'            => ['nullable', 'max:128'],
            'mailing_street'          => ['nullable', 'max:128'],
            'mailing_address_details' => ['nullable', 'max:128'],
            'email'                   => ['nullable', 'email', 'max:128', 'unique:phonebook_emails,email'],
            'phone'                   => ['required', 'min:10', 'max:20', 'unique:phonebook_phones,phone', new ValidPhoneNumber],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
