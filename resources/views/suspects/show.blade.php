@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="buttons-row" style="margin-bottom: 10px">
                <a href="{{route('suspects.index')}}" class="btn btn-primary">
                <span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
                <a href="{{route('suspects.edit', $suspect->id)}}" class="btn btn-default">
                <span class="glyphicon glyphicon-pencil"></span> Edit</a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Suspect</div>

                <div class="panel-body">
                    <div class="profile-row">
                        <img class="center-image" onerror="imgError(this)" src="{{$suspect->front}}">
                    </div>
                    <div class="profile-row center">
                        <h2 class="profile-row"><b>Name: </b>{{$suspect->full_name}}</h2>
                        <h2 class="profile-row"><b>Alias: </b>{{$suspect->alias}}</h2>
                        <h2 class="profile-row"><b>Age: </b>{{$suspect->age}}</h2>
                    </div>
                    <div class="profile-row center">
                        <img class="inline-flex" onerror="imgError(this)" src="{{$suspect->whole_body}}">
                        <img class="inline-flex" onerror="imgError(this)" src="{{$suspect->front}}">
                        <img class="inline-flex" onerror="imgError(this)" src="{{$suspect->left_face}}">
                        <img class="inline-flex" onerror="imgError(this)" src="{{$suspect->right_face}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Suspect Profile</div>

                <div class="panel-body">
                    <div class="profile-row">
                        <h2 class="profile-row"><b>Civil Status: </b>{{$suspect->civil_status}}</h2>
                        <h2 class="profile-row"><b>Occupation: </b>{{$suspect->occupation}}</h2>
                        <h2 class="profile-row"><b>Address: </b>{{$suspect->address}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Crimes Committed</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Crime</th>
                                <th>Date &amp; Time</th>
                                <th>Location</th>
                                <th>Description</th>
                                <th>Weapons Used</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($suspect->crimes) > 0)
                            @foreach($suspect->crimes as $crime)
                                <tr>
                                    <td>{{$crime->crime_type}}</td>
                                    <td>{{$crime->date_occured->format('F d, Y - h:i:s')}}</td>
                                    <td>{{$crime->location->location_name}}</td>
                                    <td>{{$crime->description}}</td>
                                    <td>{{$crime->equipmentsList()}}</td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="5" style="text-align:center">No Records found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-specific-styles')
<style type="text/css">
    .profile-row{
        display: block;
    }
    .profile-row.center{
        text-align: center;
    }
    .center-image{
        display: block;
        margin: 0 auto;
    }
</style>
@endsection
@section('page-specific-pre-defined-scripts')
<script>
    function imgError(image){
        image.onerror = "";
        image.src = "/res/photos/shares/empty-avatar.png";
        return true;
    };
 </script>
@endsection
@section('page-specific-scripts')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        var config = {prefix: '/res'}
        $('.lfm').filemanager('image', config);

        // $('.preview-thumbnail').load(function(){
        //     console.log('this.src');
        // })
        // 
    </script>
@endsection