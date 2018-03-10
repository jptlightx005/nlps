<?php

namespace App\Http\Controllers;

use App\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officers = Officer::paginate(10);
        return view('officers.index', compact('officers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('officers.create');
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
            'rank' => 'required'
        ]);

        $officer = new Officer;
        $officer->first_name = $request->first_name;
        $officer->middle_name = $request->middle_name;
        $officer->last_name = $request->last_name;
        $officer->rank = $request->rank;
        $officer->save();

        return redirect()->route('officers.index')->with('success', 'Officer has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function show(Officer $officer)
    {
        return redirect()->route('officers.edit', $officer->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function edit(Officer $officer)
    {
        return view('officers.edit', compact('officer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Officer $officer)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'rank' => 'required'
        ]);

        $officer->first_name = $request->first_name;
        $officer->middle_name = $request->middle_name;
        $officer->last_name = $request->last_name;
        $officer->rank = $request->rank;
        $officer->save();

        return redirect()->route('officers.index')->with('success', 'Officer has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Officer $officer)
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
            'officers' => 'required|array'
        ]);
        $officers = Officer::whereIn('id', $request->input('officers'));
        $officers->delete();
        return redirect()->back()->with('success', 'Successfully removed records');

    }
}
