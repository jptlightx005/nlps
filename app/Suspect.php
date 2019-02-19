<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NLPS;
use Route;
use Carbon\Carbon;

class Suspect extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_name', 'age'];

    protected $fillable = [
        'first_name', 
        'middle_name', 
        'last_name', 
        'qualifier',
        'alias'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'date_of_birth'
    ];

    protected $hidden = ['pivot'];

    public function crimes(){
    	return $this->belongsToMany('App\CrimeCommitted');
    }

    public function fullName(){
    	return NLPS::returnFullName($this->first_name, $this->middle_name, $this->last_name);
    }

    public function fullNameEditLink(){
        return "<a href=\"" . route('suspects.show', $this->id) . "\">" . $this->fullName() . "</a>";
    }

    /**
     * Get full name of the user
     *
     * @return bool
     */
    public function getFullNameAttribute()
    {
        return $this->fullName();
    }

    public function getDateOfBirthAttribute($date)
    {
        $date = new \Carbon\Carbon($date);
        return $date->format("F d, Y");
    }
    /**
     * Get full name of the user
     *
     * @return bool
     */
    public function getAgeAttribute()
    {
        $dob = Carbon::parse($this->date_of_birth);
        if(!$dob){
            $dob = Carbon::now();
        }
        return $dob->diffInYears(Carbon::now());
    }
    public function crimesCommittedList($separator = ", "){
        if(count($this->crimes) > 0){
            return implode($separator, $this->crimes->pluck('crime_type')->toArray());
        }else{
            return "N/A";
        }
    }

    public function civilStatus(){
        if(is_numeric($this->civil_status)){
            if($this->civil_status  < count(config('nlps.civil_status'))){
                return config('nlps.civil_status')[$this->civil_status];
            }
        }else if($this->civil_status != ""){
            return $this->civil_status;
        }
        return "N/A";
    }
    public function suspectStatus(){
        return $this->status;
    }
}
