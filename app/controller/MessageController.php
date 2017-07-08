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
        if( $this->data["event"]["bot_id"]  == Environment::BOT_ID OR
            $this->data["event"]["subtype"] == "bot_message" )
            return "";

        $channel = $this->data["event"]["channel"];
        $text    = $this->data["event"]["text"];

        SlackWeb\Chat::postMessage($channel, $text);
        return '';
    }
}