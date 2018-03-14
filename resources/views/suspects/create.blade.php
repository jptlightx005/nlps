@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="btn-group">
        <a href="{{route('suspects.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    </div>
    {!! Form::open(['action' => 'SuspectsController@store', 'method' => 'POST']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">Register Suspect</div>

        <div class="panel-body">
            <div class="form-group">
                {{Form::label('first_name', 'First Name')}}
                {{Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'First Name', 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('middle_name', 'Middle Name')}}
                {{Form::text('middle_name', '', ['class' => 'form-control', 'placeholder' => 'Middle Name', 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('last_name', 'Last Name')}}
                {{Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Last Name', 'required'])}}
            </div>

            <div class="form-group">
                {{Form::label('alias', 'Alias')}}
                {{Form::text('alias', '', ['class' => 'form-control', 'placeholder' => 'Alias', 'required'])}}
            </div>

            <div class="form-group">
                {{Form::label('date_of_birth', 'Date of Birth')}}
                {{Form::text('date_of_birth', '', ['class' => 'form-control', 'placeholder' => 'Date of Birth', 'required'])}}
            </div>

            <div class="form-group">
                {{Form::label('age', 'Age')}}
                {{Form::text('age', '', ['class' => 'form-control', 'placeholder' => 'Age', 'readonly'])}}
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Profile</div>

        <div class="panel-body">
            <div class="form-group">
                {{Form::label('civil_status', 'Civil Status')}}
                {{Form::text('civil_status', '', ['class' => 'form-control', 'placeholder' => 'Civil Status'])}}
            </div>
            <div class="form-group">
                {{Form::label('occupation', 'Occupation')}}
                {{Form::text('occupation', '', ['class' => 'form-control', 'placeholder' => 'Occupation'])}}
            </div>
            <div class="form-group">
                {{Form::label('address', 'Address')}}
                {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address'])}}
            </div>
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">Mugshots</div>

        <div class="panel-body">
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
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Register Crime</div>

        <div class="panel-body">
            
            <div class="form-group">
                <div class="col-md-12">
                    {{Form::label('crime_exist', 'Is the crime recorded?')}}
                    <p>
                        <input type="radio" name="crime_exist" value="yes"> Yes</input>
                    </p>
                    <p>
                        <input type="radio" name="crime_exist" value="no" checked> No</input>
                    </p>
                </div>
            </div>

            <div class="existing-crime-section hidden">
                <div class="form-group">
                    {{Form::label('existing_crime', 'Crime Committed')}}
                    {{Form::select('existing_crime', \App\CrimeCommitted::all()->pluck('title', 'id'), null, ['class' => 'form-control existing-crime-form', 'placeholder' => 'Select Crime Committed'])}}
                </div>
            </div>

            <div class="new-crime-section">
                <div class="form-group">
                    {{Form::label('crime_type', 'Crime Type')}}
                    {{Form::select('crime_type', \App\CrimeType::pluck('crime_type', 'crime_type')->all(), null, ['class' => 'form-control new-crime-form', 'placeholder' => 'Crime Type', 'required'])}}
                </div>

                <div class="form-group">
                    {{Form::label('location', 'Location')}}
                    {{Form::select('location', \App\Location::pluck('location_name', 'area_id'), null, ['class' => 'form-control new-crime-form', 'placeholder' => 'Location', 'required'])}}
                </div>

                <div class="form-group">
                    {{Form::label('time_occured', 'Time Occured')}}
                    {{Form::text('time_occured', null, ['class' => 'form-control new-crime-form', 'placeholder' => 'Time Occured', 'required'])}}
                </div>

                <div class="form-group">
                    {{Form::label('date_occured', 'Date Occured')}}
                    {{Form::text('date_occured', null, ['class' => 'form-control new-crime-form', 'placeholder' => 'Date Occured', 'required'])}}
                </div>
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
        var config = {prefix: '/res'}
        $('.lfm').filemanager('image', config);

        $('input[name=date_occured]').datepicker();

        var start = new Date();
        start.setFullYear(start.getFullYear() - 100);
        var end = new Date();
        end.setFullYear(end.getFullYear() - 18);
        $('input[name=date_of_birth]').datepicker({
                                        dateFormat: 'MM dd, yy',
                                        changeMonth: true, 
                                        changeYear: true, 
                                        minDate: start,
                                        maxDate: end,
                                        yearRange: start.getFullYear() + ':' + end.getFullYear(),
                                        onSelect: function (date) {
                                            var dob = new Date(date);
                                            var now = new Date();
                                            var age = now.getYear() - dob.getYear();
                                            if(now.getMonth() < dob.getMonth()){
                                                age -= 1;
                                            }else{
                                                if(now.getDate() < dob.getDate()){
                                                    age -= 1
                                                }
                                            }
                                            
                                            $("input[name=age]").val(age);
                                        }
                                    });
        $('input[name=time_occured]').timepicker({
                                        timeFormat: 'h:mm p',
                                        interval: 60,
                                        defaultTime: new Date(),
                                        dynamic: false,
                                        dropdown: true,
                                        scrollbar: true
                                    });

        $('input[name=crime_exist]').on('change', function(){
            if(this.value == "yes"){
                //if will select on existing
                $('.existing-crime-form').prop('required', true);
                $('.new-crime-form').prop('required', false);
                // $('#crime-section .submit-group').addClass('hidden');
                $('.existing-crime-section').removeClass('hidden');
                $('.new-crime-section').addClass('hidden');
            }else{
                $('.existing-crime-form').prop('required', false);
                $('.new-crime-form').prop('required', true);
                // $('#crime-section .submit-group').removeClass('hidden');
                $('.existing-crime-section').addClass('hidden');
                $('.new-crime-section').removeClass('hidden');
            }
        });
    </script>
@endsection