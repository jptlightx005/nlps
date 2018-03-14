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
        <input type="text" class="form-control" name="search_text" value="{{old('search')}}" required>
        <span class="input-group-addon">
            <button type="submit">
                <span class="glyphicon glyphicon-search"></span>
            </button>  
        </span>
    </form>
    <dashboard-map-component></dashboard-map-component>
	
</div>
@endsection

@section('page-specific-styles')
<style>
/* #imaginary_container{
    margin-top:10%; /* Don't copy this */
} */
.stylish-input-group .input-group-addon{
    background: white !important; 
}
.stylish-input-group .form-control{
	border-right:0; 
	box-shadow:0 0 0; 
	border-color:#ccc;
}
.stylish-input-group button{
    border:0;
    background:transparent;
}
</style>
@endsection
@section('page-specific-scripts')
<script type="text/javascript">
	
</script>
@endsection