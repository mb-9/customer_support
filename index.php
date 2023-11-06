<?php 

include 'LineParser.php';
include 'LineSettings.php';
include 'LineComparator.php';
include 'LineReaderFile.php';

$fileName       = "input.txt";

$lineReaderFile = new LineReaderFile();
$lineReaderFile->setFileName($fileName);
$arrOutput = $lineReaderFile->process();

foreach($arrOutput as $output){
    echo $output."<br/>";
}

