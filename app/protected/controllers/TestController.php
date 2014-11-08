<?php

class TestController extends Controller
{

    public function actionTest(){
        $dc = new DataContainer();
        $rmc = new RemoteModelCall($dc);

    }

}