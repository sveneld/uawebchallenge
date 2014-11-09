<?php

class TestController extends Controller
{

    public function actionIndex()
    {
        $model = new SendRequestForm();
        if(isset($_POST['SendRequestForm'])){
            $model->attributes=$_POST['SendRequestForm'];
            if($model->validate())
                $model->send();
        }
        $this->render('test', array('model'=>$model));
    }

    public function actionDoc()
    {
        $this->render('doc');
    }

}