<?php
session_start();
$path =  $_SESSION['reportshape'];
header("Pragma: public");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("Cache-Control: private",false);

header("Content-Type: application/ms-excel");
header("Content-Disposition: attachment; filename=Shape Report.csv" );

header("Content-Transfer-Encoding: binary");


//readfile($path);

	readfile($path);

	sleep(3);
?>