<?php

namespace App;

use App\NLPS;
use Illuminate\Database\Eloquent\Model;

class Complainant extends Model
{
    public function fullName(){
    	return NLPS::returnFullName($this->first_name, $this->middle_name, $this->last_name);
    }
}
