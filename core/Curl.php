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

    public static function POST($url, $context)
    {
        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_URL, $url);
        curl_setopt( $curl, CURLOPT_HTTPHEADER,     array("Content-Type: application/json"));
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $context );
        return curl_exec( $curl );
    }
}