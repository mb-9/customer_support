<?php 

include 'Line.php';
include 'Timeline.php';
include 'Queryline.php';


class LineParser {

    /**
     * @param String $strLine
     * @return Line
     * @throws Exception
     */
    public static function createLineObject(String $strLine) : Line {
     
        $countSpaces = substr_count($strLine, " ");
        if($countSpaces == 0){
            throw new \Exception("Error parsing the string");
        }

        $arrValues = explode(" ", $strLine);
        
        if($arrValues[0] == "C" && $countSpaces == 5){
            $line = new Timeline();
            $line->setWaitingTime($arrValues[5]);
            $line->setResponseDate(new DateTime($arrValues[4]));

        }elseif($arrValues[0] == "D" && $countSpaces == 4){
            $line = new Queryline();
            $strDate = $arrValues[4];
            LineParser::parseAndSetDate($strDate, $line);

        }else{
            throw new \Exception("Unknown type of line");
        }

        $line->setResponseType($arrValues[3]);

        $service    = $arrValues[1]; 
        LineParser::parseAndSetService($service, $line);

        $question   = $arrValues[2];
        LineParser::parseAndSetQuestion($question, $line);
      
        return $line;
             
    }

    /**
     * Format of the date can be one date 01.01.2012 or range of dates 01.01.2012-01.12.2012, parsing both
     * @param $strDate
     * @param $line
     * @throws \Exception 
     * 
     */
    private static function parseAndSetDate($strDate, $line){

        $countDash = substr_count($strDate, "-");
        if($countDash == 1){
            $arrDates = explode("-", $strDate);
            $line->setDateFrom(new DateTime($arrDates[0]));
            $line->setDateTo(new DateTime($arrDates[1]));

        }else if($countDash == 0){
            $line->setDateFrom(new DateTime($strDate));
        }

    }

    /**
     * 
     * Format of the service can be "1" or "1.2", parsing all options
     * @param $strService
     * @param $line
     * @throws Exception
     */
    private static function parseAndSetService($strService, $line){
        $countDot   = substr_count($strService, ".");

        if($countDot == 0){
            $line->setServiceId(str_replace("*", "0", $strService));
        }else if($countDot == 1){
            $arrService = explode(".", $strService);
            $line->setServiceId($arrService[0]);
            $line->setServiceVariationId($arrService[1]);
        }else {
            throw new \Exception("Invalid service");
        }
    }

    /**
     * Format of the question can be "1" or "1.2" or "1.2.3", parsing all options
     * @param $strQuestion
     * @param $line
     * @throws Exception
     */
    private static function parseAndSetQuestion($strQuestion, $line){
        $countDot   = substr_count($strQuestion, ".");

        if($countDot == 0){

            $line->setQuestionType(str_replace("*", "0", $strQuestion));

        }else if($countDot == 1){

            $arrQuestion = explode(".", $strQuestion);
            $line->setQuestionType($arrQuestion[0]);
            $line->setQuestionCategory($arrQuestion[1]);

        }else if($countDot == 2){

            $arrQuestion = explode(".", $strQuestion);
            $line->setQuestionType($arrQuestion[0]);
            $line->setQuestionCategory($arrQuestion[1]);
            $line->setQuestionSubcategory($arrQuestion[2]);

        }else {
            throw new \Exception("Invalid question");
        }
        
    }
}