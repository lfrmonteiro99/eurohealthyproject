<?php

$con = mysqli_connect('localhost', 'root', '', 'test') or die(mysqli_error());

if(! $con){
	echo "enable to connect to database: " . mysqli_error();
	exit;
}


?>