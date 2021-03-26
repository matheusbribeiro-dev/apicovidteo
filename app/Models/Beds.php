<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beds extends Model
{
    protected $table = 'beds_nursery';

    protected $fillable = [
        'beds',
        'busy_beds',
        'patients_teo',
        'patients_not_teo',
        'date_at'
    ];

    protected $hidden = [
      'created_at',
      'updated_at'
    ];
}
