<?php

class Timeline extends Line {

   
    private DateTime $responseDate;
    private int $waitingTime;

    /**
     * Get the value of responseDate
     *
     * @return DateTime
     */
    public function getResponseDate(): DateTime {
        return $this->responseDate;
    }

    /**
     * Set the value of responseDate
     *
     * @param DateTime $responseDate
     *
     * @return self
     */
    public function setResponseDate(DateTime $responseDate): self {
        $this->responseDate = $responseDate;
        return $this;
    }

    /**
     * Get the value of waitingTime
     *
     * @return int
     */
    public function getWaitingTime(): int {
        return $this->waitingTime;
    }

    /**
     * Set the value of waitingTime
     *
     * @param int $waitingTime
     *
     * @return self
     */
    public function setWaitingTime(int $waitingTime): self {
        $this->waitingTime = $waitingTime;
        return $this;
    }
}