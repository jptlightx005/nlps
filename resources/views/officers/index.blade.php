@extends('layouts.app')

@section('content')
<div class="table-wrapper" id="crimes-index">
    <div class="btn-group">
        <a href="{{route('officers.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Add Officer</a>
        <button type="button" class="btn btn-danger delete-button" disabled><span class="glyphicon glyphicon-remove"></span> Remove Officer(s)</button>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Officers List</div>

        <div class="panel-body">
            {{Form::open(['action' => 'OfficerController@deleteBulk',
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
                    @foreach($officers as $officer)
                        <tr>
                            <td><input type="checkbox" class="record-checked" name="suspects[]" value="{{$officer->id}}" />
                            <td>{!! $officer->fullNameEditLink() !!}</td>
                            <td>{{$officer->rank}}</td>
                        </tr>
                    @endforeach
                    @if(!count($officers))
                        <tr>
                            <td class="no-record" colspan="4">No records</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{Form::hidden('_method', 'delete')}}
            {{Form::close()}}
            {{$officers->links()}}
        </div>
    </div>
</div>
@endsection