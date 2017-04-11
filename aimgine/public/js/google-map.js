var map;
var inicialized = false;
var points = Array();
/*[
  ['ул."Полтава" 1', 43.080663, 25.608766, 1]
];*/

function setMarkers(map, locations) {
  var shape = {
      coord: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
  };
  for (var i = 0; i < locations.length; i++) {
	  var beach = locations[i];
    
    var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        
        icon: "images/i-maptag.png",
        shape: shape,
        title: beach[0],
        zIndex: beach[3]
    });
  }
}
function scrollto(x,y,zoom){
	map.setCenter(new google.maps.LatLng(x, y));
	map.setZoom(zoom);
	//map.setMapTypeId(google.maps.MapTypeId.ROADMAP)
}

function initialize() {
		  var myOptions = {
			zoom: 14,
			center: new google.maps.LatLng(42.7231003197, 23.2794250197),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			mapTypeControl: false,
			mapTypeControlOptions: {
			  style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
			  //position:  google.maps.ControlPosition.RIGHT_CENTER
			},
			panControl:false,
			panControlOptions : { 
				position: google.maps.ControlPosition.LEFT_CENTER
			}, 
			zoomControl: false, 
			zoomControlOptions: { 
				position: google.maps.ControlPosition.LEFT_CENTER
			}
			
		  }
		  map = new google.maps.Map(document.getElementById("map_canvas"),
										myOptions);
		
		  setMarkers(map, points);
		  inicialized = true;

lastCenter=map.getCenter(); 
google.maps.event.trigger(map_canvas, 'resize');
map.setCenter(lastCenter);

}
$(function() {
	if(document.getElementById("map_canvas")){
		tmp_array = Array();
		tmp_array[0] = $("#google_address").val();
		tmp_array[1] = parseFloat($("#google_lat").val());
		tmp_array[2] = parseFloat($("#google_lng").val());
		tmp_array[3] = 1;
		points.push(tmp_array);
		
	}
	/*$("#google_close , .google_overloa").click(function(){
		$(".google_map_holder").fadeOut("medium");
	});
	$(".js_show_google_map").click(function(){*/
		$(".google_map_holder").show().fadeIn("medium");
		if(!inicialized)initialize();
		scrollto(parseFloat($("#google_lat").val()),parseFloat($("#google_lng").val()),parseInt($("#google_zoom").val()))
	//})
	
})