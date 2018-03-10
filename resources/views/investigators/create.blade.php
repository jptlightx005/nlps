@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="btn-group">
        <a href="{{route('investigators.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    </div>
    {!! Form::open(['action' => 'InvestigatorController@store', 'method' => 'POST']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">Register Investigator</div>

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
                {{Form::label('rank', 'Rank')}}
                {{Form::text('rank', '', ['class' => 'form-control', 'placeholder' => 'Rank', 'required'])}}
            </div>

            <div class="form-group submit-group">
                {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection