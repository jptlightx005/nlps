<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Mapper;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function loadMapDefault(){
    	Mapper::map(10.872001027667604, 122.57285513977047, ['zoom' => 14,
								'eventAfterLoad' => 'mapDidLoad(this);',
								'type' => 'HYBRID']);
    }

    public function printArray($a){
    	echo '<pre>';
    	print_r($a);
    	echo '</pre>';
    }
}
