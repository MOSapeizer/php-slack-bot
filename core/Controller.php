<?php namespace Moz\Core;

/**
 * __construct $json format: https://api.slack.com/events-api
 * {
 *    "token": "XXYYZZ",
 *    "team_id": "TXXXXXXXX",
 *    "api_app_id": "AXXXXXXXXX",
 *    "event": {
 *        "type": "message",
 *        "event_ts": "1234567890.123456",
 *        "user": "UXXXXXXX1",
 *    },
 *    "type": "event_callback",
 *    "event_id": "Ev08MFMKH6",
 *    "event_time": 1234567890
 * }
 **/


class Controller
{
    protected $data;

    public function __construct($json)
    {
        $this->data = $json;
        Logger::log( print_r($json, TRUE) );
    }
}