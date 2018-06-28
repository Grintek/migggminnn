<?php

namespace App\Http\Controllers;

use App\Article;
use App\Vkauth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {

        $articles = Article::all();

        return view('includes.about', compact('articles'));

    }

    public function postVkaut(Request $request, Vkauth $vkauth)
    {

        $code = $request->input('code');

        $request_token = [

            'client_id' => '6607722',
            'client_secret' => 'PaWvqbzE7qeKtfaijboK',
            'redirect_uri' => 'http://127.0.0.1:8000/vkaut',
            'code' => $code
        ];
        $sylka_token = 'https://oauth.vk.com/access_token'.'?'. http_build_query($request_token);
        $token = json_decode(file_get_contents($sylka_token), true);

       return view('vk_aut', compact('token'));
    }


}
