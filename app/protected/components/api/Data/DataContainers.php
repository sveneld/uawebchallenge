<?php

class DataContainers
{
    private $dataContainers = array();
    private $batch = false;
    private $errorFormat= false;

    public function addContainer(DataContainer $dataContainer)
    {
        $this->dataContainers[] = $dataContainer;
    }

    public function getContainers()
    {
        return $this->dataContainers;
    }

    public function isBatch()
    {
        $this->batch = true;
    }

    public function getBatch()
    {
        return $this->batch;
    }

    public function isErrorFormat()
    {
        $this->errorFormat = true;
    }

    public function getErrorFormat()
    {
        return $this->errorFormat;
    }
}