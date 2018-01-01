<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapViewController extends Controller
{
	
    public function index(){
    	$this->loadMapDefault();

    	return view('map');
    }
}
