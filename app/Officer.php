<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\NLPS;

class Officer extends Model
{
    public function fullName(){
    	return NLPS::returnFullName($this->first_name, $this->middle_name, $this->last_name);
    }

    public function fullNameEditLink(){
        return "<a href=\"" . route('officers.edit', $this->id) . "\">" . $this->fullName() . "</a>";
    }
}
