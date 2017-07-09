<?php namespace App\Controller;

use Moz\Core\Controller;

class AuthController extends Controller
{
    function challenge()
    {
        if( isset($this->data['challenge']))
            return [ "challenge" => $this->data['challenge'] ];

        return [];
    }
}