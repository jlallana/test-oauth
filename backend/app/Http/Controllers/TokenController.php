<?php

namespace App\Http\Controllers;

class TokenController
{
    public function index()
    {
        $postdata = http_build_query(
            array(
                'code' => request()->code,
                'grant_type' => 'authorization_code',
                'client_id' => 'test-oauth',
                'redirect_uri' => 'http://localhost',
                'scope' => 'openid',
            )
        );
        
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        
        $context  = stream_context_create($opts);
        
        echo file_get_contents('https://idm.jusbaires.gob.ar/auth/realms/jusbaires/protocol/openid-connect/token', false, $context);
    }
}