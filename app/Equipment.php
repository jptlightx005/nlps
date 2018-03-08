<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';

    public function crimes()
    {
    	$this->belongsToMany('\App\CrimeCommitted');
    }
}
