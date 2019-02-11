<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CrimeCommitted;
use App\CrimeType;
use App\Investigator;
use App\Officer;
use App\Suspect;
use App\HZR\Helper;

use Auth;
use Carbon\Carbon;

class CrimeCommittedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crimes = CrimeCommitted::orderBy("created_at", "desc")->paginate(10);
        return view('crimecommitted.index', compact('crimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crimecommitted.create');
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
            'crime_type' => 'required',
            'location' => 'required',
            'has_suspect' => 'required',
            'time_occured' => 'required',
            'date_occured' => 'required',
        ]);
        
        $date_occured = $request->date_occured . " " . $request->time_occured;
        $crimecommitted = new CrimeCommitted;
        $crimetype = CrimeType::findOrFail($request->crime_type);
        $crimecommitted->location_area_id = $request->location;
        $crimecommitted->crime_type = $crimetype->crime_type;
        $crimecommitted->crime_type_id = $crimetype->id;

        $crimecommitted->blotter_id = $request->input('blotter_report');
        $crimecommitted->date_occured = Carbon::createFromFormat('m/d/Y g:i A', $date_occured);
        $crimecommitted->description = $request->description;
        $crimecommitted->officer_in_charge = Helper::returnBlankIfNull(optional(Officer::find($request->officer_in_charge))->full_name);
        $crimecommitted->investigator = Helper::returnBlankIfNull(optional(Investigator::find($request->investigator))->full_name);

        $crimecommitted->save();
        if($request->input('weapons_used')){
            $crimecommitted->equipments()->attach($request->weapons_used);
        }

        if($request->input('has_suspect') == "yes"){
            $this->validate($request, [
                'suspect_exist' => 'required'
            ]);

            if($request->input('suspect_exist') == "yes"){
                $this->validate($request, [
                    'existing_suspect' => 'required'
                ]);

                $crimecommitted->suspects()->attach($request->input('existing_suspect'));
            }else{
                $this->validate($request, [
                    'first_name' => 'required',
                    'middle_name' => 'required',
                    'last_name' => 'required',
                    'alias' => 'required',
                ]);

                $suspect = Suspect::create([
                    'user_id' => auth()->user()->id,
                    'first_name' => $request->input('first_name'),
                    'middle_name' => $request->input('middle_name'),
                    'last_name' => $request->input('last_name'),
                    'qualifier' => "",
                    'alias' => $request->input('alias'),
                ]);

                $suspect->whole_body = Helper::returnEmptyAvatarIfNull($request->input('whole_body'));
                $suspect->front = Helper::returnEmptyAvatarIfNull($request->input('front_face'));
                $suspect->left_face = Helper::returnEmptyAvatarIfNull($request->input('left_face'));
                $suspect->right_face = Helper::returnEmptyAvatarIfNull($request->input('right_face'));

                $suspect->save();

                $crimecommitted->suspects()->attach($suspect->id);
            }
        }

        return redirect('/crimecommitted')->with('success', 'Crime has been recorded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('crimecommitted.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crime = CrimeCommitted::find($id);
        return view('crimecommitted.edit', compact('crime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'crime_type' => 'required',
            'location' => 'required',
            'has_suspect' => 'required',
            'time_occured' => 'required',
            'date_occured' => 'required',
        ]);
        
        $date_occured = $request->date_occured . " " . $request->time_occured;
        $crimecommitted = CrimeCommitted::findOrFail($id);
        $crimecommitted->crime_type = CrimeType::findOrFail($request->crime_type)->crime_type;
        \Log::debug(CrimeType::findOrFail($request->crime_type));
        $crimecommitted->crime_type_id = $request->crime_type;
        $crimecommitted->location_area_id = $request->location;
        $crimecommitted->date_occured = Carbon::parse($date_occured);
        $crimecommitted->description = $request->description;

        $crimecommitted->officer_in_charge = $request->officer_in_charge;
        $crimecommitted->investigator = $request->investigator;

        $crimecommitted->save();

        if($request->input('weapons_used')){
            $crimecommitted->equipments()->sync($request->weapons_used);
        }

        if($request->input('has_suspect') == "yes"){
            $this->validate($request, [
                'suspect_exist' => 'required'
            ]);

            if($request->input('suspect_exist') == "yes"){
                $this->validate($request, [
                    'existing_suspect' => 'required'
                ]);

                $crimecommitted->suspects()->sync($request->input('existing_suspect'));
            }else{
                $this->validate($request, [
                    'first_name' => 'required',
                    'middle_name' => 'required',
                    'last_name' => 'required',
                    'alias' => 'required',
                ]);

                $suspect = Suspect::create([
                    'user_id' => auth()->user()->id,
                    'first_name' => $request->input('first_name'),
                    'middle_name' => $request->input('middle_name'),
                    'last_name' => $request->input('last_name'),
                    'qualifier' => "",
                    'alias' => $request->input('alias'),
                ]);

                $suspect->whole_body = Helper::returnEmptyAvatarIfNull($request->input('whole_body'));
                $suspect->front = Helper::returnEmptyAvatarIfNull($request->input('front_face'));
                $suspect->left_face = Helper::returnEmptyAvatarIfNull($request->input('left_face'));
                $suspect->right_face = Helper::returnEmptyAvatarIfNull($request->input('right_face'));

                $suspect->save();

                $crimecommitted->suspects()->sync($suspect->id);
            }
        }

        return redirect('/crimecommitted')->with('success', 'Crime has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBulk(Request $request)
    {
        $this->validate($request, [
            'crimes' => 'required|array'
        ]);
        $crimes = CrimeCommitted::whereIn('id', $request->input('crimes'));
        foreach($crimes as $crime){
            $crime->detach();
        }
        $crimes->delete();
        return redirect()->back()->with('success', 'Successfully removed records');

    }
}
