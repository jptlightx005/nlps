<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NLPS;
use Route;

class Suspect extends Model
{
    protected $fillable = [
        'user_id', 
        'first_name', 
        'middle_name', 
        'last_name', 
        'qualifier',
        'alias'
    ];

    public function crimes(){
    	return $this->hasMany('App\CrimeCommitted');
    }

    public function fullName(){
    	return NLPS::returnFullName($this->first_name, $this->middle_name, $this->last_name);
    }

    public function fullNameEditLink(){
        return "<a href=\"" . route('suspects.edit', $this->id) . "\">" . $this->fullName() . "</a>";
    }
}
