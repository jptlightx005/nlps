@extends('layouts.app')

@section('content')
<div class="table-wrapper" id="crimes-index">
    <div class="btn-group">
        <a href="{{route('crimetype.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> New Crime Type</a>
        <button type="button" class="btn btn-danger delete-button" disabled><span class="glyphicon glyphicon-remove"></span> Remove Crime Type(s)</button>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Crime Types</div>

        <div class="panel-body">
            {{Form::open(['action' => 'CrimeTypesController@deleteBulk',
                            'id' => 'remove-form'])}}
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Crime Type</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($crimes) > 0)
                        @foreach($crimes as $crime)
                            <tr>
                                <td><input type="checkbox" class="record-checked" name="crimes[]" value="{{$crime->id}}" />
                                <td><a href="{{route('crimetype.edit', $crime->id)}}">{!! $crime->crime_type !!}</a></td>
                                <td>{{$crime->description}}</td>
                            </tr>
                        @endforeach
                    @else
                        <td class="no-record" colspan="4">No crime records</td>
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
