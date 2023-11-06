<?php 


class LineComparator{

    /**
     * Need to get all timelines that are matching the queryline
     * 
     * @param Queryline $queryline
     * @param $arrTimeline
     * @return string
     */
    public static function matchAllAndGetWaitingTime(Queryline $queryline, $arrTimeline) : string{

        $waitingTime                = 0;
        $countOfMatchingTimelines   = 0;

        foreach($arrTimeline as $timeline){
            
            $result = LineComparator::matchAndGetWaitingTime($queryline, $timeline);
            if($result <> -1){
                $countOfMatchingTimelines++;
                $waitingTime += $result;
            }

        }

        if($waitingTime == 0)
            return "-";

        return $waitingTime/$countOfMatchingTimelines;
    }

    /**
     * @param Queryline $queryline
     * @param Timeline $timeline
     * @return int
     */
    public static function matchAndGetWaitingTime(Queryline $queryline, Timeline $timeline) : int{


        if($queryline->getServiceId() <> $timeline->getServiceId() &&  $queryline->getServiceId() <> 0)
            return -1;

        if(!is_null($queryline->getServiceVariationId()) && $queryline->getServiceVariationId() <> $timeline->getServiceVariationId())
            return -1;

        if($queryline->getQuestionType() <> $timeline->getQuestionType() &&  $queryline->getQuestionType() <> 0)
            return -1;    

        if(!is_null($queryline->getQuestionCategory()) && $queryline->getQuestionCategory() <> $timeline->getQuestionCategory())
            return -1;    

        if(!is_null($queryline->getQuestionSubcategory()) && $queryline->getQuestionSubcategory() <> $timeline->getQuestionSubcategory())
            return -1;        

        if($queryline->getResponseType() <> $timeline->getResponseType())
            return -1;

        if($queryline->getDateFrom() > $timeline->getResponseDate())
            return -1;    

        if(!is_null($queryline->getDateTo())  && $queryline->getDateTo() <  $timeline->getResponseDate())
            return -1;
        
        return $timeline->getWaitingTime();

    }
    
}