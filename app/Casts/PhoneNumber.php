<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use App\ValueObjects\PhoneNumber as PhoneNumberValueObject;

/**
 * Casts phone number to PhoneNumberValueObject
 * ----------------------------------------------------
 */
class PhoneNumber implements CastsAttributes
{

    /**
     * @param  mixed  $value
     * @return string|mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return $value;
    }

    /**
     * SET value
     *
     * @param  mixed  $value
     * @return string|mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}
