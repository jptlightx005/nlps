<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrimeCommitted extends Model
{
    protected $fillable = [
        'suspect_id',
        'user_id',
        'crime_type',
        'location_id'
    ];

    protected $table = 'crime_committed';

    public function location(){
    	return $this->belongsTo('\App\Location');
    }

    public function suspects(){
        return $this->hasMany('\App\Suspect', 'id', 'suspect_id');

    }
}
