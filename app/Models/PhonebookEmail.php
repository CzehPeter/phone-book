<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Phonebook;


class PhonebookEmail extends Model
{
    use HasFactory;

    protected $table = 'phonebook_emails';

    protected $fillable = [
        'phonebook_id',
        'email',
    ];

    public function phonebook()
    {
        return $this->belongsTo(Phonebook::class);
    }
}
