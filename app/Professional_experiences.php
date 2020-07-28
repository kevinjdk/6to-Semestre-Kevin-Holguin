<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional_experiences extends Model
{
    protected $connection = 'pgsql-bolsa_empleo';
    protected $fillable = [
        'professional_id',
        'employer',
        'position',
        'job_description',
        'start_date',
        'finish_date',
        'reason_leave',
        'current_work',
    ];
}
