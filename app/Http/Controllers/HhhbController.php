<?php

namespace App\Http\Controllers;

use App\Models\Hhhbuser;
use App\Models\Wxuser;
use EasyWeChat\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HhhbController extends BaseController
{
    //
    public $wechat;
    public $jsApi;
    public $activity;
    public $admins;


    //初始化
    public function __construct() {
        $this->wechat = app('wechat.official_account');
        $this->jsApi=$this->wechat->jssdk->buildConfig(['onMenuShareQQ', 'onMenuShareWeibo'], $debug = false, $beta = false, $json = true);
        $this->activity = [
            'id' => 001,
            'title' => '标题',
            'share_title' => '分享标题？',
            'share_desc' => '分享简介！',
            'start_at' => strtotime('2016-08-29 00:00:00'),
            'end_at' => strtotime('2017-09-13 00:00:00'),
        ];

    }
    public function index(){
        $user = session('wechat.oauth_user');
        //查找数据表是否有
        $hhhbuser =new Hhhbuser();
        $hhhbuser->nickname =$user->nickname;
        $hhhbuser->sex = $user->sex;
        $hhhbuser->city =$user->city;
        $hhhbuser->province =$user->province;
        $hhhbuser->country =$user->country;
        $hhhbuser->headimgurl =$user->headimgurl;
        $hhhbuser->openid =$user->openid;
        $hhhbuser->save();
        $openid = Cookie::make('openid' . $this->activity['id']);
        $join = BlhbJoin::findOne(['uid' => $user->id]);
    }


}
