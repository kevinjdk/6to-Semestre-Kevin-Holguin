<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    protected $connection = 'pgsql-bolsa_empleo';
    protected $fillable = [
        'identity',
        'email',
        'first_name',
        'last_name',
        'nationality',
        'civil_state',
        'birthdate',
        'gender',
        'phone',
        'address', 
        'about_me', 
        'state',
    ];
}
