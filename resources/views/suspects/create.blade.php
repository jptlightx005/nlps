@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{route('suspects.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Suspect</div>

                <div class="panel-body">
                    {!! Form::open(['action' => 'SuspectsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('first_name', 'First Name')}}
                            {{Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('middle_name', 'Middle Name')}}
                            {{Form::text('middle_name', '', ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('last_name', 'Last Name')}}
                            {{Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('alias', 'Alias')}}
                            {{Form::text('alias', '', ['class' => 'form-control', 'placeholder' => 'Alias'])}}
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

                        <div class="form-group">
                            {{Form::label('crime_type', 'Crime Type')}}
                            {{Form::select('crime_type', \App\CrimeType::pluck('crime_type', 'crime_type')->all(), null, ['class' => 'form-control', 'placeholder' => 'Crime Type', 'required'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('location', 'Location')}}
                            {{Form::select('location', \App\Location::pluck('location_name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Location', 'required'])}}
                        </div>


                        <div class="form-group">
                            {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-specific-scripts')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        var config = {prefix: '/res'}
        $('#lfm').filemanager('image', config);
    </script>
@endsection