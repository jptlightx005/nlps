<template>
	<div class="map-container">
		<div class="new-lucena-map">
			<img src="/res/photos/map-assets/new-lucena-map.jpg" id="lucena-map" usemap="#image-map"/>
			<div class="map-brgys">
				<div class="map-brgy"
					style="top:162px; left:731px;">
					<img src="/res/photos/map-assets/brgy/dawis.png"/>
					<label style="top: 34%; left: 38%;">
						    Dawis
					</label>
				</div>
				<div class="map-brgy"
					style="top:319px; left:496px;">
					<img src="/res/photos/map-assets/brgy/poblacion.png"/>
					<label style="top: 29%; left: 50%;">
						    Poblacion
					</label>
				</div>
				<div class="map-brgy"
					style="top:376px; left:493px;">
					<img src="/res/photos/map-assets/brgy/baclayan.png"/>
					<label style="top: 39%; left: 40%;">
						    Baclayan
					</label>
				</div>
				<div class="map-brgy"
					style="top:75px; left:580px;">
					<img src="/res/photos/map-assets/brgy/badiang.png"/>
					<label style="top: 34%; left: 42%;">
						    Badiang
					</label>
				</div>
				<div class="map-brgy"
					style="top:149px; left:429px;">
					<img src="/res/photos/map-assets/brgy/bololacao.png"/>
					<label style="top: 52%; left: 50%;">
						    Bololacao
					</label>
				</div>
				<div class="map-brgy"
					style="top:496px; left:263px;">
					<img src="/res/photos/map-assets/brgy/cabilauan.png"/>
					<label style="top: 34%; left: 37%;">
						    Cabilauan
					</label>
				</div>
				<div class="map-brgy"
					style="top:448px; left:160px;">
					<img src="/res/photos/map-assets/brgy/burot.png"/>
					<label style="top: 29%; left: 50%;">
						    Burot
					</label>
				</div>
				<div class="map-brgy"
					style="top:315px; left:8px;">
					<img src="/res/photos/map-assets/brgy/cagban.png"/>
					<label style="top: 42%; left: 31%;">
						    Cagban
					</label>
				</div>
				<div class="map-brgy"
					style="top:507px; left:801px;">
					<img src="/res/photos/map-assets/brgy/calumbuyan.png"/>
					<label style="top: 38%;left: 15%;font-size: 8pt;">
						    Calumbuyan
					</label>
				</div>
				<div class="map-brgy"
					style="top:517px; left:617px">
					<img src="/res/photos/map-assets/brgy/damires.png"/>
					<label style="top: 44%; left: 29%;">
						    Damires
					</label>
				</div>
				<div class="map-brgy"
					style="top:500px; left:739px;">
					<img src="/res/photos/map-assets/brgy/balabag.png"/>
					<label style="top: 30%; left: 15%; font-size:9pt">
						    Balabag
					</label>
				</div>
				<div class="map-brgy"
					style="top:652px; left:354px;">
					<img src="/res/photos/map-assets/brgy/bita-og+gaja.png"/>
					<label style="top: 42%; left: 42%;">
						    Bita-og Gaja
					</label>
				</div>
				<div class="map-brgy"
					style="top:555px; left:456px;">
					<img src="/res/photos/map-assets/brgy/bilidan.png"/>
					<label style="top: 38%; left: 35%;">
						    Bilidan
					</label>
				</div>
				<div class="map-brgy"
					style="top:132px; left:430px;">
					<img src="/res/photos/map-assets/brgy/guinobatan.png"/>
					<label style="top: 42%; left: 18%;">
						    Guinobatan
					</label>
				</div>
				<div class="map-brgy"
					style="top:20px; left:197px;">
					<img src="/res/photos/map-assets/brgy/janipa-an+oeste.png"/>
					<label style="top: 62%; left: 46%;">
						    Janipa-an Oeste
					</label>
				</div>
				<div class="map-brgy"
					style="top:755px; left:699px;">
					<img src="/res/photos/map-assets/brgy/jelicuon+este.png"/>
					<label style="top: 29%; left: 11%; font-size: 10pt">
						    Jelicuon Este
					</label>
				</div>
				<div class="map-brgy"
					style="top:83px; left:85px;">
					<img src="/res/photos/map-assets/brgy/jelicuon+oeste.png"/>
					<label style="top: 42%; left: 28%;">
						    Jelicuon Oeste
					</label>
				</div>
				<div class="map-brgy"
					style="top:789px; left:676px;">
					<img src="/res/photos/map-assets/brgy/pasil.png"/>
					<label style="top: 40%; left: 36%;">
						    Pasil
					</label>
				</div>
				<div class="map-brgy"
					style="top:260px; left:263px;">
					<img src="/res/photos/map-assets/brgy/wari-wari.png"/>
					<label style="top: 37%; left: 33%;">
						    Wari-wari
					</label>
				</div>
				<div class="map-brgy"
					style="top:260px; left:141px;">
					<img src="/res/photos/map-assets/brgy/cabugao.png"/>
					<label style="top: 49%; left: 31%;">
						    Cabugao
					</label>
				</div>
				<div class="map-brgy"
					style="top:254px; left:60px;">
					<img src="/res/photos/map-assets/brgy/general+delgado.png"/>
					<label style="top: 36%; left: 29%;">
						    General Delgado
					</label>
				</div>
			</div>

			<map name="image-map">
			    <area id="brgy-poblacion" class="brgy-area" alt="Poblacion" title="Poblacion" coords="499,383,738,320,744,328,763,324,772,330,780,340,784,335,792,337,799,345,807,380,818,387,815,404,818,416,829,412,837,420,847,416,854,426,862,429,865,437,861,451,851,474,842,485,836,504,829,510,788,512,788,519,741,520,730,433" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-dawis" class="brgy-area" alt="Dawis" title="Dawis" coords="735,320,852,167,859,172,880,163,890,169,921,176,865,266,848,420,844,412,834,418,827,411,815,414,817,385,806,380,798,343,791,335,779,332,760,322,745,326" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-badiang" class="brgy-area" alt="Badiang" title="Badiang" coords="735,319,852,166,827,178,802,166,781,124,762,116,716,112,650,82,609,79,595,86,585,142,634,177,672,213,722,233,704,244,706,295,727,303" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-balabag" class="brgy-area" alt="Balabag" title="Balabag" coords="738,522,785,519,787,511,825,510,809,526,800,556,801,565,815,567,827,609,762,593" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-bilidan" class="brgy-area" alt="Bilidan" title="Bilidan" coords="459,675,564,574,578,583,580,572,593,555,624,570,618,580,635,589,639,608,630,634,641,638,634,655,622,676,634,696,650,693,651,702,676,712,683,721,677,731,684,739,709,770,701,787" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-bitaog-gaja" class="brgy-area" alt="Bita-og Gaja" title="Bita-og Gaja" coords="461,676,422,708,534,854,679,846,700,788" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-bololacao" class="brgy-area" alt="Bololacao" title="Bololacao" coords="497,382,635,178,670,213,723,233,705,244,705,295,729,302,734,319" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-burot" class="brgy-area" alt="Burot" title="Burot" coords="163,522,266,451,275,456,317,461,355,487,372,490,394,500,267,560" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-cabilauan" class="brgy-area" alt="Cabilauan" title="Cabilauan" coords="266,560,396,500,482,527,497,542,512,536,520,544,507,551,517,557,529,547,539,556,538,569,550,573,559,569,564,572,422,710" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-cabugao" class="brgy-area" alt="Cabugao" title="Cabugao" coords="142,363,351,262,267,452,217,434,195,418,183,406,174,377" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-cagban" class="brgy-area" alt="Cagban" title="Cagban" coords="10,414,23,395,39,347,60,318,174,376,181,406,213,433,265,451,161,520,124,503,90,482" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-calumbuyan" class="brgy-area" alt="Calumbuyan" title="Calumbuyan" coords="833,504,892,563,876,617,826,607,815,568,798,564,804,547,810,525" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-damires" class="brgy-area" alt="Damires" title="Damires" coords="737,521,763,593,798,601,794,610,785,606,787,618,773,618,769,627,776,634,776,647,787,659,789,682,798,694,801,719,818,755,831,774,826,791,814,791,813,799,802,793,797,761,789,765,759,763,743,772,727,774,723,755,709,772,679,732,685,719,677,713,651,702,650,692,634,692,621,674,642,635,631,632,639,606,634,585,618,581,625,569" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-general-delgado" class="brgy-area" alt="General Delgado" title="General Delgado" coords="144,359,153,339,177,325,171,310,146,284,135,283,117,291,86,258,60,317" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-guinobatan" class="brgy-area" alt="Guinobatan" title="Guinobatan" coords="499,381,634,179,583,142,554,142,559,160,572,155,560,170,555,193,525,180,495,180,496,158,479,134,471,138,463,164,455,189,433,285" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-janipaan-oeste" class="brgy-area" alt="Janipa-an Oeste" title="Janipa-an Oeste" coords="432,283,462,169,411,174,400,161,383,154,362,161,362,148,376,141,387,117,341,91,304,110,286,90,258,79,270,60,242,21,199,85,347,263" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-jelicuon-este" class="brgy-area" alt="Jelicuon Este" title="Jelicuon Este" coords="700,788,822,826,835,825,825,814,834,798,825,791,814,789,813,800,802,792,796,762,787,766,756,762,742,772,727,773,723,755,710,770" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-jelicuon-oeste" class="brgy-area" alt="Jelicuon Oeste" title="Jelicuon Oeste" coords="145,362,346,263,200,86,87,257,117,291,136,282,146,282,174,312,178,324,153,340" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-pasil" class="brgy-area" alt="Pasil" title="Pasil" coords="701,788,679,844,793,875,796,860,810,866,817,854,831,855,838,838,822,831,819,826" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-wariwari" class="brgy-area" alt="Wari-wari" title="Wari-wari" coords="351,265,266,451,275,456,319,462,358,486,390,497,483,527,499,540,511,535,521,544,509,552,517,557,530,546,539,556,539,568,550,573,558,568,579,582,580,574,541,483,499,385,430,284" shape="poly" v-on:click="didClickArea">
			    <area id="brgy-baclayan" class="brgy-area" alt="Baclayan" title="Baclayan" coords="499,382,581,570,592,554,624,570,741,519,729,431" shape="poly" v-on:click="didClickArea">
			</map>
		</div>
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
			            		<div class="col-md-6 crimes-section">
				            		<label>Crimes committed</label>
					                <ol id="crimes-list" class="pre-scrollable">
					                	<li v-for="crime in selected.crimes">{{crime.crime_type}}</li>
					                </ol>
					                <a href="" class="see-more" v-if="selected.crimes.length > 5">See More</a>
				            	</div>
				            	<div class="col-md-6 suspects-section">
				            		<label>Suspects</label>
					                <ul id="suspects-list" class="pre-scrollable">
					                	<li v-for="suspect in selected.suspects">
					                		<a :href="'/suspects/' + suspect.id + '/edit'">
						                		<img class="suspect-image" 
						                			:src="suspect.front == '' ? '/res/photos/shares/empty-avatar.png' : suspect.front"
						                			@error="imgError" />
						                		<div class="info-group">
							                		<span class="suspect-info" name="suspect-name" v-text="suspect.full_name"></span>
							                		<span class="suspect-info" name="suspect-alias" v-text="suspect.alias"></span>
							                	</div>
					                		</a>
					                	</li>
					                </ul>
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
			pins: [],
			pin_height: 54,
			pin_width: 35,
			selectedLocation: {},
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

		// $('.brgy-area').on('click', function(e){
		// 	console.log(e.target.id);
		// });
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
		didClickArea(e){
			console.log(e.target.id);
			var $this = this;
			axios.get('/brgy/' + e.target.id).then(response => {
				console.log(response.data);
				$this.selected = response.data;
				$('#locationModal').modal(); 
			});
			
		},
		clearPin(){
			this.pins = [];
		},
		imgError(e){

		},
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
	}
	img#lucena-map{
		object-fit: cover;
	}
	div.map-brgys{
		position: absolute;
		top: 0;
		left: 0;
		pointer-events: none;
	}
	div.map-brgy{
	    position: absolute;
	    cursor: pointer;
	}

	div.map-brgy img{
		-webkit-filter: drop-shadow(1px 1px 0 black) 
                    drop-shadow(-1px -1px 0 white);
    	filter:drop-shadow(1px 1px 0 black) 
           drop-shadow(-1px -1px 0 white);
        opacity: 0.25;
	}

	div.map-brgy label{
		position: absolute;
		pointer-events: none;
		text-shadow: 1px 1px 4px white;
	}

	#locationModal li.no-result{
		list-style: none;
	}
	.pre-scrollable{
		height: 250px;
		padding: 0 15px;
	}

	#suspects-list {
	    list-style: none;
	    padding: 0;
	}

	#suspects-list li {
	    margin: 10px 0;
	    position: relative;
	}

	#suspects-list li .suspect-image {
	    width: 75px;
	    height: 75px;
	    object-fit: cover;
	    border-radius: 50%;
	}

	#suspects-list div.info-group{
		display: inline-block;
	    position: absolute;
	    top: 10%;
	    margin-left: 20px;
	}
	#suspects-list li .suspect-info {
	    display:block;
	}
</style>