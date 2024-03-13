<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {


        /*
        $token = $request->header('Authorization');


        $jwt = substr($token, 7);

        $jwksUri = 'https://idm.jusbaires.gob.ar/auth/realms/jusbaires/protocol/openid-connect/certs';


        $httpClient = new Client();
        $jwksUriResponse = $httpClient->request('GET', $jwksUri);
        $keysObject = json_decode($jwksUriResponse->getBody());

        $jwks = (array) ($keysObject->keys)[0];

        $parsedKey = JWT::parseKeySet($jwks, "RS256");
        $signingKey = $parsedKey->getKeyMaterial();

        dd($parsedKey, $signingKey);


        return response()->json(['error' => 'Token inválido'], 401);

        */
        

        return $next($request);
    }
}