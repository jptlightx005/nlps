@extends('layouts.app')

@section('content')
<div class="table-wrapper" id="blotter-index">
    <div class="btn-group">
    <a href="{{route('blotterreports.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> New Blotter Report</a>
        <button type="button" class="btn btn-danger delete-button" disabled><span class="glyphicon glyphicon-remove"></span> Remove Report(s)</button>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Blotter Reports</div>

        <div class="panel-body">
            {{Form::open(['action' => 'CrimeCommittedController@deleteBulk',
                            'id' => 'remove-form'])}}
            <table class="table">
                <thead>
                    <tr>
                        <th>Complainant</th>
                        <th>Date/Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($reports) > 0)
                        @foreach($reports as $report)
                            <tr>
                                <td><a href="{{route('blotterreports.edit', $report->id)}}">{!! $report->reportingPerson->fullName() !!}</a></td>
                                <td>{{optional($report->date_reported)->format('F d, Y')}}</td>
                                <td>{!!$report->status !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <td class="no-record" colspan="5">No blotter reports</td>
                    @endif
                </tbody>
            </table>
            {{Form::hidden('_method', 'delete')}}
            {{Form::close()}}
            {{$reports->links()}}
        </div>
    </div>
</div>
@endsection
