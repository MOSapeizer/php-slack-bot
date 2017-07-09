<?php
/**
 * Date: 2017/7/9
 * Time: 下午2:34
 * Author: Mos Lee
 **/

namespace Moz\Core;


class Logger
{
    // $message 會直接穿過這層。
    public static function log($message)
    {
        if( Environment::DEBUG )
        {
            $result = file_get_contents(Environment::LOG_FILE);
            $result .= "\n " . date("\[Y-m-d H:i:s\]") . $message . "\n";
            file_put_contents(Environment::LOG_FILE,  $result);
        }

        return $message;
    }

}