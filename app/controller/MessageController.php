<?php namespace App\Controller;

use App\Api\SlackWeb;
use Moz\Core\Environment;

class MessageController
{
    private $data;

    public function __construct($json)
    {
        $this->data = $json;
    }

    function loop_back()
    {
        if( $this->data["event"]["user"] == Environment::BOT_ID )
            return "";

        $channel = $this->data["event"]["channel"];
        $text    = $this->data["event"]["text"];

        SlackWeb\Chat::postMessage($channel, $text);
        return '';
    }
}