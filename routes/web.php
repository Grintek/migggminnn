<?php
Route::get('about', 'PagesController@about');

Route::get('article', 'ArticleController@iny');
Route::get('article/control', 'ArticleController@control');
Route::get('article/{id}', 'ArticleController@show');
Route::post('article', 'ArticleController@store');

//Тест №2
Route::get('/test', 'TaskController@panel');
Route::post('/test/task', 'TaskController@panelNew');
Route::delete('/test/task/{task}', 'TaskController@panelDelete');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web']], function (){
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as' => 'signup'
    ]);


    //cсылка на вк авторизацию
    Route::get('', 'UserController@postSignUpVc');

    Route::get('vkaut', [
        'uses' => 'PagesController@postVkaut',
        'as' => 'vkaut'
])->name('home');


    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as' => 'signin'
    ]);
    Route::get('/logout', [
       'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);
    Route::get('/registr', [
       'uses' => 'UserController@getRegistr',
        'as' => 'registr'
    ]);
    Route::get('/account', [
       'uses' => 'UserController@getAccount',
        'as' => 'account'
    ]);
    Route::post('/updateaccount', [
       'uses' => 'UserController@postSaveAccount',
        'as' => 'account.save'
    ]);
    Route::get('/userimage/{filename}',[
        'uses' => 'UserController@getUserImage',
        'as' => 'account.image'
    ]);

    Route::get('/dashboard', [
        'uses' => 'PostController@getDashboard',
        'as' => 'dashboard',
        'middleware' => 'authe'
    ]);
    Route::post('/createpost', [
        'uses' => 'PostController@postCreatePost',
        'as' => 'post.create'
    ]);

    Route::get('/delete-post/{post_id}',[
        'uses' => 'PostController@getDeletePost',
        'as' => 'post.delete',
        'middleware' => 'authe'
    ]);

    Route::post('/edit', [
        'uses' => 'PostController@postEditPost',
        'as' => 'edit'
    ]);
    Route::post('/like', [
       'uses' => 'PostController@postLikePost',
        'as' => 'like'
    ]);
});

