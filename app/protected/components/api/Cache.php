<?php

class Cache
{
    CONST CACHE_LIFETIME = 30;
    CONST CACHE_LIFETIME_DATABASE = 36000;

    private function __construct(){}

    private function __sleep(){}

    private function __clone(){}

    private function __wakeup(){}

    static public function setCache($key, $data)
    {
        Yii::app()->cache->set(self::getHash($key), SerializePHP::serializeData($data), self::CACHE_LIFETIME);
        return true;
    }

    static public function getCache(DataContainer $data)
    {
        $key = self::getHash($data);
        dump($key,1);
        return SerializePHP::unserializeData(Yii::app()->cache->get(self::getHash($key)));
    }

    static private function getHash(DataContainer $data)
    {
        return md5(var_export(array($data->Class,$data->Method,$data->Data),1));
    }

    static public function deleteCache($key)
    {
        return Yii::app()->cache->delete(self::getHash($key));
    }
} 