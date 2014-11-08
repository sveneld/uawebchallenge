<?php
class Product extends BaseValidator {

    public function getList($data){
        $this->ValidationMap = array(

        );
        $this->ValidationMapUnnesessaryFields = array(
            'IdCategory' => 'IdCategoryValidator',
        );
        if ($this->validate($data)){
            return $this->Model->getList($data);
        } else {
            //TODO:Обрабатываем ошибки из валидатора. /// Вовзращаем экземпляр валидатора, который есть тоже DataContainerReponse и содержит свои ошибки
            return $this;
        }
    }

    protected function IdCategoryValidator($value){
        if (!is_numeric($value)){
            return false;
        }
        if (!empty(Affiliate::getAllowed()->productCategories) && !in_array($value, Affiliate::getAllowed()->productCategories)){
            return false;
        }
        return true;

    }

}