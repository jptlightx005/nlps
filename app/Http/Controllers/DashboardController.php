<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $suspects = Suspect::where('convicted', '=', '1')
                    ->with('crimes')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(10);
        return view('galleries.suspects', compact('suspects'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function suspects()
    {
        $suspects = Suspect::where('convicted', '=', '0')
                    ->with('crimes')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(10);
        return view('galleries.suspects', compact('suspects'));
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
        return \App\Location::where('area_id', '=', $area_id)
                            ->with('crimes')
                            ->get();
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
