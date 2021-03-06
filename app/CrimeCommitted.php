<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class CrimeCommitted extends Model
{
    protected $appends = ['title'];

    protected $fillable = [
        'crime_type',
        'location_area_id',
        'date_occured',
        'description',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'date_occured'
    ];

    protected $table = 'crime_committed';

    public function location(){
    	return $this->belongsTo('\App\Location', 'location_area_id', 'area_id');
    }

    public function suspects(){
        return $this->belongsToMany('\App\Suspect');
    }

    public function equipments(){
        return $this->belongsToMany('\App\Equipment');
    }

    public function suspectsList($separator = ", "){
        if(count($this->suspects) > 0){
            return implode($separator, $this->suspects->pluck('full_name')->toArray());
        }else{
            return "N/A";
        }
    }

    public function equipmentsList($separator = ", "){
        if(count($this->equipments) > 0){
            return implode($separator, $this->equipments->pluck('equipment_name')->toArray());
        }else{
            return "N/A";
        }
    }

    public function getTitleAttribute()
    {
        $title = "";
        $title = $this->crime_type . " | " . count($this->suspects) . " suspect(s) | " . Carbon::parse($this->date_occured)->format('m/d/Y') . " | " . $this->location->location_name;
        return $title;
    }
}
