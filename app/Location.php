<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Location extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['suspects'];

    protected $fillable = [
        'location_name', 'long', 'lat'
    ];

    public function crimes(){
    	return $this->hasMany('App\CrimeCommitted', 'location_area_id', 'area_id');
    }

    public function suspects()
    {
        return $this->crimes->flatMap(function ($crime) {
            return $crime->suspects;
        })->unique('id');
    }

    // public function allSuspects(){
    //     return DB::table('crime_committed_suspect')
    //                 ->leftJoin('crime_committed', 'crime_committed_suspect.crime_committed_id', '=', 'crime_committed.id')
    //                 ->rightJoin('suspects', 'crime_committed_suspect.suspect_id', '=', 'suspects.id')
    //                 ->select(['suspects.*', 'full_name = first_name + last_name'])
    //                 ->distinct()
    //                 ->where('crime_committed.location_area_id', '=', $this->area_id);
    // }

    public function freq(){
    	$year = date("Y");
    	$crimes = CrimeCommitted::where('location_id', '=', $this->id)
    							->where('created_at', '>=', $year . '-01-01')
                                ->where('created_at', '<=', $year . '-12-31')
                                ->count();

        $freq = $crimes / 12; //months

    	return $freq;
    }


    // /**
    //  * Get full name of the user
    //  *
    //  * @return bool
    //  */
    public function getSuspectsAttribute()
    {
        return $this->suspects();
    }
}
