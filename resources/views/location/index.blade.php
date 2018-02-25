@extends('layouts.app')

@section('content')
<div class="wrapper" id="location-index">
    <div class="container">
        <div class="row map-row">
            <div class="col-md-12">
                <locations-map-component></locations-map-component>
            </div>
        </div>
    </div>
</div>
@endsection