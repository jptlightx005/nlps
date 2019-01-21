<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlotterReport extends Model
{

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

    public function reportingPerson(){
        return $this->belongsTo('\App\Complainant', 'complainant');
    }
}
