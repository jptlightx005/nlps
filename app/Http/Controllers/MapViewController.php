<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

class MapViewController extends Controller
{
	
    public function index(){
    	Mapper::map(10.872001027667604, 122.57285513977047, ['zoom' => 14,
    							'eventClick' => 'clickedMyLocation(this);', 
								'eventAfterLoad' => 'mapDidLoad(this);',
								'type' => 'HYBRID']);

    	return view('map');
    }
}
