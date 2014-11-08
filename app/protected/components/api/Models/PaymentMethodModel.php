<?php
/**
 * Created by PhpStorm.
 * User: Sveneld
 * Date: 08.11.14
 * Time: 16:28
 */

class PaymentMethodModel extends DataContainerResponse
{
    public function getList(){
        $result = YPaymentMethod::model()->findAll();
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