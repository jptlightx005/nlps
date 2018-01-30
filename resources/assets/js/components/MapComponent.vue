<template>
    <gmap-map
    :center="center"
    :zoom="14"
    >
        <gmap-marker
        :key="index"
        v-for="(m, index) in markers"
        :label="m.label"
        :title="m.title"
        :position="m.position"
        :clickable="true"
        :draggable="true"
        @click="selectMarker(m)"
        >
            <gmap-info-window 
                                :opened.sync="m.isClicked"
                                @domready="infoWindowReady"
                                @closeclick="infoWindowClose">
                I can use <b>HTML</b> here and expressions too !<br>
                I am not bound to any markers. I'm freeee.
            </gmap-info-window>
        </gmap-marker>
    </gmap-map>
</template>

<script>
export default {
    methods: {
        onIdle: function(){

        },
        onMapClick: function(){

        },
        setUserPosition: function(){

        },
        selectMarker: function(marker){
            // console.log(marker);
            // console.log(this.$refs);

        },
        infoWindowReady: function(){
            // console.log("ready...")
            // console.log(this);
        },
        infoWindowClose: function(infowindow){
            // console.log("closed...")
            // console.log(infowindow)
        }
    },
    data () {
        return {
            center: {lat: 10.872001027667604, lng: 122.57285513977047},
            markers: []
        }
    },
    created(){
        console.log(this.$children[0]);
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
                list.push({id: value.id, position: position, label: label, title: value.location_name});
            });
        
            console.log(list);
            this.markers = list;
        });
    }
}
</script>

<style lang="css" scoped>
    .vue-map-container{
        height: 100%;
        width: 100%;
    }
</style>