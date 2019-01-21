<?php

namespace App\Http\Controllers;

use App\BlotterReport;
use App\Complainant;
use App\Suspect;
use Illuminate\Http\Request;
use Carbon\Carbon;
class BlotterReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = BlotterReport::orderBy("created_at", "desc")->paginate(10);
        return view('blotterreports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blotterreports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new BlotterReport;

        $date_reported = $request->date_reported . " " . $request->time_reported;
        // $date_of_incident = $request->date_of_incident . " " . $request->time_reported; //comment this later
        $date_of_incident = $request->date_of_incident . " " . $request->time_of_incident;

        $report->date_reported = Carbon::createFromFormat('m/d/Y g:i A', $date_reported);
        $report->date_of_incident = Carbon::createFromFormat('m/d/Y g:i A', $date_of_incident);
        $report->place_of_incident = $request->location;
        // $report->incident_narrative = $request->narrative;
        
        $complainant = new Complainant;
        $complainant->type = "reporting_person";
        $complainant->first_name = $request->input('reporting_first_name');
        $complainant->middle_name = $request->reporting_middle_name;
        $complainant->last_name = $request->reporting_last_name;
        $complainant->qualifier = $request->input('qualifier') ?: '';
        $complainant->nickname = $request->nickname ?: '';
        $complainant->citizenship = $request->citizenship ?: '';
        $complainant->gender = $request->gender ?: '';
        $complainant->civil_status = $request->civil_status ?: '';
        $complainant->date_of_birth = Carbon::createFromFormat('m/d/Y', $request->date_of_birth);
        $complainant->place_of_birth = $request->place_of_birth ?: '';
        $complainant->home_phone = $request->home_phone ?: '';
        $complainant->mobile_phone = $request->mobile_phone ?: '';

        $complainant->current_address = $request->current_address ?: '';
        $complainant->current_village = $request->current_village ?: '';
        $complainant->current_barangay = $request->current_barangay ?: '';
        $complainant->current_town = $request->current_town ?: '';
        $complainant->current_province = $request->current_province ?: '';
        
        $complainant->other_address = $request->other_address ?: '';
        $complainant->other_village = $request->other_village ?: '';
        $complainant->other_barangay = $request->other_barangay ?: '';
        $complainant->other_town = $request->other_town ?: '';
        $complainant->other_province = $request->other_province ?: '';
        
        $complainant->highest_educational_attainment = $request->highest_education ?: '';
        $complainant->occupation = $request->occupation ?: '';
        $complainant->id_presented = $request->id_presented ?: '';
        $complainant->email = $request->email ?: '';

        $complainant->save();
        $report->complainant = $complainant->id;

        if($request->has_suspect != "no"){
            $suspect = new Suspect;
            $suspect->first_name = $request->suspect_first_name;
            $suspect->middle_name = $request->suspect_middle_name;
            $suspect->last_name = $request->suspect_last_name;
            // $suspect->qualifier = $request->qualifier;
            $suspect->alias = $request->suspect_nickname;
            $suspect->citizenship = $request->suspect_citizenship;
            $suspect->gender = $request->suspect_gender;
            $suspect->civil_status = $request->suspect_civil_status;
            $suspect->date_of_birth = Carbon::createFromFormat('m/d/Y', $request->suspect_date_of_birth);
            $suspect->place_of_birth = $request->suspect_place_of_birth;
            // $suspect->home_phone = $request->home_phone;
            $suspect->mobile_phone = $request->suspect_mobile_phone;

            $suspect->current_address = $request->suspect_current_address;
            $suspect->current_village = $request->suspect_current_village;
            $suspect->current_barangay = $request->suspect_current_barangay;
            $suspect->current_town = $request->suspect_current_town;
            $suspect->current_province = $request->suspect_current_province;
            
            $suspect->other_address = $request->suspect_other_address;
            $suspect->other_village = $request->suspect_other_village;
            $suspect->other_barangay = $request->suspect_other_barangay;
            $suspect->other_town = $request->suspect_other_town;
            $suspect->other_province = $request->suspect_other_province;
            
            $suspect->highest_educational_attainment = $request->suspect_highest_education;
            $suspect->occupation = $request->suspect_occupation;
            $suspect->work_address = $request->suspect_work_address;
            $suspect->relation_to_victim = $request->suspect_relation_to_victim;

            $suspect->save();
            $report->suspect_id = $suspect->id;
        }

        $report->save();

        return redirect('/blotterreports')->with('success', 'Incident has been reported.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlotterReport  $blotterReport
     * @return \Illuminate\Http\Response
     */
    public function show(BlotterReport $blotterReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlotterReport  $blotterReport
     * @return \Illuminate\Http\Response
     */
    public function edit(BlotterReport $blotterReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlotterReport  $blotterReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlotterReport $blotterReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlotterReport  $blotterReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlotterReport $blotterReport)
    {
        //
    }
}
