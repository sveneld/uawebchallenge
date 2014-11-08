<?php

class TestController extends Controller
{

    public function actionTest(){
        $dc = new DataContainer();
        $rmc = new RemoteModelCall($dc);

    }

    public function actionChen()
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost/app/');
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