@extends('layouts.app')

@section('content')
<div class="table-wrapper" id="crimes-index">
    <div class="btn-group">
        <a href="{{route('suspects.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Add Suspect</a>
        <button type="button" class="btn btn-danger delete-button" disabled><span class="glyphicon glyphicon-remove"></span> Remove Suspect(s)</button>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Suspects Records</div>

        <div class="panel-body">
            {{Form::open(['action' => 'SuspectsController@deleteBulk',
                            'id' => 'remove-form'])}}
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Alias</th>
                        <th>Crimes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suspects as $suspect)
                        <tr>
                            <td><input type="checkbox" class="record-checked" name="suspects[]" value="{{$suspect->id}}" />
                            <td>{!! $suspect->fullNameEditLink() !!}</td>
                            <td>{{$suspect->alias}}</td>
                            <td>{{$suspect->crimesCommittedList()}}</td>
                        </tr>
                    @endforeach
                    @if(!count($suspects))
                        <tr>
                            <td class="no-record" colspan="4">No records</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{Form::hidden('_method', 'delete')}}
            {{Form::close()}}
            {{$suspects->links()}}
        </div>
    </div>
</div>
@endsection