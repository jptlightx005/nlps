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
}
