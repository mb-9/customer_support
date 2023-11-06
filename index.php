<?php 

include 'LineParser.php';
include 'LineSettings.php';
include 'LineComparator.php';
include 'LineProcessorFile.php';

$fileName       = "input.txt";

$lineProcessorFile = new LineProcessorFile();
$lineProcessorFile->setFileName($fileName);
$arrOutput = $lineProcessorFile->process();

foreach($arrOutput as $output){
    echo $output."<br/>";
}

