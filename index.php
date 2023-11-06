<?php 

include 'LineParser.php';
include 'LineSettings.php';
include 'LineComparator.php';



$lines = file('input.txt');
$firstLine = true;

foreach($lines as $line) {
    
    //if it would be a big file, would need to change this to read by parts because of memory
    if($firstLine){
        $firstLine = false;
        continue;
    } 

    $lineObj  = LineParser::createLineObject($line);
    
    var_dump($lineObj);

}











