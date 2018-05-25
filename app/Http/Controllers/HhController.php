<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HhController extends Controller
{
    //
    public function index(){
        $app=app('wechat.official_account');
        $oauth = $app->oauth;
        if (empty($_SESSION['wechat_user'])) {
            $_SESSION['target_url'] = 'wechat/server';
            return $oauth->redirect();
        }
        $user = $_SESSION['wechat_user'];

    }

    public function two(){
        $app=app('wechat.official_account');
        $oauth = $app->oauth;
        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        $_SESSION['wechat_user'] = $user->toArray();
        $targetUrl = empty($_SESSION['target_url']) ? '/' : $_SESSION['target_url'];
        header('location:'. $targetUrl); // 跳转到 user/profile
    }



}
