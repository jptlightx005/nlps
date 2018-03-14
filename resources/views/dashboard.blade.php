@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="dashboard-wrapper">
	{{-- {{Form::open()}}
	<div class="form-group">
		<input type="text" class="form-control" name="search" value="{{old('search')}}" />
		<div class="input-group-btn">
	    	<button type="button" class="btn btn-default">Search</button>
	  	</div>
	</div>
	{{Form::close()}} --}}
	<form class="input-group stylish-input-group">
        <input type="text" class="form-control" name="search" value="{{Request::get('search')}}" required>
        <span class="input-group-addon">
            <button type="submit">
                <span class="glyphicon glyphicon-search"></span>
            </button>  
        </span>
    </form>
    <dashboard-map-component></dashboard-map-component>
	
</div>
@endsection

@section('page-specific-scripts')
<script type="text/javascript">
	
</script>
@endsection