@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="btn-group">
        <a href="{{route('suspects.show', $suspect->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
        {{-- {!! Form::open(['action' => ['SuspectsController@setAsConvict', $suspect->id], 'method' => 'POST', 'style' => "display: inline-block;"]) !!}
            {{ csrf_field() }}
            {{Form::hidden('_method','PUT')}}
            {{Form::hidden('convicted', (int)!$suspect->convicted)}}
            <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-tower"></span> {{$suspect->convicted ? "Unset" : "Set"}} As Convicted</button>
        {!! Form::close() !!} --}}
    </div>
    {!! Form::model($suspect, ['action' => ['SuspectsController@update', $suspect->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="panel panel-default">
        <div class="panel-heading">Register Suspect</div>
        <div class="panel-body">
            <div class="form-group">
                {{Form::label('suspect_status', 'Status')}}
                {{Form::select('suspect_status', config('nlps.suspect_status'), null, ['class' => 'form-control', 'placeholder' => 'Status', 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('first_name', 'First Name')}}
                {{Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('middle_name', 'Middle Name')}}
                {{Form::text('middle_name',null, ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('last_name', 'Last Name')}}
                {{Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
            </div>

            <div class="form-group">
                {{Form::label('alias', 'Alias')}}
                {{Form::text('alias', null, ['class' => 'form-control', 'placeholder' => 'Alias'])}}
            </div>

            <div class="form-group">
                {{Form::label('date_of_birth', 'Date of Birth')}}
                {{Form::text('date_of_birth', null, ['class' => 'form-control', 'placeholder' => 'Date of Birth', 'required'])}}
            </div>                    
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Profile</div>

        <div class="panel-body">
            <div class="form-group">
                {{Form::label('civil_status', 'Civil Status')}}
                {{Form::select('civil_status', config('nlps.civil_status'), null, ['class' => 'form-control', 'placeholder' => 'Civil Status'])}}
            </div>
            <div class="form-group">
                {{Form::label('occupation', 'Occupation')}}
                {{Form::text('occupation', null, ['class' => 'form-control', 'placeholder' => 'Occupation', 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('address', 'Address')}}
                {{Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address', 'required'])}}
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Profile</div>

        <div class="panel-body">
            {{Form::label('', 'Mugshot')}}
            <div class="form-group">
                <div class="input-group">
                   <span class="input-group-btn">
                     <a data-input="whole-thumbnail" data-preview="whole-holder" class="btn btn-primary lfm">
                       <i class="fa fa-picture-o"></i> Whole Body
                     </a>
                   </span>
                   <input id="whole-thumbnail" class="form-control preview-thumbnail" type="text" name="whole_body" value="{{$suspect->whole_body}}">
                 </div>
                 <img id="whole-holder" onerror="imgError(this)" src="{{$suspect->whole_body}}" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="form-group">
                <div class="input-group">
                   <span class="input-group-btn">
                     <a data-input="front-thumbnail" data-preview="front-holder" class="btn btn-primary lfm">
                       <i class="fa fa-picture-o"></i> Front Face
                     </a>
                   </span>
                   <input id="front-thumbnail" class="form-control preview-thumbnail" type="text" name="front_face" value="{{$suspect->front}}">
                 </div>
                 <img id="front-holder" onerror="imgError(this)" src="{{$suspect->front}}" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="form-group">
                <div class="input-group">
                   <span class="input-group-btn">
                     <a data-input="left-thumbnail" data-preview="left-holder" class="btn btn-primary lfm">
                       <i class="fa fa-picture-o"></i> Left Face
                     </a>
                   </span>
                   <input id="left-thumbnail" class="form-control preview-thumbnail" type="text" name="left_face" value="{{$suspect->left_face}}">
                 </div>
                 <img id="left-holder" onerror="imgError(this)" src="{{$suspect->left_face}}" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="form-group">
                <div class="input-group">
                   <span class="input-group-btn">
                     <a data-input="right-thumbnail" data-preview="right-holder" class="btn btn-primary lfm">
                       <i class="fa fa-picture-o"></i> Right Face
                     </a>
                   </span>
                   <input id="right-thumbnail" class="form-control preview-thumbnail" type="text" name="right_face" value="{{$suspect->right_face}}">
                 </div>
                 <img id="right-holder" onerror="imgError(this)" src="{{$suspect->right_face}}" style="margin-top:15px;max-height:100px;">
            </div>
            {{Form::hidden('_method','PUT')}}
            <div class="form-group">
                {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection

@section('page-specific-styles')
<style>
    #ui-datepicker-div{
        z-index: 2 !important;
    }
</style>
@endsection
@section('page-specific-pre-defined-scripts')
<script>
    function imgError(image){
        image.onerror = "";
        image.src = "/res/photos/shares/noimage.jpg";
        return true;
    };
 </script>
@endsection
@section('page-specific-scripts')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('input[name=date_of_birth]').datepicker(
                                        {changeMonth: true,
                                        changeYear: true,
                                        yearRange: '1900:n',
                                        maxDate: '0',
                                        dateFormat: 'MM dd, yy',
                                        zIndex: '2'});
        var config = {prefix: '/res'}
        $('.lfm').filemanager('image', config);

        // $('.preview-thumbnail').load(function(){
        //     console.log('this.src');
        // })
        // 
    </script>
@endsection