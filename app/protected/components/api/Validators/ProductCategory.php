<?php
/**
 * Created by PhpStorm.
 * User: Sveneld
 * Date: 08.11.14
 * Time: 16:37
 */

class ProductCategory extends BaseValidator {

    public function getList($data){
//        $this->ValidationMap = array(
//
//        );
//        if ($this->validate($data)){
//            $this->Model->getList($data);
//        } else {
//            //TODO:Обрабатываем ошибки из валидатора.
//        }


        if ($this->validate($data)){
            return $this->Model->getList($data);
        } else {
            //TODO:Обрабатываем ошибки из валидатора. /// Вовзращаем экземпляр валидатора, который есть тоже DataContainerReponse и содержит свои ошибки
            return $this;
        }
    }

} 