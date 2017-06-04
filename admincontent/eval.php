<?php

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}


$q = $_GET['q'];

$con = mysqli_connect("localhost","root","deasperis93","authentication");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sqlaccurate = "SELECT * FROM accurate WHERE Country = '".$q."'";
$resultaccurate = mysqli_query($con,$sqlaccurate);

while($rowa = mysqli_fetch_array($resultaccurate)) {
	
	list($tla_lat, $tla_lon) = explode(',', $rowa['Topleft']);
	$tla_lat = floatval($tla_lat);
	$tla_lon = floatval($tla_lon);
	
	list($tra_lat, $tra_lon) = explode(',', $rowa['Topright']);
	$tra_lat = floatval($tra_lat);
	$tra_lon = floatval($tra_lon);
	
	list($bla_lat, $bla_lon) = explode(',', $rowa['Bottomleft']);
	$bla_lat = floatval($bla_lat);
	$bla_lon = floatval($bla_lon);
	
	list($bra_lat, $bra_lon) = explode(',', $rowa['Bottomright']);
	$bra_lat = floatval($bra_lat);
	$bra_lon = floatval($bra_lon);
	
	
	echo "<h4>Accurate results for " . $rowa['Country'] . "</h4>";
    	echo "<table style='margin-left: auto; margin-right: auto;'>
<tr>
<th>Topleft</th>
<th>Topright</th>
<th>Bottomleft</th>
<th>Bottomright</th>
</tr>";
	
    echo "<tr>";
    echo "<td>" . $rowa['Topleft'] . "</td>";
    echo "<td>" . $rowa['Topright'] . "</td>";
    echo "<td>" . $rowa['Bottomleft'] . "</td>";
    echo "<td>" . $rowa['Bottomright'] . "</td>";
    echo "</tr>";
	
	echo "</table><br>";
}

$sqluser="SELECT * FROM Coordinates WHERE Country = '".$q."'";
$resultuser = mysqli_query($con,$sqluser);



while($row = mysqli_fetch_array($resultuser)) {
		
	list($tlu_lat, $tlu_lon) = explode(',', $row['Topleft']);
	$tlu_lat = floatval($tlu_lat);
	$tlu_lon = floatval($tlu_lon);
	
	list($tru_lat, $tru_lon) = explode(',', $row['Topright']);
	$tru_lat = floatval($tru_lat);
	$tru_lon = floatval($tru_lon);
	
	list($blu_lat, $blu_lon) = explode(',', $row['Bottomleft']);
	$blu_lat = floatval($blu_lat);
	$blu_lon = floatval($blu_lon);
	
	list($bru_lat, $bru_lon) = explode(',', $row['Bottomright']);
	$bru_lat = floatval($bru_lat);
	$bru_lon = floatval($bru_lon);
	
	
	echo "<h4>User's results for " . $row['Country'] . "</h4>";
	echo "<table style='margin-left: auto; margin-right: auto;'>
<tr>
<th>Topleft</th>
<th>Topright</th>
<th>Bottomleft</th>
<th>Bottomright</th>
</tr>";
	
    echo "<tr>";
    echo "<td>" . $row['Topleft'] . "</td>";
    echo "<td>" . $row['Topright'] . "</td>";
    echo "<td>" . $row['Bottomleft'] . "</td>";
    echo "<td>" . $row['Bottomright'] . "</td>";
    echo "</tr>";
	
	echo "</table><br>";
	
	
	$tl_dis = distance($tla_lat, $tla_lon, $tlu_lat, $tlu_lon, "K");
	$tr_dis = distance($tra_lat, $tra_lon, $tru_lat, $tru_lon, "K");
	$bl_dis = distance($bla_lat, $bla_lon, $blu_lat, $blu_lon, "K") ;
	$br_dis = distance($bra_lat, $bra_lon, $bru_lat, $bru_lon, "K") ;
	
	$Avrg_dis = ($tl_dis + $tr_dis + $bl_dis + $br_dis)/4;
	
	echo "<h4>Calculated distance, differences between coordinates for respective corners</h4>
	<table style='margin-left: auto; margin-right: auto;'>
		<tr>
		<th>Topleft</th>
		<th>Topright</th>
		<th>Bottomleft</th>
		<th>Bottomright</th>
		<th>Average difference</th>
		</tr>";
	
	echo "<tr>";
    echo "<td>" . round($tl_dis, 4) . " km</td>";
    echo "<td>" . round($tr_dis, 4) . " km</td>";
    echo "<td>" . round($bl_dis, 4) . " km</td>";
    echo "<td>" . round($br_dis, 4) . " km</td>";
    echo "<td style='color:red'>" . round($Avrg_dis, 4) . " km</td>";
    echo "</tr>";
	
	echo "</table><br>";

	
	
	echo "<h3 style='color:red'>";
	if ( 0 < $Avrg_dis && $Avrg_dis < 5){ 
		echo "The result is very accurate";		
	}elseif(5 < $Avrg_dis && $Avrg_dis < 50){
		echo "The result is accurate";
	}elseif(50 < $Avrg_dis && $Avrg_dis < 75){
		echo "The result is acceptable";
	}else{
		echo "The result is not acceptable";
	}
	echo "</h3>";
	
}


		








mysqli_close($con);
?>
	