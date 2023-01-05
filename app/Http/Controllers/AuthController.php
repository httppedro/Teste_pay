<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Contracts\Auth\Access\Authorizable;

class AuthController extends Controller
{
    public function Autenticar(Request $req, string $provider)
    {

        $providers = ['user', 'lojista'];

        if(!in_array($provider, $providers)){
            return response()->json(['errors' => ['main' => 'erro de parametro']], 422);
        }

        $provider = $this->providerGet($provider);

        $model = $provider->where('email', '=', $req);


    }

    public function providerGet(string  $provider): Authorizable
     {
         if($provider == "user")
         {
             return new User();
         }
         elseif ($provider == "lojista")
         {
             return new Lojista();
         }
         else
         {
             throw new \Exception('Not found');
         }
     }
}
