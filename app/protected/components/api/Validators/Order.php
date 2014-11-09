<?php
/**
 * Created by PhpStorm.
 * User: Sveneld
 * Date: 08.11.14
 * Time: 16:36
 */

class Order extends BaseValidator {

    public function getList($data){
        $this->ValidationMapUnnesessaryFields = array(
            'DateFrom' => 'validateDate',
            'DateTo' => 'validateDate',
            'Page' => 'validateInt',
        );
        if ($this->validate($data)){
            return $this->Model->getList($data);
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
            'IdShippingMethod' => 'validateIdShippingMethod',
            'IdPaymentMethod' => 'validateIdPaymentMethod',
            'Discount' => 'validateFloat',
            'Fee' => 'validateFloat',
            'Products' => array(
                'Sku'=>'validateProductSku',
                'Quantity'=>'validateInt',
                'Price'=>'validateFloat',
            )
        );
        $this->ValidationMapUnnesessaryFields = array(
            'PhoneAdditional' => 'validateString',
            'AddressAdditional' => 'validateString',
        );
        if ($this->validate($data)){
            return $this->Model->add($data);
        } else {
            return $this;
        }
    }

    public function get($data){
        $this->ValidationMap = array(
            'IdOrder' => 'validateInt',
        );
        if ($this->validate($data)){
            return $this->Model->get($data);
        } else {
            return $this;
        }
    }

    public function getStatus($data){
        $this->ValidationMap = array(
            'IdOrder' => 'validateInt',
        );
        if ($this->validate($data)){
            return $this->Model->getStatus($data);
        } else {
            return $this;
        }
    }

    protected  function validateIdOrder($id){
        return $this->validateInt($id);
    }

    public function validateProductSku($value){
        $criteria = new CDbCriteria();
        $criteria->addCondition('Sku = :sku');
        $criteria->select = 'Sku';
        $criteria->params[':sku'] = $value;
        $products = YProduct::model()->cache(CACHE_LIFETIME)->find($criteria);
        if (!$products){
            return false;
        } else {
            return true;
        }
    }

    public function validateIdShippingMethod($id){
        if (!$this->validateInt($id)){
            return false;
        }
        if (!in_array($id, Affiliate::getAllowed()->shippingMethod)){
            return false;
        }
        return true;
    }

    public function validateIdPaymentMethod($id){
        if (!$this->validateInt($id)){
            return false;
        }
        if (!in_array($id, Affiliate::getAllowed()->shippingMethod)){
            return false;
        }
        return true;
    }

} 