<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::any('/wechat', 'WeChatController@serve');

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/user', function () {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料    openid
    });
    Route::any('/wechat/hx', 'WeChatController@hx');
    Route::any('/hhhb/index', 'HhhbController@index');
    Route::any('/hhhb/view', 'HhhbController@view');
    Route::any('/zhnw/reg', 'ZhnwController@reg');
    Route::any('/zhnw/index', 'ZhnwController@index');
    Route::any('/profile', 'BaseController@profile');
    Route::any('/base/callback', 'BaseController@callback');
    Route::any('/hh/index', 'HhController@index');
});
