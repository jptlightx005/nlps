<template>
	<div class="map-wrapper"
  		@mouseover="didHoverMapArea"
  		@mouseleave="didLeaveMapArea">
  		<map-component>
		</map-component>
		<div id="dim-overlay">
			<div id="message-overlay">
				<h2 id="message-text">
					Select location on the map
				</h2>
			</div>
		</div>
		
		<div class="custom-controls">
  			<button class="btn btn-primary" 
  					id="registerlocation" 
  					@click="didClickRegister">
			    <span class="glyphicon glyphicon-plus-sign"></span> Add Location
			</button>
			<button class="btn btn-default" 
  					id="cancelRegistration" 
  					@click="didClickCancel">
			    Cancel Registration
			</button>
  		</div>

  		<div id="message-container">
  			<div class="alert alert-info fade out" id="addedalert">
			  	<a href="#" class="close" @click="toggleAlert">&times;</a>
			  	<strong>Info!</strong> Successfully added location!
			</div>

  		</div>
  		<div id="form-container">
  			<div class="infowindow-form">
  				<div class="form-group has-feedback">
	  				<input type="text" name="location_name" class="form-control" placeholder="Location Name" />
	  				<span class="glyphicon glyphicon-remove form-control-feedback hidden"></span>
	  			</div>
	  			<div class="form-group">
	  				<label>Latitude: <span class="lat"></span></label>
	  				<br>
	  				<label>Longitude: <span class="lng"></span></label>
	  			</div>
	  			<div class="form-group error-messages">
	  				<!-- error messages !-->
	  			</div>
	  			<div class="form-group">
	  				<button class="btn btn-default cancel-button">Cancel</button>
	  				<input type="submit" class="btn btn-primary pull-right submit-button">
	  			</div>
  			</div>
  			<form class="new-location-form" id="new-location-form" action="" method="POST" @submit.prevent="onSubmit">
	  			<div class="form-group">
	  				<input type="hidden" name="location_name" placeholder="Location Name" />
	  			</div>
	  			<div class="form-group">
	  				<input type="hidden" class="latitude" name="latitude" />
	  				<input type="hidden" class="longitude" name="longitude" />
	  			</div>
	  			<div class="form-group">
	  				<input type="submit" class="btn btn-primary pull-right hidden">
	  			</div>
	  		</form>
  		</div>
  	</div>
</template>

<script>
import MapComponent from './MapComponent';
import PinComponent from './PinComponent';
export default {
	name: 'dashboard-map',
	components:{
		'map-component': MapComponent
	},
	data () {
		return {
			dimOverlay: null,
			map: null,
			newPin: null,
			willRegisterLocation: false,
		}
	},
	mounted() {
		this.map = this.$children[0];

		this.dimOverlay = $("#dim-overlay");
		this.registerMessageOverlay = $("#message-overlay");
		this.origForm = $('.infowindow-form').clone();
		$('.infowindow-form').remove();
		
	},
	
	created(){
		
	},
	methods: {
		didClickCancel(e){

		},
		didClickMapArea(e){
			var x = e.pageX - $('.new-lucena-map').offset().left;
			var y = e.pageY - $('.new-lucena-map').offset().top;
			console.log("x: " + x + ", y: " + y);
			//will add pins on click
			// this.map.pins.push({x: x, y: y})
		},
		didClickRegister(e){
			if(this.willRegisterLocation)
                return;

            this.newMarker = null;
            this.willRegisterLocation = true;

            var $this = this;

            this.map.addEventListener('click', function(e) {
            	var x = e.pageX - $('.new-lucena-map').offset().left;
				var y = e.pageY - $('.new-lucena-map').offset().top;

			   	$this.setNewPin(x, y);
			});

	      	this.dimOverlay.fadeIn();

	      	$('#registerlocation').hide();
	      	$('#cancelRegistration').show();
		},
		didHoverMapArea(){
			if(!this.willRegisterLocation)
                return;
	    	this.dimOverlay.animate({opacity: 0.5}, 250)
            this.registerMessageOverlay.fadeOut();
		},
		didLeaveMapArea(){
			if(!this.willRegisterLocation)
                return;
            this.registerMessageOverlay.fadeIn();
	    	this.dimOverlay.animate({opacity: 1}, 250)
		},
		setNewPin(x, y){
			if(this.newPin){
				this.map.removePin(this.newPin);
				// this.map.clearPin();
			}else{
				// this.locationForm = this.origForm.clone();
				// this.locationForm.find(".cancel-button").remove();
				// this.locationForm.attr({id: "infowindow-form"});

				// this.infowindow = new google.maps.InfoWindow({
		  //         	content: this.locationForm.prop('outerHTML')
		  //       });				
			}

			this.newPin = this.map.addPin(x, y)
		},
		toggleAlert(){

		}

	}
};
</script>

<style scoped>
.map-wrapper{
	overflow: scroll;
}
.google-map {
  width: 100%;
  height: 100%;
  margin: 0 auto;
  background: gray;
  position: relative;
}

.custom-controls{
	width: 100%;
	height: 100%;
	position: absolute;
	left: 0;
    top: 0;
    z-index: 1000;
    background: rgba(0,0,0,0);
    pointer-events: none;
}
#dim-overlay{
	display: none;
	position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    z-index: 2;
    background: rgba(0,0,0,0.3);
    pointer-events: none;
}
#message-overlay{
	width: 100%;
	height: 100%;
	position: absolute;
	left: 0;
    top: 0;
    z-index: 1000001;
    background: rgba(0,0,0,0);
    pointer-events: none;
}
#message-text{
	position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
}
#registerlocation{
	position: absolute;
	top: 15px;
    left: 15px;
    pointer-events: all;
}
#cancelRegistration{
	display:none;
	position: absolute;
	top: 15px;
    left: 15px;
    pointer-events: all;
}
.error-message{
	color: #A00;
	font-weight: bold;
	display: block;
}
</style>