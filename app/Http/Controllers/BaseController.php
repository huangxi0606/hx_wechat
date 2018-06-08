<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
//    protected $url;
////    public function __construct()
////    {
////       $this ->profile();
////    }
//    public function profile()
//    {
//        if (!$this -> url){
//            $this ->url ='wechat/hx';
//        }
//        // 未登录
//        if (empty($_SESSION['wechat_user'])) {
//            session(['target_url'=>$this ->url]);
////            $value = session('target_url');
////            dd($value);exit;
//            $app = app('wechat.official_account');
//            $oauth = $app->oauth;
//            $oauth->redirect()->send();
//        }
//        // 已经登录过
//        $user = $_SESSION['wechat_user'];
////        file_put_contents('0528.txt' , var_export($user , true));
//    }
//
//    public function callback()
//    {
//        $value = session('target_url');
//        dd($value);exit;
//        $app = app('wechat.official_account');
//        $oauth = $app->oauth;
//        // 获取 OAuth 授权结果用户信息
//        $user = $oauth->user();
////        dd($user);
//        dd(session('target_url'));exit;
//        session(['wechat_user'=>$user->toArray()]);
//        $targetUrl = empty(session('target_url')) ? '/' : session('target_url');
//        dd($targetUrl);exit;
//        return redirect($targetUrl);
////        dd('0000');exit;
//    }

    /**
     * 响应一个http的成功请求
     * @param object $data  要返回的数据
     * @param int $code   成功代码，一般为0 如果传其它代码，客户端将以错误处理
     * @return
     */
    public function success ($data, $code = 0) {
        $result = array();
        if (is_string($data))
            $result['message'] = $data;
        else
            $result['result'] = $data;
        $result['status_code'] = $code;
        return $this->array($result);
    }

    /**
     * 响应一个http的失败请求
     * @param string $msg 要返回给客户端的消息
     * @param int $code 要返回客户端的错误代码
     * @return 引发一个http请求的错误异常
     */
    public function error ($msg, $code) {
        $this->error($msg, $code);
    }
}
