<?php

session_start();

header('Content-Type: text/plain');

$ficheiro_para_report = $_SESSION['file_para_report'];
$report1 = 'report.csv';

$file = fopen('report.csv', 'w'); 

$ficheiro = file($report1,  FILE_IGNORE_NEW_LINES);

$anos = array(); // anos preenchidos
$to_csv = array();

$rows1 = array();

foreach(file($ficheiro_para_report, FILE_IGNORE_NEW_LINES) as $line){
	$rows1[] = str_getcsv($line, ';');
}

$rows = file($ficheiro_para_report, FILE_IGNORE_NEW_LINES);

$anos[0] = $rows1[1][3];
for($i=2, $j=1; $i<count($rows1);$j++, $i++){
	//echo $rows1[$i][3]. " ";
	if(!in_array($rows1[$i][3], $anos)){
		array_push($anos, $rows1[$i][3]);
	}
}



$anosPresentes = array();
$anosPresentes[0] = 'Years';
$anosPresentes[1] = sizeof($anos);
$indicadoresDados = array();
$indicadoresDados[0] = 'Number of Indicators filled';
$indicadoresDados[1] = 0;

	fputcsv($file, $anosPresentes, ";", '"');
	fputcsv($file, $indicadoresDados, ";");

$array_para_nomes = array();
$file_nome_indicadores = file('indicadores1linha.txt', FILE_IGNORE_NEW_LINES);

$array_para_nome = explode(';', $file_nome_indicadores[0]);
//print_r($array_para_nome);
/* $array_para_nomes[0] = "";
$array_para_nomes[1] = 'U';

for($i=2; $i<10; $i++){
	$array_para_nomes[$i] = "";
	if($i===6){
			$array_para_nomes[$i] = $array_para_nome[2];
	}
}
 */
for($i=0, $j=1; $j<count($array_para_nome); $i++){
	if($i === 1 ){
		$array_para_nomes[$i] = $array_para_nome[$j];
		$j++;
	}else if($i === 6){
		$array_para_nomes[$i] = $array_para_nome[$j];
		$j++;
		
	}else
	if( $i>6 && ($i%6) == 0){
		
		$array_para_nomes[$i-1] = $array_para_nome[$j];
		$j++;
	}else{
		$array_para_nomes[$i] = "";
	}
}

	fputcsv($file, $array_para_nomes, ";", '"');
	
$labels = array();
$linha = array();
$labels[0] = 'Filled Cells';
$labels[1] = 'Mean';
$labels[2] = 'Mediana';
$labels[3] = 'Minimum Value';
$labels[4] = 'Maximum Value';
$linha[0] = "";

for($i=1, $j=0; $i<count($array_para_nomes)+4; $i++){
	
		$linha[$i] = $labels[$j++];
		if($j===5){
			$j = 0;
		}
	
}

	fputcsv($file, $linha, ";", '"');

sort($anos);



$medias = array(array());
$minimos = array(array());
$maximos = array(array());
$mediana01 = array(array(array()));
/*$mediana02 = array(array());
$mediana03 = array(array());
$mediana04 = array(array());
$mediana05 = array(array());
$mediana06 = array(array());
$mediana07 = array(array());
$mediana08 = array(array());
$mediana09 = array(array());
$mediana10 = array(array());
$mediana11 = array(array());
$mediana12 = array(array());
$mediana13 = array(array());
$mediana14 = array(array());
$mediana15 = array(array());*/


$k=0;
for($i=0; $i<count($anos); $i++){
	for($j=0 ; $j<=count($linha)+2; $j++){
	
		$minimos[$i][$j] = 1000;
	}
}

$k=0;
for($i=0; $i<count($anos); $i++){
	for($j=0 ; $j<=count($array_para_nome)+2; $j++){
	
		$maximos[$i][$j] = 0;
	}
}
		
