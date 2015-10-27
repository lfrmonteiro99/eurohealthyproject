<?php

session_start();
header('Content-Type: text/plain');

//$ficheiro_para_report = $_SESSION['file_para_report'];
$ficheiro_para_report = $_SESSION['csv'];

$report1 = 'uploads/' . $_SESSION['regiao'] . '/report1.csv';

$file = fopen('uploads/' . $_SESSION['regiao'] . '/report1.csv', 'w');

$ficheiro = file($report1,  FILE_IGNORE_NEW_LINES);

$anos = array(); // anos preenchidos
$to_csv = array();

$rows1 = array();

foreach(file($ficheiro_para_report, FILE_IGNORE_NEW_LINES) as $line){
	
	$rows1[] = str_getcsv($line, ';');
}

$rows = file($ficheiro_para_report, FILE_IGNORE_NEW_LINES);
$array_anos_todos = array();
//$anos[0] = $rows1[1][3];
for($i=1, $j=1; $i<count($rows1);$j++, $i++){
	array_push($array_anos_todos, $rows1[$i][3]);
	if(!in_array($rows1[$i][3], $anos)){
		array_push($anos, $rows1[$i][3]);
	}
}
$array_para_nome = array();
$count = array_count_values($array_anos_todos);

$file_nome_indicadores = file('nomecompletoindicadores.txt', FILE_IGNORE_NEW_LINES);

$array_para_nome = explode(';', $file_nome_indicadores[0]);

$csvline = 0;
$csvcolumn = 0;
sort($anos);

echo count($array_para_nome) . "\n";
echo count($rows1) . "\n";


$numIndicadores = 0;
$aux = array();
for($j=0 ; $j<count($array_para_nome); $j++){
	for($i=1,$k=0; $i<count($rows1); $k++, $i++){
		$aux[$k] = $rows1[$i][$j];
	}
	if(check($aux) > 0){
		
		$numIndicadores++;
	}
		
}

/*$c=0;
$k=0;
$v=0;
$aux01=array();
$medianas_para_2001 = array();
$cheios2001 = array();
$vazios2001 = array();

for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2001); $i++){
		//echo $medianas2001[$i][$j] . " ";
		//echo " k= ". $k . " ";
		
			$aux01[$k++] = $medianas2001[$i][$j];
			
	}
			$total=mmmr($aux01);
			$cheios2001[$c] = check($aux01);
			$vazios2001[$v++] = count($aux01)-check($aux01);
			$medianas_para_2001[$c++] = $total;
			
			$k=0;
	
}*/


$header=array(array());
$header[$csvline][0] = 'Metropolitan Area';
$header[$csvline++][1] = $_SESSION['regiao'];
$header[$csvline][0] = 'Date';
$header[$csvline++][1] = date('F jS\, Y');
$header[$csvline][0] = 'Who Made The Upload';
$header[$csvline++][1] = $_SESSION['name'];
$header[$csvline][0] = 'Number of Indicators With Data';
$header[$csvline++][1] = $numIndicadores;

$header[$csvline++][0] = " ";

$count=array(array());
$array_para_nomes = array();


$medias = array(array());
$maximos = array(array());
$minimos = array(array());
$medianas2001 = array(array());
$medianas2002 = array(array());
$medianas2003 = array(array());
$medianas2004 = array(array());
$medianas2005 = array(array());
$medianas2006 = array(array());
$medianas2007 = array(array());
$medianas2008 = array(array());
$medianas2009 = array(array());
$medianas2010 = array(array());
$medianas2011 = array(array());
$medianas2012 = array(array());
$medianas2013 = array(array());
$medianas2014 = array(array());
$medianas2015 = array(array());

