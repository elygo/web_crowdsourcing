<?php 
$connectnew = mysqli_connect("localhost","root","deasperis93","authentication");

if(isset($_POST["tleft"]))
{
	$country = mysqli_real_escape_string($connectnew, $_POST["country"]);
	$topleft = mysqli_real_escape_string($connectnew, $_POST["tleft"]);
	$topright = mysqli_real_escape_string($connectnew, $_POST["tright"]);
	$bottomleft = mysqli_real_escape_string($connectnew, $_POST["bleft"]);
	$bottomright = mysqli_real_escape_string($connectnew, $_POST["bright"]);
	$sc = "INSERT INTO Coordinates(Country, Topleft, Topright, Bottomleft, Bottomright, datetime) VALUES ('".$country."','".$topleft."','".$topright."','".$bottomleft."','".$bottomright."', now())";
	mysqli_query($connectnew, $sc);
}

?>