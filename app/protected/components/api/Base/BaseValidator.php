<?php
class BaseValidator extends RemoteModelCall {
    protected $ValidationMap = array();
    protected $ValidationMapUnnesessaryFields = array();
//    protected $ValidationMapResult = array();
    protected $Model = null;
    protected $Data = null;

    //Example
    function __construct(){
        $modelName = get_class($this).'Model';
        $this->Model = new $modelName();
    }
    //Example
    public function validateInt($value){

    }

    public function validate(&$data){
        $success = true;
        foreach($this->ValidationMap as $ValidationMethodName=>$DataFiledName){
            $DataFieldValidationResult = $this->$ValidationMethodName(isset($data->$DataFiledName) ? $data->$DataFiledName : null);
            if (!$DataFieldValidationResult) {
                $success = false;
                $this->addError('Validation of field "'.get_class($this->Model).' -> '.$DataFiledName.'" failed!');
            }
        }
        foreach($this->ValidationMapUnnesessaryFields as $ValidationMethodName=>$DataFiledName){
            if(!empty($data->$DataFiledName)){
                $DataFieldValidationResult = $this->$ValidationMethodName(isset($data->$DataFiledName) ? $data->$DataFiledName : null);
                if (!$DataFieldValidationResult) {
                    $success = false;
                    $this->addError('Validation of unnessesary field "'.get_class($this->Model).' -> '.$DataFiledName.'" failed!');
                }
            }
        }
        if (!$success) {
            return false;
        }
        return true;
    }


}