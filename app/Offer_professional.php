<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer_professional extends Model
{
    protected $connection = 'pgsql-bolsa_empleo';
    protected $fillable = [
        'offer_id',
        'professional_id',
    ];
}
