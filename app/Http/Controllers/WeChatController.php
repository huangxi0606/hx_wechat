<?php

namespace App\Http\Controllers;

use App\Models\Wxuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Common;

class WeChatController extends Controller
{
    //

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
//    public function serve()
//    {
//        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
//
//        $app = app('wechat.official_account');
//        $app->server->push(function($message){
//            return "欢迎关注 women！";
//        });
//        return $app->server->serve();
//    }

    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
//        file_put_contents('123.txt' , var_export('123' , true));
        $wechat = app('wechat.official_account');
        $wechat->server->push(function ($message) {
            switch ($message['MsgType']) {
                case 'event':
                    switch ($message['Event']) {
                        # 关注事件
                        case 'subscribe':
//                            $wechat = app('wechat.official_account');
//                            $user =$wechat->user->get($message['FromUserName']);

                            $wxUser = Wxuser::where('openid', $message['FromUserName'])->first();
                            if($wxUser){
                                $wxUser ->subscribe =1;
                                $wxUser ->openid =$message['FromUserName'];
//                                $wechat = app('wechat.official_account');
//                                $user =  $wechat->user->get($message['FromUserName']);
                                $wxUser ->save();
                                return '感谢您的再次关注';
                            }else{
//                                $wxUser ->openid =$message['FromUserName'];
                                $wechat = app('wechat.official_account');
                                $user =  $wechat->user->get($message['FromUserName']);
//                                file_put_contents('aaaaa.txt' , var_export($user , true));
                                $wxUser =new Wxuser();
                                $wxUser->nickname =$user['nickname'];
                                $wxUser->sex =$user['sex'];
                                $wxUser->city =$user['city'];
                                $wxUser->province =$user['province'];
                                $wxUser->country =$user['country'];
                                $wxUser->headimgurl =$user['headimgurl'];
                                $wxUser->subscribe =$user['subscribe'];
                                $wxUser->openid =$user['openid'];
                                $wxUser->save();
                                return '感谢您的关注';
                            }
                            break;
                        case 'unsubscribe':
//                            取消关注
                            Wxuser::where('openid', $message['FromUserName'])->update(['subscription' => 0]);
                        case 'CLICK':
//                           '点击事件'
                        default:
                            break;
                    }
                    break;
                    return '收到事件消息';
                    break;
                case 'text':
                    return '收到文字消息';
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    $data = [
                        'openid' => $message -> FromUserName ,
                        'lat' => $message->Location_X,    # 23.137466   地理位置纬度
                        'long' => $message->Location_Y ,   # 113.352425  地理位置经度
                        'precision' => $message->Label,   # 119.385040  地理位置精度
                    ];
                    file_put_contents($data , var_export('123' , true));
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                case 'file':
                    return '收到文件消息';
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }

            // ...
        });
        Log::info('return response.');
        return $wechat->server->serve();
    }

    public function hx(){
        $user =session('wechat.oauth_user.default');
        $data = Wxuser::where("openid", $user->id)->get()->first();
        dd($data);exit;
       $hx= Common::hx();
       dd($hx);
    }


}
