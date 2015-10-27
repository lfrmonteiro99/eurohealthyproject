<?php

session_start();

if($_SESSION['login'] != 1){
	echo 'false';
}else{
	echo 'true';
}

echo 'false':

?>