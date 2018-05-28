<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $url;
//    public function __construct()
//    {
//       $this ->profile();
//    }
    public function profile()
    {
        if (!$this -> url){
            $this ->url ='wechat/hx';
        }
        // 未登录
        if (empty($_SESSION['wechat_user'])) {
            session(['target_url'=>$this ->url]);
//            $value = session('target_url');
//            dd($value);exit;
            $app = app('wechat.official_account');
            $oauth = $app->oauth;
            $oauth->redirect()->send();
        }
        // 已经登录过
        $user = $_SESSION['wechat_user'];
//        file_put_contents('0528.txt' , var_export($user , true));
    }

    public function callback()
    {
        $value = session('target_url');
        dd($value);exit;
        $app = app('wechat.official_account');
        $oauth = $app->oauth;
        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
//        dd($user);
        dd(session('target_url'));exit;
        session(['wechat_user'=>$user->toArray()]);
        $targetUrl = empty(session('target_url')) ? '/' : session('target_url');
        dd($targetUrl);exit;
        return redirect($targetUrl);
//        dd('0000');exit;
    }

}
