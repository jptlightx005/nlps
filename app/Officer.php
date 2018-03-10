<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\NLPS;

class Officer extends Model
{
	/**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_name'];


    public function fullName(){
    	return NLPS::returnFullName($this->first_name, $this->middle_name, $this->last_name);
    }

    public function fullNameEditLink(){
        return "<a href=\"" . route('officers.edit', $this->id) . "\">" . $this->fullName() . "</a>";
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
}
