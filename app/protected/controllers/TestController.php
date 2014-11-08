<?php

class TestController extends Controller
{

    public function actionTest(){
        $dc = new DataContainer();
        $dc->Key = 'somekey';
        $dc->Class = 'Order';
        $dc->Method = 'add';

        $data = new stdClass();
//        $data->CategoryId = 1;
//        $data->ManufacturerId2 = 2;
        $data->IdOrde2r = 2;

        $dc->Data =$data;

        $data = (new RemoteModelCall())->run($dc);
        dump($data);
//        dump($data->getData());
//        dump(json_encode($data->getData()));

    }
    public function actionTest2(){
        $dc = new DataContainer();
        $dc->Key = 'somekey';
        $dc->Class = 'Order';
        $dc->Method = 'getList';

        $data = new stdClass();
//        $data->CategoryId = 1;
//        $data->ManufacturerId2 = 2;
        $data->IdOrder = 2;

        $dc->Data =$data;

        $data = (new RemoteModelCall())->run($dc);
        dump($data);
//        dump($data->getData());
//        dump(json_encode($data->getData()));

    }

    public function actionChen()
    {
        $dc = new DataContainer();
        $dc->Key = 'somekey';
        $dc->Class = 'PaymentMethod';
        $dc->Method = 'getList';

        $data = new stdClass();
        $data->CategoryId = 1;
        $data->ManufacturerId = 2;

        $dc->Data =$data;

//        $rmc = new RemoteModelCall($dc);
//        var_dump($rmc->getData());
//        var_dump($rmc);

        $t = new RemoteModelCall();
        dump($t->run($dc));




        $m = new ShippingMethod();
        $m->getList();



        die;




    }

    public function actionChen2()
    {

        $data = array();

        $model = new stdClass();
        $model->id = 2;
        $model->method = 'ProductCategory.getList';
        $model->params = array();
        $model->params['data'] = array(
            'name' => 'vasya',
        );
        $model->params['key'] = 'somekey';

        $model2 = new stdClass();
        $model2->id = 5;
        $model2->jsonrpc = '2.0';
        $model2->key = 555555;
        $model2->method = 'Class.method';
        $model2->params = array();
        $model2->params['data'] = array('name' => 'vasya');
        $model2->params['key'] = 'fhdjfjdhfjhdfhdjfhd';


        $data[] = $model;
        $data[] = $model2;

        $data =  json_encode($data);
        var_dump($data);
        echo '<br>';

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

    public function actionChen3()
    {

        $data = array();

        $model = new stdClass();
        $model->id = 2;
        $model->method = 'ProductCategory.getList';
        $model->params = array();
        $model->params['data'] = array(
            'name' => 'vasya',
        );
        $model->params['key'] = 'somekey';

        $data =  json_encode($model);

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

    public function actionV(){
        $dc = new DataContainer();
        $dc->Key = 'somekey';
        $dc->Class = 'Order';
        $dc->Method = 'get';

        $data = new stdClass();
        $data->IdOrder = 'asdfasdf';
        $dc->Data =$data;

        $data = new RemoteModelCall();
        dump($data->run($dc));

    }

}