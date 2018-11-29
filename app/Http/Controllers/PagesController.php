<?php

namespace App\Http\Controllers;

use App\Article;
use App\Vkauth;
use App\Channel;
use App\Url_mov;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


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
            'client_secret' => env('CLIENT_SECRET', 'PaWvqbzE7qeKtfaijboK'),
            'redirect_uri' => 'http://127.0.0.1:8000/vkaut',
            'code' => $code
        ];
        $linkToken = 'https://oauth.vk.com/access_token' . '?' . http_build_query($request_token);
        $token = json_decode(file_get_contents($linkToken), true);


        $vkaut = new Vkauth();
        $accessToken = $token['access_token'];
        $expiresIn = $token['expires_in'];
        $userId = $token['user_id'];
        if (!empty($token['email'])) {
            $email = $token['email'];
        } else {
            $email = '@';
        }
        $res = DB::select('select * from vkauths where user_id = ' . $token['user_id']);
        if ($res == null) {
            $vkaut->access_token = $accessToken;
            $vkaut->expires_in = $expiresIn;
            $vkaut->user_id = $userId;
            $vkaut->email = $email;
            $vkaut->save();
            $res = DB::select('select * from vkauths where user_id = ' . $token['user_id']);
        }
        foreach ($res as $r) {
            $r->user_id;
            $r->access_token;
        }
        //если есть даный user_id то только обновляю token а если нет то создаю нового пользователя
        if ($r->user_id === $token['user_id']) {
            DB::table('vkauths')
                ->where('user_id', $r->user_id)
                ->update(
                    ['access_token' => $token['access_token'],
                        'expires_in' => $token['expires_in']]
                );
        } else {
            $vkaut->access_token = $accessToken;
            $vkaut->expires_in = $expiresIn;
            $vkaut->user_id = $userId;
            $vkaut->email = $email;
            $vkaut->save();
        }

        foreach ($res as $sir) {
            $sir->id;
        }
        Auth::loginUsingId($sir->id);
        return redirect()->route('dashboard');
    }

    public function postVkaTok(Request $request)
    {
//        $pad = $this->postVkaut();
//        $request->$pad;

        return $request->all();
    }

    public function adminUp()
    {

        $chan = DB::select('select * from channels WHERE vk_id = ' . Auth::user()->id);
        foreach ($chan as $cn) {
        }
        if(!isset($ch)){
            return view('admin');
        }
        return view('admin', ['chan' => $cn]);
    }

    /**
     * создание или обновление канала
     */
    public function adminCreateChanel(Request $request)
    {
        $this->validate($request, [
            'caption_chan' => 'required|min:1'
        ]);
        $channel = new Channel();
        $user = Auth::user();
        $channel->caption_chan = $request['caption_chan'];
        $channel->description_chan = $request['description_chan'];
        $channel->date_channel = $request['date_channel'];
        $channel->vk_id = $user->id;
        $channel->offOn_channel = 0;

        $files = $request->file('image_channel');
        $filename = $request['caption_chan'] . '-' . $user->id . '.jpg';
        if ($files) {
            Storage::disk('local')->put($filename, File::get($files));
        }

        $up_channel = DB::select('select * from channels WHERE vk_id = :id', ['id' => $user->id]);
        foreach ($up_channel as $key) {
        }
        if (empty($request['description_chan'])) {
            $request['description_chan'] = $key->description_chan;
        }
        if ($up_channel == null) {
            $channel->save();
        } else if ($key->vk_id == $user->id) {
            DB::table('channels')
                ->where('vk_id', $key->vk_id)
                ->update(
                    [
                        'description_chan' => $request['description_chan'],
                        'caption_chan' => $request['caption_chan'],
                        'date_channel' => $request['date_channel']
                    ]
                );
        }
        return redirect()->route('admin');
    }

    /**
     * запись нового видео
     */
    public function adminCreateUrl(Request $request){
        $this->validate($request,[
           'url_mov' => 'required|min:5'
        ]);

        $user = Auth::user();
        $url = new Url_mov();
        $url->url_mov = $request['url_mov'];
        $url->channel_id = $user->id;
        $url->save();
        return redirect()->route('admin');
    }

    public function getNameUser()
    {

        return view('banerName', ['name' => Auth::user()]);
    }

    public function channelId($id)
    {
        if (Auth::user()) {
            $urlChannel = DB::select('select id, url_mov from url_movs WHERE channel_id = '.$id.' ORDER BY id DESC');
            $channel = DB::select('select * from channels WHERE vk_id = '.$id);
            foreach ($channel as $chann){
            }
            $user = DB::select('select * from vkauths WHERE id = '.$id);
            foreach ($user as $use){
            }
            //последнее видео
            foreach($urlChannel as $uri){
                $as[] = $uri->url_mov;
            }
            if(isset($as)) {
                return view('channel.channel')->with(['user' => $use, 'channel' => $chann,
                    'url' => $urlChannel, 'urlOne' => $as[0]]);
            }else{
                return view('channel.channel')->with(['user' => $use, 'channel' => $chann,
                    'url' => $urlChannel]);
            }
        } else {
            return redirect()->route('home');
        }

    }

    /**
     * отвечаем на ajax запрос(включена или выключена бегунок)
     */
    public function channelOnOf()
    {
        $user = Auth::user();

        $channel = DB::select('select * from channels WHERE vk_id = '.$user->id);
        foreach ($channel as $chann){
        }
        if($chann->offOn_channel === 0){
            return $_GET['switch'] = 0;
        }else{
            return $_GET['switch'] = 1;
        }
    }

    /**
     * записываем в бд положение бегунка
     */
    public function channelswitch()
    {
        $user = Auth::user();

        $channel = DB::select('select * from channels WHERE vk_id = ' . $user->id);
        foreach ($channel as $chann) {
        }
        if ($chann->offOn_channel == '0') {
            DB::table('channels')
                ->where('vk_id', $user->id)
                ->update(['offOn_channel' => 1]);
            return $_GET['switch'] = 1;

        } elseif ($chann->offOn_channel == '1') {

            DB::table('channels')
                ->where('vk_id', $user->id)
                ->update(['offOn_channel' => 0]);
            return $_GET['switch'] = 0;
        }
    }

    /**
     * получаем последнее видео из запущенных каналов
     */
    public function playerheader()
    {

        $channel[] = DB::table('channels')
            ->where('offOn_channel', '=', 1)
            ->inRandomOrder()
            ->first();

        foreach ($channel as $ch) {
        }
        $video[] = DB::table('url_movs')
            ->select('url_mov')
            ->where('channel_id', '=', $ch->vk_id)
            ->latest()
            ->first();

        if (empty($video)){
            $videoOff[] = DB::table('url_movs')
                ->select('url_mov')
                ->inRandomOrder()
                ->first();
            foreach ($videoOff as $vOff){
            }

            return $_GET["video"] = $vOff->url_mov;
        }
        foreach ($video as $vid){}
        return $_GET['video'] = $vid->url_mov;


    }
}
