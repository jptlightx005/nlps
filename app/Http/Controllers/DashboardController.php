<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Mapper;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->loadMapDefault();
        $locations = Location::all();

        foreach($locations as $location){
            Mapper::marker($location->lat, $location->long, ['title' => $location->location_name,
                                                            'label' => '' . count($location->crimes),
                                                            'eventClick' => 'clickedLocation(this, '. $location->toJson() . ')',
                                                            'eventRightClick' => 'rightClickedLocation(this)',
                                                            'scale' => 1000]);
        }

        return view('dashboard');
    }

    public function locationDetails($id){
        $loc = Location::find($id);

        $locname = $loc->location_name;
        $freq = $loc->freq();

        $top_crimes = $loc->crimes->toArray();

        $remarks = "";

        if($freq < 1){
            $remarks = "Too safe";
        }else if($freq == 1){
            $remarks = "Normal";
        }else if($freq > 1){
            $remarks = "Needs cleaning";
        }

        return compact('locname', 'freq', 'top_crimes', 'remarks');
    }
}
