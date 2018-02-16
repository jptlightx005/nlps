<template>
	<div class="map-container">
		<div class="new-lucena-map">
			<img src="/res/photos/shares/new-lucena-map.png" id="lucena-map" usemap="#lucenamap"/>
			<map name="lucenamap">
			  	<area shape="rect" coords="0,0,82,126" href="sun.htm" alt="Sun">
			  	<area shape="circle" coords="90,58,3" href="mercur.htm" alt="Mercury">
			  	<area shape="circle" coords="124,58,8" href="venus.htm" alt="Venus">
			</map>
			<div class="map-pins">
				<pin-component v-for="(pin, index) in pins"
								v-bind:key="pin.id"
								v-bind:map="map"
								v-bind:index="index"
								v-bind:lat="pin.x"
								v-bind:lng="pin.y"
								ref="pins"

								v-on:mouseover="didHoverPin"></pin-component>
			</div>
		</div>
	</div>
</template>

<script>
import PinComponent from "./PinComponent"

export default {
	name: 'google-map',
	props: ['name'],
	components: {
		'pin-component': PinComponent
	},
	data () {
		return {
			mapName: this.name + "-map",
			pins: [],
			pin_height: 54,
			pin_width: 35,
			locations: [],
			map: null,
			infowindow: null,
			selected: {crimes: [],
						suspects: [], 
						location_name: ""},
		}
	},
	mounted() {
		this.map = document.getElementsByClassName('new-lucena-map')[0];
		this.map.querySelector("img").draggable = false;
	},
	created(){
		
	},
	methods: {
		addEventListener(action, method){
			this.map.addEventListener(action, method);
		},
		addPin(lat, lng){
			this.pins.push({x: lat, y: lng});
			return {x: lat, y: lng};
		},
		didHoverPin(e){
			console.log('Pin hovered');
			console.log(e);
		},
		removePin(pin){
			this.pins = this.pins.filter(function(obj){
				return obj.x !== pin.x && obj.y == obj.y;
			});
		},
		clearPin(){
			this.pins = [];
		}
	}
};
</script>

<style scoped>
	.map-container{
		overflow:scroll;
	}
	img#lucena-map{
		height: 100%;
	}

	div.new-lucena-map{
		position: relative;
		top: 0;
		left: 0;
		width:1070px;
		height:693px;
	}
	img#lucena-map{
		object-fit: cover;
	}
	div.map-pins{
		position: absolute;
		top: 0;
		left: 0;
	}
</style>