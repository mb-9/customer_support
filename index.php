<?php 

include 'LineParser.php';
include 'LineSettings.php';
include 'LineComparator.php';

$lines      = file('input.txt');
$firstLine  = true;

$arrLineObjects = [];
$lineCount      = 0;

foreach($lines as $line) {

    //if it would be a big file, would need to change this to read by parts because of memory
    if($firstLine){
        $firstLine = false;
        continue;
    } 

    try{

        $lineObj  = LineParser::createLineObject($line);
        
        if($lineObj instanceof Timeline){
            $arrLineObjects[] = $lineObj;
        }else{
            echo LineComparator::matchAllAndGetWaitingTime($lineObj, $arrLineObjects );
        }

    }catch(\Exception $ex) {
        echo "Invalid line number ". $lineCount;
    }

    $lineCount++;
    
    //var_dump($lineObj);

}











