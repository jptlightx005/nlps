<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Suspect;
use App\CrimeCommitted;
use App\HZR\Helper;

use Auth;
use URL;
use Redirect;

use Carbon\Carbon;

class SuspectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suspects = Suspect::paginate(10);

        return view('suspects.index', compact('suspects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suspects.create');
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
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'alias' => 'required',
            'crime_exist' => 'required'
        ]);

        $suspect = Suspect::create([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'qualifier' => "",
            'alias' => $request->input('alias'),
        ]);

        $suspect->date_of_birth = Carbon::parse($request->date_of_birth);
        $suspect->civil_status = Helper::returnBlankIfNull($request->input('civil_status'));
        $suspect->occupation = Helper::returnBlankIfNull($request->input('occupation'));
        $suspect->address = Helper::returnBlankIfNull($request->input('address'));

        $suspect->whole_body = Helper::returnEmptyAvatarIfNull($request->input('whole_body'));
        $suspect->front = Helper::returnEmptyAvatarIfNull($request->input('front_face'));
        $suspect->left_face = Helper::returnEmptyAvatarIfNull($request->input('left_face'));
        $suspect->right_face = Helper::returnEmptyAvatarIfNull($request->input('right_face'));

        $suspect->status = "For Filing";
        $suspect->save();

        if($request->input('crime_exist') == "yes"){
            $this->validate($request, [
                'existing_crime' => 'required'
            ]);

            $suspect->crimes()->attach($request->input('existing_crime'));
        }else{
            $this->validate($request, [
                'crime_type' => 'required',
                'location' => 'required',
                'time_occured' => 'required',
                'date_occured' => 'required'
            ]);

            $date_occured = $request->input('date_occured') . " " . $request->input('time_occured');
            $crimecommitted = CrimeCommitted::create(['crime_type' => $request->input('crime_type'),
                                                        'location_area_id' => $request->input('location'),
                                                        'date_occured' => Carbon::parse($date_occured),
                                                        ]);

            $crimecommitted->suspects()->attach($suspect->id);
        }

        return redirect('/suspects')->with('success', 'Suspect Recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suspect = Suspect::where('id', $id)
                            ->with('crimes.crimeType')
                            ->get()->first();
        return view('suspects.show', compact('suspect'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suspect = Suspect::find($id);
        session()->put('url.intended', URL::previous());
        return view('suspects.edit', compact('suspect'));
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
        $suspect = Suspect::find($id);
        $suspect->status = config('nlps.suspect_status')[$request->suspect_status];

        $suspect->first_name = $request->input('first_name');
        $suspect->middle_name = $request->input('middle_name');
        $suspect->last_name = $request->input('last_name');
        $suspect->alias = $request->input('alias');
        
        $suspect->date_of_birth = Carbon::parse($request->date_of_birth);
        $suspect->civil_status = Helper::returnBlankIfNull($request->input('civil_status'));
        $suspect->occupation = Helper::returnBlankIfNull($request->input('occupation'));
        $suspect->address = Helper::returnBlankIfNull($request->input('address'));

        $suspect->whole_body = Helper::returnEmptyAvatarIfNull($request->input('whole_body'));
        $suspect->front = Helper::returnEmptyAvatarIfNull($request->input('front_face'));
        $suspect->left_face = Helper::returnEmptyAvatarIfNull($request->input('left_face'));
        $suspect->right_face = Helper::returnEmptyAvatarIfNull($request->input('right_face'));

        $suspect->save();

        // return redirect(route('suspects.index'))->with('success', "Suspect record successfully updated!");
        return Redirect::intended('/')->with('success', "Suspect record successfully updated!");
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
            'suspects' => 'required|array'
        ]);
        $suspects = Suspect::whereIn('id', $request->input('suspects'));
        foreach($suspects as $suspect){
            $suspect->detach();
        }

        $suspects->delete();
        return redirect()->back()->with('success', 'Successfully removed records');

    }

    /**
     *
     */
    public function setAsConvict(Request $request, $id)
    {
        $suspect = Suspect::find($id);

        $suspect->convicted = $request->input('convicted');

        $suspect->save();

        return redirect(route('suspects.index'))->with('success', "Suspect record successfully updated!");
    }

    public function search(Request $request){
        $last_name = $request->input('last_name');
        $first_name = $request->input('first_name');
        $middle_name = $request->input('middle_name');
        $suspectsMatch = Suspect::where('last_name', 'LIKE', '%' . $last_name . '%')
                            ->where('first_name', 'LIKE', '%' . $first_name . '%')
                            ->where('middle_name', 'LIKE', '%' . $middle_name . '%')
                            ->get();
        return ['found' => (count($suspectsMatch) > 0)];
    }
}
