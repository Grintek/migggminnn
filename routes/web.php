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
Route::group(['middleware' => 'vck'], function (){
    Route::get('/', function () {
        return view('welcome');
    })->name('home');


    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as' => 'signup'
    ]);

    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as' => 'signin'
    ]);





    Route::get('/logout', [
       'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);
    Route::get('/dashboard', [
        'uses' => 'PostController@getDashboard',
        'as' => 'dashboard',
        'middleware' => 'authe'
    ]);

    Route::get('/baner', [
        'uses' => 'PagesController@getNameUser',
        'as' => 'baner',
        'middleware' => 'authe'
    ]);
    Route::post('/upbaner', [
        'uses' => 'UserController@saveNameUser',
        'as' => 'baner.save',
    ]);

    Route::get('/registr', [
       'uses' => 'UserController@getRegistr',
        'as' => 'registr'
    ]);
    Route::get('/account', [
        'uses' => 'UserController@getAccount',
        'as' => 'account'
    ]);
    Route::get('/accountedit', [
       'uses' => 'UserController@updateAccount',
        'as' => 'accountedit'
    ]);
    Route::post('/updateaccount', [
       'uses' => 'UserController@postSaveAccount',
        'as' => 'accountedit.save'
    ]);
    Route::get('/userimage/{filename}',[
        'uses' => 'UserController@getUserImage',
        'as' => 'accountedit.image'
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
    Route::get('/vk', [
        'uses' => 'UserController@postSignUpVc',
        'as' => 'vk'
    ]);
    //cсылка на вк авторизацию
    Route::get('/vkaut', [
        'uses' => 'PagesController@postVkaut',
        'as' => 'vkaut'
    ]);
    Route::get('/vkaut/tok', [
        'uses' => 'PagesController@postVkaTok',
        'as' => 'tok'
    ]);

    Route::get('/channel/{vk_id}',
    [
       'uses' => 'PagesController@channelId',
        'as' => 'channel.vk.id'
    ]);
    Route::get('/channelonof',[
        'uses' => 'PagesController@channelOnOf',
        'as' => 'channel.on.of'
    ]);
    Route::get('/channelswitch',[
        'uses' => 'PagesController@channelswitch',
        'as' => 'channelswitch.on.of'
    ]);

});

Route::group(['middleware' => 'admin', 'vck'], function (){

    Route::get('/admin', [
        'uses' => 'PagesController@adminUp',
        'as' => 'admin'
    ]);
    Route::post('/adminchannel', [
        'uses' => 'PagesController@adminCreateChanel',
        'as' => 'admin.createChanel'
    ]);
    Route::post('/adminurlchannel',[
       'uses' => 'PagesController@adminCreateUrl',
        'as' => 'admin.createUrl'
    ]);

});



