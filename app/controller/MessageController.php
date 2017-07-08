<?php namespace App\Controller;

use App\Api\SlackWeb;

class MessageController
{
    private $data;

    public function __construct($json)
    {
        $this->data = $json;
    }

    function loop_back()
    {
        $channel = $this->data["event"]["channel"];
        $text    = $this->data["event"]["text"];

        return SlackWeb\Chat::postMessage($channel, $text);
    }
}