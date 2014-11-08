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
        if ($this->validate($data)){
            return $this->Model->getList($data);
        } else {
            return $this;
        }
    }

} 