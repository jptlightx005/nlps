<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigator extends Model
{
        public function fullName(){
    	return NLPS::returnFullName($this->first_name, $this->middle_name, $this->last_name);
    }

    public function fullNameEditLink(){
        return "<a href=\"" . route('investigators.edit', $this->id) . "\">" . $this->fullName() . "</a>";
    }
}
