<?php

class API
{
    static public function run($format, $data)
    {
        try{
            $serializerName = 'Serialize' . mb_strtoupper($format);
            if(!class_exists($serializerName))
                throw new CException("No format {$format}");
            $response = $serializerName::unserializeData($data);

            foreach($response->getContainers() as $dataContainer){
                dump((new RemoteModelCall())->run($dataContainer),1);
                $dataContainer->setResult((new RemoteModelCall())->run($dataContainer));
            }

            dump($response,1);
            die;







        } catch(CException $e){
            return $e->getMessage();
        }



    }




}