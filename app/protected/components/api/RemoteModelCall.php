<?php
class RemoteModelCall extends DataContainerResponse {
    public static $ApiKey=null;

    public function run(DataContainer $DataContainer){

        //Key validation
        if (empty($DataContainer->Key)){
            return $this->addError('Key cannot by empty!');
        }
        $ApiKeys = YApiKeys::model()->cache(3600)->findByPk($DataContainer->Key);
        if (!$ApiKeys){
            return $this->addError('Key not found!');
        }
        if ($ApiKeys->Enabled == 0){
            return $this->addError('Key is disabled!');
        }
        if (strtotime($ApiKeys->ValidUntil) < time()){
            return $this->addError('Key is expired!');
        }
        self::$ApiKey = $ApiKeys->Key;

        //Class validation
        if (empty($DataContainer->Class)){
            return $this->addError('Remote class cannot by empty!');
        }

        try{
            if (!class_exists($DataContainer->Class)){
                throw new ApiException('Remote class not found!');
            }
        }catch (ApiException $e){
            return $this->addError($e->getMessage());
        }


//        $classExists = class_exists($DataContainer->Class);
//        //TODO: Отстреливает трай кетч Yii, подумать как завернуть такую проверку. Поменять на проверку наличия одноименного файла в валидаторе
//        if (!$classExists){
//            return $this->addError('Remote class not found!');
//        }
        $Model = new $DataContainer->Class();
        if (method_exists($Model,$DataContainer->Method)){
            return $Model->{$DataContainer->Method}($DataContainer->Data);
        } else {
            return $this->addError('Method of class '.$DataContainer->Class.' not found!');
        }

    }


}