@extends('layouts.app')

@section('content')
<div class="table-wrapper" id="crimes-index">
    <div class="btn-group">
        <a href="{{route('crimecommitted.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> New Case</a>
        <a href="#" class="btn btn-default hidden" disabled>Summary</a>
        <button type="button" class="btn btn-danger delete-button" disabled><span class="glyphicon glyphicon-remove"></span> Remove Case(s)</button>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Case Records</div>

        <div class="panel-body">
            {{Form::open(['action' => 'CrimeCommittedController@deleteBulk',
                            'id' => 'remove-form'])}}
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Case</th>
                        <th>Location</th>
                        <th>Suspect(s)</th>
                        <th>Date Occured</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($crimes) > 0)
                        @foreach($crimes as $crime)
                            <tr>
                                <td><input type="checkbox" class="record-checked" name="crimes[]" value="{{$crime->id}}" />
                                <td><a href="{{route('crimecommitted.edit', $crime->id)}}">{!! $crime->crimeType->crime_type !!}</a></td>
                                <td>{{$crime->location->location_name}}</td>
                                <td>{!!$crime->suspectsList()!!}</td>
                                <td>{{optional($crime->date_occured)->format('F d, Y')}}</td>
                            </tr>
                        @endforeach
                    @else
                        <td class="no-record" colspan="5">No case records</td>
                    @endif
                </tbody>
            </table>
            {{Form::hidden('_method', 'delete')}}
            {{Form::close()}}
            {{$crimes->links()}}
        </div>
    </div>
</div>
@endsection
