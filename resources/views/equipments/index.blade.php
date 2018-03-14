@extends('layouts.app')

@section('content')
<div class="table-wrapper" id="crimes-index">
    <div class="btn-group">
        <a href="{{route('equipments.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> New Equipment</a>
        <button type="button" class="btn btn-danger delete-button" disabled><span class="glyphicon glyphicon-remove"></span> Remove Equipment(s)</button>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Equipments</div>

        <div class="panel-body">
            {{Form::open(['action' => 'EquipmentController@deleteBulk',
                            'id' => 'remove-form'])}}
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Equipment</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($equipments) > 0)
                        @foreach($equipments as $equipment)
                            <tr>
                                <td><input type="checkbox" class="record-checked" name="equipments[]" value="{{$equipment->id}}" />
                                <td><a href="{{route('equipments.edit', $equipment->id)}}">{!! $equipment->equipment_name !!}</a></td>
                                <td>{{$equipment->description}}</td>
                            </tr>
                        @endforeach
                    @else
                        <td class="no-record" colspan="4">No equipment records</td>
                    @endif
                </tbody>
            </table>
            {{Form::hidden('_method', 'delete')}}
            {{Form::close()}}
            {{$equipments->links()}}
        </div>
    </div>
</div>
@endsection
