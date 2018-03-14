@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="gallery-wrapper">
	<form class="input-group stylish-input-group">
	    <input type="text" class="form-control" name="search" value="{{Request::get('search')}}" required>
	    <span class="input-group-addon">
	        <button type="submit">
	            <span class="glyphicon glyphicon-search"></span>
	        </button>  
	    </span>
	</form>
	<div class="cards-container" id="dashboard-wrapper">
	    @foreach($crimes as $crime)
	    	<div class="crime-section">
	    		<h2 class="section-label">{{$crime->crime_type}}</h2>
	    		@foreach($crime->suspects as $suspect)
		    		<div class="card">
				    	<a href="/suspects/{{$suspect->id}}/edit">
					    	<div class="card-image">
					    		<img src="{{\Helper::returnEmptyAvatarIfNull($suspect->front)}}"/>
					    	</div>
					    	<div class="card-content">
					    		<div class="name">{{$suspect->full_name}}</div>
					    		<div class="offense">
					    			<span>Offenses</span>
					    			<ul>
					    				@foreach($suspect->crimes as $crime)
					    					{{$crime->crime_type}}
					    				@endforeach
					    			</ul>
					    		</div>
					    	</div>
				    	</a>
				    </div>
	    		@endforeach
	    	</div>
	    @endforeach
	</div>
	<div class="row">
		{{$crimes->links()}}
	</div>
</div>
@endsection

@section('page-specific-styles')
<style>
	.crime-section{
		border-top: 1px #000 solid;
		border-bottom: 1px #000 solid;
		padding: 20px 0;
	}
	.crime-section h2{
		margin-top: 0;
	}
	.card {
	    height: 300px;
	    width: 250px;
	    display: inline-block;
	    /*border-radius: 20px;*/
	    border: 1px #AAA solid;
	    padding: 10px;
	}
	.card-image {
	    height: 150px;
	    border: 1px #AAA solid;
	}
	.card-image img{
	    object-fit: cover;
	    overflow: hidden;
	    width: 100%;
	    height: 100%;
	}
	.card-content .name{
		font-size: 15pt;
		text-align: center;
	}
</style>
@endsection