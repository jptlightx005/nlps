@extends('layouts.app')

@section('content')
<div class="container">
    <div class="info-box">
        <div class="form-group">
            <label>Location Name:</label>
            <span id="loc_name">{{$location->location_name}}</span>
        </div>
        <div class="form-group">
            <label>Crime Frequency:</label>
            <span id="freq">{{$location->freq()}}</span>
        </div>
        <div class="form-group">
            <label>Top Crimes committed</label>
            <ol id="top_crimes">
                @foreach($location->crimes as $crime)
                    <li>{{$crime->crime_type}}</li>
                @endforeach
            </ol>
        </div>
        <div class="form-group">
            <label>Remarks: </label>
            <span id="remarks">Too Safe</span>
        </div>
    </div>
</div>
@endsection