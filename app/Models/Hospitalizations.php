<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospitalizations extends Model
{
    protected $table = 'hospitalizations_uti';

    protected $fillable = [
        'beds',
        'busy_beds' ,
        'patients_teo',
        'patients_not_teo',
        'date_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
