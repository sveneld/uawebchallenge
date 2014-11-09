<?php

class TestController extends Controller
{

    public function actionIndex()
    {
        $model = new SendRequestForm();
        if(isset($_POST['SendRequestForm']))
            $model->attributes=$_POST['SendRequestForm'];
        if($model->validate())
            $model->send();



        $this->render('test', array('model'=>$model));
    }

    public function actionTest0(){
        $dc = new DataContainer();
        $dc->Key = 'd833382472255f830cf09f728a49c91b';
        $dc->Class = 'Order';
        $dc->Method = 'add';

        $data = new stdClass();
//        $data->CategoryId = 1;
//        $data->ManufacturerId2 = 2;
        $data->FullName = 2;
        $data->Phone = 2;
        $data->Country = 2;
        $data->City = 2;
        $data->Address = 2;
        $data->IdShippingMethod = 2;
        $data->IdPaymentMethod = 2;
        $data->Discount = 2;
        $data->Fee = 2;
        $data->Total = 2;

        $data->PhoneAdditional = null;

        $data->Products = array();

        $t = new stdClass();
        $t->Sku = 'FB291';
        $t->Quantity = 2;
        $t->Price = 500;
        $data->Products[] = $t;

        $t = new stdClass();
        $t->Sku = 'FB293';
        $t->Quantity = 1;
        $t->Price = 156.29;
        $data->Products[] = $t;

//        $data->IdPaymentMethod = 2;
//        $data->IdPaymentMethod = 2;
//        $data->IdPaymentMethod = 2;
//        $data->IdPaymentMethod = 2;
//        $data->IdPaymentMethod = 2;

        $dc->Data =$data;

        $data = (new RemoteModelCall())->run($dc);
        dump($data);
//        dump($data->getData());
//        dump(json_encode($data->getData()));

    }
    public function actionTest2(){
        $dc = new DataContainer();
        $dc->Key = 'd833382472255f830cf09f728a49c91b';
        $dc->Class = 'Order';
        $dc->Method = 'getList';

        $data = new stdClass();
//        $data->CategoryId = 1;
//        $data->ManufacturerId2 = 2;
//        $data->IdOrder = 4;
        $data->DateFrom = date('Y-m-d H:i:s',time() - 3600*50);
        $data->Page = 1;

        $dc->Data =$data;

        dump($dc);
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
        $model->params['key'] = '03ae7344fce64b8ef0c7dc3a78fae838';

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
        curl_setopt($ch, CURLOPT_URL, 'http://localhost/app/?format=jsonrpc2');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'data='.$data);
        curl_setopt($ch, CURLOPT_POST, true);
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
        dump(md5('магазин 1'));
        dump(md5('магазин 2'));
        $dc = new DataContainer();
        $dc->Key = 'd833382472255f830cf09f728a49c91b';
        $dc->Class = 'Product';
        $dc->Method = 'getList';

        $data = new stdClass();
        $data->IdCategory = 1;
        $dc->Data =$data;

        $data = new RemoteModelCall();
        dump($data->run($dc));

    }

}