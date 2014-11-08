<?php
class Product extends BaseValidator {

    public function getList($data){
        $this->ValidationMap = array(
            'CategoryIdValidator' => 'CategoryId',
            'ManufacturerValidator' => 'ManufacturerId',
        );
        if ($this->validate($data)){
            dump('$this->validate successs');
            return $this->Model->getList($data);
        } else {
            dump('$this->validate fail');
            //TODO:Обрабатываем ошибки из валидатора. /// Вовзращаем экземпляр валидатора, который есть тоже DataContainerReponse и содержит свои ошибки
            $this->addError('Data validation failed');
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
        if (is_numeric($value)){
            return true;
        }
        return false;
    }
}