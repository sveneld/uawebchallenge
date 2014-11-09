<?php

class SendRequestForm extends CFormModel
{
    public $request = '{"jsonrpc": "2.0", "method": "class.method", "params": {"data": "data", "key": "key"}, "id": 1}';
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