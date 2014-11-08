<?php
/**
 * Created by PhpStorm.
 * User: Sveneld
 * Date: 08.11.14
 * Time: 16:18
 */

class ShippingMethodModel extends DataContainerResponse {

    public function getList(DataContainer $data = null){
        $result = YShippingMethod::model()->getList();

        dump($result,1);

        $data = new stdClass();
        $data->SomeVal = 'coool555';
        $this->addData($data);
    }
}