<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylesheets/style.css"/>
<script src="jquery-3.2.1.min.js"></script>
<script src="js.js"></script>

<?php
// /////////////////////
// G L O B A L S
// //////////////////////////////////////////
$JSON = json_decode(file_get_contents("json.json"));

$FORECAST_LINK = "http://api.openweathermap.org/data/2.5/forecast?q=New%20York,%20US&appid=d9274f3ad0e72d22feb23430a5d37076";
$FORECAST_DATA = json_decode(file_get_contents($FORECAST_LINK));
$WEATHER_LINK = "http://api.openweathermap.org/data/2.5/weather?q=New%20York,%20US&appid=d9274f3ad0e72d22feb23430a5d37076";
$WEATHER_DATA = json_decode(file_get_contents($WEATHER_LINK));
$CURRENT_DATE = "0";
$START = 0;

// /////////////////////
// W E A T H E R
// //////////////////////////////////////////
$convertedDate = date('l Y-n-d', $WEATHER_DATA->dt);
$dayofweek = explode(" ",$convertedDate)[0];
$numDate = explode(" ",$convertedDate)[1];
$mainTemp = getFar($WEATHER_DATA->main->temp);
$mainHum = $WEATHER_DATA->main->humidity;
$mainTempHi = getFar($WEATHER_DATA->main->temp_max);
$mainTempLo = getFar($WEATHER_DATA->main->temp_max);
$sunrise = date("H:i", $WEATHER_DATA->sys->sunrise);
$sunset = date("H:i", $WEATHER_DATA->sys->sunset);

echo "<p><span>".$dayofweek."</span><span>".$numDate."</span></p>";
echo "<p><span>temp: </span><span class='".getTempClass($mainTemp)."'>".$mainTemp."&deg</span><span>humidity: </span><span>".$mainHum."%</span></p>";
echo "<p><span>hi: </span><span class='".getTempClass($mainTempHi)."'>".$mainTempHi."&deg</span><span>lo: </span><span class='".getTempClass($mainTempLo)."'>".$mainTempLo."&deg</span></p>";
echo "<p><span>sunrise: </span><span>".$sunrise."</span><span>sunset: </span><span>".$sunset."</span></p>";

$INDEX = 0;
foreach($FORECAST_DATA->list as $item) {
	$newDate = explode(" ",$item->dt_txt)[0];
	$time = substr(explode(" ",$item->dt_txt)[1], 0, -3);
	$temp = getFar($item->main->temp);
	$hum = $item->main->humidity;
	$prec = "";
	if ($item->snow) {
		$prec = getPrecip($item->snow->{"3h"});
	}
	if ($prec == 0) {
		$prec = "";
	}
	$state = $item->weather[0]->description;
	$dataState = str_replace(" ", "_", $state);
	$tempClass = getTempClass($temp);

	if ($CURRENT_DATE != $newDate) {
		$CURRENT_DATE = $newDate;
		if ($START == 0) {
			$START = 1;
			echo "<div data-type='".$dataState."'>";
			getStart($CURRENT_DATE, $item->dt);
		} else {
			echo "</div><div data-type='".$dataState."'>";
			getStart($CURRENT_DATE, $item->dt);
		}
	}

	echo "<p class='load'>".$time."</p>";
	echo "<p class='load ".$dataState."'>".$state."  ".$prec."</p>";
	echo "<p class='load'><span class='tempspan ".$tempClass."'".$temp."'>".$temp."&deg</span> ".$hum."%</p>";
	echo "<br>";

	$INDEX++;
}
echo "</div>";

// /////////////////////
// L I S T
// //////////////////////////////////////////
echo "<div class='links-col'><div class='links'>";
foreach($JSON->links as $name => $addr) {
	echo "<p class='load' data-name='".$name."'><a href='".$addr."'>".$name."</a><span>&nbsp;[delete]</span></p>";
}
echo "</div>";
// LINK CONTROLS
echo "<div class='link-add'>";
	echo "<p class='load plus'>+</p>";
	echo "<p class='minus'>x</p>";
	echo "<input type='text' class='new-name' placeholder='name'>";
	echo "<input type='text' class='new-addr' placeholder='address'>";
	echo "<p class='submit-link'>&rarr;</p>";
echo "</div>";

echo "</div>";

// /////////////////////
// F U N C T I O N S
// //////////////////////////////////////////

function getStart($date, $timestamp) {
	echo "<p>===================</p>";
	echo "<p class='row0'>0</p>";
	echo "<p class='row1'>0</p>";
	echo "<p class='row2'>0</p>";
	echo "<p class='row2'>0</p>";
	echo "<p>===================</p>";
	echo "<p>".date('l', $timestamp)."</p>";
	echo "<p>".$date."</p><br>";
}

function getFar($x) {
	return round(((floatval($x) - 273.15) * 1.8) + 32, 1);
}

function getPrecip($x) {
	return round(floatval($x), 1);
}

function getTempClass($t) {
	$newT = "0";
	if ($t >= 90) {$newT = "t90";}
	else if ($t >= 80) {$newT = "t80";}
	else if ($t >= 70) {$newT = "t70";}
	else if ($t >= 60) {$newT = "t60";}
	else if ($t >= 50) {$newT = "t50";}
	else if ($t >= 40) {$newT = "t40";}
	else if ($t >= 30) {$newT = "t30";}
	else if ($t >= 20) {$newT = "t20";}
	else if ($t >= 10) {$newT = "t10";}
	else {$newT = "t0";}
	return $newT;
}

?>

