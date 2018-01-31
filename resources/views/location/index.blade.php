@extends('layouts.app')

@section('content')
<div class="wrapper" id="location-index">
    <div class="container">
        <div class="row location-buttons">
            <div class="col-md-6 button-left">
                <button class="btn btn-primary" id="registerlocation">
                    <span class="glyphicon glyphicon-plus-sign"></span> Register a Location
                </button>
            </div>
            <div class="col-md-6 button-right">
                {!! Form::open(['action' => 'LocationController@store', 'method' => 'POST']) !!}
                    <input type="hidden" name="location_name" id="location_name" />
                    <input type="hidden" name="latitude" id="latitude" />
                    <input type="hidden" name="longitude" id="longitude" />
                    <button type="submit" class="btn btn-warning" id="savelocation">
                        <span class="fa fa-save"></span> Save Location
                    </button>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row map-row">
            <div class="col-md-12">
                <div class="map-container">
                    {!! Mapper::render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-specific-scripts')
<script type="text/javascript">
    var marker;
    var theMap;

    var registerMessageOverlay;
    var markerTextBox;

    var willRegisterLocation = false;

    function mapDidLoad(map){
        theMap = map;
    }

    function clickedLocation(marker){
        console.log(marker);
        alert(marker.title)
    }

    function rightClickedLocation(marker){
        alert(marker.title + " will show context menu");
    }

    $(document).ready(function(){
        $('#registerlocation').on('click', function(e){
            //will check if register mode
            if(willRegisterLocation){
                console.log('called multiple times');
                return;
            }
            console.log('called once');

            //will add overlay here
            registerMessageOverlay = $("<div>").attr({
                                                id: "message-overlay"
                                            })
                                            .css({
                                                position: "absolute",
                                                width: "100%",
                                                height: "100%",
                                                left: 0,
                                                top: 0,
                                                zIndex: 1000000,  // to be on the safe side
                                                background: "rgba(0,0,0,0)",
                                                pointerEvents: "none"
                                            });

            var message = $("<h2>").text("Select location on the map");
            message.attr({
                        id: "message-text"
                    })
                    .css({
                        position: 'absolute',
                        top: '50%',
                        left: '50%',
                        transform: 'translate(-50%, -50%)',
                        color: 'white'
                    });
            message.appendTo(registerMessageOverlay);



            var dimOverlay = $("<div>").attr({
                                        id: "dim-overlay"
                                    })
                                    .css({
                                    position: "absolute",
                                    width: "100%",
                                    height: "100%",
                                    left: 0,
                                    top: 0,
                                    zIndex: 2,
                                    background: "rgba(0,0,0,0.5)",
                                    pointerEvents: "none"
                                });
            dimOverlay.hide().appendTo($(".map-container")).fadeIn();

            
            registerMessageOverlay.hide().appendTo($(".map-container")).fadeIn();
            
            //overlay events
            $(".map-container").hover(function(e){
                    //on map hover, lowers opacity
                    dimOverlay.animate({opacity: 0.5}, 250)
                    registerMessageOverlay.fadeOut();
                }, function(e){
                    //otherwise, high opacity
                    dimOverlay.animate({opacity: 1}, 250)
                    registerMessageOverlay.fadeIn();
                }
            )
            
            var infowindow;
            var location_text;
            //registers click event
            google.maps.event.addListener(theMap, 'click', function(event) {
                if(marker != null){
                    marker.setMap(null);
                }else{
                    location_text = $('<input>').attr({
                                        id: "location_text",
                                        type: "text",
                                        placeholder: "Location Name"
                                    });
                    
                    infowindow = new google.maps.InfoWindow({
                      content: location_text.prop('outerHTML')
                    });
                }

                marker = new google.maps.Marker({position: event.latLng, map: theMap, draggable: true});
                
                console.log("Set marker at:");
                console.log("  Lat:   " + event.latLng.lat());
                console.log("  Long:  " + event.latLng.lng());

                $('#latitude').val(event.latLng.lat());
                $('#longitude').val(event.latLng.lng());

                marker.addListener('click', function() {
                  infowindow.open(theMap, marker);
                  $('#location_text').on('input', function(){
                        $('#location_name').val($(this).val());
                    });
                });

                marker.addListener('dragend', function(de){
                    $('#latitude').val(de.latLng.lat());
                    $('#longitude').val(de.latLng.lng());
                })
            });

            willRegisterLocation = true;
        });


        $('#savelocation').on('click', function(e){
            if($('#latitude').val() == "" && $('#longitude').val() == ""){
                alert("You must select a location on the map first!");
                e.preventDefault();
                return;
            }

            if($('#location_name').val() == ""){
                alert("You must set the name for the location first! (Click the added marker and input text)");
                e.preventDefault();
                return;
            }
        });
    });
</script>
@endsection