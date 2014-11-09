<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 02.11.2014
 * Time: 18:51
 */

class ApiController extends Controller
{
    public function actionIndex()
    {
        $format = Yii::app()->request->getParam('format');
        $data = Yii::app()->request->getParam('data');

        if($format && $data){
            echo API::run($format, $data);
        }
        else {
            echo 'Bad data';
        }
    }




}