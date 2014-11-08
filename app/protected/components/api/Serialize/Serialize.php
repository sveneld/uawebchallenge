<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 01.11.2014
 * Time: 12:12
 */

interface Serialize
{
    static public function serializeData($data);
    static public function unserializeData($data);
}