<?php
class BaseValidator {
    protected $ValidationMap = array();
    protected $ValidationMapResult = array();
    protected $Model = null;
    protected $Data = null;

    //Example
    function __construct(){
        var_dump('get_class()');
        var_dump(get_class());
        var_dump(get_class($this));
        $modelName = get_class($this).'Model';
        $this->Model = new $modelName();
    }
    //Example
    public function validateInt($value){

    }

    public function validate(){
        $success = true;
        foreach($this->ValidationMap as $ValidationMethodName=>$DataFiledName){
            $DataFieldValidationResult = $this->$ValidationMethodName(isset($this->Data->$DataFiledName) ? $this->Data->$DataFiledName : null);
            if (!$DataFieldValidationResult) {
                $success = false;
            }
        }
        if (!$success) {
            return false;
        }
        return true;
    }


}