<?php 
function mmmr($array, $output = 'mean'){ 
    if(!is_array($array)){ 
        return FALSE; 
    }else{ 
        switch($output){ 
            case 'mean': 
                $count = count($array); 
                $sum = array_sum($array); 
                $total = $sum / $count; 
            break; 
            case 'median': 
                rsort($array); 
                $middle = round(count($array) / 2); 
                $total = $array[$middle-1]; 
            break; 
            case 'mode': 
                $v = array_count_values($array); 
                arsort($v); 
                foreach($v as $k => $v){$total = $k; break;} 
            break; 
            case 'range': 
                sort($array); 
                $sml = $array[0]; 
                rsort($array); 
                $lrg = $array[0]; 
                $total = $lrg - $sml; 
            break; 
        } 
        return $total; 
    } 
} 

$arr = array(12,33,23,4,20,124,4,2); 

// Mean = The average of all the numbers 
echo 'Mean: '.mmmr($arr).'<br>'; 
echo 'Mean: '.mmmr($arr, 'mean').'<br>'; 

// Median = The middle value after the numbers are sorted smallest to largest 
echo 'Median: '.mmmr($arr, 'median').'<br>'; 

// Mode = The number that is in the array the most times 
echo 'Mode: '.mmmr($arr, 'mode').'<br>'; 

// Range = The difference between the highest number and the lowest number 
echo 'Range: '.mmmr($arr, 'range'); 
?>