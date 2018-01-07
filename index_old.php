<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylesheets/style.css"/>
<!--<script src="js.js"></script>-->

<?php
// /////////////////////
// G L O B A L S
// //////////////////////////////////////////
//$FORECAST_LINK = "http://api.openweathermap.org/data/2.5/forecast?q=New%20York,%20US&appid=d9274f3ad0e72d22feb23430a5d37076";
//$FORECAST_DATA = json_decode(file_get_contents($FORECAST_LINK));
//$WEATHER_LINK = "http://api.openweathermap.org/data/2.5/weather?q=New%20York,%20US&appid=d9274f3ad0e72d22feb23430a5d37076";
//$WEATHER_DATA = json_decode(file_get_contents($WEATHER_LINK));
//$CURRENT_DATE = "0";
//$START = 0;

// /////////////////////
// C O D E
// //////////////////////////////////////////

//echo "<p>".date('l Y-n-d', $WEATHER_DATA->dt)."</p>";
//echo "<p>temp: ".getFar($WEATHER_DATA->main->temp)."&deg humidity: ".$WEATHER_DATA->main->humidity."%</p>";
//echo "<p>hi: ".getFar($WEATHER_DATA->main->temp_max)."&deg lo: ".$WEATHER_DATA->main->temp_min."&deg</p>";
//echo "<p>sunrise: ".date("H:i", $WEATHER_DATA->sys->sunrise)." sunset: ".date("H:i", $WEATHER_DATA->sys->sunset)."</p>";

/*foreach($FORECAST_DATA->list as $item) {
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

	$tempClass = "0";
	if ($temp >= 90) {$tempClass = "t90";}
	else if ($temp >= 80) {$tempClass = "t80";}
	else if ($temp >= 70) {$tempClass = "t70";}
	else if ($temp >= 60) {$tempClass = "t60";}
	else if ($temp >= 50) {$tempClass = "t50";}
	else if ($temp >= 40) {$tempClass = "t40";}
	else if ($temp >= 30) {$tempClass = "t30";}
	else if ($temp >= 20) {$tempClass = "t20";}
	else if ($temp >= 10) {$tempClass = "t10";}
	else {$tempClass = "t0";}

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

	echo "<p>".$time."</p>";
	echo "<p class='".$dataState."''>".$state."  ".$prec."</p>";
	echo "<p><span class='tempspan ".$tempClass."'".$temp."'>".$temp."&deg</span> ".$hum."%</p>";
	echo "<br>";
}
echo "<div>";

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
	//return substr($x, -1);
}
*/
?>

<div>
	<p>===================</p>
	<p>Day Of Week</p>
	<p>0000-00-00</p>

	<br>
	<p>00:00</p>
	<p class="clear_sky">clear sky</p>
	<p><span class="tempspan t90">90</span> 00%</p>

	<br>
	<p>00:00</p>
	<p class="few_clouds">few clouds</p>
	<p><span class="tempspan t80">80</span> 00%</p>

	<br>
	<p>00:00</p>
	<p class="scattered_clouds">scattered clouds</p>
	<p><span class="tempspan t70">70</span> 00%</p>

	<br>
	<p>00:00</p>
	<p class="broken_clouds">broken clouds</p>
	<p><span class="tempspan t60">60</span> 00%</p>

	<br>
	<p>00:00</p>
	<p class="shower_rain">shower rain</p>
	<p><span class="tempspan t50">50</span> 00%</p>

	<br>
	<p>00:00</p>
	<p class="rain">rain</p>
	<p><span class="tempspan t40">40</span> 00%</p>

	<br>
	<p>00:00</p>
	<p class="thunder_storm">thunder storm</p>
	<p><span class="tempspan t30">30</span> 00%</p>

	<br>
	<p>00:00</p>
	<p class="snow">snow</p>
	<p><span class="tempspan t20">20</span> 00%</p>

	<br>
	<p>00:00</p>
	<p class="mist">mist</p>
	<p><span class="tempspan t10">10</span> 00%</p>
</div>