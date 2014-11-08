<?php
class Product extends BaseValidator {

    public function getList($data){
        $this->ValidationMap = array(
            'CategoryIdValidator' => 'CategoryId',
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
//        var_dump('ManufacturerValidator');
        $this->addError('ManufacturerValidator error');
        return false;
//        return true;
    }
}