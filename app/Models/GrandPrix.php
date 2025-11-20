<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrandPrix extends Model
{
    protected $table = 'grand_prix';

    protected $fillable = [
        'date',
        'name',
        'location',
    ];

    public $timestamps = true;
}
