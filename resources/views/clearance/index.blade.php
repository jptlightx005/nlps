@extends('layouts.app')

@section('content')
<div class="table-wrapper" id="blotter-index">
    <div class="btn-group">
    <a href="{{route('policeclearance.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> New Police Clearance</a>
        <button type="button" class="btn btn-danger delete-button" disabled><span class="glyphicon glyphicon-remove"></span> Remove Clearance(s)</button>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Police Clearance</div>

        <div class="panel-body">
            {{Form::open(['action' => 'PoliceClearanceController@deleteBulk',
                            'id' => 'remove-form'])}}
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Requesting Person</th>
                        <th>Date Issued</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($clearances) > 0)
                        @foreach($clearances as $clearance)
                            <tr>
                                <td><input type="checkbox" class="record-checked" name="clearances[]" value="{{$clearance->id}}" />
                                <td>{!! $clearance->fullName() !!}</td>
                                <td>{{optional($clearance->date_issued)->format('F d, Y')}}</td>
                                <td>
                                    <a href="{{route('policeclearance.edit', $clearance->id)}}">
                                        <img src="/res/photos/map-assets/pencil-logo.png" height="25px" alternate="print" title="Print" />
                                    </a>
                                    <a href="{{route('policeclearance.print', $clearance->id)}}" onclick="printPopupWindow($(this).attr('href')); return false;">
                                        <img src="/res/photos/map-assets/printer-icon-1009.png" height="25px" alternate="print" title="Print" />
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td class="no-record" colspan="5">No police clearance</td>
                    @endif
                </tbody>
            </table>
            {{Form::hidden('_method', 'delete')}}
            {{Form::close()}}
            {{$clearances->links()}}
        </div>
    </div>
</div>
@endsection

@section('page-specific-pre-defined-scripts')
<script src="js/generic.js" type="text/javascript"></script>
@endsection
