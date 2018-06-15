@extends('layout.home')
@section('title' ,$log['activity']['title'])
@section('css')
    <link href="{{asset('/activity/zhnw/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/loading.css')}}" rel="stylesheet">
    <link href="{{asset('/js/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('/js/swiper3/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('/js/swiper3/swiper.min.css')}}" rel="stylesheet">
@stop
@section('content')
<div class="activity">
@if ($log['join']==null)
<!--首页-->
    <div class="wrapper index-box">
        <p><img src="{{asset('/activity/hhhb/images/rings.svg')}}"></p>
        <img src="{{asset('/activity/zhnw/images/index-bg.jpg')}}">
        <div class="wrapper-inner">
            <img src="{{asset('/activity/zhnw/images/index-pic.png')}}" class="index-pic pulse">
            <div class="form-group">
                <p><input type="text" name="name" id="name" class="form-text" value="{{old('name')}}" placeholder="姓名" maxlength="5"></p>
                <p><input type="tel" name="tel" id="tel" class="form-text" placeholder="电话" maxlength="11"></p>
                <p><img src="{{asset('/activity/zhnw/images/btn-reg.png')}}" class="btn-reg"><img src="{{asset('/activity/zhnw/images/btn-read.png')}}" class="btn-read"></p>
            </div>
        </div>
    </div>
    <!--选择页-->
    <div class="wrapper sel-box" style="display:none;">
        <img src="{{asset('/activity/zhnw/images/sel-bg.jpg')}}">
        <div class="wrapper-inner">
            <img src="{{asset('/activity/zhnw/images/sel-title.png')}}" class="sel-title">
            <div class="sel-pic">
                <div class="swiper-container">
                    <div class="swiper-wrapper" data-queen="1">
                        <div class="swiper-slide" data-id="1"><img src="{{asset('/activity/zhnw/images/sel-1.png')}}"></div>
                        <div class="swiper-slide" data-id="2"><img src="{{asset('/activity/zhnw/images/sel-2.png')}}"></div>
                    </div>
                </div>
            </div>
            <div class="sel-star"><img src="{{asset('/activity/zhnw/images/star.png')}}" class="flash"></div>
            <div class="sel-btns">
                <img src="{{asset('/activity/zhnw/images/btn-left.png')}}" class="btn-left">
                <img src="{{asset('/activity/zhnw/images/btn-right.png')}}" class="btn-right">
            </div>
            <img src="{{asset('/activity/zhnw/images/btn-ok.png')}}" class="btn-ok">
            <div class="sel-text">
                <img src="{{asset('/activity/zhnw/images/sel-text.png')}}">
                <p class="sel-p1">优雅女王，89平方米智慧新居，生活安排井井有条。</p>
                <p class="sel-p2" style="display:none;">御姐女王，130平方米霸气侧漏，方方面面完美把控。</p>
            </div>
        </div>
    </div>
