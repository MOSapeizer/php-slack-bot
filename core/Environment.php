<?php namespace Moz\Core;

abstract class Environment
{
    // Not necessary
    // https://api.slack.com/events/message/bot_message.
    const BOT_ID = "";

    //
    const BOT_TOKEN = "";

    // Dependency List:
    // 1. Moz\Core\Logger Class.
    const DEBUG = FALSE;


    const LOG_FILE = "response.log";
}