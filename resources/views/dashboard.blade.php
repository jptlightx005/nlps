@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row map-row">
        <div class="col-md-12">
            <div class="map-container">
                {!! Mapper::render() !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css" rel="stylesheet">
    .map-container{
        width: 75%; 
        height: 750px;
        min-width: 1000px;
        
        
        margin:0 auto;
        border:5px #FFF solid;
        box-shadow: 0px 0px 5px #000;
    }

    .row.map-row{
        margin-bottom: 25px;
    }
</style>
@endsection
