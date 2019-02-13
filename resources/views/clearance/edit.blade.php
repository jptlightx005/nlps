@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="btn-group">
        <a href="{{route('policeclearance.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    </div>
    {!! Form::open(['action' => ['PoliceClearanceController@update', $clearance->id], 'method' => 'POST']) !!}
    <div class="panel panel-default" id="crime-section">
        <div class="panel-heading">
            <div class="heading-left" style="display: inline;">Edit Police Clearance</div>
            <div class="heading-right cleared-indicator hidden" style="display: inline; float:right; color: #FF5588">Requesting Person is Not Cleared</div>
        </div>

        <div class="panel-body">
            <div class="form-group">
                {{Form::label('last_name', 'Last Name *')}}
                {{Form::text('last_name', $clearance->last_name, ['class' => 'form-control new-reporting-form', 'placeholder' => 'Last Name', 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('first_name', 'First Name *')}}
                {{Form::text('first_name', $clearance->first_name, ['class' => 'form-control new-reporting-form', 'placeholder' => 'First Name', 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('middle_name', 'Middle Name *')}}
                {{Form::text('middle_name', $clearance->middle_name, ['class' => 'form-control new-reporting-form', 'placeholder' => 'Middle Name', 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('date_of_birth', 'Date of Birth *')}}
                {{Form::text('date_of_birth', $clearance->date_of_birth->format('m/d/Y'), ['class' => 'form-control new-reporting-form date_picker    ', 'placeholder' => 'Date of Birth', 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('contact_number', 'Contact Number')}}
                {{Form::text('contact_number', $clearance->contact_number, ['class' => 'form-control', 'placeholder' => 'Contact Number'])}}
            </div>
            <div class="form-group">
                {{Form::label('address', 'Address')}}
                {{Form::text('address', $clearance->address, ['class' => 'form-control new-reporting-form', 'placeholder' => 'Address'])}}
            </div>
            <div class="form-group">
                {{Form::label('place_of_birth', 'Place of Birth')}}
                {{Form::text('place_of_birth', $clearance->place_of_birth, ['class' => 'form-control', 'placeholder' => 'Place of Birth'])}}
            </div>
            <div class="form-group">
                {{Form::label('nationality', 'Nationality')}}
                {{Form::text('nationality', $clearance->nationality, ['class' => 'form-control new-reporting-form', 'placeholder' => 'Nationality'])}}
            </div>
            <div class="form-group">
                {{Form::label('gender', 'Gender')}}
                {{Form::select('gender', ['Male', 'Female'], $clearance->gender == 'Male' ? 0 : 1, ['class' => 'form-control new-reporting-form', 'placeholder' => 'Gender'])}}
            </div>
            <div class="form-group">
                {{Form::label('purpose', 'Purpose')}}
                {{Form::text('purpose', $clearance->purpose, ['class' => 'form-control new-reporting-form', 'placeholder' => 'Purpose'])}}
            </div>
            <div class="form-group">
                {{Form::label('civil_status', 'Civil Status')}}
                {{Form::text('civil_status', $clearance->civil_status, ['class' => 'form-control', 'placeholder' => 'Civil Status'])}}
            </div>
            <div class="form-group">
                <div class="input-group">
                   <span class="input-group-btn">
                     <a data-input="whole-thumbnail" data-preview="whole-holder" class="btn btn-primary lfm">
                       <i class="fa fa-picture-o"></i> Picture
                     </a>
                   </span>
                   <input id="whole-thumbnail" class="form-control preview-thumbnail" type="text" name="whole_body" value="{{$clearance->image_url}}">
                 </div>
                 <img id="whole-holder" src="{{$clearance->image_url}}" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="form-group submit-group">
                {{Form::submit('Submit', ['class' => 'btn btn-default', 'disabled'])}}
            </div>
        </div>
    </div>
    {{Form::hidden('_method', 'PUT')}}
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

        $('input[name=suspect_exist]').on('change', function(){
            console.log(this.value);
            if(this.value == "yes"){
                //if will select on existing
                $('.existing-suspect-form').prop('required', true);
                $('.new-suspect-form').prop('required', false);
                // $('#crime-section .submit-group').addClass('hidden');
                $('.existing-suspect-section').removeClass('hidden');
                $('.new-suspect-section').addClass('hidden');
                $('.required_if_visible').attr('required', true);
            }else{
                $('.existing-suspect-form').prop('required', false);
                $('.new-suspect-form').prop('required', true);
                // $('#crime-section .submit-group').removeClass('hidden');
                $('.existing-suspect-section').addClass('hidden');
                $('.new-suspect-section').removeClass('hidden');
                $('.required_if_visible').attr('required', false);
            }
        });

        var isSearching = false;
        function nameParams(){
            var nameParams = {};
            var last_name = $('input[name=last_name]').val();
            if(last_name){
                nameParams.last_name = last_name;
            }
            var first_name = $('input[name=first_name]').val();
            if(first_name){
                nameParams.first_name = first_name;
            }
            var middle_name = $('input[name=middle_name]').val();
            if(middle_name){
                nameParams.middle_name = middle_name;
            }
            return nameParams;
        }

        function searchForName(e){
            var data = nameParams();
            console.log("params: ")
            console.log(data)

            isSearching = true;
            $('input[type=submit]').attr('disabled', true)
            $('.cleared-indicator').addClass('hidden')
            $.ajax({
                headers:{'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "{{action("SuspectsController@search")}}",
                data: data,
                success: function(res){
                    isSearching = false;
                    var isFound = res.found;
                    $('input[type=submit]').attr('disabled', isFound)
                    if(isFound){
                        $('.cleared-indicator').removeClass('hidden')
                    }
                }
            });
        }

        $('input[name=last_name]').on('keyup', searchForName);

        $('input[name=first_name]').on('keyup', searchForName);

        $('input[name=middle_name]').on('keyup', searchForName);
    </script>
@endsection