<?php namespace App\Controller;

class AuthController
{
    private $data;

    public function __construct($json)
    {
        $this->data = $json;
    }

    function challenge()
    {
        if( isset($this->data['challenge']))
            return [ "challenge" => $this->data['challenge'] ];

        return [];
    }
}