for($i=0; $i<count($anos); $i++){
	for($j=0; $j<count($array_para_nome); $j++){
		$medias[$i][$j] = 0;
		$maximos[$i][$j] = 0;
		$minimos[$i][$j] = 1000;
	}
}
//print_r($rows1);
$l01=0;$l02=0;$l03=0;$l04=0;$l05=0;$l06=0;$l07=0;$l08=0;$l09=0;$l10=0;$l11=0;$l12=0;$l13=0;$l15=0;$l15=0;
	for($i=1; $i<count($rows1)+1; $i++){

		switch($rows1[$i][3]){
			case 2001:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
				
					$medianas2001[$l01][$k] = $rows1[$i][$j];
					//echo $rows1[$i][$j] . " "; 
				//}

					if($rows1[$i][$j] > $maximos[0][$k]){
						$maximos[0][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[0][$k] && $rows1[$i][$j] !== ""){
						$minimos[0][$k] = $rows1[$i][$j];
					}

					$medias[0][$k] += floatval($rows1[$i][$j]);
				}

				$l01++;
				break;
				
			case 2002:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					

						$medianas2002[$l02][$k] = $rows1[$i][$j];
					//}
					if($rows1[$i][$j] > $maximos[1][$k]){
						$maximos[1][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[1][$k] && $rows1[$i][$j] !== ""){
						$minimos[1][$k] = $rows1[$i][$j];
					}
					$medias[1][$k] += floatval($rows1[$i][$j]);
				}
				$l02++;
				break;
				
			case 2003:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					$medianas2003[$l03][$k] = $rows1[$i][$j];

					if($rows1[$i][$j] > $maximos[2][$k]){
						$maximos[2][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[2][$k] && $rows1[$i][$j] !== ""){
						$minimos[2][$k] = $rows1[$i][$j];
					}
					$medias[2][$k] += floatval($rows1[$i][$j]);
				}
				$l03++;
				break;
				
			case 2004:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					$medianas2004[$l04][$k] = $rows1[$i][$j];

					if($rows1[$i][$j] > $maximos[3][$k]){
						$maximos[3][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[3][$k] && $rows1[$i][$j] !== ""){
						$minimos[3][$k] = $rows1[$i][$j];
					}
					$medias[3][$k] += floatval($rows1[$i][$j]);
				}
				$l04++;
				break;
				
			case 2005:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					$medianas2005[$l05][$k] = $rows1[$i][$j];

					if($rows1[$i][$j] > $maximos[4][$k]){
						$maximos[4][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[4][$k] && $rows1[$i][$j] !== ""){
						$minimos[4][$k] = $rows1[$i][$j];
					}
					$medias[4][$k] += floatval($rows1[$i][$j]);
				}
				$l05++;
				break;
				
			case 2006:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					$medianas2006[$l06][$k] = $rows1[$i][$j];

					if($rows1[$i][$j] > $maximos[5][$k]){
						$maximos[5][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[5][$k] && $rows1[$i][$j] !== ""){
						$minimos[5][$k] = $rows1[$i][$j];
					}
					$medias[5][$k] += floatval($rows1[$i][$j]);
				}
				$l06++;
				break;
				
			case 2007:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					$medianas2007[$l07][$k] = $rows1[$i][$j];
					
					if($rows1[$i][$j] > $maximos[6][$k]){
						$maximos[6][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[6][$k] && $rows1[$i][$j] !== ""){
						$minimos[6][$k] = $rows1[$i][$j];
					}
					$medias[6][$k] += floatval($rows1[$i][$j]);
				}
				$l07++;
				break;
				
			case 2008:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					$medianas2008[$l08][$k] = $rows1[$i][$j];

					if($rows1[$i][$j] > $maximos[7][$k]){
						$maximos[7][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[7][$k] && $rows1[$i][$j] !== ""){
						$minimos[7][$k] = $rows1[$i][$j];
					}
					
					$medias[7][$k] += floatval($rows1[$i][$j]);
				}
				$l08++;
				break;
				
			case 2009:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					$medianas2009[$l09][$k] = $rows1[$i][$j];

					if($rows1[$i][$j] > $maximos[8][$k]){
						$maximos[8][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[8][$k] && $rows1[$i][$j] !== ""){
						$minimos[8][$k] = $rows1[$i][$j];
					}
					$medias[8][$k] += floatval($rows1[$i][$j]);
				}
				$l09++;
				break;
				
			case 2010:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					$medianas2010[$l10][$k] = $rows1[$i][$j];
					if($rows1[$i][$j] > $maximos[9][$k]){
						$maximos[9][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[9][$k] && $rows1[$i][$j] !== ""){
						$minimos[9][$k] = $rows1[$i][$j];
					}
					$medias[9][$k] += floatval($rows1[$i][$j]);
				}
				$l10++;
				break;
				
			case 2011:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					$medianas2011[$l11][$k] = $rows1[$i][$j];

					if($rows1[$i][$j] > $maximos[10][$k]){
						$maximos[10][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[10][$k] && $rows1[$i][$j] !== ""){
						$minimos[10][$k] = $rows1[$i][$j];
					}
					$medias[10][$k] += floatval($rows1[$i][$j]);
				}
				$l11++;
				break;
				
			case 2012:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					$medianas2012[$l12][$k] = $rows1[$i][$j];

					if($rows1[$i][$j] > $maximos[11][$k]){
						$maximos[11][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[11][$k] && $rows1[$i][$j] !== ""){
						$minimos[11][$k] = $rows1[$i][$j];
					}
					$medias[11][$k] += floatval($rows1[$i][$j]);
				}
				$l12++;
				break;
				
			case 2013:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					$medianas2013[$l13][$k] = $rows1[$i][$j];
					if($rows1[$i][$j] > $maximos[12][$k]){
						$maximos[12][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[12][$k] && $rows1[$i][$j] !== ""){
						$minimos[12][$k] = $rows1[$i][$j];
					}
					$medias[12][$k] += floatval($rows1[$i][$j]);
				}
				$l13++;
				break;
				
			case 2014:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					$medianas2014[$l14][$k] = $rows1[$i][$j];

					if($rows1[$i][$j] > $maximos[13][$k]){
						$maximos[13][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[13][$k] && $rows1[$i][$j] !== ""){
						$minimos[13][$k] = $rows1[$i][$j];
					}
					$medias[13][$k] += floatval($rows1[$i][$j]);
				}
				$l14++;
				break;
				
			case 2015:
				for($j=4, $k=0; $j<count($array_para_nome)+4; $j++, $k++){
					$medianas2015[$l15][$k] = $rows1[$i][$j];

					if($rows1[$i][$j] > $maximos[14][$k]){
						$maximos[14][$k] = $rows1[$i][$j];
					}

					if($rows1[$i][$j] < $minimos[14][$k] && $rows1[$i][$j] !== ""){
						$minimos[14][$k] = $rows1[$i][$j];
					}
					$medias[14][$k] += floatval($rows1[$i][$j]);
				}
				$l15++;
				break;
		}
}


