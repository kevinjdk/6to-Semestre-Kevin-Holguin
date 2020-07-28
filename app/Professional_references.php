<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional_references extends Model
{
    protected $connection = 'pgsql-bolsa_empleo';
    protected $fillable = [
        'company_id',
        'professional_id',
    ];
}