for($i=0; $i<count($anos); $i++){
	for($j=0 ; $j<=count($array_para_nome)+2; $j++){
		$medias[$i][$j] = 0;
	}
}

 for($l01=0,$l02=0,$l03=0,$l04=0,$l05=0,$l06=0,$l07=0,$l01=0,$l08=0,$l09=0,$l10=0,$l11=0,$l12=0,$l13=0,$l14=0,$l15=0,$i=1; $i< count($rows1); $i++){

	switch($rows1[$i][3]){
			case 2001: 
						$l01++;
					
						for($j=4, $k=0, $t; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[0][$k] += floatval($rows1[$i][$j]);

							//echo $medias[0][$k] . '\n';
							
							if(floatval($rows1[$i][$j]) < $minimos[0][$k]){
								$minimos[0][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[0][$k]){
								$maximos[0][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[0][$l01][$k] = $rows1[$i][$j];
							
						}
			break;
			case 2002: $l02++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//echo $l02 . " ";
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[1][$k] += floatval($rows1[$i][$j]);
							
							if(floatval($rows1[$i][$j]) < $minimos[1][$k]){
								$minimos[1][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[1][$k]){
								$maximos[1][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[1][$l02][$k] = $rows1[$i][$j];
						}
			break;
			case 2003: $l03++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[2][$k] += floatval($rows1[$i][$j]);
							
							if(floatval($rows1[$i][$j]) < $minimos[2][$k]){
								$minimos[2][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[2][$k]){
								$maximos[2][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[2][$l03][$k] = $rows1[$i][$j];
						}
			break;
			case 2004: $l04++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[3][$k] += floatval($rows1[$i][$j]);
							
							if(floatval($rows1[$i][$j]) < $minimos[3][$k]){
								$minimos[3][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[3][$k]){
								$maximos[3][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[3][$l04][$k] = $rows1[$i][$j];
						}
			break;
			case 2005: $l05++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[4][$k] += floatval($rows1[$i][$j]);
							if(floatval($rows1[$i][$j]) < $minimos[4][$k]){
								$minimos[4][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[4][$k]){
								$maximos[4][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[4][$l05][$k] = $rows1[$i][$j];
						}
			break;
			case 2006: $l06++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[5][$k] += floatval($rows1[$i][$j]);
							if(floatval($rows1[$i][$j]) < $minimos[5][$k]){
								$minimos[5][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[5][$k]){
								$maximos[5][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[5][$l06][$k] = $rows1[$i][$j];
						}
			break;
			case 2007: $l07++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[6][$k] += floatval($rows1[$i][$j]);
							if(floatval($rows1[$i][$j]) < $minimos[6][$k]){
								$minimos[6][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[6][$k]){
								$maximos[6][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[6][$l07][$k] = $rows1[$i][$j];
						}
			break;
			case 2008: $l08++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[7][$k] += floatval($rows1[$i][$j]);
							if(floatval($rows1[$i][$j]) < $minimos[7][$k]){
								$minimos[7][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[7][$k]){
								$maximos[7][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[7][$l08][$k] = $rows1[$i][$j];
						}
			break;
			case 2009: $l09++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[8][$k] += floatval($rows1[$i][$j]);
							if(floatval($rows1[$i][$j]) < $minimos[8][$k]){
								$minimos[8][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[8][$k]){
								$maximos[8][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[8][$l09][$k]= $rows1[$i][$j];
						}
			break;
			case 2010: $l10++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[9][$k] += floatval($rows1[$i][$j]);
							if(floatval($rows1[$i][$j]) < $minimos[9][$k]){
								$minimos[9][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[9][$k]){
								$maximos[9][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[9][$l10][$k] = $rows1[$i][$j];
						}
			break;
			case 2011: $l11++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[10][$k] += floatval($rows1[$i][$j]);
							if(floatval($rows1[$i][$j]) < $minimos[10][$k]){
								$minimos[10][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[10][$k]){
								$maximos[10][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[10][$l11][$k] = $rows1[$i][$j];
						}
			break;
			case 2012: $l12++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[11][$k] += floatval($rows1[$i][$j]);
							if(floatval($rows1[$i][$j]) < $minimos[11][$k]){
								$minimos[11][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[11][$k]){
								$maximos[11][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[11][$l12][$k] = $rows1[$i][$j];
						}
			break;
			case 2013: $l13++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[12][$k] += floatval($rows1[$i][$j]);
							if(floatval($rows1[$i][$j]) < $minimos[12][$k]){
								$minimos[12][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[12][$k]){
								$maximos[12][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[12][$l13][$k] = $rows1[$i][$j];
						}
			break;
			case 2014: $l14++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[13][$k] += floatval($rows1[$i][$j]);
							if(floatval($rows1[$i][$j]) < $minimos[13][$k]){
								$minimos[13][$k] = floatval($rows1[$i][$j]);
							}
							
							if(floatval($rows1[$i][$j]) > $maximos[13][$k]){
								$maximos[13][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[13][$l14][$k] = $rows1[$i][$j];
						}
			break;
			case 2015: $l15++;
			for($j=4, $k=0; $j<= count($array_para_nome)+2; $j++, $k++){
							
							//$linhaAnos[0][$j] = $rows1[$i][$k];
							$medias[14][$k] += floatval($rows1[$i][$j]);
							if(floatval($rows1[$i][$j]) < $minimos[14][$k]){
								$minimos[14][$k] = floatval($rows1[$i][$j]);
							}
							if(floatval($rows1[$i][$j]) > $maximos[14][$k]){
								$maximos[14][$k] = floatval($rows1[$i][$j]);
							}

							$medianas01[14][$l15][$k] = $rows1[$i][$j];
						}
			break;
			default: echo 'não';
			break;
		}
		
		

}



	//print_r($medianas01);


//print_r($array_para_nomes);
//print_r($medias);

for($i=0; $i< count($anos); $i++){
	for($j=0; $j<count($array_para_nome); $j++){
		$medias[$i][$j] /= 15;
		if(count($medias[$i][$j]) > 4){
			$medias[$i][$j] = substr($medias[$i][$j], 0, -10);
		
		}
		$medias[$i][$j] = strtr ($medias[$i][$j], array ('.' => ','));
	}
}

//print_r($linhaAnos);

	
	/* foreach($linhaAnos as $fields){
		fputcsv($file, $fields, ";", '"');
	} */

$linhas = array(array());
$medianas = array(array());
$aux = array();

//for($i=0; $i<count($anos); $i++){
	
/*	for($j=0; $j< count($medianas01[0]); $j++){
		
		for($k=0; $k< 80; $k++){
			
			echo $medianas01[0][$k][$j] . " ";
			//
		}
		//$medianas[$i][$j] = mmmr($aux);
		
	}
*/
//}

for($ano=0; $ano<=count($anos); $ano++){
		for($linhaAno=0; $linhaAno<count($array_para_nome); $linhaAno++){
			$i=0;
			for($colunas=0; $colunas<count($array_para_nome); $colunas++){
				echo $medianas01[0][1][$linhaAno] . " ";
				$aux[$i++] = $medianas01[0][$colunas][$linhaAno];
			}
			echo "\n";
	}
//}



print_r($aux);

for($i=0; $i<count($anos); $i++){
	$linhas[$i][0] = $anos[$i];
}

for($i=0; $i< count($anos); $i++){
	for($j=1, $k=0; $j<count($array_para_nomes)+3;$j=$j+5, $k++){
		$linhas[$i][$j] = " ";
	}
}



for($i=0; $i< sizeof($anos); $i++){
	for($j=2, $k=0; $j<=count($array_para_nomes)+3;$j=$j+5, $k++){
		$linhas[$i][$j] = strval($medias[$i][$k]);
	}
}

for($i=0; $i< sizeof($anos); $i++){
	for($j=3, $k=0; $j<=count($array_para_nomes)+3;$j=$j+5, $k++){
		$linhas[$i][$j] = " ";
	}
}

for($i=0; $i< sizeof($anos); $i++){
	for($j=4, $k=0; $j<=count($array_para_nomes)+3;$j=$j+5, $k++){
		$linhas[$i][$j] = strval($minimos[$i][$k]);
	}
}

for($i=0; $i< sizeof($anos); $i++){
	for($j=5, $k=0; $j<=count($array_para_nomes)+3;$j=$j+5, $k++){
		$linhas[$i][$j] = strval($maximos[$i][$k]);
	}
}

for($i=0; $i< sizeof($anos); $i++){
	for($j=1, $k=0; $j<=count($array_para_nomes)+3;$j=$j+5, $k++){
		$linhas[$i][$j] = " ";
	}
}

for($i=0; $i<count($anos); $i++){
	ksort($linhas[$i]);
}
foreach($linhas as $fields){
	fputcsv($file, $fields, ";", '"');
}

function mmmr($array){
	rsort($array); 
    $middle = round(count($array) / 2); 
    $total = $array[$middle-1];

    return $total;
}


	
	//print_r($linhas);
//echo " ".count($array_para_nomes);


//$primeiraLinha
//$segundaLinha