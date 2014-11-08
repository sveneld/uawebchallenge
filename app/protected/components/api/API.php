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


            }

            die;







        } catch(CException $e){
            return $e->getMessage();
        }



    }




}