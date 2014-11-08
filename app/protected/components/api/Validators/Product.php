<?php
class Product extends BaseValidator {

    public function getList($data){
        $this->ValidationMap = array(
            'CategoryIdValidator' => 'CategoryId',
//            'ManufacturerValidator' => 'ManufacturerId',
        );
        $this->ValidationMapUnnesessaryFields = array(
//            'CategoryIdValidator' => 'CategoryId',
            'ManufacturerValidator' => 'ManufacturerId',
        );
        if ($this->validate($data)){
            return $this->Model->getList($data);
        } else {
            //TODO:Обрабатываем ошибки из валидатора. /// Вовзращаем экземпляр валидатора, который есть тоже DataContainerReponse и содержит свои ошибки
            return $this;
        }
    }

    protected function CategoryIdValidator($value){
        if (is_numeric($value)){
            return true;
        }
        return false;
    }
    protected function ManufacturerValidator($value){
//        if (empty($value)) { return true; }
        if (is_numeric($value)){
            return true;
        }
        return false;
    }
}