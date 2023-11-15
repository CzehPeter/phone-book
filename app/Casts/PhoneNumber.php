<?php

namespace Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use App\ValueObjects\PhoneNumber as PhoneNumberValueObject;

/**
 *
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
