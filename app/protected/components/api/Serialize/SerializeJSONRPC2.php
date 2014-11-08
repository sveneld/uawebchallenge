<?php

class SerializeJSONRPC2 implements Serialize
{
    public static function serializeData($data)
    {
        $resultArray = array();
        foreach($data->getContainers() as $dataContainer){
            if(!$dataContainer->Id && !empty($dataContainer->result->Errors))
                continue;
            $jsonrpc2 = new stdClass();
            $jsonrpc2->id = $dataContainer->Id;
            if(!empty($dataContainer->getResult()->Errors)){
                $jsonrpc2->error = array();
                $jsonrpc2->error['code'] = -140500;
                $jsonrpc2->error['message'] = 'Is error';
                $jsonrpc2->error['data'] = array();
                foreach($dataContainer->getResult()->Errors as $error){
                    $jsonrpc2->error['data'][] = $error;
                }
            } else {
                $jsonrpc2->result = $dataContainer->getResult()->Data;
            }
            $resultArray[] = $jsonrpc2;
        }
        return json_encode($resultArray);
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