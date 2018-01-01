<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div style="width: 750px; height: 500px;float:left;">
	{!! Mapper::render() !!}
</div>
<div>
	Center Latitude: <span id="center_lat">0</span><br>
	Center Longitude: <span id="center_long">0</span><br>
	Zoom: <span id="zoom">0</span><br>
	Marker Latitude: <span id="marker_lat">0</span><br>
	Marker Longitude: <span id="marker_long">0</span>
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript">
    var page_height = 0;
    var menu_height = 0;
    
    function mapWillLoad(e){
        // console.log(e);
        // var map = e.map;
        // google.maps.event.addListener(map, 'click', function(event) {
            
        //     marker = new google.maps.Marker({position: event.latLng, map: map});

        // });
    }

    function mapDidLoad(map){
    	$('#center_lat').text(map.center.lat);
		$('#center_long').text(map.center.lng);
		$('#zoom').text(map.zoom);
		
    	map.addListener('center_changed', function() {
			// 3 seconds after the center of the map has changed, pan back to the
			// marker.
			// console.log(map.center);
			$('#center_lat').text(map.center.lat);
			$('#center_long').text(map.center.lng);
			$('#zoom').text(map.zoom);
			window.setTimeout(function() {
				// map.panTo(marker.getPosition());
			}, 3000);
		});
        google.maps.event.addListener(map, 'click', function(event) {
            marker = new google.maps.Marker({position: event.latLng, map: map});
            
            console.log("Added marker at:");
            console.log("  Lat:   " + event.latLng.lat());
            console.log("  Long:  " + event.latLng.lng());

            marker.addListener('click', markerDidTap);
            
        });
    }

    function clickedLocation(e){

    }

    function markerDidTap(){
        
        if(shopMenuHidden()){
            this.setIcon('/assets/icons/shop-pin-selected.png');
            showMenu();
        }else{
            this.setIcon('/assets/icons/shop-pin.png');
            hideMenu();
        }
    }
</script>