$c=0;
$k=0;
$v=0;
$aux01=array();
$medianas_para_2001 = array();
$cheios2001 = array();
$vazios2001 = array();

for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2001); $i++){
		//echo $medianas2001[$i][$j] . " ";
		//echo " k= ". $k . " ";
		
			$aux01[$k++] = $medianas2001[$i][$j];
			
	}
			$total=mmmr($aux01);
			$cheios2001[$c] = check($aux01);
			$vazios2001[$v++] = count($aux01)-check($aux01);
			$medianas_para_2001[$c++] = $total;
			
			$k=0;
	
}
$c=0;
$k=0;
$aux02=array();
$medianas_para_2002 = array();
$cheios2002 = array();
$v=0;
$vazios2002 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2002); $i++){
		//echo $medianas2001[$i][$j] . " ";
		//echo " k= ". $k . " ";
		$aux02[$k++] = $medianas2002[$i][$j];
		
	}
			//echo "aux:\n";
			//print_r($aux);
			$total=mmmr($aux02);
			$cheios2002[$c] = check($aux02);
			$vazios2002[$v++] = count($aux02)-check($aux02);
			$medianas_para_2002[$c++] = $total;
			
			$k=0;
	
}

$c=0;
$k=0;
$aux03=array();
$medianas_para_2003 = array();
$cheios2003 = array();
$v=0;
$vazios2003 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2003); $i++){
		//echo $medianas2001[$i][$j] . " ";
		//echo " k= ". $k . " ";
		$aux03[$k++] = $medianas2003[$i][$j];
		
	}
			//echo "aux:\n";
			//print_r($aux);
			$total=mmmr($aux03);
			$cheios2003[$c] = check($aux03);
			$vazios2003[$v++] = count($aux03)-check($aux03);
			$medianas_para_2003[$c++] = $total;
			
			$k=0;
	
}

