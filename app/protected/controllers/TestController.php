<?php

class TestController extends Controller
{

    public function actionTest(){
        $dc = new DataContainer();
        $dc->Key = 'somekey';
        $dc->Class = 'Product';
        $dc->Method = 'getList';

        $data = new stdClass();
        $data->key1 = 1;
        $data->key2 = 2;

        $dc->Data =$data;

        $rmc = new RemoteModelCall($dc);
        var_dump($rmc);

    }

}