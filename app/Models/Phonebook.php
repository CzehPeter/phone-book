<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PhonebookEmail;
use App\Models\PhonebookNumber;

class Phonebook extends Model
{
    use HasFactory;

    protected $table = 'phonebook';

    protected $fillable = [
        'name',
        'zip_code',
        'city',
        'street',
        'address_details',
        'mailing_zip_code',
        'mailing_city',
        'mailing_street',
        'mailing_address_details',
    ];

    public function emails()
    {
        return $this->hasMany(PhonebookEmail::class);
    }

    public function numbers()
    {
        return $this->hasMany(PhonebookNumber::class);
    }
}