$c=0;
$k=0;
$aux04=array();
$medianas_para_2004 = array();
$cheios2004 = array();
$v=0;
$vazios2004 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2004); $i++){
		//echo $medianas2001[$i][$j] . " ";
		//echo " k= ". $k . " ";
		$aux04[$k++] = $medianas2004[$i][$j];
		
	}
			//echo "aux:\n";
			//print_r($aux);
			$total=mmmr($aux04); 
			$cheios2004[$c] =  check($aux04);
			$vazios2004[$v++] = count($aux04)-check($aux04);
			$medianas_para_2004[$c++] = $total;
			
			$k=0;
	
}

$c=0;
$k=0;
$aux05=array();
$medianas_para_2005 = array();
$cheios2005 = array();
$v=0;
$vazios2005 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2005); $i++){
		//echo $medianas2001[$i][$j] . " ";
		//echo " k= ". $k . " ";
		$aux05[$k++] = $medianas2005[$i][$j];
		
	}
			//echo "aux:\n";
			//print_r($aux);
			$total=mmmr($aux05); 
			$cheios2005[$c] = check($aux05);
			$vazios2005[$v++] = count($aux05)-check($aux05);
			$medianas_para_2005[$c++] = $total;
			
			$k=0;
	
}

$c=0;
$k=0;
$aux06 = array();
$medianas_para_2006 = array();
$cheios2006 = array();
$v=0;
$vazios2006 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2006); $i++){

		$aux06[$k++] = $medianas2006[$i][$j];

	}
			$total=mmmr($aux06); 
			$cheios2006[$c] = check($aux06);
			$vazios2006[$v++] = count($aux06)-check($aux06);
			$medianas_para_2006[$c++] = $total;
			
			$k=0;
	
}
//print_r($medianas2006);

$c=0;
$k=0;
$aux07=array();
$medianas_para_2007 = array();
$cheios2007 = array();
$v=0;
$vazios2007 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2007); $i++){

		$aux07[$k++] = $medianas2007[$i][$j];
		
	}
			$total=mmmr($aux07); 
			$cheios2007[$c] = check($aux07);
			$vazios2007[$v++] = count($aux07)-check($aux07);
			$medianas_para_2007[$c++] = $total;
			
			$k=0;
	
}

$c=0;
$k=0;
$aux08=array();
$medianas_para_2008 = array();
$cheios2008 = array();
$v=0;
$vazios2008 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2008); $i++){
		//echo $medianas2008[$i][$j] . " ";
		//echo " k= ". $k . " ";
		$aux08[$k++] = $medianas2008[$i][$j];
		
	}
			//echo "aux:\n";
			//print_r($aux);
			$total=mmmr($aux08); 
			$cheios2008[$c] = check($aux08);
			$vazios2008[$v++] = count($aux08)-check($aux08);
			$medianas_para_2008[$c++] = $total;
			
			$k=0;
	
}

