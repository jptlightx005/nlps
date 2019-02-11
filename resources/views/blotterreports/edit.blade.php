@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="btn-group">
        <a href="{{route('blotterreports.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    </div>
    {!! Form::open(['action' => ['BlotterReportController@update', $report->id], 'method' => 'POST']) !!}
    	{{Form::hidden('_method', 'PUT')}}
    <div class="panel panel-default" id="crime-section">
        <div class="panel-heading">Incident Report</div>

        <div class="panel-body">
        
            <div class="form-group">
                {{Form::label('type_of_incident', 'Type of Incident*')}}
                {{Form::text('type_of_incident', $report->type_of_incident, ['class' => 'form-control', 'placeholder' => 'Type of Incident', 'required'])}}
            </div>

            {{Form::label('date_reported', 'Date & Time Reported *')}}
            <div class="input-group">
                {{Form::text('date_reported', optional($report->date_reported)->format('m/d/Y'), ['class' => 'form-control date_picker', 'placeholder' => 'Date Reported', 'required'])}}
                <span class="input-group-addon"></span>
                {{Form::text('time_reported', optional($report->date_reported)->format('h:i A'), ['class' => 'form-control time_picker', 'placeholder' => 'Time Reported', 'required'])}}
            </div>
            {{Form::label('date_of_incident', 'Date & Time of Incident *')}}
            <div class="input-group">
                {{Form::text('date_of_incident', optional($report->date_of_incident)->format('m/d/Y'), ['class' => 'form-control date_picker', 'placeholder' => 'Date of Incident', 'required'])}}
                <span class="input-group-addon"></span>
                {{Form::text('time_of_incident', optional($report->date_of_incident)->format('h:i A'), ['class' => 'form-control time_picker', 'placeholder' => 'Time of Incident', 'required'])}}
            </div>

            <div class="form-group">
                {{Form::label('location', 'Place of Incident *')}}
                {{Form::select('location', \App\Location::pluck('location_name', 'id'), $report->place_of_incident, ['class' => 'form-control', 'placeholder' => 'Place of Incident', 'required'])}}
            </div>
        </div>
    </div>
    {{-- <div class="panel panel-default new-suspect-section">
        <div class="panel-heading">Reporting Person</div>

        <div class="panel-body">
            <div class="form-group">
                {{Form::label('reporting_last_name', 'Last Name *')}}
                {{Form::text('reporting_last_name', $report->reportingPerson->last_name, ['class' => 'form-control new-reporting-form', 'placeholder' => 'Last Name', 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('reporting_first_name', 'First Name *')}}
                {{Form::text('reporting_first_name', $report->reportingPerson->first_name, ['class' => 'form-control new-reporting-form', 'placeholder' => 'First Name', 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('reporting_middle_name', 'Middle Name *')}}
                {{Form::text('reporting_middle_name', $report->reportingPerson->middle_name, ['class' => 'form-control new-reporting-form', 'placeholder' => 'Middle Name', 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('nickname', 'Nickname')}}
                {{Form::text('nickname', $report->reportingPerson->nickname, ['class' => 'form-control new-reporting-form', 'placeholder' => 'Nickname'])}}
            </div>
            <div class="form-group">
                {{Form::label('citizenship', 'Citizenship')}}
                {{Form::text('citizenship', $report->reportingPerson->citizenship, ['class' => 'form-control new-reporting-form', 'placeholder' => 'Citizenship'])}}
            </div>
            <div class="form-group">
                {{Form::label('gender')}}
                {{Form::select('gender', ['Male', 'Female'], $report->reportingPerson->gender == 'Female' ? 1 : 0, ['class' => 'form-control new-reporting-form', 'placeholder' => 'Gender'])}}
            </div>
            <div class="form-group">
                {{Form::label('civil_status', 'Civil Status')}}
                {{Form::text('civil_status', $report->reportingPerson->civil_status, ['class' => 'form-control', 'placeholder' => 'Civil Status'])}}
            </div>
            <div class="form-group">
                {{Form::label('date_of_birth', 'Date of Birth *')}}
                {{Form::text('date_of_birth', $report->reportingPerson->date_of_birth->format('m/d/Y'), ['class' => 'form-control new-reporting-form date_picker    ', 'placeholder' => 'Date of Birth', 'required'])}}
            </div>       
            <div class="form-group">
                {{Form::label('place_of_birth', 'Place of Birth')}}
                {{Form::text('place_of_birth', $report->reportingPerson->place_of_birth, ['class' => 'form-control', 'placeholder' => 'Place of Birth'])}}
            </div>
            <div class="form-group">
                {{Form::label('mobile_phone', 'Mobile Phone')}}
                {{Form::text('mobile_phone', null, ['class' => 'form-control', 'placeholder' => 'Mobile Phone'])}}
            </div>
            <br>
            <div class="form-group">
                {{Form::label('current_address', 'Current Address')}}
                {{Form::text('current_address', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Current Address'])}}
            </div>
            <div class="form-group">
                {{Form::label('current_village', 'Village/Sitio')}}
                {{Form::text('current_village', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Village/Sitio'])}}
            </div>
            <div class="form-group">
                {{Form::label('current_barangay', 'Barangay')}}
                {{Form::text('current_barangay', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Barangay'])}}
            </div>
            <div class="form-group">
                {{Form::label('current_town', 'Town/City')}}
                {{Form::text('current_town', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Town/City'])}}
            </div>
            <div class="form-group">
                {{Form::label('current_province', 'Province')}}
                {{Form::text('current_province', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Province'])}}
            </div>

            <br>
            <div class="form-group">
                {{Form::label('other_address', 'Other Address')}}
                {{Form::text('other_address', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Current Address'])}}
            </div>
            <div class="form-group">
                {{Form::label('other_village', 'Village/Sitio')}}
                {{Form::text('other_village', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Village/Sitio'])}}
            </div>
            <div class="form-group">
                {{Form::label('other_barangay', 'Barangay')}}
                {{Form::text('other_barangay', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Barangay'])}}
            </div>
            <div class="form-group">
                {{Form::label('other_town', 'Town/City')}}
                {{Form::text('other_town', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Town/City'])}}
            </div>
            <div class="form-group">
                {{Form::label('other_province', 'Province')}}
                {{Form::text('other_province', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Province'])}}
            </div>
            <br>
            <div class="form-group">
            {{Form::label('highest_education', 'Highest Educational Attainment')}}
                {{Form::text('highest_education', null, ['class' => 'form-control', 'placeholder' => 'Highest Educational Attainment'])}}
            </div>
            <div class="form-group">
                {{Form::label('occupation', 'Occupation')}}
                {{Form::text('occupation', null, ['class' => 'form-control', 'placeholder' => 'Occupation'])}}
            </div>
            <div class="form-group">
                {{Form::label('id_presented', 'ID Card Presented')}}
                {{Form::text('id_presented', null, ['class' => 'form-control', 'placeholder' => 'ID Card Presented'])}}
            </div>
            <div class="form-group">
                {{Form::label('email', 'Email (optional)')}}
                {{Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email'])}}
            </div>
        </div>
    </div> --}}
    {{-- <div class="panel panel-default new-suspect-section">
        <div class="panel-heading">Suspect's Data</div>
        <div class="panel-body">
            <div class="form-group">
                {{Form::label('has_suspect', 'Does the complainant have a suspect?')}}
                <br>
                <input type="radio" name="has_suspect" value="yes" {{$report->reportedSuspect ? "checked" : ""}}> Yes</input>
                <input type="radio" name="has_suspect" value="no" {{!$report->reportedSuspect ? "checked" : ""}}> No</input>
            </div>
            <div class="has-suspect hidden">
                <div class="form-group">
                    {{Form::label('suspect_last_name', 'Last Name *')}}
                    {{Form::text('suspect_last_name', '', ['class' => 'form-control new-reporting-form required_if_visible', 'placeholder' => 'Last Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_first_name', 'First Name *')}}
                    {{Form::text('suspect_first_name', '', ['class' => 'form-control new-reporting-form required_if_visible', 'placeholder' => 'First Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_middle_name', 'Middle Name *')}}
                    {{Form::text('suspect_middle_name', '', ['class' => 'form-control new-reporting-form required_if_visible', 'placeholder' => 'Middle Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_nickname', 'Nickname')}}
                    {{Form::text('suspect_nickname', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Nickname'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_citizenship', 'Citizenship')}}
                    {{Form::text('suspect_citizenship', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Citizenship'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_gender', 'Gender')}}
                    {{Form::select('suspect_gender', ['Male', 'Female'], null, ['class' => 'form-control new-reporting-form', 'placeholder' => 'Gender'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_civil_status', 'Civil Status')}}
                    {{Form::text('suspect_civil_status', null, ['class' => 'form-control', 'placeholder' => 'Civil Status'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_date_of_birth', 'Date of Birth *')}}
                    {{Form::text('suspect_date_of_birth', null, ['class' => 'form-control new-reporting-form date_picker  required_if_visible', 'placeholder' => 'Date of Birth'])}}
                </div>       
                <div class="form-group">
                    {{Form::label('suspect_place_of_birth', 'Place of Birth')}}
                    {{Form::text('suspect_place_of_birth', null, ['class' => 'form-control', 'placeholder' => 'Place of Birth'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_mobile_phone', 'Mobile Phone')}}
                    {{Form::text('suspect_mobile_phone', null, ['class' => 'form-control', 'placeholder' => 'Mobile Phone'])}}
                </div>
                <br>
                <div class="form-group">
                    {{Form::label('suspect_current_address', 'Current Address')}}
                    {{Form::text('suspect_current_address', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Current Address'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_current_village', 'Village/Sitio')}}
                    {{Form::text('suspect_current_village', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Village/Sitio'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_current_barangay', 'Barangay')}}
                    {{Form::text('suspect_current_barangay', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Barangay'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_current_town', 'Town/City')}}
                    {{Form::text('suspect_current_town', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Town/City'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_current_province', 'Province')}}
                    {{Form::text('suspect_current_province', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Province'])}}
                </div>

                <br>
                <div class="form-group">
                    {{Form::label('suspect_other_address', 'Other Address')}}
                    {{Form::text('suspect_other_address', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Current Address'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_other_village', 'Village/Sitio')}}
                    {{Form::text('suspect_other_village', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Village/Sitio'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_other_barangay', 'Barangay')}}
                    {{Form::text('suspect_other_barangay', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Barangay'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_other_town', 'Town/City')}}
                    {{Form::text('suspect_other_town', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Town/City'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_other_province', 'Province')}}
                    {{Form::text('suspect_other_province', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Province'])}}
                </div>
                <br>
                <div class="form-group">
                {{Form::label('suspect_highest_education', 'Highest Educational Attainment')}}
                    {{Form::text('suspect_highest_education', null, ['class' => 'form-control', 'placeholder' => 'Highest Educational Attainment'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_occupation', 'Occupation')}}
                    {{Form::text('suspect_occupation', null, ['class' => 'form-control', 'placeholder' => 'Occupation'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_work_address', 'Work Address')}}
                    {{Form::text('suspect_work_address', null, ['class' => 'form-control', 'placeholder' => 'Work Address'])}}
                </div>
                <div class="form-group">
                    {{Form::label('suspect_relation_to_victim', 'Relation to Victim')}}
                    {{Form::text('suspect_relation_to_victim', null, ['class' => 'form-control', 'placeholder' => 'Relation to Victim'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email (optional)')}}
                    {{Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email'])}}
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default new-victim-section">
        <div class="panel-heading">Victim's Data</div>
        <div class="panel-body">
            <div class="form-group">
                {{Form::label('has_victim', 'Does the incident have a victim?')}}
                <br>
                <input type="radio" name="has_victim" value="yes"> Yes</input>
                <input type="radio" name="has_victim" value="no" checked> No</input>
            </div>
            <div class="form-group complainant-victim-section hidden">
                {{Form::label('complainant_victim', 'Is the complainant the victim?')}}
                <br>
                <input type="radio" name="complainant_victim" value="yes" checked> Yes</input>
                <input type="radio" name="complainant_victim" value="no"> No</input>
            </div>
            <div class="has-different-victim-section hidden">
                <div class="form-group">
                    {{Form::label('victim_last_name', 'Victim\'s Last Name *')}}
                    {{Form::text('victim_last_name', '', ['class' => 'form-control new-reporting-form required_if_visible', 'placeholder' => 'Victim\'s Last Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_first_name', 'Victim\'s First Name *')}}
                    {{Form::text('victim_first_name', '', ['class' => 'form-control new-reporting-form required_if_visible', 'placeholder' => 'Victim\'s First Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_middle_name', 'Victim\'s Middle Name *')}}
                    {{Form::text('victim_middle_name', '', ['class' => 'form-control new-reporting-form required_if_visible', 'placeholder' => 'Victim\'s Middle Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_nickname', 'Victim\'s Nickname')}}
                    {{Form::text('victim_nickname', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Victim\'s  Nickname'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_citizenship', 'Citizenship')}}
                    {{Form::text('victim_citizenship', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Citizenship'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_gender', 'Gender')}}
                    {{Form::select('victim_gender', ['Male', 'Female'], null, ['class' => 'form-control new-reporting-form', 'placeholder' => 'Gender'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_civil_status', 'Civil Status')}}
                    {{Form::text('victim_civil_status', null, ['class' => 'form-control', 'placeholder' => 'Civil Status'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_date_of_birth', 'Date of Birth *')}}
                    {{Form::text('victim_date_of_birth', null, ['class' => 'form-control new-reporting-form date_picker  required_if_visible', 'placeholder' => 'Date of Birth'])}}
                </div>       
                <div class="form-group">
                    {{Form::label('victim_place_of_birth', 'Place of Birth')}}
                    {{Form::text('victim_place_of_birth', null, ['class' => 'form-control', 'placeholder' => 'Place of Birth'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_mobile_phone', 'Mobile Phone')}}
                    {{Form::text('victim_mobile_phone', null, ['class' => 'form-control', 'placeholder' => 'Mobile Phone'])}}
                </div>
                <br>
                <div class="form-group">
                    {{Form::label('victim_current_address', 'Current Address')}}
                    {{Form::text('victim_current_address', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Current Address'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_current_village', 'Village/Sitio')}}
                    {{Form::text('victim_current_village', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Village/Sitio'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_current_barangay', 'Barangay')}}
                    {{Form::text('victim_current_barangay', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Barangay'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_current_town', 'Town/City')}}
                    {{Form::text('victim_current_town', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Town/City'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_current_province', 'Province')}}
                    {{Form::text('victim_current_province', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Province'])}}
                </div>

                <br>
                <div class="form-group">
                    {{Form::label('victim_other_address', 'Other Address')}}
                    {{Form::text('victim_other_address', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Current Address'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_other_village', 'Village/Sitio')}}
                    {{Form::text('victim_other_village', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Village/Sitio'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_other_barangay', 'Barangay')}}
                    {{Form::text('victim_other_barangay', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Barangay'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_other_town', 'Town/City')}}
                    {{Form::text('victim_other_town', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Town/City'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_other_province', 'Province')}}
                    {{Form::text('victim_other_province', '', ['class' => 'form-control new-reporting-form', 'placeholder' => 'Province'])}}
                </div>
                <br>
                <div class="form-group">
                {{Form::label('victim_highest_education', 'Highest Educational Attainment')}}
                    {{Form::text('victim_highest_education', null, ['class' => 'form-control', 'placeholder' => 'Highest Educational Attainment'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_occupation', 'Occupation')}}
                    {{Form::text('victim_occupation', null, ['class' => 'form-control', 'placeholder' => 'Occupation'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_work_address', 'Work Address')}}
                    {{Form::text('victim_work_address', null, ['class' => 'form-control', 'placeholder' => 'Work Address'])}}
                </div>
                <div class="form-group">
                    {{Form::label('victim_relation_to_victim', 'Relation to Victim')}}
                    {{Form::text('victim_relation_to_victim', null, ['class' => 'form-control', 'placeholder' => 'Relation to Victim'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email (optional)')}}
                    {{Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email'])}}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="panel panel-default narrative-section">
        <div class="panel-heading">Narrative</div>
        <div class="panel-body">
            <div class="form-group">
                {{Form::label('narrative', 'Narrative')}}
                {{Form::textarea('narrative', $report->incident_narattive, ['class' => 'form-control'])}}
            </div>
            <div class="form-group submit-group">
                {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
@section('page-specific-styles')
<style type="text/css">
    .date_picker, .time_picker{
        z-index: 0 !important;
    }
</style>
@endsection
@section('page-specific-scripts')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        var config = {prefix: '/res'}
        $('.lfm').filemanager('image', config);

        $('input.date_picker').datepicker({
                                        maxDate: '0',
                                        });
        $('input.time_picker').timepicker({
                                        timeFormat: 'h:mm p',
                                        interval: 60,
                                        defaultTime: '',
                                        dynamic: false,
                                        dropdown: true,
                                        scrollbar: true
                                    });
        $('input[name=has_suspect]').on('change', function(){
            if(this.value == "yes"){
                //If Has Suspect
                //The suspect exist section will appear
                //And their grids will change
                $('.has-suspect').removeClass('hidden');
            }else{
                //If otherwise
                //The suspect exist section will disappear
                //And their grids will change back
                $('.has-suspect').addClass('hidden');
            }
        });

        $('input[name=has_victim]').on('change', function(){
            if(this.value == "yes"){
                //If Has Suspect
                //The suspect exist section will appear
                //And their grids will change
                $('.complainant-victim-section').removeClass('hidden');
            }else{
                //If otherwise
                //The suspect exist section will disappear
                //And their grids will change back
                $('.complainant-victim-section').addClass('hidden');
            }
        });
        $('input[name=complainant_victim]').on('change', function(){
            if(this.value == "no"){
                //If Has Suspect
                //The suspect exist section will appear
                //And their grids will change
                $('.has-different-victim-section').removeClass('hidden');
            }else{
                //If otherwise
                //The suspect exist section will disappear
                //And their grids will change back
                $('.has-different-victim-section').addClass('hidden');
            }
        });
    </script>
@endsection