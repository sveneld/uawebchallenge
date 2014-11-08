<?php
class DataContainerResponse{
    private $_Data = array();
    private $_Errors = array();
    private $_Response;

    protected function addData($Data){
        $this->_Data[] = $Data;

    }
    protected function addError($Error){
        $this->_Errors[] = $Error;
        //Выбрасываемся на первой ошибке, дабы не плодить лавину. Но на будущее оставляем масивчики
        return $this->getData();
    }
    public function getData(){
        $this->_Response = new stdClass();
        if (!empty($this->_Errors)){
            $this->_Response->Success = false;
            $this->_Response->Errors = array();
            foreach($this->_Errors as $ErrorRow){
                $this->_Response->Errors[] = $ErrorRow;
            }
        } else {
            $this->_Response->Success = true;
        }
        if (!empty($this->_Data)){
            $this->_Response->Data = array();
            foreach($this->_Data as $DataRow){
                //ACL for response foreach data
                $this->_Response->Data[] = $DataRow;
            }
        }
        return $this->_Response;
    }
}