$c=0;
$k=0;
$aux09=array();
$medianas_para_2009 = array();
$cheios2009 = array();
$v=0;
$vazios2009 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2009); $i++){
		//echo $medianas2009[$i][$j] . " ";
		//echo " k= ". $k . " ";
		$aux09[$k++] = $medianas2009[$i][$j];
		
	}
			//echo "aux:\n";
			//print_r($aux);
			$total=mmmr($aux09); 
			$cheios2009[$c] = check($aux08);
			$vazios2009[$v++] = count($aux09)-check($aux09);
			$medianas_para_2009[$c++] = $total;
			
			$k=0;
	
}

$c=0;
$k=0;
$aux10=array();
$medianas_para_2010 = array();
$cheios2010 = array();
$v=0;
$vazios2010 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2010); $i++){
		//echo $medianas2001[$i][$j] . " ";
		//echo " k= ". $k . " ";
		$cheios2010[$c] = check($aux10);
		$aux10[$k++] = $medianas2010[$i][$j];
		
	}
			//echo "aux:\n";
			//print_r($aux);
			$total=mmmr($aux10); 
			$vazios2010[$v++] = count($aux10)-check($aux10);
			$medianas_para_2010[$c++] = $total;
			
			$k=0;
	
}

$c=0;
$k=0;
$aux11=array();
$medianas_para_2011 = array();
$cheios2011 = array();
$v=0;
$vazios2011 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2011); $i++){
		//echo $medianas2001[$i][$j] . " ";
		//echo " k= ". $k . " ";
		$aux11[$k++] = $medianas2011[$i][$j];
	}
			//echo "aux:\n";
			//print_r($aux);
			$total=mmmr($aux11); 
			$cheios2011[$c] = check($aux11);
			$vazios2011[$v++] = count($aux11)-check($aux11);
			$medianas_para_2011[$c++] = $total;
			
			$k=0;
	
}

$c=0;
$k=0;
$aux12=array();
$medianas_para_2012 = array();
$cheios2012 = array();
$v=0;
$vazios2012 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2012); $i++){
		//echo $medianas2001[$i][$j] . " ";
		//echo " k= ". $k . " ";
		$aux12[$k++] = $medianas2012[$i][$j];
		
	}
			//echo "aux:\n";
			//print_r($aux);
			$total=mmmr($aux12); 
			$cheios2012[$c] = check($aux12);
			$vazios2012[$v++] = count($aux12)-check($aux12);
			$medianas_para_2012[$c++] = $total;
			
			$k=0;
	
}

$c=0;
$k=0;
$aux13=array();
$medianas_para_2013 = array();
$cheios2013 = array();
$v=0;
$vazios2013 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2013); $i++){
		//echo $medianas2001[$i][$j] . " ";
		//echo " k= ". $k . " ";
		$aux13[$k++] = $medianas2013[$i][$j];
		
	}
			//echo "aux:\n";
			//print_r($aux);
			$total=mmmr($aux13); 
			$cheios2013[$c] = check($aux13);
			$vazios2013[$v++] = count($aux13)-check($aux13);
			$medianas_para_2013[$c++] = $total;
			
			$k=0;
	
}

$c=0;
$k=0;
$aux14=array();
$medianas_para_2014 = array();
$cheios2014 = array();
$v=0;
$vazios2014 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2014); $i++){
		//echo $medianas2001[$i][$j] . " ";
		//echo " k= ". $k . " ";
		$aux14[$k++] = $medianas2014[$i][$j];
		
	}
			//echo "aux:\n";
			//print_r($aux);
			$total=mmmr($aux14); 
			$cheios2014[$c] = check($aux14);
			$vazios2014[$v++] = count($aux14)-check($aux14);
			$medianas_para_2014[$c++] = $total;
			
			$k=0;
	
}

