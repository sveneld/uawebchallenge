<?php
class Product extends BaseValidator {

    public function getList($data){
        $this->ValidationMap = array(
            'CategoryIdValidator' => 'CategoryId',
            'ManufacturerValidator' => 'ManufacturerValidator',
        );
        if ($this->validate()){
            $this->Model->getList($data);
        } else {
            //TODO:Обрабатываем ошибки из валидатора.
        }
    }

    protected function CategoryIdValidator($value){
        return true;
    }
    protected function ManufacturerValidator($value){
        return true;
    }
}