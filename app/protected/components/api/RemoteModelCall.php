<?php
class RemoteModelCall extends DataContainerResponse {

    public function Run(DataContainer $DataContainer){

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

        //Class validation
        if (empty($DataContainer->Class)){
            return $this->addError('Remote class cannot by empty!');
        }

        $classExists = class_exists($DataContainer->Class,true);
        //TODO: Отстреливает трай кетч Yii, подумать как завернуть такую проверку. Поменять на проверку наличия одноименного файла в валидаторе
        if (!$classExists){
            return $this->addError('Remote class not found!');
        }
        $Model = new $DataContainer->Class();
        if (method_exists($Model,$DataContainer->Method)){
            return $Model->{$DataContainer->Method}($DataContainer->Data);
        } else {
            return $this->addError('Method of class '.$DataContainer->Class.' not found!');
        }

    }


}