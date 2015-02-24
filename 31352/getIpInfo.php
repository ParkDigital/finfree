<?php
/* ***************************************
******************************************
***********
***********    GET COUNTRY, COUNTRY_CODE AND CITY FROM IP ADDRESS
***********
******************************************
*************************************** */


//
// GET THE IP ADDRESS
// 
function VisitorIP()
{ 
     if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $TheIp=$_SERVER['HTTP_X_FORWARDED_FOR'];
     else $TheIp=$_SERVER['REMOTE_ADDR'];
     
     return trim($TheIp);
}
$userIPAddress = VisitorIP();

/* ***************************************
******************************************
***********
***********    GEOPLUGIN
***********
******************************************
*************************************** */
$geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $userIPAddress) );
//var_dump($geoplugin);
$userCity = $geoplugin['geoplugin_city'];
$userState = $geoplugin['geoplugin_regionName'];
$userStateCode = $geoplugin['geoplugin_region'];
$userCountry = $geoplugin['geoplugin_countryName'];
$userCountryCode = $geoplugin['geoplugin_countryCode'];
$userLat;
$userLong;
if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {
 
	$userLat = $geoplugin['geoplugin_latitude'];
	$userLong = $geoplugin['geoplugin_longitude'];
}


$sampleVar = array(
    "isJSON"=>"true",
    "id"=>"0",
    "country"=>$userCountry,
    "country_code"=>$userCountryCode,
    "province"=>$userState,
    "city"=>$userCity,
    "lat"=>$userLat,
    "long"=>$userLong,
    "contact_name"=>"",
    "contact_email"=>"",
    "website"=>"",
    "info_window"=>"",
    "info_window_title"=>"",
    "info_window_body"=>"",
    "info_window_image_url"=>""
);
echo $userCity.'<br />';
echo $userState.'<br />';
echo $userStateCode.'<br />';
echo $userCountry.'<br />';
echo $userCountryCode.'<br />';
echo $userLat.'<br />';
echo $userLong.'<br />';
var_dump($sampleVar);

?>