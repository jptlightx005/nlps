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

    public function cleared()
    {
        $cases = $this->cases;
        $cleared = [];
        foreach($cases as $case){
            if($case->status == 'Dismissed'){
                $cleared[] = $case;
            }
        }
        return $cleared;
    }

    public function solved()
    {
        $cases = $this->cases;
        $cleared = [];
        foreach($cases as $case){
            if($case->status == 'Convicted'){
                $cleared[] = $case;
            }
        }
        return $cleared;
    }

    public function ontrial()
    {
        $cases = $this->cases;
        $cleared = [];
        foreach($cases as $case){
            if($case->status == 'On-Trial'){
                $cleared[] = $case;
            }
        }
        return $cleared;
    }
}
