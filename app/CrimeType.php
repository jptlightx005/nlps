<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrimeType extends Model
{
    protected $fillable = [
        'crime_type',
        'description'
    ];

    public function class()
    {
    	$class = $this->classification;
    	$classifications = config('crime_classifications');
    	return $classifications;
    	return $classifications[$class];
    }
}
