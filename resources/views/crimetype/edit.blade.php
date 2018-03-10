@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="btn-group">
        <a href="{{route('crimetype.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    </div>
    {!! Form::model($crime_type, array('route' => array('crimetype.update', $crime_type->id))) !!}
    <div class="panel panel-default">
        <div class="panel-heading">Edit Crime Type</div>

        <div class="panel-body">
            <div class="form-group">
                {{Form::label('crime_type', 'Crime Type')}}
                {{Form::text('crime_type', null, ['class' => 'form-control', 'placeholder' => 'Crime Type', 'required'])}}
            </div>

            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'required'])}}
            </div>

            <div class="form-group submit-group">
                {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
            </div>
        </div>
    </div>
    {{Form::hidden('_method','PUT')}}
    {!! Form::close() !!}
</div>
@endsection