<?php
/**
 * Created by PhpStorm.
 * User: Sveneld
 * Date: 08.11.14
 * Time: 16:37
 */

class ShippingMethod extends BaseValidator
{
    public function getList(DataContainer $data = null){
        dump(3333,1);
        $this->Model->getList($data);
    }

}




