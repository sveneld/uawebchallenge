<?php
class RemoteModelCall extends DataContainerResponse {
    public static $ApiKey=null;

    public function run(DataContainer $DataContainer){

        //Key validation
        if (empty($DataContainer->Key)){
            return $this->addError('Key cannot by empty!');
        }
        $ApiKeys = YApiKey::model()->cache(3600)->findByPk($DataContainer->Key);
        if (!$ApiKeys){
            $this->addError('Key not found!');
            return $this->getData();
        }
        if ($ApiKeys->Enabled == 0){
            $this->addError('Key is disabled!');
            return $this->getData();
        }
        if (strtotime($ApiKeys->ValidUntil) < time()){
            $this->addError('Key is expired!');
            return $this->getData();
        }
        self::$ApiKey = $ApiKeys->Key;

        //Class validation
        if (empty($DataContainer->Class)){
            $this->addError('Remote class cannot by empty!');
            return $this->getData();
        }

        try{
            if (!class_exists($DataContainer->Class)){
                throw new ApiException('Remote class not found!');
            }
        }catch (ApiException $e){
            $this->addError($e->getMessage());
            return $this->getData();
        }

        $Model = new $DataContainer->Class();
        if (method_exists($Model,$DataContainer->Method)){
            $t = $Model->{$DataContainer->Method}($DataContainer->Data);
            return $this->getData();
            dump($Model->{$DataContainer->Method}($DataContainer->Data));
            return $Model->{$DataContainer->Method}($DataContainer->Data);
        } else {
            $this->addError('Method of class '.$DataContainer->Class.' not found!');
            return $this->getData();
        }

    }


}