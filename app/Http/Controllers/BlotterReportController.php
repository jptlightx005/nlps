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
        $report->type_of_incident = $request->type_of_incident;
        $report->incident_narattive = $request->narrative;
        
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

            $suspect->status = "At Large";
            $suspect->save();
            $report->suspect_id = $suspect->id;
        }

        if($request->has_victim != "no"){
            if($request->complainant_victim == "yes"){
                $complainant->type = "reporting_victim";
                $complainant->save();
                $report->victim_id = $complainant->id;
            }else if($request->complainant_victim == "no"){
                $victim = new Complainant;
                $victim->type = "reported_victim";
                $victim->first_name = $request->input('victim_first_name');
                $victim->middle_name = $request->victim_middle_name;
                $victim->last_name = $request->victim_last_name;
                // $victim->qualifier = $request->input('qualifier') ?: '';
                $victim->nickname = $request->victim_nickname ?: '';
                $victim->citizenship = $request->victim_citizenship ?: '';
                $victim->gender = $request->victim_gender ?: '';
                $victim->civil_status = $request->victim_civil_status ?: '';
                $victim->date_of_birth = Carbon::createFromFormat('m/d/Y', $request->victim_date_of_birth);
                $victim->place_of_birth = $request->victim_place_of_birth ?: '';
                // $victim->home_phone = $request->victim_home_phone ?: '';
                $victim->mobile_phone = $request->victim_mobile_phone ?: '';

                $victim->current_address = $request->victim_current_address ?: '';
                $victim->current_village = $request->victim_current_village ?: '';
                $victim->current_barangay = $request->victim_current_barangay ?: '';
                $victim->current_town = $request->victim_current_town ?: '';
                $victim->current_province = $request->victim_current_province ?: '';
                
                $victim->other_address = $request->victim_other_address ?: '';
                $victim->other_village = $request->victim_other_village ?: '';
                $victim->other_barangay = $request->victim_other_barangay ?: '';
                $victim->other_town = $request->victim_other_town ?: '';
                $victim->other_province = $request->victim_other_province ?: '';
                
                $victim->highest_educational_attainment = $request->victim_highest_education ?: '';
                $victim->occupation = $request->victim_occupation ?: '';
                // $victim->id_presented = $request->victim_id_presented ?: '';
                $victim->email = $request->email ?: '';

                $victim->save();
                $report->victim_id = $victim->id;
            }
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
    public function edit($id)
    {
        $report = BlotterReport::find($id);
        return view('blotterreports.edit', compact('report'));
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
        $report = $blotterReport;

        $date_reported = $request->date_reported . " " . $request->time_reported;
        // $date_of_incident = $request->date_of_incident . " " . $request->time_reported; //comment this later
        $date_of_incident = $request->date_of_incident . " " . $request->time_of_incident;

        $report->date_reported = Carbon::createFromFormat('m/d/Y g:i A', $date_reported);
        $report->date_of_incident = Carbon::createFromFormat('m/d/Y g:i A', $date_of_incident);
        $report->place_of_incident = $request->location;
        $report->type_of_incident = $request->type_of_incident;
        // $report->incident_narrative = $request->narrative;
        
        // $complainant = new Complainant;
        // $complainant->type = "reporting_person";
        // $complainant->first_name = $request->input('reporting_first_name');
        // $complainant->middle_name = $request->reporting_middle_name;
        // $complainant->last_name = $request->reporting_last_name;
        // $complainant->qualifier = $request->input('qualifier') ?: '';
        // $complainant->nickname = $request->nickname ?: '';
        // $complainant->citizenship = $request->citizenship ?: '';
        // $complainant->gender = $request->gender ?: '';
        // $complainant->civil_status = $request->civil_status ?: '';
        // $complainant->date_of_birth = Carbon::createFromFormat('m/d/Y', $request->date_of_birth);
        // $complainant->place_of_birth = $request->place_of_birth ?: '';
        // $complainant->home_phone = $request->home_phone ?: '';
        // $complainant->mobile_phone = $request->mobile_phone ?: '';

        // $complainant->current_address = $request->current_address ?: '';
        // $complainant->current_village = $request->current_village ?: '';
        // $complainant->current_barangay = $request->current_barangay ?: '';
        // $complainant->current_town = $request->current_town ?: '';
        // $complainant->current_province = $request->current_province ?: '';
        
        // $complainant->other_address = $request->other_address ?: '';
        // $complainant->other_village = $request->other_village ?: '';
        // $complainant->other_barangay = $request->other_barangay ?: '';
        // $complainant->other_town = $request->other_town ?: '';
        // $complainant->other_province = $request->other_province ?: '';
        
        // $complainant->highest_educational_attainment = $request->highest_education ?: '';
        // $complainant->occupation = $request->occupation ?: '';
        // $complainant->id_presented = $request->id_presented ?: '';
        // $complainant->email = $request->email ?: '';

        // $complainant->save();
        // $report->complainant = $complainant->id;

        // if($request->has_suspect != "no"){
        //     $suspect = new Suspect;
        //     $suspect->first_name = $request->suspect_first_name;
        //     $suspect->middle_name = $request->suspect_middle_name;
        //     $suspect->last_name = $request->suspect_last_name;
        //     // $suspect->qualifier = $request->qualifier;
        //     $suspect->alias = $request->suspect_nickname;
        //     $suspect->citizenship = $request->suspect_citizenship;
        //     $suspect->gender = $request->suspect_gender;
        //     $suspect->civil_status = $request->suspect_civil_status;
        //     $suspect->date_of_birth = Carbon::createFromFormat('m/d/Y', $request->suspect_date_of_birth);
        //     $suspect->place_of_birth = $request->suspect_place_of_birth;
        //     // $suspect->home_phone = $request->home_phone;
        //     $suspect->mobile_phone = $request->suspect_mobile_phone;

        //     $suspect->current_address = $request->suspect_current_address;
        //     $suspect->current_village = $request->suspect_current_village;
        //     $suspect->current_barangay = $request->suspect_current_barangay;
        //     $suspect->current_town = $request->suspect_current_town;
        //     $suspect->current_province = $request->suspect_current_province;
            
        //     $suspect->other_address = $request->suspect_other_address;
        //     $suspect->other_village = $request->suspect_other_village;
        //     $suspect->other_barangay = $request->suspect_other_barangay;
        //     $suspect->other_town = $request->suspect_other_town;
        //     $suspect->other_province = $request->suspect_other_province;
            
        //     $suspect->highest_educational_attainment = $request->suspect_highest_education;
        //     $suspect->occupation = $request->suspect_occupation;
        //     $suspect->work_address = $request->suspect_work_address;
        //     $suspect->relation_to_victim = $request->suspect_relation_to_victim;

        //     $suspect->status = "At Large";
        //     $suspect->save();
        //     $report->suspect_id = $suspect->id;
        // }

        // if($request->has_victim != "no"){
        //     if($request->complainant_victim == "yes"){
        //         $complainant->type = "reporting_victim";
        //         $complainant->save();
        //         $report->victim_id = $complainant->id;
        //     }else if($request->complainant_victim == "no"){
        //         $victim = new Complainant;
        //         $victim->type = "reported_victim";
        //         $victim->first_name = $request->input('victim_first_name');
        //         $victim->middle_name = $request->victim_middle_name;
        //         $victim->last_name = $request->victim_last_name;
        //         // $victim->qualifier = $request->input('qualifier') ?: '';
        //         $victim->nickname = $request->victim_nickname ?: '';
        //         $victim->citizenship = $request->victim_citizenship ?: '';
        //         $victim->gender = $request->victim_gender ?: '';
        //         $victim->civil_status = $request->victim_civil_status ?: '';
        //         $victim->date_of_birth = Carbon::createFromFormat('m/d/Y', $request->victim_date_of_birth);
        //         $victim->place_of_birth = $request->victim_place_of_birth ?: '';
        //         // $victim->home_phone = $request->victim_home_phone ?: '';
        //         $victim->mobile_phone = $request->victim_mobile_phone ?: '';

        //         $victim->current_address = $request->victim_current_address ?: '';
        //         $victim->current_village = $request->victim_current_village ?: '';
        //         $victim->current_barangay = $request->victim_current_barangay ?: '';
        //         $victim->current_town = $request->victim_current_town ?: '';
        //         $victim->current_province = $request->victim_current_province ?: '';
                
        //         $victim->other_address = $request->victim_other_address ?: '';
        //         $victim->other_village = $request->victim_other_village ?: '';
        //         $victim->other_barangay = $request->victim_other_barangay ?: '';
        //         $victim->other_town = $request->victim_other_town ?: '';
        //         $victim->other_province = $request->victim_other_province ?: '';
                
        //         $victim->highest_educational_attainment = $request->victim_highest_education ?: '';
        //         $victim->occupation = $request->victim_occupation ?: '';
        //         // $victim->id_presented = $request->victim_id_presented ?: '';
        //         $victim->email = $request->email ?: '';

        //         $victim->save();
        //         $report->victim_id = $victim->id;
        //     }
        // }

        $report->save();

        return redirect('/blotterreports')->with('success', 'Incident has been updated.');
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

    public function blotterReportForId($id)
    {
        return BlotterReport::where('id', $id)
                            ->with('reportingPerson')
                            ->with('reportedSuspect')
                            ->with('reportedVictim')
                            ->get()
                            ->first();
    }
    public function print($id)
    {
        $report = BlotterReport::find($id);
        return view('blotterreports.print', compact('report'));
    }
}
