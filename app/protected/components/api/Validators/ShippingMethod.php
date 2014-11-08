<?php
/**
 * Created by PhpStorm.
 * User: Sveneld
 * Date: 08.11.14
 * Time: 16:37
 */

class ShippingMethod extends BaseValidator
{
    public function getList(stdClass $data = null){
        return $this->Model->getList($data);
    }

}




