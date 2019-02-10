<?php

namespace App;

use App\NLPS;
use Illuminate\Database\Eloquent\Model;

class PoliceClearance extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'date_issued'
    ];
    public function fullName(){
    	return NLPS::returnFullName($this->first_name, $this->middle_name, $this->last_name);
    }
}
