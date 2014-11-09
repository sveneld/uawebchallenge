<?php

interface SerializeApi
{
    static public function serializeData(DataContainers $data);
    static public function unserializeData($data);
}