<?php

namespace App\Models;

use App\ValueObjects\PhoneNumber as PhoneNumberValueObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Casts\PhoneNumber as PhoneNumberCast;
use App\Models\Phonebook;

class PhonebookNumber extends Model
{
    use HasFactory;

    protected $table = 'phonebook_numbers';

    protected $fillable = [
        'phonebook_id',
    ];

    protected $casts = [
        'phone_number' => PhoneNumberCast::class,
    ];

    public function getPhoneNumberAttribute($value)
    {
        return $value;
    }

    public function setPhoneNumberAttribute($value)
    {
        $this->attributes['phone_number'] = PhoneNumber::getFromString($value);
    }

    public function phonebook()
    {
        return $this->belongsTo(Phonebook::class);
    }
}
