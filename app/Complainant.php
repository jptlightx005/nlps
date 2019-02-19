<?php

namespace App;

use App\NLPS;
use Illuminate\Database\Eloquent\Model;

class Complainant extends Model
{
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

    public function fullName(){
    	return NLPS::returnFullName($this->first_name, $this->middle_name, $this->last_name);
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
}
