@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="report-wrapper">
    <div class="btn-group">
        <a href="{{route('statistics.print')}}" class="btn btn-primary" onclick="printPopupWindow($(this).attr('href')); return false;"><span class="glyphicon glyphicon-print"></span> Print</a>
    </div>
	<table class="stat">
        <tr>
            <th>NATURE OF THE CRIME</th>
            <th>Total Cases</th>
            <th>Total Crimes Cleared</th>
            <th>Total Crimes Solved</th>
            <th>Total Crimes On Trial</th>
            {{-- <th>Late Reported</th>
            <th>Total Crimes Cleared</th>
            <th>Total Crimes Solved</th>
            <th>TOTAL (date committed + late report)</th> --}}
        </tr>
        @foreach(\App\CrimeType::all() as $crime)
        <tr>
            <td>{{$crime->crime_type}}</td>
            <td>{{count($crime->cases)}}</td>
            <td>{{count($crime->cleared())}}</td>
            <td>{{count($crime->solved())}}</td>
            <td>{{count($crime->ontrial())}}</td>
         {{--    <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td> --}}
        </tr>
        @endforeach
    </table>
	
</div>
@endsection

@section('page-specific-styles')
<style>
    table.stat, table.stat th, table.stat td {
        border: solid #000 1px;
    }
    table.stat th, table.stat td{
        padding-left: 5px;
        padding-right: 5px;
    }
</style>
@endsection
@section('page-specific-scripts')
<script src="js/generic.js" type="text/javascript"></script>
@endsection