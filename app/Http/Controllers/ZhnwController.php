<?php

namespace App\Http\Controllers;

use App\Facades\Common;

use App\Models\Wxuser;
use App\Models\ZhnwJoins;
use App\Models\ZhnwRecord;
use App\Models\ZhnwUser;
use EasyWeChat\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class ZhnwController extends BaseController
{

    public $wechat;
    public $jsApi;
    public $activity;
    public $admins;

    //初始化
    public function __construct() {
        $this->wechat = app('wechat.official_account');
        $this->jsApi=$this->wechat->jssdk->buildConfig(['onMenuShareQQ', 'onMenuShareWeibo','chooseImage','previewImage','uploadImage',],$json = true);
        $this->activity = [
            'id' => 002,
            'title' => '标题',
            'share_title' => '分享标题？',
            'share_desc' => '分享简介！',
            'start_at' => strtotime('2016-08-29 00:00:00'),
            'end_at' => strtotime('2019-09-13 00:00:00'),
        ];

    }
    public function index(Request $request){
        $data = session('wechat.oauth_user.default.original');
//        dd();exit;
        $user = ZhnwUser::where("openid", $data['openid'])->get()->first();
        if(!$user){
            $user =new ZhnwUser();
            $user->openid =$data['openid'];
            $user->nickname =$data['nickname'];
            $user->sex = $data['sex'];
            $user->city =$data['city'];
            $user->province =$data['province'];
            $user->country =$data['country'];
            $user->headimgurl =$data['headimgurl'];
            $user->save();
        }
        $uid =$request->post("uid");
        //判断uid是否自身
        $self = $uid ? ($uid == $user->id ? true : false) : true;
        //获取当前用户信息
        $cuser = $self ? $user : ZhnwUser::where("id",$uid)->get()->first();
        //获取当前用户参与信息
        $join =ZhnwJoins::where("uid",$cuser->id)->get()->first();
        //用户可兑换的礼品
        $prize = $join != null ? ZhnwJoins::getPrize($join->zan) : '';
        //检测助力好友是否参与活动
        $hjoin = $self ? $join : ZhnwJoins::where(['uid' => $user->id])->exists();
        //检测好友助力记录是否存在
        $record =ZhnwRecord::where("uid",$cuser->id AND "hid",$user->id)->get();
        //最新助力好友
        $helps =$join !=null ?ZhnwRecord::where("uid",$cuser->id)->andWhere('uid!=hid')->orderBy('id DESC')->limit(10)->all() : null;
        //双方用户加密的openid
        Cookie::queue('openid' . $this->activity['id'], $data['openid'], 3600 * 24 * 30);
        
        $log =[
            'uoid' =>Common::auth($user->openid, 'ENCODE'),
            'hoid' => Common::auth($user->openid, 'ENCODE'),
            'user' => $user,
            'self' => $self,
            'cuser' => $cuser,
            'join' => $join,
            'prize' => $prize,
            'hjoin' => $hjoin,
            'record' =>$record,
            'helps' =>$helps,
            'jsApi' => $this->jsApi,
            'activity' => $this->activity,
        ];
        return view('zhnw.index') -> with(compact('log'));
    }
    //用户注册
    public function reg(Request $request) {
        $data = ['status' => 'fail', 'msg' => ''];
        $uoid = $request->post('uoid');

        $uoid = Common::auth($uoid, 'DECODE');
//        dd($uoid);
        $name = $request->post('name');
        $tel = $request->post('tel');
        $queen = $request->post('queen', 1);
        $openid=Cookie::get('openid' . $this->activity['id']);
        dd($openid);


        //活动状态
        if (time() < $this->activity['start_at']) {
            $data['msg'] = '活动还未开始';
            return response() -> json($data);
        }
        if (time() > $this->activity['end_at']) {
            $data['msg'] = '活动已经结束了';
            return response() -> json($data);
        }
        //判断uoid和cookie里是否一致

//        dd($uoid);
        if ($openid != $uoid) {
            $data['msg'] = '参数错误';
            return response() -> json($data);
        }
        //判断姓名电话是否填写
        if (!$name) {
            $data['msg'] = '请输入您的姓名';
            return response() -> json($data);
        }
        if (!$tel || !Common::isMobile($tel)) {
            $data['msg'] = '请输入正确的手机号码';
            return response() -> json($data);
        }
        //查询用户
        $user =ZhnwUser::where("openid",$uoid)->get()->first();
        if ($user == null) {
            $data['msg'] = '用户不存在';
            return response() -> json($data);
        }

        //判断电话
        $exist =ZhnwJoin::where("tel",$tel)->get()->first();

        if ($exist) {
            $data['msg'] = '该电话号码已经参与过了';
            return response() -> json($data);
        }
        //查询参与
        $join =ZhnwJoin::where("uid",$user->id)->get()->first();
        if ($join == null) {
            $join = new ZhnwJoin();
            $join->uid = $user->id;
            $join->name = $name;
            $join->tel = $tel;
            $join->queen = $queen;
            $join->save();
            //更新统计
//            ZhnwJoin::updateActivity($this->activity['id'], ['join_num']);
        }
        $data = ['status' => 'success', 'msg' => '登记成功'];
        return response() -> json($data);
    }

    //好友助力
    public function Help(Request $request) {
        $data = ['status' => 'fail', 'msg' => ''];
        $uoid =$request->post('uoid');
        $hoid = $request->post('hoid');
        $uoid = Common::auth($uoid, 'DECODE');
        $hoid = Common::auth($hoid, 'DECODE');
        $openid=cookie('openid' . $this->activity['id']);
        $num = 1;
        //活动状态
        if (time() < $this->activity['start_at']) {
            $data['msg'] = '活动还未开始';
            return response() -> json($data);
        }
        if (time() > $this->activity['end_at']) {
            $data['msg'] = '活动已经结束了';
            return response() -> json($data);
        }
        //判断参数
        if (!$uoid || !$hoid) {
            $data['msg'] = '参数错误';
            return response() -> json($data);
        }
        //判断hoid和cookie里是否一致，是否低版本，是否AJAX提交
        if ($openid != $hoid || Common::isLowWechat() || !Common::isAjax()) {
            $data['msg'] = '参数错误';
            return response() -> json($data);
        }
        //判断双方用户是否存在
        $user =ZhnwUser::where("openid",$uoid)->get()->first();
        $help = $uoid == $hoid ? $user : ZhnwUser::where("openid",$hoid)->get()->first();
        if ($user == null || $help == null) {
            $data['msg'] = '用户不存在';
            return response() -> json($data);
        }
        //查询参与信息
        $join =ZhnwJoin::where("uoid",$user->id);
        if ($join == null) {
            $data['msg'] = '该用户未参与活动';
            return response() -> json($data);
        }

        //判断助力记录是否存在
        $record =ZhnwRecord::where("uid",$user->id AND "hid",$help->id AND "created_at", CURDATE())->get();
        if ($record == null) {
            $record = new ZhnwRecord();
            $record->uid = $user->id;
            $record->hid = $help->id;
            $record->rand_num = $num;
            $record->save();
            //更新统计
//            ZhnwJoin::updateActivity($this->activity['id'], ['help_num']);
            //记录助力日志
//            if ($this->activity['log']) {
//                Log::saveLog($this->activity['id'], $user->id, $help->id);
//            }
            //更新点赞数
            DB::table('zhnwjoin')->where("uid",$user->id)->increment('zum');
            //返回结果
            $data =[
                "status"=>'success',
                "msg" =>'你成为了TA的臣民',
                'num' => $num
            ];
            return response() -> json($data);
        } else {
            $data =[
                "status"=>'fail',
                "msg" =>'你成为了TA的臣民',
                'num' => 0
            ];
            return response() -> json($data);
        }
    }
    //奖品兑换
    public function Exchange(Request $request) {
        //确定兑换
        if (isset($_POST['exchange']) && isset($_POST['uoid'])) {
            $uoid = $request->post('uoid');
            $user =ZhnwUser::where("openid",$uoid);
            $join =ZhnwJoin::where("uid",$user->id)->get()->first();
            $join->exchange =1;
            $join->exchange_at =time();
//            Gic::alert('兑换成功', Url::to(['exchange', 'uoid' => Gic::auth($uoid, 'ENCODE')]));
        }
        //校验登录
        if (isset($_POST['password']) && isset($_POST['forward'])) {
            $forward = Gic::post('forward');
            $password = Gic::post('password');
            if ($password != $this->activity['password']) {
                Gic::alert('密码错误');
            }
            Gic::setSession('login', $password);
        }
        //判断登录
        $login = Gic::getSession('login');
        if (!$login || $login != $this->activity['password']) {
            $forward = Yii::$app->request->absoluteUrl;
            return $this->render('login', [
                'forward' => $forward,
            ]);
        }
        //查询用户信息
        $uoid = Gic::get('uoid');
        $uoid = Gic::auth($uoid, 'DECODE');
        $user = ZhnwUser::findOne(['openid' => $uoid]);
        if ($user == null) {
            throw new NotFoundHttpException('用户信息不存在！');
        }
        $join = ZhnwJoin::findOne(['uid' => $user->id]);
        if ($join == null) {
            throw new NotFoundHttpException('用户未参与活动！');
        }
        $prize = ZhnwJoin::getPrize($join->zan);
        return $this->render('exchange', [
            'uoid' => $uoid,
            'user' => $user,
            'join' => $join,
            'prize' => $prize,
        ]);
    }

}
