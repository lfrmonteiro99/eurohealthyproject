<?php
	session_start();
	//header('Content-Type: text/plain');
	$zip = new ZipArchive;
	$res = $zip->open($_SESSION['shape']);
	if ( $res === TRUE ) {
		$zip->extractTo('extracted/');
		$array = array();
		$array1 = array();
		foreach (glob("extracted/*.prj") as $filename) {
			$array = file($filename, FILE_IGNORE_NEW_LINES);
		}

		

		print_r($array1);
		$rows = array();
		foreach($array as $line){
			$rows[] = str_getcsv($line, '[');
		}

		$file = fopen('uploads/' . $_SESSION['regiao'] . '/reportshape.csv', 'w');
		$header = array(array());

		$header = completeHeader($header);
		$header[2][1] = substr($rows[0][1], 0, strpos($rows[0][1], ','));
		foreach (glob("extracted/*.dbf") as $filename) {
			//$array1 = file($filename, FILE_IGNORE_NEW_LINES);
			$db = dbase_open($filename, 0);
			if ($db) {
			  $record_numbers = dbase_numrecords($db);
			  $header[3][1] = $record_numbers;
			}
		}
		foreach($header as $fields){
			fputcsv($file, $fields, ";", '"');
		}
		

		echo "isto foi feito";
$_SESSION['reportshape'] = 'uploads/' . $_SESSION['regiao'] . '/reportshape.csv';
		$zip->close();
		unlink($zip);
		header('Location: index.php');
	}else{
		
     echo "isto sdfdsfds";
	}

function completeHeader($h){
	$h[0][0] = "Who Made The Upload";
	$h[0][1] = $_SESSION['name'];
	$h[1][0] = "year/s";
	$h[1][1] = "2001/2002/2004";
	$h[2][0] = "Coordinate System";
	$h[3][0] = "Number of Polygons";
	return $h;
}
	
?>