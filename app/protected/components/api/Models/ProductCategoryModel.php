<?php
/**
 * Created by PhpStorm.
 * User: Sveneld
 * Date: 08.11.14
 * Time: 16:16
 */

class ProductCategoryModel extends DataContainerResponse {

    public function getList($data){
        $categories = YProductCategory::model()->cache(CACHE_LIFETIME)->findAll();
        foreach ($categories as $category){
            $data = new stdClass();
            $data->Id = $category->Id;
            $data->Name = $category->Name;
            $this->addData($data);
        }
        return $this;
    }

} 