<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrimeCommitted extends Model
{
    protected $fillable = [
        'user_id',
        'crime_type',
        'location_area_id',
        'date_occured'
    ];

    protected $table = 'crime_committed';

    public function location(){
    	return $this->belongsTo('\App\Location', 'location_area_id', 'area_id');
    }

    public function suspects(){
        return $this->belongsToMany('\App\Suspect');
    }

    public function suspectsList($separator = ", "){
        if(count($this->suspects) > 0){
            return implode($separator, $this->suspects->pluck('full_name')->toArray());
        }else{
            return "N/A";
        }
    }
}
