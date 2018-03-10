<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CrimeType;
class CrimeTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crimes = CrimeType::orderBy("created_at", "desc")->paginate(10);
        return view('crimetype.index', compact('crimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crimetype.create');
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
            'crime_type' => 'required'
            ]);

        $crime_type = CrimeType::create(['crime_type' => $request->input('crime_type'),
                                        'description' => $request->input('description')]);

        return redirect('/crimetype')->with('success', 'Crime Type has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crime_type = CrimeType::findOrFail($id);
        return view('crimetype.edit', compact('crime_type'));
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
            'crime_type' => 'required'
        ]);

        $crime_type = CrimeType::findOrFail($id);
        $crime_type->crime_type = $request->input('crime_type');
        $crime_type->description = $request->input('description');

        $crime_type->save();
        return redirect('/crimetype')->with('success', 'Crime Type has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crime_type = CrimeType::findOrFail($id);

        // Check for correct user
        
        $crime_type->delete();
        return redirect('/admin/posts')->with('success', 'Post Removed');
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
        $crimes = CrimeType::whereIn('id', $request->input('crimes'));

        $crimes->delete();
        return redirect()->back()->with('success', 'Successfully removed records');

    }
}
