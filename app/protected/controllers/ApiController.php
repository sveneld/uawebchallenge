<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 02.11.2014
 * Time: 18:51
 */

class ApiController extends Controller
{
    public function actionIndex($get = null, $data = null)
    {

        Api::run($get, $data);



    }




}