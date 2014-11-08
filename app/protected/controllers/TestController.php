<?php

class TestController extends Controller
{

    public function actionTest(){
        $dc = new DataContainer();
        $rmc = new RemoteModelCall($dc);

    }

    public function actionChen()
    {

        $data = array();

        $model = new stdClass();
        $model->id = 2;
        $model->key = 555555;
        $model->method = 'Class.method';
        $model->params = array();
        $model->params['data'] = array('name' => 'vasya');
        $model->params['key'] = 'fhdjfjdhfjhdfhdjfhd';

        $model2 = new stdClass();
        $model2->id = 5;
        $model2->key = 555555;
        $model2->method = 'Class.method';
        $model2->params = array();
        $model2->params['data'] = array('name' => 'vasya');
        $model2->params['key'] = 'fhdjfjdhfjhdfhdjfhd';


        $data[] = $model;
        $data[] = $model2;

        $data =  json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost/app/?format=jsonrpc2&data=' . $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'dfdfdfdfdfdf');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_PROXY, null);

        $response = curl_exec($ch);

        var_dump($response);


    }

}