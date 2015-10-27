<?php

function openZip($file_to_open){
	global $target;

	$zip = new ZipArchive();
	$x = $zip->open($file_to_open);
	if($x === true){
		$zip->extract($target);
		$zip->close();

		unlink($file_to_open);
	}else{
		die("there was a problem.");
	}
}

?>