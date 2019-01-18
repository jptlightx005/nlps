@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="btn-group">
        <a href="{{route('crimetype.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    </div>
    {!! Form::open(['action' => 'CrimeTypesController@store', 'method' => 'POST']) !!}
    <div class="panel panel-default">
        <div class="panel-heading">Add Crime</div>

        <div class="panel-body">
            <div class="form-group">
                {{Form::label('crime_type', 'Crime Name')}}
                {{Form::text('crime_type', null, ['class' => 'form-control', 'placeholder' => 'Crime Name', 'required'])}}
            </div>

            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'required'])}}
            </div>
            
            <div class="form-group">
                {{Form::label('classification', 'Classification')}}
                {{Form::select('classification', config('nlps.crime_classifications', array()), null, ['class' => 'form-control', 'placeholder' => 'Classification', 'required'])}}
            </div>

            <div class="form-group submit-group">
                {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection