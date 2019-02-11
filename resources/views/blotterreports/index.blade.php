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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($reports) > 0)
                        @foreach($reports as $report)
                            <tr>
                                <td>{!! optional($report->reportingPerson)->fullName() !!}</td>
                                <td>{{optional($report->date_reported)->format('F d, Y')}}</td>
                                <td>
                                    <a href="{{route('blotterreports.edit', $report->id)}}">
                                        <img src="/res/photos/map-assets/pencil-logo.png" height="25px" alternate="print" title="Print" />
                                    </a>
                                    <a href="{{route('blotterreports.print', $report->id)}}" onclick="printPopupWindow($(this).attr('href')); return false;">
                                        <img src="/res/photos/map-assets/printer-icon-1009.png" height="25px" alternate="print" title="Print" />
                                    </a>
                                </td>
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

@section('page-specific-pre-defined-scripts')
<script src="js/generic.js" type="text/javascript"></script>
@endsection