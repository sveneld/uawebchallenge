<?php
class RemoteModelCall extends DataContainerResponse{
    private $Class = null;
    private $Method = null;
    private $Key = null;
    private $ACL = null;


    function __construct(DataContainer $DataContainer){
        //Key validation
        if (empty($DataContainer->Key)){
            return $this->addError('Key cannot by empty!');
        }
        $ApiKeys = ApiKeys::model()->cache(3600)->findByPk($DataContainer->Key);
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
        if (!class_exists($DataContainer->Class)){
            return $this->addError('Remote class not found!');
        }
    }


}