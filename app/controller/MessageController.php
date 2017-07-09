<?php namespace App\Controller;

use App\Api\SlackWeb;
use Moz\Core\Controller;
use Moz\Core\Environment;

class MessageController extends Controller
{
    function loop_back()
    {
        if( $this->is_bot() )
            return "";

        $channel = $this->data["event"]["channel"];
        $text    = $this->data["event"]["text"];

        return SlackWeb\Chat::postMessage($channel, $text);
    }

    private function is_bot()
    {
        return isset($this->data["event"]["bot_id"])
            AND $this->data["event"]["bot_id"]  == Environment::BOT_ID
            OR  $this->data["event"]["subtype"] == "bot_message";
    }
}