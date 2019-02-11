@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="btn-group">
        <a href="{{route('crimecommitted.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    </div>
    {!! Form::open(['action' => 'CrimeCommittedController@store', 'method' => 'POST']) !!}
    <div class="panel panel-default" id="blotter-section">
        <div class="panel-heading">Select Blotter Report</div>

        <div class="panel-body">
            <div class="form-group">
                {{Form::label('blotter_report', 'Blotter Report')}}
                {{Form::select('blotter_report', \App\BlotterReport::underInvestigation()->pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Blotter Report', 'required'])}}
            </div>
        </div>
    </div>
    <div class="panel panel-default hidden" id="crime-section">
        <div class="panel-heading">Register Case</div>

        <div class="panel-body">
            <div class="form-group">
                {{Form::label('crime_type', 'Crime')}}
                {{Form::select('crime_type', \App\CrimeType::pluck('crime_type', 'id')->all(), null, ['class' => 'form-control', 'placeholder' => 'Crime', 'required'])}}
            </div>

            <div class="form-group">
                {{Form::label('location', 'Location')}}
                {{Form::select('location', \App\Location::pluck('location_name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Location', 'required'])}}
            </div>

            <div class="form-group">
                {{Form::label('weapons_used', 'Weapons Used')}}
                @foreach(\App\Equipment::all() as $equipment)
                <div class="checkbox">
                    <label><input type="checkbox" name="weapons_used[]" value="{{$equipment->id}}">{{$equipment->equipment_name}}</label>
                </div>
                @endforeach
            </div>

            <div class="form-group">
                {{Form::label('time_occured', 'Time Occured')}}
                {{Form::text('time_occured', null, ['class' => 'form-control', 'placeholder' => 'Time Occured', 'required'])}}
            </div>

            <div class="form-group">
                {{Form::label('date_occured', 'Date Occured')}}
                {{Form::text('date_occured', null, ['class' => 'form-control', 'placeholder' => 'Date Occured', 'required'])}}
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
                    {{Form::label('has_suspect', 'Does the case have a lead?')}}
                    <p>
                        <input type="radio" name="has_suspect" value="yes"> Yes</input>
                    </p>
                    <p>
                        <input type="radio" name="has_suspect" value="no" checked> No</input>
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
                {{Form::text('first_name', '', ['class' => 'form-control new-suspect-form', 'placeholder' => 'First Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('middle_name', 'Middle Name')}}
                {{Form::text('middle_name', '', ['class' => 'form-control new-suspect-form', 'placeholder' => 'Middle Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('last_name', 'Last Name')}}
                {{Form::text('last_name', '', ['class' => 'form-control new-suspect-form', 'placeholder' => 'Last Name'])}}
            </div>

            <div class="form-group">
                {{Form::label('alias', 'Alias')}}
                {{Form::text('alias', '', ['class' => 'form-control new-suspect-form', 'placeholder' => 'Alias'])}}
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
    {!! Form::close() !!}
</div>
@endsection

@section('page-specific-scripts')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>

        function getBlotterReport(id){
            var data = {'blotter_id': id}
            console.log("params: ")
            console.log(data)

            $.ajax({
                headers:{'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
                type: "GET",
                url: "/blotterreports/" + id + "/blotter",
                success: function(res){
                    console.log(res)
                    $('select[name=location]').val(res.place_of_incident)
                    var dti =  new Date(res.date_of_incident)
                    $('input[name=time_occured]').val(moment(dti).format("hh:mm A"))
                    $('input[name=date_occured]').val(moment(dti).format("MM/DD/YYYY"))

                    if(res.reported_suspect != null){
                        $('input[name=has_suspect][value=yes]').prop('checked', true)
                        $('input[name=has_suspect][value=yes]').change()

                        $('input[name=suspect_exist][value=yes]').prop("checked", true);
                        $('input[name=suspect_exist][value=yes]').change();

                        $('select[name=existing_suspect]').val(res.reported_suspect.id)
                    }

                    $('#crime-section').removeClass('hidden')
                }
            });
        }

        var config = {prefix: '/res'}
        $('.lfm').filemanager('image', config);
        $('select[name=blotter_report]').on('change', function(e){
            $('#crime-section').addClass('hidden')
            if($(this).prop('selectedIndex') > 0){
                var blotterid = $(this).val()
                getBlotterReport(blotterid)
            }
        })
        $('input[name=date_occured]').datepicker({
                                        maxDate: '0',
                                        });
        $('input[name=time_occured]').timepicker({
                                        timeFormat: 'h:mm p',
                                        interval: 60,
                                        defaultTime: new Date(),
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
                $('input[name=suspect_exist][value=no]').prop("checked", true);
                $('input[name=suspect_exist][value=no]').change();
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
            console.log(this.value);
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
    </script>
@endsection