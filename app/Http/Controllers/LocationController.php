<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Mapper;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $this->loadMapDefault();
        $locations = Location::all();

        foreach($locations as $location){
            Mapper::marker($location->lat, $location->long, ['title' => $location->location_name,
                                                            'eventClick' => 'clickedLocation(this)',
                                                            'eventRightClick' => 'rightClickedLocation(this)',
                                                            'scale' => 1000]);
        }
        return view('location.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'location_name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $location = Location::create([
            'location_name' => $request->input('location_name'),
            'long' => $request->input('longitude'),
            'lat' => $request->input('latitude'),
        ]);

        $location->save();

        return redirect('/location')->with('success', 'Location Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return view('location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
