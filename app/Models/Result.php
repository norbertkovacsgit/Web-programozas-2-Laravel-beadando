<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'date',
        'pilot_id',
        'position',
        'failure',
        'team',
        'car_type',
        'engine',
    ];

    public $timestamps = true;

    public function pilot()
    {
        return $this->belongsTo(Pilot::class);
    }
}
