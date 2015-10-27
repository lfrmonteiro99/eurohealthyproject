<?php
echo "nfdsvgiufnvgiudfnfdoi";
session_start();




$file = 'logs/' . $_SESSION['email'] . '.txt';
$log=fopen($file, 'a');

$content = $_SESSION['pais'] . " " . $_SESSION['regiao'] . " " . $_SESSION['data'] . " " . $_SESSION['hora'] . " " . $_SESSION['csv'] . " " . $_SESSION['txt'] . " " . $_SESSION['shape'];

if(fwrite($log, $content) === FALSE){
	echo "cannot open file $file!";
	exit();
}

echo "Success, wrote ($content) to file ($file)";

fclose($handle);

session_start();
session_destroy();

header("Location: login.html");
?>