<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrimeType extends Model
{
    protected $fillable = [
        'crime_type',
        'description'
    ];
}
