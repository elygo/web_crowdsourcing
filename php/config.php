<?php

ob_start();

session_start();

$connection = mysqli_connect('localhost','root','deasperis93','authentication');

if(!$connection){
		echo "Connection failed";
	}

?>