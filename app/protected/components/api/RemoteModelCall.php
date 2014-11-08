<?php
class RemoteModelCall extends DataContainerResponse{
    private $Class = null;
    private $Method = null;
    private $Key = null;
    private $ACL = null;


    function __construct(DataContainer $DataContainer){
        //Key validation
        if (empty($DataContainer->Key)){
            $this->addError('Key cannot by empty!');
        }
        //Class validation
        if (empty($DataContainer->Class)){
            $this->addError('Remote class cannot by empty!');
        }
        if (!class_exists($DataContainer->Class)){
            $this->addError('Remote class not found!');
        }
    }

}