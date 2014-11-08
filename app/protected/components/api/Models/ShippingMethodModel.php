<?php
/**
 * Created by PhpStorm.
 * User: Sveneld
 * Date: 08.11.14
 * Time: 16:18
 */

class ShippingMethodModel extends DataContainerResponse {

    public function getList(stdClass $data = null){
        $result = YShippingMethod::model()->findAll();
        foreach($result as $item){
            $row = new stdClass();
            $row->Id = $item->Id;
            $row->Name = $item->Name;
            $row->Cost = $item->Cost;
            $row->AdditionalParam = $item->AdditionalParam;
            $this->addData($row);
        }
        return $this;
    }
}