@endif
@if ($log["join"] !=null)
<!--内容页-->
    <div class="wrapper view-box">
        <img src="{{asset('/activity/zhnw/images/sel-bg.jpg')}}">
        <div class="wrapper-inner">
            <div class="view-title">
                <img src="{{asset('/activity/zhnw/images/view-title.png')}}">
                <p><span>{{$log['join']->name}}</span>女王</p>
            </div>
            <div class="view-pic">
                <img src="{{asset('/activity/zhnw/images/sel-$log["join"]->queen.png')}}" class="view-img">
            </div>
            <div class="view-star"><img src="{{asset('/activity/zhnw/images/star.png')}}" class="flash"></div>
            <div class="view-tip"><p>您目前拥有臣民数[<span class="znum">{{$log["join"]->zan}}</span>]</p></div>
            <div class="view-btns">

            @if ($log["self"])
                <img src="{{asset('/activity/zhnw/images/btn-share.png')}}" class="btn-share">
                <img src="{{asset('/activity/zhnw/images/btn-prize.png')}}" class="btn-prize">
            @else
                @if ($log["record"])
                <img src="{{asset('/activity/zhnw/images/btn-help2.png')}}" class="btn-help btn-disabled">
                @else
                <img src="{{asset('/activity/zhnw/images/btn-help.png')}}" class="btn-help">
                @endif
                <img src="{{asset('/activity/zhnw/images/btn-join.png')}}" class="btn-join">
            @endif
            </div>
            <div class="view-tab" id="view-tab">
                <dl>
                    <dt>
                        <a href="javascript:void(0);" class="now">最新臣民</a>
                        <a href="javascript:void(0);">活动规则</a>
                    </dt>
                    <dd>
                        <ul>
                            @foreach ($log["helps"] as $k)
                                <li>
                                @if(isset($k->help->headimgurl) && $k->help->headimgurl)
                                     <img src={{$k->help->headimgurl}}>
                                @else
                                    <img src={{asset('/images/head.jpg')}}>
                                @endif
                                @if(isset($k->help->nickname))
                                {{$k->help->nickname}}
                                @else
                                {{"hx06"}}
                                @endif
                                <span>臣民+1</span>
                               </li>
                            @endforeach
                        </ul>
                    </dd>
                    <dd>
                        <p class="t">如何进入活动:</p>
                        <p>1.搜索“zhenghongzhiye”,关注正弘置业公众号;</p>
                        <p>2.点击底部菜单“女王驾到”或回复关键字“女王”,进入活动;</p>
                        <p>3.填写姓名与电话,点击【驾到啦】</p>
                        <p class="t">如何成为真正的女王:</p>
                        <p>1.进入后,选择想要成为的女王形象,点击【确定】;</p>
                        <p>2.点击【召唤我的臣民】,分享好友或朋友圈对你【俯首称臣】,活动截止后，根据拥有臣民数量发放奖品;</p>
                        <p class="t">奖品说明:</p>
                        <p>1.臣民数达到60即可获得娇艳玫瑰花一捧<small>(精美包装)</small>;</p>
                        <p>2.臣民数达到30即可获得妖娆蓝色妖姬一支<small>(精美包装)</small>;</p>
                        <p class="t">好友如何做自己的女王:</p>
                        <p>1.方式一:点击【做自己的女王】;</p>
                        <p>2.方式二:详见上文中“如何进入活动”.</p>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    @endif
</div>
<!--分享提示-->
<div class="share-tip"><img src="{{asset('/activity/zhnw/images/guide.png')}}"></div>
<!--加载动画-->
<div class="send-tip ui-dialog ui-dialog-notice">
    <div class="ui-dialog-cnt"><i class="ui-loading-bright"></i><p class="send-text">加载中......</p></div>
</div>
@if($log["join"]==null)
<!--活动说明-->
<div class="open-tip read-tip">
    <div class="open-main">
        <div class="open-close read-close"><img src="{{asset('/activity/zhnw/images/close.png')}}"></div>
        <div class="open-title">活动规则</div>
        <div class="open-img"><img src="{{asset('/activity/zhnw/images/read-pic.png')}}"></div>
        <div class="open-text read-text">
            <p class="t">如何进入活动:</p>
            <p>1.搜索“zhenghongzhiye”,关注正弘置业公众号，或搜索“zhongyanggongyuan14”,关注正弘中央公园公众号;</p>
            <p>2.点击底部菜单“女王驾到”或回复关键字“女王”,进入活动;</p>
            <p>3.填写姓名与电话,点击【驾到啦】</p>
            <p class="t">如何成为真正的女王:</p>
            <p>1.进入后,选择想要成为的女王形象,点击【确定】;</p>
            <p>2.点击【召唤我的臣民】,即可转发好友或朋友圈,好友点击【俯首称臣】即可为你助力;完成规定数量后，即可致电售楼部预约领奖;</p>
            <p class="t">奖品说明:</p>
            <p>1.臣民数达到100即可获得娇艳玫瑰花一捧<small>(精美包装)</small>;</p>
            <p>2.臣民数达到50即可获得妖娆蓝色妖姬一支<small>(精美包装)</small>;</p>
            <p class="t">好友如何做自己的女王:</p>
            <p>1.方式一:点击【做自己的女王】;</p>
            <p>2.方式二:详见上文中“如何进入活动”.</p>
        </div>
    </div>
