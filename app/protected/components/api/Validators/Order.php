<?php
/**
 * Created by PhpStorm.
 * User: Sveneld
 * Date: 08.11.14
 * Time: 16:36
 */

class Order extends BaseValidator {

    public function getList($data){
        if ($this->validate($data)){
            $this->Model->getList($data);
        } else {
            return $this;
        }
    }

    public function add($data){
        $this->ValidationMap = array(
            'FullName' => 'notEmpty',
            'Phone' => 'notEmpty',
            'Country' => 'notEmpty',
            'City' => 'notEmpty',
            'Address' => 'notEmpty',
            'IdShippingMethod' => 'validateInt',
            'IdPaymentMethod' => 'validateInt',
            'Discount' => 'validateFloat',
            'Fee' => 'validateFloat',
            'Total' => 'validateFloat',
            'PaymentMethodName' => 'validateFloat',
//            'notEmpty' => 'Address',
//            'notEmpty' => 'Address',
        );
        $this->ValidationMapUnnesessaryFields = array(
            'PhoneAdditional' => 'string',
            'AddressAdditional' => 'string',
        );
        if ($this->validate($data)){
            $this->Model->addOrder($data);
        } else {
            return $this;
        }
    }

    public function get($data){
        $this->ValidationMap = array(
            'IdOrder' => 'validateInt',
        );
        if ($this->validate($data)){
            $this->Model->get($data);
        } else {
            return $this;
        }
    }

    public function getStatus($data){
        if ($this->validate($data)){
            $this->Model->getStatus($data);
        } else {
            return $this;
        }
    }

    protected  function validateIdOrder($id){
        return $this->validateInt($id);
    }

} 