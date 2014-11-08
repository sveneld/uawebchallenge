<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 01.11.2014
 * Time: 12:12
 */

class SerializePHP implements Serialize
{
    public static function serializeData($data)
    {
        return serialize($data);
    }

    public static function unserializeData($data)
    {
        return unserialize($data);
    }


} 