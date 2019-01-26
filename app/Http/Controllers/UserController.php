<?php
namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            'client_id' => env('CLIENT_ID_VK'),
            'redirect_uri' => env('APP_URL').'/vkaut',
            'response_type' => 'code',
            'display' => 'page',
            'scope' => implode(',', $permissions) // маска битых настроек
        ];
        $url = 'https://oauth.vk.com/authorize?' . http_build_query($request_params);
        return redirect($url);
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
    public function updateAccount(){
        if(Auth::user()){
          return view('accountedit', ['user' => Auth::user()]);
        }else {
            return redirect()->route('home');
        }
    }
    public function postSaveAccount(Request $request){
        $this->validate($request, [
            'first_name' => 'required|max:120',
            'email' => 'required|max:120'
        ]);

        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->email = $request['email'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['first_name'] . '-' . $user->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->route('accountedit');
    }
    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

    public function saveNameUser(Request $request){
        $this->validate($request, [
            'first_name' => 'required|max:120'
        ]);

        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
        return redirect()->route('home');
    }
}