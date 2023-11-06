<?php 


abstract class LineProcessor{

    /**
     * @return array of results - average waiting times of the queries, or "-"
     */
    abstract protected function process();
    
} 