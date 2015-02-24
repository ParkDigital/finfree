/* ***************************************
******************************************
***********
***********    CHAPTERS
***********
******************************************
*************************************** */
var chapters;
var ipAddressInfo;


/* ***************************************
******************************************
***********
***********    CHAPTERS WIDGET
***********
******************************************
*************************************** */
$(document).ready(function()
{
     //
     $.ajaxSetup({ cache: false });
     $('#chapter-section').hide();
     //create_chapter_country_list();
     $('.chapter-country').change(country_click_handler);     //
});
$(window).load(function()
{
	//
     $('#chapter-section').show();
	//
	getChaptersJson();
});

/* ***************************************
******************************************
***********
***********    AJAX - GET CHAPTERS JSON DATA
***********
******************************************
*************************************** */
function getChaptersJson()
{
	$.ajax({  
	 	 type: "POST",  
	 	 url: "http://fin-free.com/wordpress/wp-content/themes/31352/chaptersData.php?",
	 	 dataType: "jsonp",
	 	 success: onGetChaptersJsonSuccess,
	 	 complete: onGetChaptersJsonComplete,
	 	 error: onGetChaptersJsonError
	});  
}
var userCity;
function onGetChaptersJsonSuccess(data,text,xhqr) {
     isJSON = data[0].isJSON;
     //chapters = data;
     chapters = $.extend(true, {}, data);
     delete chapters[0];
	if(isJSON=="true") {
		//alert('onGetChaptersJsonSuccess: true');
		//console.log(data);
		//console.log(chapters);
          if(data[0].city)
          {
               userCity = data[0].city;
          }
          dropAllMarkers();
	} else {
		//alert('onGetChaptersJsonSuccess: false');
		//console.log(data);
	}
}
function onGetChaptersJsonComplete(data,text) {
	/* alert('onGetChaptersJsonComplete- Data:'+data+' Text:'+text); */
	create_chapter_country_list();
	$.each(chapters, function(i,item){
	    //console.log(item);
     	if(item.city==userCity){
          	//console.log("userCity is already a chapter!");
          	setTimeout(function() {
                    gotoCityOnMap(userCity);
               }, 2000);
          	return;
     	}
     	else
     	{
          	//console.log("userCity is not a chapter... yet!");
     	}
	});
	
}

function onGetChaptersJsonError(data,text,xhqr) {
	//alert('onSendFormDataToDatabaseError- Data:'+data+' Text:'+text+' XHQR:'+xhqr)
}




/* ***************************************
******************************************
***********
***********    CREATE DROPDOWN ITEMS
***********
******************************************
*************************************** */


function create_chapter_country_list()
{
     var newOptions = "<option value='select' selected='selected'>Please select a country</option>";
     var newCountry = new Array("select");
     $.each(chapters, function(i, item){
               var theValue = item.country_code;
               var theOption = item.country;
               var theId = item.id;
               if( theValue in oc(newCountry) )
               {
                    // do nothing
               }
               else
               {
                    newCountry.push(theValue);
                    newOption = "<option value='" + theValue + "'>" + theOption + "</option>";
                    newOptions += newOption;  
               }
     });
     //console.log("finalNewCountry:"+newCountry);
     $('.chapter-country').append(newOptions);
}
// oc stands for object converter. it turns an array into an object for parsing.
function oc(a)
{
  var o = {};
  for(var i=0;i<a.length;i++)
  {
    o[a[i]]='';
  }
  return o;
}
function country_click_handler(event)
{
     create_chapter_city_list();
     //console.log("country change");
}
function create_chapter_city_list(event)
{
     $('.chapter-city').html("<option value='select' selected='selected'>Please select a city</option>");
     $('.chapter-city').change(city_click_handler);
     var theCountry = $('.chapter-country option:selected').val();
     //console.log(theCountry);
     var newOptions = "";
     $.each(chapters, function(i, item)
     {
          //console.log("id:"+item.id+" ; country_code:"+item.country_code);
          if(item.country_code == theCountry)
          {
               var theId = item.theId;
               var theCity = item.city;
               var newOption = "<option value='" + theId + "' name='" + theCity + "'>" + theCity + "</option>";
               newOptions += newOption;                    
          }
     });
     $('.chapter-city').append(newOptions);
}
function city_click_handler(event)
{
     var theSelectedCity = $('.chapter-city option:selected').text();
     gotoCityOnMap(theSelectedCity); // see MAP below
}


/* ***************************************
******************************************
***********
***********    MAP
***********
******************************************
*************************************** */

/**********
*** VARS **
**********/
var map;
var marker;
var markers = [];
var iterator = 0;
var canada;
var message = ["This","is","the","secret","message"];
var currentMarker;
var chapterLatLong_array = new Array();
var messages_array = new Array();

$(document).ready(function()
{
     //
     canada = new google.maps.LatLng(49, -100);
     google.maps.event.addDomListener(window, 'load', initialize);
     //
});
/***************
*** FUNCTIONS **
***************/
function initialize() {
     var myOptions = {
          center: canada,
          zoom: 3,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
            panControl: false,
            zoomControl: true,
            zoomControlOptions: {
                  style: google.maps.ZoomControlStyle.SMALL,
                  position: google.maps.ControlPosition.BOTTOM_LEFT
              },
            mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            overviewMapControl: false
     };
     map = new google.maps.Map(document.getElementById("chapter-map"), myOptions);
     //dropAllMarkers(); // Markers will be dropped upon Successfull Ajax call
}
//
//
function dropAllMarkers()
{
     $.each(chapters, function(i, item){
        
               var theCountryCode = item.country_code;
               var theCountry = item.country;
               var theDescription;
               var theLat = item.lat;
               var theLong = item.long;
               chapterLatLong_array.push( new google.maps.LatLng(theLat, theLong) );
               theDescription = "<div id='chapter-map-infowindow-content'>"+
                                   "<div id='siteNotice'></div>"+
                                        "<h2 id='firstHeading' class='firstHeading'>"+item.info_window_title+"</h2>"+
                                        "<div id='bodyContent'><p>"+item.info_window_body+"</p></div>"+
                                   "</div>";
               messages_array.push( theDescription );

     });
     drop();
}

function drop() {
     for (var i = 0; i < chapterLatLong_array.length; i++) {
          setTimeout(function() {
          addMarker(i);
          }, i * 300);
     }
}
function addMarker() {
     var markerNumber = "markerNumber-"+iterator;
     var marker = new google.maps.Marker({
          position: chapterLatLong_array[iterator],
          map: map,
          draggable: false,
          animation: google.maps.Animation.DROP
     });
     marker.setTitle(markerNumber.toString());
     attachSecretMessage(marker, iterator);
     markers.push(marker);
     iterator++;
}

function attachSecretMessage(marker, number) {
  var infowindow = new google.maps.InfoWindow({
          content: messages_array[number]
      });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.close();
    infowindow.open(map,marker);
    //console.log(marker.title);
    currentMarker=marker;
  });
}

function gotoCityOnMap(theSelectedCity){
     var theParentIndex;
     var theParentObject;
     $.each(chapters, function(i, item){

               if(item.city == theSelectedCity) {
                    //console.log("gotoCityOnMap Worked");
                    theParentIndex = i;
                    theParentObject = item;
                    return false;
               }

     });
     //console.log("theParentIndex"+theParentIndex);
     //console.log("theParentObject"+theParentObject);
     triggerMarker(theParentIndex-1);
}
function triggerMarker(i) {
    google.maps.event.trigger(markers[i],'click');
};

