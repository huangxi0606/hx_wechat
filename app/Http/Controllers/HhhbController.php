<?php

namespace App\Http\Controllers;

use App\Facades\Common;
use App\Models\HhhbJoin;
use App\Models\HhhbUser;
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
        $this->jsApi=$this->wechat->jssdk->buildConfig(['onMenuShareQQ', 'onMenuShareWeibo','chooseImage','previewImage','uploadImage',],$json = true);
        $this->activity = [
            'id' => 001,
            'title' => '标题',
            'share_title' => '分享标题？',
            'share_desc' => '分享简介！',
            'start_at' => strtotime('2016-08-29 00:00:00'),
            'end_at' => strtotime('2019-09-13 00:00:00'),
        ];

    }
    public function index(){
        $data = session('wechat.oauth_user.default.original');
//        dd();exit;
        $user = HhhbUser::where("openid", $data['openid'])->get()->first();
        if(!$user){
            $user =new Hhhbuser();
            $user->openid =$data['openid'];
            $user->nickname =$data['nickname'];
            $user->sex = $data['sex'];
            $user->city =$data['city'];
            $user->province =$data['province'];
            $user->country =$data['country'];
            $user->headimgurl =$data['headimgurl'];
            $user->save();
        }
        $log =[
            'uoid' =>Common::auth($user->openid, 'ENCODE'),
            'join' =>HhhbJoin::where("uid" , $user->id)->get()->first(),
            'openid' =>cookie('openid' . $this->activity['id']),
            'jsApi' => $this->jsApi,
            'activity' => $this->activity,
        ];
//       dd($log);exit;
        return view('hhhb.index') -> with(compact('log'));
    }

    public function photo(Request $request) {
        $data = ['status' => 'fail', 'msg' => ''];
        $uoid = $request->uoid;
        $uoid = Common::auth($uoid, 'DECODE');
        $imgid = $request->imgid;
        $openid=cookie('openid' . $this->activity['id']);
        //判断uoid和cookie里是否一致
        if ($openid != $uoid) {
            $this->error('参数错误',404);
        }
        //判读是否上传照片
        if (!$imgid) {
            $data['msg'] = '请上传您的照片';
            return response() -> json($data);
        }
        //查询用户
        $user = HhhbUser::findOne(['openid' => $uoid]);
        if ($user == null) {
            $data['msg'] = '用户不存在';
            return response() -> json($data);
        }
        //查询参与
        $join = HhhbJoin::where('uid' ,$user->id)->get()->first();
        if ($join == null) {
            $join = new HhhbJoin();
            $join->uid = $user->id;
        }
        //下载图片
        $photo = $thumb = '';
        if ($imgid) {
            $app =app('wechat.official_account');
            $media = $app->media->uploadImage($imgid);
            if ($media) {
                $savePath = env('APP_URL').'uploads/'. '/blhb/' . date('Ymd');
                $saveName = uniqid() . '.jpg';
                $saveFile = $savePath . '/' . $saveName;
                file_put_contents($saveFile, $media);
                //判断图片尺寸
                $size = getimagesize($saveFile);
                $width = $size[0];
                $height = $size[1];
                if ($width > $height) {
                    $data['msg'] = '点击照片再选一张吧<br/>只能上传竖版照片';
                    return response() -> json($data);

                }
                if ($width < 640) {
                    $data['msg'] = '点击照片再选一张吧<br/>照片宽度必须大于640像素';
                    return response() -> json($data);

                }
            }
        }
        $join->poster = $saveFile;
        $join->save();
        //返回数据
        $data = ['status' => 'success', 'msg' => '保存成功'];
        return response() -> json($data);
    }







}
