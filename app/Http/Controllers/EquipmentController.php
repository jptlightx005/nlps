<?php

namespace App\Http\Controllers;

use App\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::paginate(10);
        return view('equipments.index', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipments.create');
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
            'equipment_name' => 'required'
        ]);

        $equipment = new Equipment;
        $equipment->equipment_name = $request->equipment_name;
        $equipment->description = $request->description;
        $equipment->save();

        return redirect()->route('equipments.index')->with('success', 'Record has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        return redirect()->route('equipments.edit', $equipment->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        return view('equipments.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        $this->validate($request, [
            'equipment_name' => 'required'
        ]);

        $equipment->equipment_name = $request->equipment_name;
        $equipment->description = $request->description;
        $equipment->save();

        return redirect()->route('equipments.index')->with('success', 'Record has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
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
            'equipments' => 'required|array'
        ]);
        $equipments = Equipment::whereIn('id', $request->input('equipments'));

        $equipments->delete();
        return redirect()->back()->with('success', 'Successfully removed records');

    }
}
