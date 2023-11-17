<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\ValueObjects\PhoneNumber;

class ValidPhoneNumber implements Rule
{
    public function passes($attribute, $value): bool {
        return !empty(PhoneNumber::getFromString($value));
    }

    public function message(): string {
        return 'The phone number format is invalid.';
    }
}
