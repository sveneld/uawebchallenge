<?php

class DataContainers
{
    private $dataContainers = array();
    private $batch = false;

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
}