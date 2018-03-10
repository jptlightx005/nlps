<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrimeCommitted;
use App\Location;
use App\Suspect;

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
        return view('dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function convicts()
    {
        $crimes = CrimeCommitted::whereNotNull('convicted_date')
                    ->with('suspects')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(10);

        // $suspects = Suspect::with('crimes')
        //             ->where('crimes.convicted', '=', '1')
        //             ->orderBy('created_at', 'DESC')
        //             ->paginate(10);
        return view('galleries.suspects', compact('crimes'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function suspects()
    {
        $crimes = CrimeCommitted::whereNull('convicted_date')
                    ->with('suspects')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(10);
                    // $this->printArray($crimes);
        // $suspects =->with('crimes')
        //             ->orderBy('created_at', 'DESC')
        //             ->paginate(10); Suspect::where('convicted', '=', '0')
                    
        return view('galleries.suspects', compact('crimes'));
    }

    /**
     * Loads locations.
     *
     * @return \Illuminate\Http\Response
     */
    public function locations()
    {
        return \App\Location::all();
        // return \App\Location::has('crimes')
        //                     ->has('suspects')
        //                     ->with('crimes')
        //                     ->with('suspects')
        //                     ->get();
    }

    /**
     * Loads locations.
     *
     * @return \Illuminate\Http\Response
     */
    public function locationBrgy($area_id)
    {
        $location = \App\Location::where('area_id', '=', $area_id)
                                ->with('crimes')
                                ->get()
                                ->first();

        $loc_assoc = $location->toArray();
        $loc_assoc['suspects'] =  $location->suspects();
        return $loc_assoc;
    }

    public function locationDetails($id){
        $loc = Location::find($id);

        $locname = $loc->location_name;
        $freq = $loc->freq();

        $top_crimes = $loc->crimes->toArray();

        // $remarks = "";

        // if($freq < 1){
        //     $remarks = "Too safe";
        // }else if($freq == 1){
        //     $remarks = "Normal";
        // }else if($freq > 1){
        //     $remarks = "Needs cleaning";
        // }

        return compact('id', 'locname', 'freq', 'top_crimes', 'remarks');
    }
}
