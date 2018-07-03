<?php

namespace App\Http\Controllers;

use App\Article;
use App\Vkauth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function about()
    {

        $articles = Article::all();

        return view('includes.about', compact('articles'));

    }

    public function postVkaut(Request $request)
    {

        $code = $request->input('code');

        $request_token = [

            'client_id' => '6607722',
            'client_secret' => 'PaWvqbzE7qeKtfaijboK',
            'redirect_uri' => 'http://127.0.0.1:8000/vkaut',
            'code' => $code
        ];
        $sylka_token = 'https://oauth.vk.com/access_token' . '?' . http_build_query($request_token);
        $token = json_decode(file_get_contents($sylka_token), true);


        $vkaut = new Vkauth();
        $access_token = $token['access_token'];
        $expires_in = $token['expires_in'];
        $user_id = $token['user_id'];
        $email = $token['email'];
        $vkaut->access_token = $access_token;
        $vkaut->expires_in = $expires_in;
        $vkaut->user_id = $user_id;
        $vkaut->email = $email;

        if (Auth::attempt(['email' => $token['user_id']])){

        }

        return redirect()->route('dashboard');
       // return redirect()->back();

    }
    public function postVkaTok(Request $request){
//        $pad = $this->postVkaut();
//        $request->$pad;

        return $request->all();
    }


}
