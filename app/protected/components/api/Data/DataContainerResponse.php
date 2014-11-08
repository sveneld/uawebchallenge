<?php
class DataContainerResponse{
    private $_Data = array();
    private $_Errors = array();
    private $_Response = array();

    public function addData(){

    }
    public function addError($Error){
        $this->_Errors[] = $Error;
        return $this->getReponse();
    }
    public function getReponse(){
        if (!empty($this->_Errors)){
            foreach($this->_Errors as $ErrorRow){
                $this->_Response['Errors'][] = $ErrorRow;
            }
        }
        if (!empty($this->_Data)){
            foreach($this->_Data as $DataRow){
                //ACL for response for each data
                $this->_Response['Data'][] = $DataRow;
            }
        }
    }
}