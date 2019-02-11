<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\CrimeCommitted;
class BlotterReport extends Model
{

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['title'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'date_reported',
        'date_of_incident'
    ];
    public static function underInvestigation(){
        return BlotterReport::doesntHave('case')->get();
    }
    public function getTitleAttribute()
    {
        $title = $this->type_of_incident . " | " . Carbon::parse($this->date_occured)->format('m/d/Y');
        return $title;
    }

    public function case(){
        return $this->hasOne('\App\CrimeCommitted', 'blotter_id', 'id');
    }

    public function reportingPerson(){
        return $this->belongsTo('\App\Complainant', 'complainant');
    }
    public function reportedSuspect(){
        return $this->belongsTo('\App\Suspect', 'suspect_id');
    }
    public function reportedVictim(){
        return $this->belongsTo('\App\Complainant', 'victim_id');
    }

    public function status(){
        return $this->case != null ? "Case Filed" : "Under Investigation";
    }
}
