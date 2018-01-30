<template>
  <div class="google-map" :id="mapName"></div>
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
		axios.get('/locations').then(response => {
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
	},
	methods: {
		selectMarker(marker, id, info){
			console.log(info);
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
		            $this.didClickDetails(e, info.id);
		       	});
			});
		},

		didClickDetails(e, id){
	        console.log(e);
	        console.log('id is now: ' + id)

	        //ajax will run here
	        //but let's try triggering modal through here first
	        
	        ////yay it worked
	        waitingDialog.show();
	        $.ajax({
	            url: '/locations/' + id,
	            success: function(data){
	                waitingDialog.hide();
	                $("#myModal").modal();

	                $("#loc_name").text(data.locname);
	                $("#freq").text(data.freq);
	                $("#top_crimes").empty();
	                var items = [];
	                $.each(data.top_crimes, function(index, crime){
	                    console.log(crime);
	                    // $("li").text(crime.crime_type).appendTo($("#top_crimes"));
	                    items.push('<li>' + crime.crime_type + '</li>');
	                });
	                $('#top_crimes').append( items.join('') );
	                $("#remarks").text(data.remarks);
	                $('#more_details').attr("href", "location/" + data.id)
	            },
	            error: function(data){
	                console.log('Error Occured: ');
	                console.log(data);
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
}
</style>