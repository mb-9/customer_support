<?php 

include "LineProcessor.php";

class LineProcessorFile implements LineProcessor {
    
    private string $fileName;

    /**
     * @return array of results - average waiting times of the queries, or "-"
     */
    public function process() {

        $arrResult = [];
       
        $lines      = file($this->getFileName());
        $firstLine  = true;

        $arrLineObjects = [];
        $lineCount      = 0;

        foreach($lines as $line) {

            //if it would be a big file, would need to change this to read by parts 
            if($firstLine){
                $firstLine = false;
                continue;
            } 

            try{

                $lineObj  = LineParser::createLineObject($line);
                
                if($lineObj instanceof Timeline){
                    $arrLineObjects[] = $lineObj;
                }else{
                    $arrResult[]  = LineComparator::matchAllAndGetWaitingTime($lineObj, $arrLineObjects );
                }

            }catch(\Exception $ex) {
                //TODO: logger
                echo "Invalid line number ". $lineCount;
            }

            $lineCount++;
            
        }//end foreach 

        return $arrResult;
    }

    /**
     * Set the value of fileName
     *
     * @param string $fileName
     *
     * @return self
     */
    public function setFileName(string $fileName): self {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * Get the value of fileName
     *
     * @return string
     */
    public function getFileName(): string {
        return $this->fileName;
    }
}