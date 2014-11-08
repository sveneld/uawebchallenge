<?php
/**
 * Created by PhpStorm.
 * User: Sveneld
 * Date: 08.11.14
 * Time: 16:37
 */

class ShippingMethod extends BaseValidator {

    public function getList($data){
        if ($this->validate()){
            $this->Model->getList($data);
        } else {
            //TODO:Обрабатываем ошибки из валидатора.
        }
    }

} 