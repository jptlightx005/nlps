@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="wrapper" id="dashboard-wrapper">
    <div class="row map-row">
        <div class="col-md-12">
            <map-component></map-component>
        </div>
    </div>
</div>
@endsection
