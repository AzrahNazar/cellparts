var map;
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();
var map_center;
var map_zoom;
var distance = 0;

//initialize Google Map API onload
$(function(){ 
    initialize();  
});


//calls to make after finishing complete page load
$(document).ready(function(){
    
    //call on form submit
    $("#toAddress").change(function(){

        var city = $(this).val();

        $("#loader").html('&nbsp;<span class="label label-info">Loading...</span>');
        calcRoute(city);

        /*$.post("connection/proceed_load.php", {delivery_distance: 'data', city:city, distance:distance}, function (e){

        }, "json");*/

        return false;
    });
    
    // Hack for loading Map properly when opened from Modal box
    $('#mapModal').on('shown', function () {
        map_center = map.getCenter();
        google.maps.event.trigger(map, "resize");

        map.setCenter(map_center);
        map.setZoom(map_zoom);
    });

});


// Initialize google map object
function initialize() {
  	var mapOptions = {
      	center: new google.maps.LatLng(44.64886, -63.57532),
      	zoom: 12,
      	mapTypeId: google.maps.MapTypeId.ROADMAP
  	};
  	map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

  	apply_autocomplete($("#fromAddress")[0]);
  	apply_autocomplete($("#toAddress")[0]);
}

// Apply Autocomplete API
function apply_autocomplete(input){
	var options = {
	  	types: ['geocode']
	};
	var autocomplete = new google.maps.places.Autocomplete(input, options);
    autocomplete.bindTo('bounds', map);
}


// Calculate route and directions
function calcRoute(city) {
	//create waypoints array & fill it with all locations entered by user
	var waypts = new Array();

	var start_address = $("#fromAddress").val();
	var end_address = $("#toAddress").val();
  
	$('input[name="toWaypoints[]"]').each(function()
	{
		waypts.push({
            location:$(this).val(),
            stopover:true
        });
	});
	
    // Create a Request variable for Map
    var request = {
        origin: start_address,
        destination: end_address,
        waypoints: waypts,
        optimizeWaypoints: true,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };

    // Execute the Route Method to generate Direction Route on Map
    directionsService.route(request, function(response, status) {
        var directionsDiv = document.getElementById('directions');

        if (status == google.maps.DirectionsStatus.OK) {
            directionsDiv.innerHTML = "";
            directionsDisplay.setMap(map);
            directionsDisplay.setDirections(response);
            directionsDisplay.setPanel(directionsDiv);

            var route = response.routes[0];

            // calculate total distance and duration
            // generate list of locations to print
            var distance = 0;
            var time = 0;
            var locations_list = '<ol>';
            for (var i=0; i<route.legs.length; i++) {
                var theLeg = route.legs[i];
                locations_list += '<li>' + theLeg.start_address + '</li>' ;
                distance += theLeg.distance.value;
                time += theLeg.duration.value;
            }
            locations_list += '<li>' + theLeg.end_address + '</li>' ;
            locations_list += '</ol>';
            
            $("#locations").html('<h4>Directions for :</h4>' + locations_list);
            $(directionsDiv).append(
                '<div class="btn-container">' +
                    '<a href="#" class="btn btn-primary" onclick="window.print();"><i class="icon-print icon-white"></i> Print</a>' +
                '</div>' +
                '<h4>Your Route :</h4>'
            );

            var distance_km = Math.round(distance/100) / 10;   

            $('#distance').val(distance_km);

            $.post("connection/proceed_load.php", {delivery_distance: 'data', city:city, distance:distance_km}, function (e){

            }, "json");

            //display summary into summary block
            total_summary = '<div class="alert alert-success" style ="margin:0;">';
            total_summary += '  <strong>Total Distance From Colombo : </strong>' + showDistance(distance) ;
            total_summary += '</div>';
			$("#summary").html(total_summary);

            map_zoom = map.getZoom();

            $("#loader").html('');
        }
        else {
            var statusText = getDirectionStatusText(status);
            directionsDiv.innerHTML = "An error occurred - " + statusText;
        }
    });
}

// Show distance in different measurements
function showDistance(distance) {
    return Math.round(distance/100) / 10 + " km (" + Math.round((distance*0.621371192)/100) / 10 + " miles)";
}

// Get the Map direction status message
function getDirectionStatusText(status){
    switch(status){
        case google.maps.DirectionsStatus.INVALID_REQUEST :
            return "Invalid request";
        case google.maps.DirectionsStatus.MAX_WAYPOINTS_EXCEEDED :
            return "Maximum waypoints exceeded";
        case google.maps.DirectionsStatus.NOT_FOUND :
            return "Not found";
        case google.maps.DirectionsStatus.OVER_QUERY_LIMIT :
            return "Over query limit";
        case google.maps.DirectionsStatus.REQUEST_DENIED :
            return "Request denied";
        case google.maps.DirectionsStatus.UNKNOWN_ERROR :
            return "Unknown error";
        case google.maps.DirectionsStatus.ZERO_RESULTS :
            return "Zero results";
        default:
            return status;
    }
}


// Add More waypoints
function add_waypoint()
{
    waypoint_container = '<div class="control-group ">';
    waypoint_container+= '  <label class="control-label" for="inputEmail">Journey Start From :</label>';
    waypoint_container+= '  <div class="controls">';
    waypoint_container+= '      <input type="text" id="toWaypoints" name="toWaypoints[]" class="input-xlarge" value="">';
    waypoint_container+= '      &nbsp;<a href="#" onclick="return add_waypoint();">Add Waypoints</a>';
    waypoint_container+= '      &nbsp;<a href="#" onclick="return remove_waypoint(this);">Remove</a>';
    waypoint_container+= '  </div>';
    waypoint_container+= '</div>';
	
	$('.destination-container').before(waypoint_container);

	$('[name=toWaypoints\\[\\]]').each(function() {
	    apply_autocomplete($(this)[0]);
	});
	
	return false;
}

// Remove waypoint
function remove_waypoint(obj)
{
	$(obj).parent().parent().remove();
	return false;
}

