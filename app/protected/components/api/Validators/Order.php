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
            'CategoryIdValidator' => 'CategoryId',
//            'ManufacturerValidator' => 'ManufacturerId',
        );
        $this->ValidationMapUnnesessaryFields = array(
//            'CategoryIdValidator' => 'CategoryId',
            'ManufacturerValidator' => 'ManufacturerId',
        );
        if ($this->validate($data)){
            $this->Model->addOrder($data);
        } else {
            return $this;
        }
    }

    public function get($data){
        $this->ValidationMap = array(
            'validateIdOrder' => 'IdOrder',
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