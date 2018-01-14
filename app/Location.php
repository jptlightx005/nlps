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

    public function freq(){
    	$year = date("Y");
    	$crimes = CrimeCommitted::where('location_id', '=', $this->id)
    							->where('created_at', '>=', $year . '-01-01')
                                ->where('created_at', '<=', $year . '-12-31');

        $freq = count($crimes) / 12; //months

    	return $freq;
    }
}
