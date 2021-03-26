<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deaths extends Model
{
    protected $table = 'deaths';

    protected $fillable = [
        'confirmed',
        'date_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
