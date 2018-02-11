<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'location_name', 'long', 'lat'
    ];

    public function crimes(){
    	return $this->hasMany('App\CrimeCommitted');
    }

    public function suspects(){
        return $this->hasManyThrough('App\Suspect', 
                                    'App\CrimeCommitted',
                                    'location_id', //foreign key on crime_committed table
                                    'id', //foreign key on suspect table
                                    'id', //local key on location table
                                    'suspect_id'); //local key on crime_committed table
    }

    public function freq(){
    	$year = date("Y");
    	$crimes = CrimeCommitted::where('location_id', '=', $this->id)
    							->where('created_at', '>=', $year . '-01-01')
                                ->where('created_at', '<=', $year . '-12-31')
                                ->count();

        $freq = $crimes / 12; //months

    	return $freq;
    }
}
