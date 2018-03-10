<?php

namespace App\Http\Controllers;

use App\Investigator;
use Illuminate\Http\Request;

class InvestigatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investigators = Investigator::paginate(10);
        return view('investigators.index', compact('investigators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('investigators.create');
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

        $investigator = new Investigator;
        $investigator->first_name = $request->first_name;
        $investigator->middle_name = $request->middle_name;
        $investigator->last_name = $request->last_name;
        $investigator->rank = $request->rank;
        $investigator->save();

        return redirect()->route('investigators.index')->with('success', 'Investigator has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Investigator  $investigator
     * @return \Illuminate\Http\Response
     */
    public function show(Investigator $investigator)
    {
        return redirect()->route('investigators.edit', $investigator->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Investigator  $investigator
     * @return \Illuminate\Http\Response
     */
    public function edit(Investigator $investigator)
    {
        return view('investigators.edit', compact('investigator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Investigator  $investigator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investigator $investigator)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'rank' => 'required'
        ]);

        $investigator->first_name = $request->first_name;
        $investigator->middle_name = $request->middle_name;
        $investigator->last_name = $request->last_name;
        $investigator->rank = $request->rank;
        $investigator->save();

        return redirect()->route('investigators.index')->with('success', 'Investigator has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Investigator  $investigator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investigator $investigator)
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
            'investigators' => 'required|array'
        ]);
        $investigators = Investigator::whereIn('id', $request->input('investigators'));
        $investigators->delete();
        return redirect()->back()->with('success', 'Successfully removed records');

    }
}
