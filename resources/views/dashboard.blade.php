@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row map-row">
        <div class="col-md-12">
            <div class="map-container">
                {!! Mapper::render() !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css" rel="stylesheet">
    .map-container{
        width: 75%; 
        height: 750px;
        min-width: 1000px;
        
        
        margin:0 auto;
        border:5px #FFF solid;
        box-shadow: 0px 0px 5px #000;
    }

    .row.map-row{
        margin-bottom: 25px;
    }

    .info-group .info-label{
        margin-right: 10px;
    }
</style>
@endsection

@section('page-specific-scripts')
<script>
    var theMap;

    function mapDidLoad(map){
        theMap = map;
    }
    function clickedLocation(marker, info){
        console.log(info);
        
       

        var location_name_group = $('<div>').attr({
                class: "info-group"
            })
            .append($('<label>').addClass('info-label').text('Location: '))
            .append($('<span>').text(info.location_name))

        var crimes_group = $('<div>').attr({
                class: "info-group"
            })
            .append($('<label>').addClass('info-label').text('Crimes: '))
            .append($('<span>').text(info.crimes.length))

        var location_info = $('<div>').attr({
            class: "location-info"
        })
        .append(location_name_group)
        .append(crimes_group);

        var infowindow = new google.maps.InfoWindow({
          content: location_info.prop('outerHTML')
        });

        infowindow.open(theMap, marker);

        $('<span>').text(info.location_name).after(location_info)
    }

    function rightClickedLocation(marker){
        alert(marker);
        console.log(marker)
    }
</script>
@endsection
