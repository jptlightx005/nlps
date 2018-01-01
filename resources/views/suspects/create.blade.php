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
                            <label class="btn btn-primary">
                                <span id="whole-body-label">Whole Body</span> {{Form::file('whole_body', ['class' => 'hidden', 'accept' => 'image/*'])}}
                            </label>
                            <button class="btn btn-default hidden">View</button>
                        </div>
                        <div class="form-group">
                            <label class="btn btn-primary">
                                <span id="front-body-label">Front Face</span> {{Form::file('front_body', ['class' => 'hidden', 'accept' => 'image/*'])}}
                            </label>
                            <button class="btn btn-default hidden">View</button>
                        </div>
                        <div class="form-group">
                            <label class="btn btn-primary">
                                <span id="left-face-label">Left Face</span> {{Form::file('left_face', ['class' => 'hidden', 'accept' => 'image/*'])}}
                            </label>
                            <button class="btn btn-default hidden">View</button>
                        </div>
                        <div class="form-group">
                            <label class="btn btn-primary">
                                <span id="right-face-label">Right Face</span> {{Form::file('right_face', ['class' => 'hidden', 'accept' => 'image/*'])}}
                            </label>
                            <button class="btn btn-default hidden">View</button>
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
