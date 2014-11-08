<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 02.11.2014
 * Time: 12:32
 */

class WCache
{
    CONST CACHE_LIFETIME = 36000;
    CONST CACHE_LIFETIME_DATABASE = 36000;

    static public function setCache($key, $data)
    {
        Yii::app()->cache->set(self::getCash($key), SerializePHP::serializeData($data), self::CACHE_LIFETIME);
        return true;
    }

    static public function getCache($key)
    {
        return SerializePHP::unserializeData(Yii::app()->cache->get(self::getCash($key)));
    }

    static private function getCash($key)
    {
        return var_export($key,1);
    }

    static public function deleteCache($key)
    {
        return Yii::app()->cache->delete(self::getCash($key));
    }
} 