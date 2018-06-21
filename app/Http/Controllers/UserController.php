<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required|email|unique:users',
            'first_name' => 'required|max:120',
            'password' => 'required|min:4'
        ]);

        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;

        $user->save();

        return redirect()->route('dashboard');
    }
    public function postSignUpVc(){
        $permissions = [
            'photos',
            'email'
        ];

        $request_params = [
            'client_id' => '6607722',
            'redirect_uri' => 'http://127.0.0.1:8000/vkaut',
            'response_type' => 'token',
            'display' => 'page',
            'scope' => implode(',', $permissions) // маска битых настроек
        ];
        $url = 'https://oauth.vk.com/authorize?' . http_build_query($request_params);
        return view('welcome', compact('url'));
    }
    public function postVkaut(){

        $getVk = 'acses'.$_GET['email'] . 'user_id' . $_GET['user_id'];
        return view('vk_aut', compact('getVk'));
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }
    public function getRegistr(){
        return view('registr');
    }

    public function getAccount(){
        if(Auth::user()){
          return view('account', ['user' => Auth::user()]);
        }else {
            return redirect()->route('home');
        }
    }
    public function postSaveAccount(Request $request){
        $this->validate($request, [
            'first_name' => 'required|max:120'
        ]);

        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['first_name'] . '-' . $user->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->route('account');
    }
    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}