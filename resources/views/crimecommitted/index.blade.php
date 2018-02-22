@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{route('crimecommitted.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> New Crime</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crime Records</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Crime Committed</th>
                                <th>Location</th>
                                <th>Suspect(s)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count(array()) > 0)
                                {{-- @foreach($suspects as $suspect)
                                    <tr>
                                        <td>{!! $suspect->fullNameEditLink() !!}</td>
                                        <td>{{$suspect->alias}}</td>
                                        <td>{{$suspect->qualifier}}</td>
                                        <td>{{$suspect->crimes()->first()->location()->first()->location_name}}</td>
                                    </tr>
                                @endforeach --}}
                            @else
                                <td colspan="3">No crime records</td>
                            @endif
                        </tbody>
                    </table>
                    {{-- {{$suspects->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
