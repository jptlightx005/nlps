@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="dashboard wrapper">
    <dashboard-map-component></dashboard-map-component>
</div>
@endsection

@section('page-specific-scripts')
<script type="text/javascript">
	
</script>
@endsection