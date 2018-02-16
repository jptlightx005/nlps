<template>
	<img src="/res/photos/shares/map-pin.png" 
					class="map-pin"
					:style="'top:' + (lng - pin_height) + 'px;left:' + (lat - (pin_width / 2)) + 'px;'"/>
</template>

<script>
export default {
	name: 'map-pin',
	props: ['lat',
			'lng',
			'map'],
	data () {
		return {
			pin_height: 54,
			pin_width: 35,
		}
	},
	mounted() {
		
	},
	created(){
		
	},
	methods: {
		addEventListener(action, method){
			this.pin.addEventListener(action, method);
		},
		setMap(map){
			map.addPin(this.lat, this.lng);
			this.map = map;
		},
	}
};
</script>

<style scoped>
	img.map-pin{
		object-fit: cover;
	    position: absolute;
	    width:35px;
	    cursor: pointer;
	    -webkit-filter: drop-shadow(0px 0px 2px #000);
	    filter: drop-shadow(0px 0px 2px #000);
	}
</style>