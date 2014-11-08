<?php
/**
 * User: maksymenko.ml
 * Date: 08.11.2014
 * Time: 12:42
 */

class DataContainers
{
    private $DataContainers = array();
    public $Batch = false;

    public function add(DataContainer $dataContainer)
    {
        $this->DataContainers[] = $dataContainer;
    }

    public function get()
    {
        return $this->DataContainers;
    }


} 