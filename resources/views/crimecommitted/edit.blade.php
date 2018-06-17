@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="btn-group">
        <a href="{{route('crimecommitted.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    </div>
    {!! Form::model($crime, ['action' => ['CrimeCommittedController@update', $crime->id], 'method' => 'POST']) !!}
    <div class="panel panel-default" id="crime-section">
        <div class="panel-heading">Edit Crime</div>

        <div class="panel-body">
        

            <div class="form-group">
                {{Form::label('crime_type', 'Crime Type')}}
                {{Form::select('crime_type', \App\CrimeType::pluck('crime_type', 'crime_type')->all(), null, ['class' => 'form-control', 'placeholder' => 'Crime Type', 'required'])}}
            </div>

            <div class="form-group">
                {{Form::label('location', 'Location')}}
                {{Form::select('location', \App\Location::pluck('location_name', 'area_id'), null, ['class' => 'form-control', 'placeholder' => 'Location', 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('weapons_used', 'Weapons Used')}}
                @foreach(\App\Equipment::all() as $equipment)
                <div class="checkbox">
                    <label><input type="checkbox" name="weapons_used[]" value="{{$equipment->id}}" {{$crime->equipments->contains($equipment->id) ? "checked" : ""}}>{{$equipment->equipment_name}}</label>
                </div>
                @endforeach
            </div>

            <div class="form-group">
                {{Form::label('time_occured', 'Time Occured')}}
                {{Form::text('time_occured', $crime->date_occured->format('h:i A'), ['class' => 'form-control', 'placeholder' => 'Time Occured', 'required'])}}
            </div>

            <div class="form-group">
                {{Form::label('date_occured', 'Date Occured')}}
                {{Form::text('date_occured', $crime->date_occured->format('F d, Y'), ['class' => 'form-control', 'placeholder' => 'Date Occured', 'required'])}}
            </div>

            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>
            
            <div class="form-group">
                {{Form::label('officer_in_charge', 'Officer in Charge')}}
                {{Form::select('officer_in_charge', \App\Officer::all()->pluck('full_name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select Officer'])}}
            </div>

            <div class="form-group">
                {{Form::label('investigator', 'Investigator')}}
                {{Form::select('investigator', \App\Investigator::all()->pluck('full_name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select Investigator'])}}
            </div>

            <div class="form-group">
                <div class="crime-lead col-md-12">
                    {{Form::label('has_suspect', 'Does the crime have a lead?')}}
                    <p>
                        <input type="radio" name="has_suspect" value="yes" {{count($crime->suspects) ? "checked" : ""}}> Yes</input>
                    </p>
                    <p>
                        <input type="radio" name="has_suspect" value="no" {{!count($crime->suspects) ? "checked" : ""}}> No</input>
                    </p>
                </div>
                <div class="suspect-exist col-md-6 hidden">
                    &nbsp;
                    {{Form::label('suspect_exist', 'Is the suspect on the records?')}}
                    <p>
                        <input type="radio" class="exist-radio" name="suspect_exist" value="yes"> Yes</input>
                    </p>
                    <p>
                        <input type="radio" class="exist-radio" name="suspect_exist" value="no"> No</input>
                    </p>
                </div>
            </div>

            <div class="form-group submit-group">
                {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
            </div>
        </div>
    </div>
    <div class="panel panel-default existing-suspect-section hidden">
        <div class="panel-heading">Suspect</div>

        <div class="panel-body">
            <div class="form-group">
                {{Form::label('existing_suspect', 'Suspect Name')}}
                {{Form::select('existing_suspect', \App\Suspect::all()->pluck('full_name', 'id'), null, ['class' => 'form-control existing-suspect-form', 'placeholder' => 'Select Suspect'])}}
            </div>

            <div class="form-group submit-group">
                {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
            </div>
        </div>
    </div>
    <div class="panel panel-default new-suspect-section hidden">
        <div class="panel-heading">Suspect Profile</div>

        <div class="panel-body">
            <div class="form-group">
                {{Form::label('first_name', 'First Name')}}
                {{Form::text('first_name', null, ['class' => 'form-control new-suspect-form', 'placeholder' => 'First Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('middle_name', 'Middle Name')}}
                {{Form::text('middle_name', null, ['class' => 'form-control new-suspect-form', 'placeholder' => 'Middle Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('last_name', 'Last Name')}}
                {{Form::text('last_name', null, ['class' => 'form-control new-suspect-form', 'placeholder' => 'Last Name'])}}
            </div>

            <div class="form-group">
                {{Form::label('alias', 'Alias')}}
                {{Form::text('alias', null, ['class' => 'form-control new-suspect-form', 'placeholder' => 'Alias'])}}
            </div>

            {{Form::label('', 'Mugshot')}}
            <div class="form-group">
                <div class="input-group">
                   <span class="input-group-btn">
                     <a data-input="whole-thumbnail" data-preview="whole-holder" class="btn btn-primary lfm">
                       <i class="fa fa-picture-o"></i> Whole Body
                     </a>
                   </span>
                   <input id="whole-thumbnail" class="form-control preview-thumbnail" type="text" name="whole_body">
                 </div>
                 <img id="whole-holder" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="form-group">
                <div class="input-group">
                   <span class="input-group-btn">
                     <a data-input="front-thumbnail" data-preview="front-holder" class="btn btn-primary lfm">
                       <i class="fa fa-picture-o"></i> Front Face
                     </a>
                   </span>
                   <input id="front-thumbnail" class="form-control preview-thumbnail" type="text" name="front_face">
                 </div>
                 <img id="front-holder" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="form-group">
                <div class="input-group">
                   <span class="input-group-btn">
                     <a data-input="left-thumbnail" data-preview="left-holder" class="btn btn-primary lfm">
                       <i class="fa fa-picture-o"></i> Left Face
                     </a>
                   </span>
                   <input id="left-thumbnail" class="form-control preview-thumbnail" type="text" name="left_face">
                 </div>
                 <img id="left-holder" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="form-group">
                <div class="input-group">
                   <span class="input-group-btn">
                     <a data-input="right-thumbnail" data-preview="right-holder" class="btn btn-primary lfm">
                       <i class="fa fa-picture-o"></i> Right Face
                     </a>
                   </span>
                   <input id="right-thumbnail" class="form-control preview-thumbnail" type="text" name="right_face">
                 </div>
                 <img id="right-holder" style="margin-top:15px;max-height:100px;">
            </div>

            <div class="form-group submit-group">
                {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
            </div>
        </div>
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {!! Form::close() !!}
</div>
@endsection

@section('page-specific-scripts')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        var config = {prefix: '/res'}
        $('.lfm').filemanager('image', config);

        $('input[name=date_occured]').datepicker({
                                        maxDate: '0',
                                        });
        $('input[name=time_occured]').timepicker({
                                        timeFormat: 'h:mm p',
                                        interval: 60,
                                        dynamic: false,
                                        dropdown: true,
                                        scrollbar: true
                                    });
        
        $('input[name=has_suspect]').on('change', function(){
            if(this.value == "yes"){
                //If Has Suspect
                //The suspect exist section will appear
                //And their grids will change
                $('.suspect-exist').removeClass('hidden');
                $('.crime-lead').removeClass('col-md-12');
                $('.crime-lead').addClass('col-md-6');

                //Will require the user to select an option for existing suspects
                $('.exist-radio').prop('required', true);

                //hides the submit button
                $('#crime-section .submit-group').addClass('hidden');

                //auto select an option for existing. default: no
                $('input[name=suspect_exist][value=yes]').prop("checked", true);
                $('input[name=suspect_exist][value=yes]').change();
            }else{
                //If otherwise
                //The suspect exist section will disappear
                //And their grids will change back
                $('.suspect-exist').addClass('hidden');
                $('.crime-lead').addClass('col-md-12');
                $('.crime-lead').removeClass('col-md-6');

                //Will not require the user to select an option for existing suspects
                $('.exist-radio').prop('required', false);

                //shows the submit button
                $('#crime-section .submit-group').removeClass('hidden');

                //hides all of the sections below
                //and unrequires everything
                $('.existing-suspect-section').addClass('hidden');
                $('.new-suspect-section').addClass('hidden');
                $('.existing-suspect-form').prop('required', false);
                $('.new-suspect-form').prop('required', false);
            }
        });

        $('input[name=suspect_exist]').on('change', function(){
            if(this.value == "yes"){
                //if will select on existing
                $('.existing-suspect-form').prop('required', true);
                $('.new-suspect-form').prop('required', false);
                // $('#crime-section .submit-group').addClass('hidden');
                $('.existing-suspect-section').removeClass('hidden');
                $('.new-suspect-section').addClass('hidden');
            }else{
                $('.existing-suspect-form').prop('required', false);
                $('.new-suspect-form').prop('required', true);
                // $('#crime-section .submit-group').removeClass('hidden');
                $('.existing-suspect-section').addClass('hidden');
                $('.new-suspect-section').removeClass('hidden');
            }
        });

        $(document).ready(function(){
            console.log($('input[name=has_suspect]').val());
            if($('input[name=has_suspect]:checked').val() == "yes"){
                $('input[name=has_suspect][value=yes]').change();

                var suspect_name = '{{optional($crime->suspects->first())->full_name}}';
                var sopt = $('select[name=existing_suspect]').find('option:contains(\'' + suspect_name + '\')');
                sopt.prop('selected', 'selected');

            }

            var location_name = '{{$crime->location->location_name}}';
            var lopt = $('select[name=location]').find('option:contains(\'' + location_name + '\')');
            lopt.prop('selected', 'selected');

            var officer_in_charge = '{{$crime->officer_in_charge}}';
            var oopt = $('select[name=officer_in_charge]').find('option:contains(\'' + officer_in_charge + '\')');
            oopt.prop('selected', 'selected');

            var investigator = '{{$crime->investigator}}';
            var iopt = $('select[name=investigator]').find('option:contains(\'' + investigator + '\')');
            iopt.prop('selected', 'selected');
        });
    </script>
@endsection