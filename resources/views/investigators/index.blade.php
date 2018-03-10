@extends('layouts.app')

@section('content')
<div class="table-wrapper" id="crimes-index">
    <div class="btn-group">
        <a href="{{route('investigators.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Add Investigator</a>
        <button type="button" class="btn btn-danger delete-button" disabled><span class="glyphicon glyphicon-remove"></span> Remove Investigator(s)</button>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Investigators List</div>

        <div class="panel-body">
            {{Form::open(['action' => 'InvestigatorController@deleteBulk',
                            'id' => 'remove-form'])}}
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Rank</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($investigators as $investigator)
                        <tr>
                            <td><input type="checkbox" class="record-checked" name="investigators[]" value="{{$investigator->id}}" />
                            <td>{!! $investigator->fullNameEditLink() !!}</td>
                            <td>{{$investigator->rank}}</td>
                        </tr>
                    @endforeach
                    @if(!count($investigators))
                        <tr>
                            <td class="no-record" colspan="4">No records</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{Form::hidden('_method', 'delete')}}
            {{Form::close()}}
            {{$investigators->links()}}
        </div>
    </div>
</div>
@endsection