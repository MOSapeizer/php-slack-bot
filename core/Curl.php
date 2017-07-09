<?php namespace Moz\Core;

class Curl
{
    public static function GET($url)
    {
        $curl = curl_init( $url );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_POST, false );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, []);
        $result = curl_exec( $curl );
        curl_close($curl);
        Logger::log( "GET request: " . $url );
        return Logger::log( "GET response: " . $result );
    }

    public static function POST($url, $context=[])
    {
        $curl = curl_init( $url );
        $data = http_build_query( $context );
        curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, 'POST' );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
        $result = curl_exec( $curl );
        curl_close( $curl );
        Logger::log( "POST request: " . $url . '?' . $data  );
        return Logger::log( "POST response: " . $result  );
    }
}