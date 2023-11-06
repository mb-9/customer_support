<?php

class Queryline extends Line {
    
    private DateTime $dateFrom;
    private ?Datetime $dateTo;

    /**
     * Get the value of dateFrom
     *
     * @return DateTime
     */
    public function getDateFrom(): DateTime {
        return $this->dateFrom;
    }

    /**
     * Set the value of dateFrom
     *
     * @param DateTime $dateFrom
     *
     * @return self
     */
    public function setDateFrom(DateTime $dateFrom): self {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    /**
     * Get the value of dateTo
     *
     * @return Datetime
     */
    public function getDateTo(): Datetime {
        return $this->dateTo;
    }

    /**
     * Set the value of dateTo
     *
     * @param Datetime $dateTo
     *
     * @return self
     */
    public function setDateTo(Datetime $dateTo): self {
        $this->dateTo = $dateTo;
        return $this;
    }

    /**
     * Set the value of serviceId 
     * Overriding setServiceId() - Queryline can have * as serviceId, asterisk replaced by 0
     *
     * @param int $serviceId
     * @throws Exception
     * @return self
     */
    public function setServiceId(int $serviceId): self {
       
        //serviceId can be zero - query for all serviceId    
        if(($serviceId < LineSettings::$serviceIdMin || $serviceId > LineSettings::$serviceIdMax) && $serviceId <> 0){
            throw new \Exception("Invalid value of variable serviceId");
        }
 
        $this->serviceId = $serviceId;

        return $this;
    }

    
    /**
     * Set the value of questionType
     * Overriding setQuestionType() - Queryline can have * as questionType, asterisk replaced by 0
     *
     * @param int $questionType
     * @throws Exception
     * @return self
     */
    public function setQuestionType(int $questionType): self {

        //questionType can be zero - query for all serviceId    
        if(($questionType < LineSettings::$questionTypeMin || $questionType > LineSettings::$questionTypeMax) && $questionType <> 0){
            throw new \Exception("Invalid value of variable questionType");
        }

        $this->questionType = $questionType;
        return $this;
    }


}