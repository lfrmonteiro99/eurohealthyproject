<?php
print_r($_FILES);
echo "dsjhvbsdvbsdkfbsdif";
session_start();

$fileName = $_FILES['file']["name"];

$filetmp = $_FILES["file"]["tmp_name"];
$ext = explode('.', $_FILES["file"]['name']);
$ext = end($ext);

$accept=0;
/*if(move_uploaded_file($filetmp, "uploads/".$fileName)){
  echo "$fileName upload complete!";
}else{
  echo "move_uploaded_file function failed!";
}*/

if($ext === 'csv'){
	$accept = check_csv($_FILES["file"]["name"]);
	
	
	
	if($accept === 1){
		if(move_uploaded_file($filetmp, "uploads/" . $fileName)){
			//report($dir[0]);
			echo "Uploaded!!!!<br>";
			$_SESSION['file_para_report'] = 'uploads/' . $fileName;
			header('Location: report1.php');
			
		}else{
			echo " Not Uploaded!!!!\n";
		}

	}else{
		/*$_SESSION['falha'] = 1;
		$_SESSION['razaofalha'] = "The file has an incorrect data.";
		header("Location: index.php");*/
		echo "deu accept=0";
	}
}

function getFloat($str) {
  if(strstr($str, ",")) {
    $str = str_replace(".", "", $str); // replace dots (thousand seps) with blancs
    $str = str_replace(",", ".", $str); // replace ',' with '.'
  }

  return $str;
  /*if(preg_match("#([0-9\.]+)#", $str, $match)) { // search for number that may contain '.'
    return floatval($match[0]);
  } else {
    return floatval($str); // take some last chances with floatval
  } */
}

function verifica_indicadores_valor($string){
    if(is_numeric(getFloat($string))){
        return 1;
    }
    return 0;
    
}


function retorna_numero_titulo_indicador_2($indicador, $indicadores){

	for($i=0; $i<sizeof($indicadores); $i++){
		if($indicadores[$i] === $indicador){
			return 1;
		}
	}
	/*foreach($indicadores as $st){
		//echo " $st ";
		if($st === $indicador){
			echo "sdjofnhsdiouvhsduighsoghsg hsg hsfd hgsifdgsdfui sdifu hgsdifug dsiug sdifg sdifg bln";
			return 0;
		}
	}
    /*if(in_array($indicador, $indicadores)){
			echo " aqui ";
            return 1;
        }*/
}

function retorna_numero_titulo_indicador_3($format, $indicadores){
    if(in_array($format, $indicadores)){
            return 1;
        }
        
        return 0;
}

function verifica_indicadores($string){
    
  
    $indicadores = file("indicadores.txt", FILE_IGNORE_NEW_LINES);
    $indicador = explode("_", $string);
	
    if(sizeof($indicador) === 1){
        $result = retorna_numero_titulo_indicador_2($indicador, $indicadores);
		return 1;
    }
    
    if(sizeof($indicador) === 2){
        $format = $indicador[0] . '_' . $indicador[1];
       
        return retorna_numero_titulo_indicador_3($format, $indicadores);
        
    }
    
    return 0;
}

function verifica_nutsCode($s){
    
    
    $nuts_code = file("nuts_code.txt", FILE_IGNORE_NEW_LINES);
    
    if(in_array($s, $nuts_code)){
        return 1;
    }
}

function verifica_4_celulas($array){
	if( $array[0][0] === "NUTS_CODE" && $array[0][1] === "NUTS_LABEL" && $array[0][2] === "COUNTRY_CODE" && $array[0][3] === "YEAR" ){
        return 1;
    }else{

    return 0;
    }
	
	return 0;
}

function verifica_linha($linha, $array){
    
    $accept=1;
    if(verifica_4_celulas($array) === 0){
        return 0;
    }
    
    for($j=0; $j<count($array[$linha]); $j++){
       
        if($j === 0 and $linha>0){
            $accept = verifica_nutsCode($array[$linha][$j]);
        }
        
        if($j>3 and $linha===0){
            $accept = verifica_indicadores($array[$linha][$j]);
        }
        
        if($j>3 and $linha>0){
            $accept = verifica_indicadores_valor($array[$linha][$j]);
        }
      
        if($accept === 0){
            return 0;
        }
    }
    
    return 1;
    
}

function check_csv($file){
    
    $rows = array();
    $i = 0;
	$efe = file($_FILES["file"]["tmp_name"]);
	foreach( $efe as $line){
			
			
		$rows[] = str_getcsv($line, ";");
	  
		$accept = verifica_linha($i, $rows);
		if($accept === 0){
			return 0;
		}
		
		$i++;
			
			
	}
			
	return 1;
}
 ?>
