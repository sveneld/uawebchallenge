<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 01.11.2014
 * Time: 12:12
 */

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
        foreach($data as $item){
            $dataContainer = new DataContainer();
            $method = explode('.',(!empty($item->method) ? $item->method : '') );
            $dataContainer->id = isset($item->id) ? $item->id : null;
            $dataContainer->class = isset($method[0]) ? $method[0] : '';
            $dataContainer->method = isset($method[1]) ? $method[1] : '';
            $dataContainer->key = isset($item->params->key) ? $item->params->key : null;
            $dataContainer->data = isset($item->params->data) ? $item->params->data : null;
            $dataContainers->add($dataContainer);
        }
        return $dataContainers;
    }


} 