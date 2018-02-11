@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{route('suspects.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Add Suspect</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Suspects Records</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Alias</th>
                                <th>Qualifier</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suspects as $suspect)
                                <tr>
                                    <td>{!! $suspect->fullNameEditLink() !!}</td>
                                    <td>{{$suspect->alias}}</td>
                                    <td>{{$suspect->qualifier}}</td>
                                    <td>{{$suspect->crimes()->first()->location()->first()->location_name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$suspects->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
