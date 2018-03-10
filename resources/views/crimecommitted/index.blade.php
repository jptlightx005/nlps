@extends('layouts.app')

@section('content')
<div class="table-wrapper" id="crimes-index">
    <div class="btn-group">
        <a href="{{route('crimecommitted.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> New Crime</a>
        <a href="#" class="btn btn-default" disabled>Summary</a>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Crime Records</div>

        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Crime Committed</th>
                        <th>Location</th>
                        <th>Suspect(s)</th>
                        <th>Date Occured</th>
                        <th>Weapon(s) Used</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($crimes) > 0)
                        @foreach($crimes as $crime)
                            <tr>
                                <td>{!! $crime->crime_type !!}</td>
                                <td>{{$crime->location->location_name}}</td>
                                <td>{{$crime->suspectsList()}}</td>
                                <td>{{$crime->date_occured->format('F d, Y')}}</td>
                                <td>{{$crime->equipmentsList()}}</td>
                            </tr>
                        @endforeach
                    @else
                        <td class="no-record" colspan="5">No crime records</td>
                    @endif
                </tbody>
            </table>
            {{-- {{$suspects->links()}} --}}
        </div>
    </div>
</div>
@endsection
