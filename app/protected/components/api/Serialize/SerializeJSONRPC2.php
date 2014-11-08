<?php

class SerializeJSONRPC2 implements Serialize
{
    public static function serializeData($data)
    {

    }

    public static function unserializeData($data)
    {
        $dataContainers = new DataContainers();
        $data = json_decode($data);
        if(!is_array($data))
            $data = array($data);
        else
            $dataContainers->isBatch();
        foreach($data as $item){
            $dataContainer = new DataContainer();
            $method = explode('.',(!empty($item->method) ? $item->method : '') );
            $dataContainer->Id = isset($item->id) ? $item->id : null;
            $dataContainer->Class = isset($method[0]) ? $method[0] : '';
            $dataContainer->Method = isset($method[1]) ? $method[1] : '';
            $dataContainer->Key = isset($item->params->key) ? $item->params->key : null;
            $dataContainer->Data = isset($item->params->data) ? $item->params->data : null;
            $dataContainers->addContainer($dataContainer);
        }
        return $dataContainers;
    }


} 