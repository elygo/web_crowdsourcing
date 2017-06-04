<?php
	
$connect = mysqli_connect("localhost","root","deasperis93","authentication");

if(isset($_POST["comment"]))
{
	$comment = mysqli_real_escape_string($connect, $_POST["comment"]);
	$newname = mysqli_real_escape_string($connect, $_POST["newname"]);
	$s = "INSERT INTO comments(newname, comment,date_time) VALUES ('".$newname."','".$comment."', now())";
	mysqli_query($connect, $s);
}

?>