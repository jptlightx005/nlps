<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NLPS;
use Route;

class Suspect extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_name'];

    protected $fillable = [
        'user_id', 
        'first_name', 
        'middle_name', 
        'last_name', 
        'qualifier',
        'alias'
    ];

    public function crimes(){
    	return $this->belongsToMany('App\CrimeCommitted');
    }

    public function fullName(){
    	return NLPS::returnFullName($this->first_name, $this->middle_name, $this->last_name);
    }

    public function fullNameEditLink(){
        return "<a href=\"" . route('suspects.edit', $this->id) . "\">" . $this->fullName() . "</a>";
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
    public function crimesCommittedList($separator = ", "){
        if(count($this->crimes) > 0){
            return implode($separator, $this->crimes->pluck('crime_type')->toArray());
        }else{
            return "N/A";
        }
    }
}
