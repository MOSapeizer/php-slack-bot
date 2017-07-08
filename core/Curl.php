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
        curl_exec( $curl );
        curl_close($curl);
    }

    public static function POST($url, $context=[])
    {
        $curl = curl_init( $url );
        $data = http_build_query( $context );
        curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, 'POST' );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
        curl_exec( $curl );
        curl_close( $curl );
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