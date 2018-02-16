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
            <dashboard-map-component></dashboard-map-component>
        </div>
    </div>
</div>
@endsection

@section('page-specific-scripts')
<script type="text/javascript">
	
</script>
@endsection