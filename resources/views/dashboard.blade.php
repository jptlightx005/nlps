@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row map-row">
        <div class="col-md-12">
            <div class="map-container">
                {{-- {!! Mapper::render() !!} --}}
                <map-component></map-component>
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

    <example-component></example-component>
</div>
@endsection

@section('modals')
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Details</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Location Name:</label>
                <span id="loc_name">New York</span>
            </div>
            <div class="form-group">
                <label>Crime Frequency:</label>
                <span id="freq">1/month</span>
            </div>
            <div class="form-group">
                <label>Top Crimes committed</label>
                <ol id="top_crimes">
                    <li>Murder</li>
                    <li>Pesticide</li>
                </ol>
            </div>
            <div class="form-group">
                <label>Remarks: </label>
                <span id="remarks">Too Safe</span>
            </div>
        </div>
        <div class="modal-footer">
            <a href="link/to/details" id="more_details" class="btn btn-primary">Details</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>

  </div>
</div>
@endsection

@section('page-specific-styles')
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
    var setOnce = false;

    function mapDidLoad(map){
        theMap = map;
    }
    function clickedLocation(marker, info){
        console.log(info); 

        //Location:
        var location_name_group = $('<div>').attr({
                class: "info-group"
            })
            .append($('<label>')
                .addClass('info-label')
                .text('Location: ')
            ).append($('<span>')
                .text(info.location_name)
            )

        //Number of Crimes:
        var crimes_group = $('<div>').attr({
                class: "info-group"
            })
            .append($('<label>')
                .addClass('info-label')
                .text('Crimes: ')
            ).append($('<span>')
                .text(info.crimes.length)
            )

        //View Details
        var details_button = $('<div>').attr({
                class: "info-group"
            })
            .append($('<a>')
                .attr({href: "#",
                        class: "view-details",
                        id: info.id})
                .text('View Details')
            )

        
        //infowindow elements container
        var location_info = $('<div>').attr({
            class: "location-info"
        })
        .append(location_name_group)
        .append(crimes_group)
        .append(details_button);        

        var infowindow = new google.maps.InfoWindow({
          content: location_info.prop('outerHTML')
        });

        infowindow.open(theMap, marker);

        $('<span>').text(info.location_name).after(location_info)

       
        $('a#' + info.id).on('click', function(e){
            didClickDetails(e, info.id);
        });
    }

    function rightClickedLocation(marker){
        alert(marker);
        console.log(marker)
    }

    function didClickDetails(e, id){
        console.log(e);
        console.log('id is now: ' + id)

        //ajax will run here
        //but let's try triggering modal through here first
        
        ////yay it worked
        waitingDialog.show();
        $.ajax({
            url: '/loc/' + id,
            success: function(data){
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
            },
            error: function(data){
                console.log('Error Occured: ');
                console.log(data);
            }
        });
    }
</script>
@endsection
