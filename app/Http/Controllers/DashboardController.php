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
                                                            'label' => '12',
                                                            'eventClick' => 'clickedLocation(this)',
                                                            'eventRightClick' => 'rightClickedLocation(this)',
                                                            'scale' => 1000]);
        }

        return view('dashboard');
    }
}
