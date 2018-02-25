@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{route('crimetype.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> New Crime Type</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crime Types</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Crime Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($crimes) > 0)
                                @foreach($crimes as $crime)
                                    <tr>
                                        <td><a href="{{route('crimetype.edit', $crime->id)}}">{!! $crime->crime_type !!}</a></td>
                                        <td>{{$crime->description}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="3">No crime records</td>
                            @endif
                        </tbody>
                    </table>
                    {{-- {{$suspects->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