$c=0;
$k=0;
$aux15=array();
$medianas_para_2015 = array();
$cheios2015 = array();
$v=0;
$vazios2015 = array();
for($j=0, $k=0; $j<count($array_para_nome); $j++){
	for($i=0; $i<count($medianas2015); $i++){
		//echo $medianas2001[$i][$j] . " ";
		//echo " k= ". $k . " ";
		$aux15[$k++] = $medianas2015[$i][$j];
		
	}
			//echo "aux:\n";
			//print_r($aux);
			$total=mmmr($aux15); 
			$cheios2015[$c] = check($aux15);
			$vazios2015[$v++] = count($aux15)-check($aux15);
			$medianas_para_2015[$c++] = $total;
			
			$k=0;
	
}

	//$total = mmmr($medianas2001[0]);


	for($j=0; $j<count($array_para_nome); $j++){
		
		
		$medias[0][$j] = substr($medias[0][$j]/count($medias[0]), 0, 6);
		$medias[1][$j] = substr($medias[1][$j]/count($medias[1]),0,6);
		$medias[2][$j] = substr($medias[2][$j]/count($medias[2]),0,6);
		$medias[3][$j] = substr($medias[3][$j]/count($medias[3]),0,6);
		$medias[4][$j] = substr($medias[4][$j]/count($medias[4]),0,6);
		$medias[5][$j] = substr($medias[5][$j]/count($medias[5]),0,6);
		$medias[6][$j] = substr($medias[6][$j]/count($medias[6]),0,6);
		$medias[7][$j] = substr($medias[7][$j]/count($medias[7]),0,6);
		$medias[8][$j] = substr($medias[8][$j]/count($medias[8]),0,6);
		$medias[9][$j] = substr($medias[9][$j]/count($medias[9]),0,6);
		$medias[10][$j] = substr($medias[10][$j]/count($medias[10]),0,6);
		$medias[11][$j] = substr($medias[11][$j]/count($medias[11]),0,6);
		$medias[12][$j] = substr($medias[12][$j]/count($medias[12]),0,6);
		$medias[13][$j] = substr($medias[13][$j]/count($medias[13]),0,6);
		$medias[14][$j] = substr($medias[14][$j]/count($medias[14]),0,6);
	}



