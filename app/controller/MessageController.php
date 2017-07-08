<?php namespace App\Controller;


class MessageController
{
    private $data;

    public function __construct($json)
    {
        $this->data = $json;
    }

    function loop_back()
    {
        $data["text"] = $this->data["event"]["text"];
        return $data;
    }
}