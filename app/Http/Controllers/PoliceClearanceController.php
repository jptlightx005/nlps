<?php

namespace App\Http\Controllers;

use App\PoliceClearance;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PoliceClearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clearances = PoliceClearance::paginate(10);
        return view('clearance.index', compact('clearances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clearance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clearance = new PoliceClearance;
        $clearance->date_issued = Carbon::now();
        $clearance->control_number = "000";
        $clearance->place_issued = "New Lucena";
        $clearance->first_name = $request->input('first_name');
        $clearance->middle_name = $request->input('middle_name');
        $clearance->last_name = $request->input('last_name');
        $clearance->date_of_birth = Carbon::parse($request->input('date_of_birth'));
        $clearance->place_of_birth = $request->input('place_of_birth');
        $clearance->contact_number = $request->input('contact_number');
        $clearance->address = $request->input('address');
        $clearance->nationality = $request->input('nationality');
        $clearance->gender = $request->input('gender') == '0' ? 'Male' : 'Female';
        $clearance->civil_status = $request->input('civil_status');
        $clearance->purpose = $request->input('purpose');

        $clearance->image_url = $request->input('whole_body');

        $clearance->officer1 = $request->input('officer1');
        $clearance->officer1rank = $request->input('officer1rank');
        $clearance->officer1role = $request->input('officer1role');
        $clearance->officer2 = $request->input('officer2');
        $clearance->officer2rank = $request->input('officer2rank');
        $clearance->officer2role = $request->input('officer2role');
        
        $clearance->save();

        return redirect()->route('policeclearance.index')->with('success', 'Clearance has been saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PoliceClearance  $policeClearance
     * @return \Illuminate\Http\Response
     */
    public function show(PoliceClearance $policeClearance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PoliceClearance  $policeClearance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clearance = PoliceClearance::find($id);
        return view('clearance.edit', compact('clearance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PoliceClearance  $policeClearance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clearance = PoliceClearance::findOrFail($id);
        $clearance->date_issued = Carbon::now();
        $clearance->first_name = $request->input('first_name');
        $clearance->middle_name = $request->input('middle_name');
        $clearance->last_name = $request->input('last_name');
        $clearance->date_of_birth = Carbon::parse($request->input('date_of_birth'));
        $clearance->place_of_birth = $request->input('place_of_birth');
        $clearance->contact_number = $request->input('contact_number');
        $clearance->address = $request->input('address');
        $clearance->nationality = $request->input('nationality');
        $clearance->gender = $request->input('gender') == '0' ? 'Male' : 'Female';
        $clearance->civil_status = $request->input('civil_status');
        $clearance->purpose = $request->input('purpose');

        $clearance->image_url = $request->input('whole_body');

        $clearance->officer1 = $request->input('officer1');
        $clearance->officer1rank = $request->input('officer1rank');
        $clearance->officer1role = $request->input('officer1role');
        $clearance->officer2 = $request->input('officer2');
        $clearance->officer2rank = $request->input('officer2rank');
        $clearance->officer2role = $request->input('officer2role');

        $clearance->save();

        return redirect()->route('policeclearance.index')->with('success', 'Clearance has been saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PoliceClearance  $policeClearance
     * @return \Illuminate\Http\Response
     */
    public function destroy(PoliceClearance $policeClearance)
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
            'clearances' => 'required|array'
        ]);
        $clearances = PoliceClearance::whereIn('id', $request->input('clearances'));
        $clearances->delete();
        return redirect()->back()->with('success', 'Successfully removed records');

    }

    public function print(PoliceClearance $policeClearance)
    {
        // return $policeClearance; 
        $clearance = $policeClearance;
        return view('clearance.print', compact('clearance'));
    }
}
