<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 02.11.2014
 * Time: 18:51
 */

class ApiController extends Controller
{
    public function actionIndex($format = null, $data = null)
    {
        echo Api::run($format, $data);
    }




}