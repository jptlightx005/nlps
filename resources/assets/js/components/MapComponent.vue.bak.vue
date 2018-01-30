<template>
  <googlemaps-map
    :center.sync="center"
    :zoom.sync="zoom"
    :options="mapOptions"
    @idle="onIdle"
    @click="onMapClick">

    <!-- User Position -->
    <googlemaps-user-position
      @update:position="setUserPosition"
    />

    <googlemaps-marker
      v-for="marker of markers"
      :key="marker._id"
      :label="marker.label"
      :position="marker.position"
      @click="selectMarker(marker)"
    />
  </googlemaps-map>
</template>

<script>
export default {

  name: 'MapComponent',
  methods: {
    onIdle: function(){

    },
    onMapClick: function(){

    },
    setUserPosition: function(){

    },
    selectMarker: function(marker){
      waitingDialog.show();
      axios.get('/locations/' + marker._id).then(data => {
        console.log(data);
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
      });

      // var id = marker._id;
      // var info = this.locations.filter(function(item){ return item.id == id;} ).pop();
      // // console.log(this);
      // // console.log(this.$children[0].$_map);
      // var map = this.$children[0].$_map;
      // console.log(map);
      // // var map = ;
      // //Location:
    //     var location_name_group = $('<div>').attr({
    //             class: "info-group"
    //         })
    //         .append($('<label>')
    //             .addClass('info-label')
    //             .text('Location: ')
    //         ).append($('<span>')
    //             .text(info.location_name)
    //         )

    //     //Number of Crimes:
    //     var crimes_group = $('<div>').attr({
    //             class: "info-group"
    //         })
    //         .append($('<label>')
    //             .addClass('info-label')
    //             .text('Crimes: ')
    //         ).append($('<span>')
    //             .text(info.crimes.length)
    //         )

    //     //View Details
    //     var details_button = $('<div>').attr({
    //             class: "info-group"
    //         })
    //         .append($('<a>')
    //             .attr({href: "#",
    //                     class: "view-details",
    //                     id: info.id})
    //             .text('View Details')
    //         )

        
    //     //infowindow elements container
    //     var location_info = $('<div>').attr({
    //         class: "location-info"
    //     })
    //     .append(location_name_group)
    //     .append(crimes_group)
    //     .append(details_button);        

    //     var infowindow = new google.maps.InfoWindow({
    //       content: location_info.prop('outerHTML')
    //     });

        
    //     infowindow.open(map, marker);

    //     $('<span>').text(info.location_name).after(location_info)

       
    //     $('a#' + info.id).on('click', function(e){
    //         didClickDetails(e, info.id);
    //     });
    }
  },
  data () {
    return {
      center: { lat: 10.872001027667604, lng: 122.57285513977047 },
      zoom: 14,
      mapOptions: {},
      markers: [],
      locations: [],
      map: null,
    }
  },
  created(){
    
    axios.get('/locations').then(response => {
      this.locations = response.data;
      var list = [];
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
          list.push({_id: value.id, position: position, label: label, title: value.location_name});
        });
        console.log(list);
        this.markers = list;
    });
  }
}
</script>

<style lang="css" scoped>
  .vue-google-map{
    height: 100%;
  }
</style>