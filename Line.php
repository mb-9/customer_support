<?php 

class Line {

    protected int    $serviceId;
    protected ?int   $serviceVariationId  = NULL;
    protected int    $questionType;
    protected ?int   $questionCategory    = NULL;
    protected ?int   $questionSubcategory  = NULL;
    protected string $responseType;

    public static $responseTypeFirstAnswer  = "P";
    public static $responseTypeNextAnswer   = "N";


    /**
     * Get the value of serviceId
     *
     * @return int
     */
    public function getServiceId(): int {
        return $this->serviceId;
    }

    /**
     * Set the value of serviceId
     *
     * @param int $serviceId
     * @return self
     * @throws Exception
     */
    public function setServiceId(int $serviceId): self {
       
           
        if($serviceId < LineSettings::$serviceIdMin || $serviceId > LineSettings::$serviceIdMax){
            throw new \Exception("Invalid value of variable serviceId");
        }
 
        $this->serviceId = $serviceId;

        return $this;
    }

    /**
     * Get the value of serviceVariationId
     *
     * @return int
     */
    public function getServiceVariationId(): ?int {
        return $this->serviceVariationId;
    }

    /**
     * Set the value of serviceVariationId
     *
     * @param int $serviceVariationId
     * @throws \Exception 
     * @return self
     */
    public function setServiceVariationId(int $serviceVariationId): self {
        
        if($serviceVariationId < LineSettings::$serviceVariationIdMin || $serviceVariationId > LineSettings::$serviceVariationIdMax){
            throw new \Exception("Invalid value of variable serviceVariationId");
        }

        $this->serviceVariationId = $serviceVariationId;

        return $this;
    }

    /**
     * Get the value of questionType
     *
     * @return int
     */
    public function getQuestionType(): int {
        return $this->questionType;
    }

    /**
     * Set the value of questionType
     *
     * @param int $questionType
     * @throws \Exception 
     * @return self
     */
    public function setQuestionType(int $questionType): self {

        if($questionType < LineSettings::$questionTypeMin || $questionType > LineSettings::$questionTypeMax){
            throw new \Exception("Invalid value of variable questionType");
        }

        $this->questionType = $questionType;
        return $this;
    }
    

    /**
     * Get the value of questionCategory
     *
     * @return ?int
     */
    public function getQuestionCategory(): ?int {
        return $this->questionCategory;
    }

    /**
     * Set the value of questionCategory
     *
     * @param ?int $questionCategory
     * @throws \Exception 
     * @return self
     */
    public function setQuestionCategory(?int $questionCategory): self {

        if($questionCategory < LineSettings::$questionCategoryMin || $questionCategory > LineSettings::$questionCategoryMax){
            throw new \Exception("Invalid value of variable questionCategory");
        }

        $this->questionCategory = $questionCategory;
        return $this;
    }

    

    /**
     * Get the value of questionSubcategory
     *
     * @return ?int
     */
    public function getQuestionSubcategory(): ?int {
        return $this->questionSubcategory;
    }

    /**
     * Set the value of questionSubcategory
     *
     * @param ?int $questionSubcategory
     * @throws \Exception 
     * @return self
     */
    public function setQuestionSubcategory(?int $questionSubcategory): self {

        if($questionSubcategory < LineSettings::$questionSubcategoryMin || $questionSubcategory > LineSettings::$questionSubcategoryMax){
            throw new \Exception("Invalid value of variable questionSubcategory");
        }
        
        $this->questionSubcategory = $questionSubcategory;
        return $this;
    }

    /**
     * Get the value of responseType
     *
     * @return string
     */
    public function getResponseType(): string {
        return $this->responseType;
    }

    /**
     * Set the value of responseType
     *
     * @param string $responseType
     * @throws \Exception 
     * @return self
     */
    public function setResponseType(string $responseType): self {

        if($responseType != Line::$responseTypeFirstAnswer && $responseType != Line::$responseTypeNextAnswer){
            throw new \Exception("Invalid value of variable responseType");
        }
        
        $this->responseType = $responseType;
        return $this;
    }
}