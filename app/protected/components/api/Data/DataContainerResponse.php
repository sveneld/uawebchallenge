<?php
class DataContainerResponse{
    private $_Data = array();
    private $_Errors = array();
    private $_Response = array();

    protected function addData($Data){
        $this->_Data[] = $Data;

    }
    protected function addError($Error){
        $this->_Errors[] = $Error;
        //Выбрасываемся на первой ошибке, дабы не плодить лавину. Но на будущее оставляем масивчики
        return $this->getData();
    }
    public function getData(){
        if (!empty($this->_Errors)){
            $this->_Response['success'] = 'false';
            foreach($this->_Errors as $ErrorRow){
                $this->_Response['Errors'][] = $ErrorRow;
            }
        } else {
            $this->_Response['success'] = 'true';
        }
        if (!empty($this->_Data)){
            foreach($this->_Data as $DataRow){
                //ACL for response foreach data
                $this->_Response['Data'][] = $DataRow;
            }
        }
        return $this->_Response;
    }
}