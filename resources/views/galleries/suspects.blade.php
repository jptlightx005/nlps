@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="cards-container" id="dashboard-wrapper">
    @foreach($suspects as $suspect)
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
@endsection

@section('page-specific-styles')
<style>
	.card {
	    height: 300px;
	    width: 250px;
	    display: inline-block;
	    /*border-radius: 20px;*/
	    border: 1px #AAA solid;
	}
	.card-image {
	    height: 150px;
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