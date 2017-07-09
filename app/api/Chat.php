<?php namespace App\Api\SlackWeb;

use Moz\Core\Environment;
use Moz\Core\Curl;

class Chat
{
    const URL = 'https://slack.com/api/chat.';

    // https://api.slack.com/methods/chat.postMessage
    public static function postMessage($channel, $text, $option=[])
    {
        $data["token"] = Environment::BOT_TOKEN;
        $data["channel"] = $channel;
        $data["text"] = $text;

        // TODO: should check key and value type.
        foreach ($option as $key => $value)
            $data[ $key ] = $value;

        return Curl::POST(static::URL . "postMessage", $data);
    }
}