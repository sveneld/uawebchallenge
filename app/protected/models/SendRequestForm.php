<?php

class SendRequestForm extends CFormModel
{
    public $request;
    public $response;

    public function attributeLabels()
    {
        return array(
            'request' => 'Запит',
            'response' => 'Відповідь',
        );
    }

    public function rules()
    {
        return array(
            array('request', 'required'),
            array('response', 'safe'),
        );
    }

    public function send()
    {
        $this->response = API::run('JSONRPC2', $this->request);
    }

} 