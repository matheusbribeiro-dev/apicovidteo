<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $table = 'vaccine';

    protected $fillable = [
        'dose',
        'applied_dose',
        'date_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
