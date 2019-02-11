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
    	$classifications = config('nlps.crime_classifications');
        if($class == "minor" || $class == "major") {
            return $classifications[$class];
        }else{
            return "";
        }
    }

    public function cases()
    {
        return $this->hasMany('App\CrimeCommitted', 'crime_type_id');
    }
}