for($i=0; $i<count($array_para_nome); $i++){
	$header[$csvline++][0] = $array_para_nome[$i];
	$header[$csvline][0] = "";
	$header[$csvline][1] = "Number of cells with";
	$header[$csvline][2] = "Number of cells without";
	$header[$csvline][3] = "minimum";
	$header[$csvline][4] = "maximum";
	$header[$csvline][5] = "average";
	$header[$csvline++][6] = "median";

	for($j=0; $j<count($anos); $j++){
		
		
		$header[$csvline][0] = $anos[$j];

		switch($j){
			case 0: $header[$csvline][1] = $cheios2001[$i];

			break;
			case 1: $header[$csvline][1] = $cheios2002[$i];
			break;
			case 2: $header[$csvline][1] = $cheios2003[$i];
			break;
			case 3: $header[$csvline][1] = $cheios2004[$i];
			break;
			case 4: $header[$csvline][1] = $cheios2005[$i];
			break;
			case 5: $header[$csvline][1] = $cheios2006[$i];
			break;
			case 6: $header[$csvline][1] = $cheios2007[$i];
			break;
			case 7: $header[$csvline][1] = $cheios2008[$i];
			break;
			case 8: $header[$csvline][1] = $cheios2009[$i];
			break;
			case 9: $header[$csvline][1] = $cheios2010[$i];
			break;
			case 10: $header[$csvline][1] = $cheios2011[$i];
			break;
			case 11: $header[$csvline][1] = $cheios2012[$i];
			break;
			case 12: $header[$csvline][1] = $cheios2013[$i];
			break;
			case 13: $header[$csvline][1] = $cheios2014[$i];
			break;
			case 14: $header[$csvline][1] = $cheios2015[$i];
			break;
		}

		switch($j){
			case 0: 
					$header[$csvline][2] = $vazios2001[$i];

			break;
			case 1: 
					$header[$csvline][2] = $vazios2002[$i];
			break;
			case 2: 
					$header[$csvline][2] = $vazios2003[$i];
			break;
			case 3: 
					$header[$csvline][2] = $vazios2004[$i];
			break;
			case 4: 
					$header[$csvline][2] = $vazios2005[$i];
			break;
			case 5:
					$header[$csvline][2] = $vazios2006[$i];
			break;
			case 6: 
					$header[$csvline][2] = $vazios2007[$i];
			break;
			case 7:
					$header[$csvline][2] = $vazios2008[$i];
			break;
			case 8:
					$header[$csvline][2] = $vazios2009[$i];
			break;
			case 9: 
					$header[$csvline][2] = $vazios2010[$i];
			break;
			case 10: 
					 $header[$csvline][2] = $vazios2011[$i];
					
			break;
			case 11: 
					 $header[$csvline][2] = $vazios2012[$i];
					 
			break;
			case 12: 
					 $header[$csvline][2] = $vazios2013[$i];
					 
			break;
			case 13: 
					 $header[$csvline][2] = $vazios2014[$i];
					
			break;
			case 14: 
					 $header[$csvline][2] = $vazios2015[$i];
			break;
		}
		$header[$csvline][3] = $minimos[$j][$i];
		$header[$csvline][4] = $maximos[$j][$i];
		$header[$csvline][5] = $medias[$j][$i];
		switch($j){
			case 0: 
					$header[$csvline++][6] = $medianas_para_2001[$i];

			break;
			case 1: 
					$header[$csvline++][6] = $medianas_para_2002[$i];
			break;
			case 2: 
					$header[$csvline++][6] = $medianas_para_2003[$i];
			break;
			case 3: 
					$header[$csvline++][6] = $medianas_para_2004[$i];
			break;
			case 4: 
					$header[$csvline++][6] = $medianas_para_2005[$i];
			break;
			case 5: 
					$header[$csvline++][6] = $medianas_para_2006[$i];
			break;
			case 6: 
					$header[$csvline++][6] = $medianas_para_2007[$i];
			break;
			case 7: 
					$header[$csvline++][6] = $medianas_para_2008[$i];
			break;
			case 8: 
					$header[$csvline++][6] = $medianas_para_2009[$i];
			break;
			case 9: 
					$header[$csvline++][6] = $medianas_para_2010[$i];
			break;
			case 10: 
					 $header[$csvline++][6] = $medianas_para_2011[$i];
			break;
			case 11: 
					 $header[$csvline++][6] = $medianas_para_2012[$i];
			break;
			case 12: 
					 $header[$csvline++][6] = $medianas_para_2013[$i];
			break;
			case 13: 
					 $header[$csvline++][6] = $medianas_para_2014[$i];
			break;
			case 14: 
					 $header[$csvline++][6] = $medianas_para_2015[$i];
			break;
		}
	}
	$header[$csvline++][0] = "";
}



foreach($header as $fields){
	fputcsv($file, $fields, ";", '"');
}

$_SESSION['alfanumerico'] = 1;
$_SESSION['report'] = 'uploads/' . $_SESSION['regiao'] . '/report1.csv';
echo "isto foi feito";
header("Location: index.php");
     



function countValue($array, $num){
	$count=0;
	echo " $num ";
	for($i=0; $i<count($array); $i++){
		if($array[$i][3] === $num){
			$count++;
		}
	}
	return $count;
}

function mmmr($array){

	rsort($array);
	//print_r($array);
    $middle = round(check($array) / 2);
    

    if(check($array)%2===0){
    	//echo "tamanho2= " . check($array) . "\n";
    	$total = $array[$middle];
    	$total1 = $array[$middle-1];
    	$median = ($total+$total1)/2;
    	return $median;
    }else{
    	//echo "tamanho1= " . check($array) . "\n";
    	$total1= $array[$middle-1];
    	return $total1;
    }


    
}

function check($array){
	$cont=0;

	for($i=0; $i<count($array); $i++){
		if($array[$i]!=""){
			$cont++;
		}
	}


	return $cont;
}