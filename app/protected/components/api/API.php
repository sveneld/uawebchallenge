<?php

class API
{
    static public function run($format, $data)
    {
        try{
            $serializerName = 'Serialize' . mb_strtoupper($format);
            if(!class_exists($serializerName)){
                throw new ApiException("No format {$format}");
            }
            $getContainers = $serializerName::unserializeData($data);

            foreach($getContainers->getContainers() as $dataContainer){
                $dataContainer->setResult((new RemoteModelCall())->run($dataContainer));
            }
            return $response = $serializerName::serializeData($getContainers);
        } catch(CException $e){
            return $e->getMessage();
        }
    }




}