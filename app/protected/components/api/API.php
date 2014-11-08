<?php

class API
{
    static public function run($format, $data)
    {
        try{
            $serializerName = 'Serialize' . mb_strtoupper($format);
            if(!class_exists($serializerName)){
                throw new CException("No format {$format}");
            }
            $getContainers = $serializerName::unserializeData($data);

            foreach($getContainers->getContainers() as $dataContainer){

//                dump('API Call');
//                dump((new RemoteModelCall())->run($dataContainer));

                $dataContainer->setResult((new RemoteModelCall())->run($dataContainer));
            }

            return $response = $serializerName::serializeData($getContainers);

        } catch(CException $e){
            return $e->getMessage();
        }



    }




}