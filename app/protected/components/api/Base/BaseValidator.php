<?php
class BaseValidator extends RemoteModelCall {
    protected $ValidationMap = array();
    protected $ValidationMapUnnesessaryFields = array();
    protected $Model = null;
//    protected $Data = null;

    //Example
    function __construct(){
        $modelName = get_class($this).'Model';
        $this->Model = new $modelName();
    }

    public function dataValidator(&$data,$validationMap=array(),$isNessesaryFields=true){
        $success = true;
        foreach($validationMap as $DataFiledName=>$ValidationMethodName) {
            if(is_array($ValidationMethodName)){
                foreach($data->$DataFiledName as &$dataTmpArray){
                    if (!$this->dataValidator($dataTmpArray,$ValidationMethodName,$isNessesaryFields)){
                        $success=false;
                    }
                }
            } else {
                //Обязательно и не задано - ошибка
                if ($isNessesaryFields && !isset($data->$DataFiledName)) {
                    $success = false;
                    $this->addError('Field "' . get_class($this->Model) . ' -> ' . $DataFiledName . '" can not be empty!');
                //Необязательно, незадано - все ок, игнорим
                } else if (!$isNessesaryFields && !isset($data->$DataFiledName)) {
                //Обязательно, задано / Необязательно, задано
                } else {
                    $DataFieldValidationResult = $this->$ValidationMethodName(isset($data->$DataFiledName) ? $data->$DataFiledName : null);
                    if (!$DataFieldValidationResult) {
                        $success = false;
                        $this->addError('Validation of field "' . get_class($this->Model) . ' -> ' . $DataFiledName . '" as "'.$data->$DataFiledName.'" failed!');
                    }
                }
            }
        }
        return $success;
    }

    public function validate(&$data){
        $success = true;
        if (!$this->dataValidator($data,$this->ValidationMap,true)){
            $success = false;
        }
        if (!$this->dataValidator($data,$this->ValidationMapUnnesessaryFields,false)){
            $success = false;
        }
        if (!$success) {
            return false;
        }
        return true;
    }

    public function validateInt($value){
        return is_numeric($value);
    }

    public function notEmpty($value){
        return isset($value);
    }

    //Some additional filter?
    public function validateString($value){
        return isset($value);
    }
    //Some additional filter?
    public function validateFloat($value){
        return filter_var($value, FILTER_VALIDATE_FLOAT);
    }
    public function validateDate(&$value){
        //Unix timestamp
        if (is_numeric($value)){
            return true;
        } else {
            if(strtotime($value)){
                dump('validateDate strtotime() true');
                $value = strtotime($value);
                dump($value);
                return true;
            } else {
                return false;
            }
        }
    }

}