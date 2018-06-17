@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="btn-group">
        <a href="{{route('equipments.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    </div>
    {!! Form::open(['action' => 'EquipmentController@store', 'method' => 'POST']) !!}
    <div class="panel panel-default">
        <div class="panel-heading">Add Equipment</div>

        <div class="panel-body">
            <div class="form-group">
                {{Form::label('equipment_name', 'Equipment Name')}}
                {{Form::text('equipment_name', null, ['class' => 'form-control', 'placeholder' => 'Equipment Name', 'required'])}}
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
    {!! Form::close() !!}
</div>
@endsection

@section('page-specific-styles')
<style type="text/css">
    textarea{
        resize: vertical;
    }
</style>
@endsection