<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Suspect;
use App\CrimeCommitted;
use App\HZR\Helper;
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
            'crime_type' => 'required',
            'location' => 'required'
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

        $crime = CrimeCommitted::create([
            'suspect_id' => $suspect->id,
            'user_id' => auth()->user()->id,
            'crime_type' => $request->input('crime_type'),
            'location_id' => $request->input('location')
        ]);

        $crime->save();

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
        return redirect(route('suspects.edit', $id));
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

        $suspect->first_name = $request->input('first_name');
        $suspect->middle_name = $request->input('middle_name');
        $suspect->last_name = $request->input('last_name');
        $suspect->alias = $request->input('alias');
        $suspect->whole_body = Helper::returnEmptyAvatarIfNull($request->input('whole_body'));
        $suspect->front = Helper::returnEmptyAvatarIfNull($request->input('front_face'));
        $suspect->left_face = Helper::returnEmptyAvatarIfNull($request->input('left_face'));
        $suspect->right_face = Helper::returnEmptyAvatarIfNull($request->input('right_face'));

        $suspect->save();

        return redirect(route('suspects.index'))->with('success', "Suspect record successfully updated!");
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
     *
     */
    public function setAsConvict(Request $request, $id)
    {
        $suspect = Suspect::find($id);

        $suspect->convicted = $request->input('convicted');

        $suspect->save();

        return redirect(route('suspects.index'))->with('success', "Suspect record successfully updated!");
    }
}
