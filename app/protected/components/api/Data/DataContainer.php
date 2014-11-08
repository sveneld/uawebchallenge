<?php

class DataContainer
{
    public $Key;
    public $Id;
    public $Method;
    public $Class;
    public $Data;
    private $result;

    public function setResult(DataContainerResponse $dataContainerResponse)
    {
        $this->result = $dataContainerResponse;
    }

    public function getResult()
    {
        return $this->result;
    }

} 