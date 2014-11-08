<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 01.11.2014
 * Time: 12:12
 */

class API
{
    static public function run($format, $data)
    {
        try{
            $serializerName = 'Serialize' . mb_strtoupper($format);
            if(!class_exists($serializerName,true))
                throw new CException("No format {$format}");
            $response = $serializerName::unserializeData($data);


            dump($response);









        } catch(CException $e){
            return $e->getMessage();
        }



    }




}