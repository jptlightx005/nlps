<template>
  	<div class="google-map map-container"
  		@mouseover="mapHover"
  		@mouseleave="mapLeave">
		<div class="google-map" :id="mapName">
		</div>
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
export default {
	name: 'google-map',
	props: ['name'],
	data () {
		return {
			mapName: this.name + "-map",
			markers: [],
			locations: [],
			map: null,
			infowindow: null,
			dimOverlay: null,
			registerMessageOverlay: null,
			willRegisterLocation: false,
			newMarker: null,
			locationForm: null,
			origForm: null,
		}
	},
	mounted() {
		const element = document.getElementById(this.mapName)
		const options = {
			zoom: 14,
			center: new google.maps.LatLng(10.872001027667604, 122.57285513977047),
			mapTypeControl: false,
			streetViewControl: false,
		}
		this.map = new google.maps.Map(element, options);

		this.dimOverlay = $("#dim-overlay");
		this.registerMessageOverlay = $("#message-overlay");
		this.origForm = $('.infowindow-form').clone();
		$('.infowindow-form').remove();
	},
	created(){
		var $this = this;
		axios.get('/locations').then(response => {
			$this.locations = response.data;

			response.data.map(function(value, key) {
				var position = {
					lat: parseFloat(value.lat),
					lng: parseFloat(value.long)
				};

				var marker = new google.maps.Marker({
					id: value.id,
				    position: position,
				    map: $this.map,
				    title: value.location_name,
			  	});
				marker.addListener('click', function(){
					$this.selectMarker(marker, value.id, value);
				});
			  	$this.markers.push(marker);
			});
		});
	},
	methods: {
		toggleAlert(){
		    $("#addedalert").toggleClass('in out'); 
		    return false; // Keep close.bs.alert event from removing from DOM
		},
		selectMarker(marker, id, info){
			//while on registration, prevent this method from activating
			// if(!this.willRegisterLocation){
   //              return;
   //          }

	        
		},
		setNewMarker(position){
			if(this.newMarker){
				this.newMarker.setMap(null);
			}else{
				this.locationForm = this.origForm.clone();
				this.locationForm.find(".cancel-button").remove();
				this.locationForm.attr({id: "infowindow-form"});

				this.infowindow = new google.maps.InfoWindow({
		          	content: this.locationForm.prop('outerHTML')
		        });				
			}
			
			this.newMarker = new google.maps.Marker({position: position, map: this.map, draggable: true});			
			this.infowindow.open(this.map, this.newMarker);

			var changeValues = function(pos){
				//changes value in info window form for display
            	$("#infowindow-form").find(".lat").text(pos.lat().toString())
            	$("#infowindow-form").find(".lng").text(pos.lng().toString())

	        	//changes value in new location form
            	$(".new-location-form").find(".latitude").val(pos.lat())
            	$(".new-location-form").find(".longitude").val(pos.lng())
			}

	        google.maps.event.addListener(this.infowindow, 'domready', function() {
	        	$("#infowindow-form").find("input[name=location_name]").on("keyup", function(e){
	        		$(".new-location-form").find("input[name=location_name]").val($(this).val());
	        	});
	        	$("#infowindow-form").find(".submit-button").on("click", function(e){
	        		$(".new-location-form").find("input[type=submit]").click();
	        	});
            	changeValues(position);
			});

            this.newMarker.addListener('dragend', function(de){
            	changeValues(de.latLng);
            })

            
		},
		didClickRegister(){
			if(this.willRegisterLocation)
                return;

            this.newMarker = null;
            this.willRegisterLocation = true;

            var $this = this;
            google.maps.event.addListener(this.map, 'click', function(event) {
			   	$this.setNewMarker(event.latLng);
			});

	      	this.dimOverlay.fadeIn();

	      	$('#registerlocation').hide();
	      	$('#cancelRegistration').show();
	    },
	    didClickCancel(){
	    	if(!this.willRegisterLocation)
                return;
            if(this.newMarker)
				this.newMarker.setMap(null);
			this.closeRegistration();
	    },
	    closeRegistration(){
	    	if(!this.willRegisterLocation)
                return;
            this.willRegisterLocation = false;
	    	if(this.infowindow)
				this.infowindow.close();
			this.dimOverlay.fadeOut();
            this.newMarker = null;
            
            google.maps.event.clearListeners(this.map, 'click');

	      	$('#registerlocation').show();
	      	$('#cancelRegistration').hide();
	    },
	    mapHover(){
	    	if(!this.willRegisterLocation)
                return;
	    	this.dimOverlay.animate({opacity: 0.5}, 250)
            this.registerMessageOverlay.fadeOut();
	    },
	    mapLeave(){
	    	if(!this.willRegisterLocation)
                return;
            this.registerMessageOverlay.fadeIn();
	    	this.dimOverlay.animate({opacity: 1}, 250)
	    },
	    onSubmit(e){
	    	if(!this.willRegisterLocation)
                return;
            var formData = $('#new-location-form').serializeObject();
            $('#infowindow-form').find('.error-messages').empty();
            $('#infowindow-form').find('.has-error').removeClass('has-error');
            $('#infowindow-form').find('.form-control-feedback').addClass('hidden');

            var $this = this;
            waitingDialog.show();
            axios.post('/location', formData)
    			.then(function(response){
    				$this.newMarker.setTitle(response.data.data.location_name);
    				$this.newMarker.set("id", response.data.data.id);
    				$this.markers.push($this.newMarker);
    				$this.closeRegistration();
					waitingDialog.hide();
					$this.toggleAlert();
					setTimeout( function(){ 
						//if alert is still open
					    if($("#addedalert").hasClass('in')) 
					    	$this.toggleAlert();
					}, 5000 );
				})
        		.catch(function (error){
        			waitingDialog.hide();
        			let errors = error.response.data.errors;
        			for (var key in errors) {
					    var error = errors[key][0];
					    var input_el = $('#infowindow-form').find('input[name=' + key + ']').closest('.form-group');
					    input_el.addClass('has-error');
					    input_el.find('.form-control-feedback').removeClass('hidden');
					    
					    $('#infowindow-form').find('.error-messages')
					    					.append("<span class='error-message' " + $this.$options._scopeId + ">" + error + "</span>");
					}
        		});
	    }
	}
};
</script>

<style scoped>
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