</div>
@endif
@if($log["join"] !=null)
<!--礼品兑换-->
<div class="open-tip prize-tip">
    <div class="open-main">
        <div class="open-close prize-close"><img src="{{asset('/activity/zhnw/images/close.png')}}"></div>
        <div class="open-title">领取礼物</div>
        <div class="open-text prize-text">
            <p>姓名：{{$log["join"]->name}}</p>
            <p>电话：{{$log["join"]->tel}}</p>
            <p>礼品：{{$log["prize"]}}</p>
            <p class="r">请提前电话预约,凭以下二维码兑换奖品</p>
            <div class="qrcode"></div>
            <p>领奖时间:2016年3月8号—3月9号</p>
            <p>领奖地址:郑州市金水区花园路与东风路西南角【正弘中央公园售楼处】</p>
            <p>预约电话:0371-69363333</p>
            <p class="a">[温馨提示]</p>
            <p>①每人只能领取一件奖品,数量有限，先到先得;</p>
            <p>②在您前往案场领取奖品时,请提前拨打电话进行奖品预约;</p>
            <p>领奖必须由本人领取,不得代领。</p>
        </div>
    </div>
</div>
@endif
@stop
@section('js')
    <script type="text/javascript" src="{{asset('/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jquery.touch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/toastr/toastr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/swiper3/swiper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jquery.tab.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/yii.js')}}"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script>
    var uoid ='{{$log['uoid']}}';
    var hoid ='{{$log['hoid']}}';
    var self ='{{$log['self']}}';
    wx.config(
            {!!$log['jsApi']!!}
    );
    //变量
    var name = tel = '';
    var queen = 1;
    //注册
    $('.btn-reg').click(function () {
        name = $('#name').val();
        tel = $('#tel').val();
        if (name == '') {
            toastr.error('请输入您的姓名！');
            return false;
        }
        if (tel == '') {
            toastr.error('请输入您的手机号码！');
            return false;
        }
        if (!ismob(tel)) {
            toastr.error('请输入正确的手机号码！');
            return false;
        }
        $('.index-box').hide();
        $('.sel-box').show();
        var mySwiper = new Swiper('.swiper-container', {
            nextButton: '.btn-right',
            prevButton: '.btn-left',
            direction: 'horizontal',
            loop: true,
            onSlideChangeEnd: function (swiper) {
                var i = swiper.activeIndex;
                queen = $('.swiper-slide').eq(i).attr('data-id');
                if (queen == 1) {
                    $('.sel-p1').show();
                    $('.sel-p2').hide();
                } else {
                    $('.sel-p1').hide();
                    $('.sel-p2').show();
                }
            }
        })
    });
    //规则
    $('.btn-read').click(function () {
        $('.read-tip').show();
    });
    $('.read-close').click(function () {
        $('.read-tip').hide();
    });
    //选择
    $('.btn-ok').click(function () {
        $('.send-text').text('保存中...');
        $('.send-tip').addClass('show');
        if (self){
            uoid =uoid;
        }else{
            uoid =hoid;
        }
        var url ="{{url('zhnw/reg')}}";
        $.post(url ,{'_token':$('meta[name="_token"]').attr('content'),uoid: uoid, name: name, tel: tel, queen: queen}, function (msg) {
            $('.send-tip').removeClass('show');
            console.log(msg)
            if (msg.status == 'fail') {
                toastr.error(msg.msg);
            } else {
                location.href = '{{url('zhnw/index')}}';
            }
        });
    });
    //兑奖
    $('.btn-prize').click(function () {
        $('.prize-tip').show();
    });
    $('.prize-close').click(function () {
        $('.prize-tip').hide();
    });
    //分享
    $('.btn-share').click(function () {
        $('.share-tip').show();
    });
    $('.share-tip').click(function () {
        $(this).hide();
    });
    //二维码

    //助力
    $('.btn-help').click(function () {
        if (!$(this).hasClass('btn-disabled')) {
            $('.send-text').text('助力中...');
            $('.send-tip').addClass('show');
            var url = "{{url('zhnw/help')}}";
            $.when(post(url , {'_token':$('input[name=_token]').val(),uoid: uoid, hoid: hoid})).done(function (msg) {
                $('.send-tip').removeClass('show');
                if (msg.status == 'fail') {
                    toastr.error(msg.msg);
                } else {
                    var num = parseInt($('.znum').text()) + msg.num;
                    $('.znum').html(num);
                    toastr.options.hideDuration = 5000;
                    toastr.success(msg.msg);
                    $('.btn-help').attr('src', '{{asset('/activity/zhnw/images/btn-help2.png')}}');
                    $('.btn-help').addClass('btn-disabled');
                }
            });
        }
    });
    //加入
    $('.btn-join').click(function () {
        location.href = '{{url('zhnw/index')}}';
    });
    //选项卡
    $('.view-tab').tabs();
</script>
    @stop
