<?php

session_start();

header('Content-Type: text/plain');


$ficheiro = file('logins.txt',  FILE_IGNORE_NEW_LINES);
$rows = array(array());
$result = 0;
$i=0;
foreach($ficheiro as $linha){
	$rows[$i] = explode(';', $linha);
	$i++;
}

$email = $_POST['name'];
$pass = $_POST['pwd'];


for($i=0; $i<count($rows); $i++){

	
		if($rows[$i][1] === $email && $rows[$i][4] === $pass){
			$result = 1;
			$_SESSION['name'] = $rows[$i][0];
			$_SESSION['pais'] = $rows[$i][2];
			$_SESSION['regiao'] = $rows[$i][3];
			$_SESSION['email'] = $rows[$i][1];
			$_SESSION['hora'] = date("h:i:sa");
			$_SESSION['data'] = date("Y-m-d");
			$_SESSION['login'] = 1;
			$_SESSION['csv'] = 0;

		}
	
}

if($result == 1){
	echo 'true';
	exit();
}else{
	echo 'false';
	exit();
}
