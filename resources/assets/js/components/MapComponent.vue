<template>
	<div class="google-map map-container">
		<div class="google-map" :id="mapName"></div>
		<!-- Modal -->
		<div id="locationModal" class="modal fade" role="dialog">
		  	<div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			        <div class="modal-header">
			            <button type="button" class="close" data-dismiss="modal">&times;</button>
			            <h4 class="modal-title">Details</h4>
			        </div>
			        <div class="modal-body">
			            <div class="form-group">
			                <label>Brgy. Name:</label>
			                <span id="loc_name" v-text="selected.location_name"></span>
			            </div>
			            <div class="form-group">
			            	<div class="row">
			            		<div class="col-md-6 crimes-section pre-scrollable">
				            		<label>Crimes committed</label>
					                <ol id="crimes-list">
					                	<li v-for="crime in selected.crimes">{{crime.crime_type}}</li>
					                </ol>
					                <a href="" class="see-more" v-if="selected.crimes.length > 5">See More</a>
				            	</div>
				            	<div class="col-md-6 suspects-section pre-scrollable">
				            		<label>Suspects</label>
					                <ol id="suspects-list">
					                	<li v-for="suspect in selected.suspects">{{suspect.full_name}}</li>
					                </ol>
					                <a href="" class="see-more hidden">See More</a>
				            	</div>
			            	</div>
			            </div>
			        </div>
			        <div class="modal-footer">
			            <a href="link/to/details" id="more_details" class="btn btn-primary">Details</a>
			            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			    </div>

		  	</div>
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
			selected: {crimes: [],
						suspects: [], 
						location_name: ""},
		}
	},
	mounted() {
		const element = document.getElementById(this.mapName)
		const options = {
			zoom: 14,
			center: new google.maps.LatLng(10.872001027667604, 122.57285513977047)
		}
		this.map = new google.maps.Map(element, options);
	},
	created(){
		var $this = this;
		axios.get('/locations/dashboard').then(response => {
			$this.locations = response.data;

			response.data.map(function(value, key) {
				var position = {
					lat: parseFloat(value.lat),
					lng: parseFloat(value.long)
				};

				var label = {
					color: 'black',
					fontFamily: 'Material Icons',
					text: value.crimes.length.toString(),
				}

				var marker = new google.maps.Marker({
					id: value.id,
				    position: position,
				    map: $this.map,
				    title: value.location_name,
				    label: label,
			  	});
				marker.addListener('click', function(){
					$this.selectMarker(marker, value.id, value);
				});
			  	$this.markers.push(marker);
			});
		});
		this.modal = {is_open: false};
	},
	methods: {
		selectMarker(marker, id, info){
        	var location_name_group = $('<div>').attr({
						                class: "info-group"
						            })
						            .append(
						            	$('<label>')
						                .addClass('info-label')
						                .text('Location: ')
						            ).append(
						            	$('<span>')
						                .text(info.location_name)
						            )

        	//Number of Crimes:
        	var crimes_group = $('<div>').attr({
					                class: "info-group"
					            })
					            .append(
					            	$('<label>')
					                .addClass('info-label')
					                .text('Crimes: ')
					            ).append(
					            	$('<span>')
					                .text(info.crimes.length)
					            )

			var details_link = $('<a>')
					                .attr({href: "#",
					                        class: "view-details",
					                        id: info.id})
					                .text('View Details');

        	//View Details
        	var details_button = $('<div>').attr({
					                class: "info-group"
					            })
					            .append(
					            	details_link
					            )

        
        	//infowindow elements container
        	var location_info = $('<div>').attr({
					            	class: "location-info"
					        	})
						        .append(location_name_group)
						        .append(crimes_group)
						        .append(details_button);        

	        if(this.infowindow)
        		this.infowindow.close();

	        this.infowindow = new google.maps.InfoWindow({
	          	content: location_info.prop('outerHTML')
	        });        	
        	
        	this.infowindow.open(this.map, marker);

        	$('<span>').text(info.location_name).after(location_info);

        	var $this = this;

        	google.maps.event.addListener(this.infowindow, 'domready', function() {
		      	$('a#' + info.id).on('click', function(e){
		            $this.didClickDetails(e, info);
		       	});
			});
		},

		didClickDetails(e, data){
			this.selected = data;

            $('#more_details').attr("href", "location/" + data.id)
            $('#locationModal').modal();                
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
}
#locationModal li.no-result{
	list-style: none;
}
.pre-scrollable{
	height: 250px;
}
</style>