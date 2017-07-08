<?php

namespace Moz\Core;


class Curl
{
    public static function GET($url)
    {
        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_URL, $url);
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_POST, false );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, []);
        return curl_exec( $curl );
    }

    public static function POST($url, $context=[])
    {
        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_URL, $url);
        curl_setopt( $curl, CURLOPT_HTTPHEADER,     array("Content-Type: application/x-www-form-urlencoded"));
        curl_setopt( $curl, CURLOPT_POSTFIELDS, http_build_query($context));
        self::Logger( http_build_query($context) );
        return self::Logger( curl_exec( $curl ) );
    }

    public static function Logger($message)
    {
        if( Environment::DEBUG )
        {
            $result = file_get_contents(Environment::LOG_FILE);
            $result .= "\n" . $message;
            file_put_contents(Environment::LOG_FILE,  $result);
        }

        return $message;
    }
}