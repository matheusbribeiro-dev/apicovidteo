<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Cases extends Model
{
    protected $table = 'cases';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'recovered',
        'active',
        'confirmed',
        'discarded',
        'date_at'
    ];
}
