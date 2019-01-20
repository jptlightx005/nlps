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
    public function convicts(Request $request)
    {
        if($request->search){
            $crimes = CrimeCommitted::where(function($query) use($request){
                                $query->where('crime_type', 'LIKE', '%' . $request->search . '%')
                                ->orWhereHas('suspects', function($query) use($request){
                                    $query->where('first_name', 'LIKE', '%' . $request->search . '%')
                                        ->orWhere('last_name', 'LIKE', '%' . $request->search . '%');
                                });
                            })
                            ->whereNotNull('convicted_date')
                            ->has('suspects')
                            ->with('suspects')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(10);
        }else{
            $crimes = CrimeCommitted::whereNotNull('convicted_date')
                        ->has('suspects')
                        ->with('suspects')
                        ->orderBy('created_at', 'DESC')
                        ->paginate(10);
        }
                    // $this->printArray($crimes);
        // $suspects =->with('crimes')
        //             ->orderBy('created_at', 'DESC')
        //             ->paginate(10); Suspect::where('convicted', '=', '0')
                    
        return view('galleries.suspects', compact('crimes'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function suspects(Request $request)
    {
        if($request->search){
            $crimes = CrimeCommitted::where(function($query) use($request){
                                $query->where('crime_type', 'LIKE', '%' . $request->search . '%')
                                ->orWhereHas('suspects', function($query) use($request){
                                    $query->where('first_name', 'LIKE', '%' . $request->search . '%')
                                        ->orWhere('last_name', 'LIKE', '%' . $request->search . '%');
                                });
                            })
                            ->whereNull('convicted_date')
                            ->has('suspects')
                            ->with('suspects')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(10);
        }else{
            $crimes = CrimeCommitted::whereNull('convicted_date')
                        ->has('suspects')
                        ->with('suspects')
                        ->orderBy('created_at', 'DESC')
                        ->paginate(10);
        }
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
    public function brgyList(Request $request)
    {
        if($request->search){
            return Location::where('location_name', 'LIKE', '%' . $request->search . '%')
                            ->orWhereHas('crimes.crimeType', function($query) use($request){
                                $query->where('crime_type', 'LIKE', '%' . $request->search . '%');
                            })
                            ->orWhereHas('crimes.suspects', function($query) use($request){
                                $query->where('first_name', 'LIKE', '%' . $request->search . '%')
                                    ->orWhere('last_name', 'LIKE', '%' . $request->search . '%');
                            })
                            ->with('crimes')
                            ->with('crimes.crimeType')
                            ->with('crimes.suspects')
                            ->get();
        }else{
            return Location::with('crimes')
                            ->with('crimes.crimeType')
                            ->get();    
        }
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
                                ->with('crimes.crimeType')
                                ->get()
                                ->first();

        $loc_assoc = $location->toArray();
        $loc_assoc['suspects'] =  $location->suspects();
        return $loc_assoc;
    }
}
