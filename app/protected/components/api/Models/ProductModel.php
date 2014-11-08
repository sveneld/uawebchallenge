<?php
class ProductModel extends DataContainerResponse {

    public function getList(){
        $data = new stdClass();
        $data->SomeVal = 'coool555';
        $this->addData($data);
        return $this;
    }

}