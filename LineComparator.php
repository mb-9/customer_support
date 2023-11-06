<?php 


class LineComparator{


    public static function matchAndGetWaitingTime(Queryline $queryline, Timeline $timeline) : int{


        if($queryline->getServiceId() <> $timeline->getServiceId() &&  $queryline->getServiceId() <> 0)
            return 0;

        if(!is_null($queryline->getServiceVariationId()) && $queryline->getServiceVariationId() <> $timeline->getServiceVariationId())
            return 0;

        if($queryline->getQuestionType() <> $timeline->getQuestionType() &&  $queryline->getQuestionType() <> 0)
            return 0;    

        if(!is_null($queryline->getQuestionCategory()) && $queryline->getQuestionCategory() <> $timeline->getQuestionCategory())
            return 0;    

        if(!is_null($queryline->getQuestionSubcategory()) && $queryline->getQuestionSubcategory() <> $timeline->getQuestionSubcategory())
            return 0;        

        if($queryline->getResponseType() <> $timeline->getResponseType())
            return 0;

        if($queryline->getDateFrom() > $timeline->getResponseDate())
            return 0;    

        if(!is_null($queryline->getDateTo())  && $queryline->getDateTo() <  $timeline->getResponseDate())
            return 0;
        
        return $timeline->getWaitingTime();

    }
    
}