<?php

namespace App\Http\Controllers;

use App\Article;
use App\Vkauth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



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
        $sylka_token = 'https://oauth.vk.com/access_token'.'?'. http_build_query($request_token);
        $token = json_decode(file_get_contents($sylka_token), true);



      $vkaut = new Vkauth();
        $access_token = $token['access_token'];
        $expires_in = $token['expires_in'];
        $user_id = $token['user_id'];
        if(!empty($token['email'])){
            $email = $token['email'];
        }else{
            $token['email'] = '@';
            $email = $token['email'];
        }

        $vkaut->access_token = $access_token;
        $vkaut->expires_in = $expires_in;
        $vkaut->user_id = $user_id;
        $vkaut->email = $email;
       // $vkaut->save();



      // Auth::loginUsingId(2);



       // return redirect()->route('dashboard');


        $results = DB::select('select * from vkauths where user_id = 495578802');
       return $results;

    }
    public function postVkaTok(Request $request){
//        $pad = $this->postVkaut();
//        $request->$pad;

        return $request->all();
    }


}
