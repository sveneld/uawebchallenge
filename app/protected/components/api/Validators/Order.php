<?php
/**
 * Created by PhpStorm.
 * User: Sveneld
 * Date: 08.11.14
 * Time: 16:36
 */

class Order extends BaseValidator {

    public function getList($data){
        if ($this->validate()){
            $this->Model->getList($data);
        } else {
            //TODO:Обрабатываем ошибки из валидатора.
        }
    }

    public function add($data){
        if ($this->validate()){
            $this->Model->addOrder($data);
        } else {
            //TODO:Обрабатываем ошибки из валидатора.
        }
    }

    public function get($data){
        if ($this->validate()){
            $this->Model->get($data);
        } else {
            //TODO:Обрабатываем ошибки из валидатора.
        }
    }

    public function getStatus($data){
        if ($this->validate()){
            $this->Model->getStatus($data);
        } else {
            //TODO:Обрабатываем ошибки из валидатора.
        }
    }

} 