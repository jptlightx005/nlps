<template>
	<map-component>
	</map-component>
</template>

<script>
import MapComponent from './MapComponent.vue';
export default {
	name: 'dashboard-map',
	props: ['name'],
	data () {
		return {
			map: null,
		}
	},
	mounted() {
		this.map = this.$children[0];
		// console.log(this.map);
		this.map.addEventListener('click', this.didClickMapArea);
	},
	components:{
		'map-component': MapComponent
	},
	created(){
		var $this = this;
		axios.get('/locations/dashboard').then(response => {
			$this.locations = response.data;
			console.log(response.data);
			response.data.map(function(value, key) {
				var x = value.lat;
				var y = value.long;
				// console.log("x: " + x + ", y: " + y);
				//will add pins on click
				var pin = $this.map.addPin(x, y);
				// var position = {
				// 	lat: parseFloat(value.lat),
				// 	lng: parseFloat(value.long)
				// };

				// var label = {
				// 	color: 'black',
				// 	fontFamily: 'Material Icons',
				// 	text: value.crimes.length.toString(),
				// }

				// var marker = new google.maps.Marker({
				// 	id: value.id,
				//     position: position,
				//     map: $this.map,
				//     title: value.location_name,
				//     label: label,
			 //  	});
				// marker.addListener('click', function(){
				// 	$this.selectMarker(marker, value.id, value);
				// });
			 //  	$this.markers.push(marker);
			});
		});
	},
	methods: {
		didClickMapArea(e){
			var x = e.pageX - $('.new-lucena-map').offset().left;
			var y = e.pageY - $('.new-lucena-map').offset().top;
			console.log("x: " + x + ", y: " + y);
			//will add pins on click
			var pin = this.map.addPin(x, y);
			console.log(pin);
		}
	}
};
</script>

<style scoped>

</style>