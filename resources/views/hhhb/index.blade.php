@extends('layout.home')
@section('title' ,$log['activity']['title'])
@section('css')
    <link href="{{asset('/activity/hhhb/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/activity/hhhb/css/select.css')}}" rel="stylesheet">
    <link href="{{asset('/css/loading.css')}}" rel="stylesheet">
    <link href="{{asset('/js/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('/js/swiper3/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('/js/swiper3/swiper.min.css')}}" rel="stylesheet">
@stop

@section('content')
<div class="loading">
    <div class="load-inner">
        <p>保利正在为您加载...</p>
        <p><img src="{{asset('/activity/hhhb/images/rings.svg')}}"></p>
        <p><span class="load-percent">0%</span></p>
    </div>
</div>
<div class="swiper-container">
    <!--音乐控制-->
    <div class="swiper-audio animated infinite s3 rolling"></div>
    <!--滑动箭头 -->
    <div class="swiper-next animated infinite alternate arrowUp"></div>
    <div class="swiper-wrapper">
        <div class="swiper-slide p1-bg">
            <div class="swiper-inner" style="">
                <img src="" class="logo top animated sd5 bounceInDown">
                <img src="" class="p1-1 top animated s1 bounceInLeft">
                <img src="" class="p1-2 top animated s1d5 bounceInRight">
                <img src="" class="p1-3 top animated s2 fadeInUp">
                <h2 class="swiper-skip">跳过>></h2>
            </div>
        </div>
        <div class="swiper-slide p2-bg">
            <div class="swiper-inner">
                <img src="" class="logo top animated s1 bounceInDown">
                <img src="" class="p2-1 top animated s1 bounceInLeft">
                <img src="" class="p2-2 top animated s1d5 bounceInRight">
                <img src="" class="p2-3 top animated s2 fadeInUp">
                <h2 class="swiper-skip">跳过>></h2>
            </div>
        </div>
        <div class="swiper-slide p3-bg">
            <div class="swiper-inner">
                <img src="" class="logo top animated s1 bounceInDown">
                <img src="" class="p3-1 top animated s1 bounceInLeft">
                <img src="" class="p3-2 top animated s1d5 bounceInRight">
                <img src="" class="p3-3 top animated s2 fadeInUp">
                <h2 class="swiper-skip">跳过>></h2>
            </div>
        </div>
        <div class="swiper-slide p4-bg">
            <div class="swiper-inner">
                <img src="" class="logo top animated s1 bounceInDown">
                <img src="" class="p4-1 top animated s1 bounceInLeft">
                <img src="" class="p4-2 top animated s1d5 bounceInRight">
                <img src="" class="p4-3 top animated s2 fadeInUp">
                <h2 class="swiper-skip">跳过>></h2>
            </div>
        </div>
        <div class="swiper-slide p5-bg">
            <div class="swiper-inner">
                <img src="" class="logo top animated s1 bounceInDown">
                <img src="" class="p5-1 top animated s1 bounceInLeft">
                <img src="" class="p5-2 top animated s1d5 bounceInRight">
                <img src="" class="p5-3 top animated s2 fadeInUp">
                <h2 class="swiper-skip">跳过>></h2>
            </div>
        </div>
        <div class="swiper-slide p6-bg">
            <div class="swiper-inner">
                <img src="" class="logo top animated s1 bounceInDown">
                <img src="" class="p6-1 top animated s1 bounceInLeft">
                <img src="" class="p6-2 top animated s1d5 bounceInRight">
                <img src="" class="p6-3 top animated s2 fadeInUp">
                <h2 class="swiper-skip">跳过>></h2>
            </div>
        </div>
        <div class="swiper-slide p7-bg">
            <div class="swiper-inner">
                <img src="" class="p7-1 top animated s1 bounceInDown">
                <img src="" class="btn-start top animated s1d5 bounceInRight">
            </div>
        </div>
    </div>
</div>
<div class="activity" style="display:none;" >
    <!--步骤一-->
    <div class="wrapper index-box">
        <img src="{{asset('/activity/hhhb/images/bg.jpg')}}">
        <div class="wrapper-inner">
            <div class="form-photo">
                <img src="{{asset('/activity/hhhb/images/btn-upload.png')}}" class="btn-upload">
            </div>
            <img src="{{asset('/activity/hhhb/images/btn-next.png')}}" class="btn-next">
            <div class="btns step1">
                <img src="{{asset('/activity/hhhb/images/btn-s1-n.png')}}" class="btn-one">
                <img src="{{asset('/activity/hhhb/images/btn-s2-n.png')}}" class="btn-two">
                <img src="{{asset('/activity/hhhb/images/btn-s3-n.png')}}" class="btn-three">
            </div>
        </div>
    </div>
    <!--步骤二-->
    <div class="wrapper info-box" style="display:none;">

        <img src="{{asset('/activity/hhhb/images/bg.jpg')}}">
        <div class="wrapper-inner">
            <div class="form-group">
                <p><input type="text" name="name" id="name" class="form-text" placeholder="尊姓大名" maxlength="5"></p>
                <p>今晚不走啥？</p>
                <div class="select">
                    <select id="prev-text">
                        <option value="">选一个</option>
                        <option value="喉咙">喉咙</option>
                        <option value="胃">胃</option>
                        <option value="人鱼线">人鱼线</option>
                        <option value="颜值">颜值</option>
                        <option value="中原路">中原路</option>
                        <option value="62路">62路</option>
                        <option value="盒饭">盒饭</option>
                        <option value="耳朵">耳朵</option>
                        <option value="眼睛">眼睛</option>
                        <option value="拳头">拳头</option>
                        <option value="脚步">脚步</option>
                    </select>
                </div>
                <p><input type="text" name="content" id="content" class="form-text" placeholder="自己写（限5字）" maxlength="5"></p>
                <p><img src="{{asset('/activity/hhhb/images/btn-ok.png')}}" class="btn-ok"></p>

            </div>
            <div class="btns step2">

                <img src="{{asset('/activity/hhhb/images/btn-s1-n.png')}}" class="btn-one">
                <img src="{{asset('/activity/hhhb/images/btn-s2-n.png')}}" class="btn-two">
                <img src="{{asset('/activity/hhhb/images/btn-s3-n.png')}}" class="btn-three">
            </div>
        </div>
    </div>
    <!--步骤三-->
    <div class="wrapper view-box" style="display:none;">
        <img src="{{asset('/activity/hhhb/images/bg.jpg')}}">
        <div class="wrapper-inner">
            <div class="view-photo">
                <img src="" class="btn-preview">
            </div>
            <div class="end-btns"><img src="{{asset('/activity/hhhb/images/btn-again.png')}}" class="btn-again">
                <img src="{{asset('/activity/hhhb/images/btn-share.png')}}" class="btn-share"></div>
            <div class="btns step3">
                <img src="{{asset('/activity/hhhb/images/btn-s1-n.png')}}" class="btn-one">
                <img src="{{asset('/activity/hhhb/images/btn-s2-n.png')}}" class="btn-two">
                <img src="{{asset('/activity/hhhb/images/btn-s3-n.png')}}" class="btn-three">
            </div>       
        </div>
    </div>
</div>
<!--分享提示-->
<div class="share-tip"><img src="{{asset('/activity/hhhb/images/guide.png')}}"></div>
<!--加载动画-->
<div class="send-tip ui-dialog ui-dialog-notice">
    <div class="ui-dialog-cnt"><i class="ui-loading-bright"></i><p class="send-text">加载中......</p></div>
</div>
@stop
@section('js')
{{--@section('js')--}}
    <script type="text/javascript" src="{{asset('/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jquery.touch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/toastr/toastr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/swiper3/swiper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/createjs/preloadjs-0.6.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/createjs/soundjs-0.6.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/yii.js')}}"></script>
    {{--<script type="text/javascript" src='http://res.wx.qq.com/open/js/jweixin-1.2.0.js'></script>--}}
<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
{{--@stop--}}
<script>
    var uoid ='{{$log['uoid']}}';
    wx.config(
        {!!$log['jsApi']!!}
    );
    //微信相关
    var music;
    var playing;
    var imgs = [
        {"id": "logo", "in": "img", "src": "{{asset('/activity/hhhb/images/logo.png')}}"},
        {"id": "p1-bg", "in": "bg", "src": "{{asset('/activity/hhhb/images/p1-bg.jpg')}}"},
        {"id": "p1-1", "in": "img", "src": "{{asset('/activity/hhhb/images/p1-1.png')}}"},
        {"id": "p1-2", "in": "img", "src": "{{asset('/activity/hhhb/images/p1-2.png')}}"},
        {"id": "p1-3", "in": "img", "src": "{{asset('/activity/hhhb/images/p1-3.png')}}"},
        {"id": "p2-bg", "in": "bg", "src": "{{asset('/activity/hhhb/images/p2-bg.jpg')}}"},
        {"id": "p2-1", "in": "img", "src": "{{asset('/activity/hhhb/images/p2-1.png')}}"},
        {"id": "p2-2", "in": "img", "src": "{{asset('/activity/hhhb/images/p2-2.png')}}"},
        {"id": "p2-3", "in": "img", "src": "{{asset('/activity/hhhb/images/p2-3.png')}}"},
        {"id": "p3-bg", "in": "bg", "src": "{{asset('/activity/hhhb/images/p3-bg.jpg')}}"},
        {"id": "p3-1", "in": "img", "src": "{{asset('/activity/hhhb/images/p3-1.png')}}"},
        {"id": "p3-2", "in": "img", "src": "{{asset('/activity/hhhb/images/p3-2.png')}}"},
        {"id": "p3-3", "in": "img", "src": "{{asset('/activity/hhhb/images/p3-3.png')}}"},
        {"id": "p4-bg", "in": "bg", "src": "{{asset('/activity/hhhb/images/p4-bg.jpg')}}"},
        {"id": "p4-1", "in": "img", "src": "{{asset('/activity/hhhb/images/p4-1.png')}}"},
        {"id": "p4-2", "in": "img", "src": "{{asset('/activity/hhhb/images/p4-2.png')}}"},
        {"id": "p4-3", "in": "img", "src": "{{asset('/activity/hhhb/images/p4-3.png')}}"},
        {"id": "p5-bg", "in": "bg", "src": "{{asset('/activity/hhhb/images/p5-bg.jpg')}}"},
        {"id": "p5-1", "in": "img", "src": "{{asset('/activity/hhhb/images/p5-1.png')}}"},
        {"id": "p5-2", "in": "img", "src": "{{asset('/activity/hhhb/images/p5-2.png')}}"},
        {"id": "p5-3", "in": "img", "src": "{{asset('/activity/hhhb/images/p5-3.png')}}"},
        {"id": "p6-bg", "in": "bg", "src": "{{asset('/activity/hhhb/images/p6-bg.jpg')}}"},
        {"id": "p6-1", "in": "img", "src": "{{asset('/activity/hhhb/images/p6-1.png')}}"},
        {"id": "p6-2", "in": "img", "src": "{{asset('/activity/hhhb/images/p6-2.png')}}"},
        {"id": "p6-3", "in": "img", "src": "{{asset('/activity/hhhb/images/p6-3.png')}}"},
        {"id": "p7-bg", "in": "bg", "src": "{{asset('/activity/hhhb/images/index-bg.jpg')}}"},
        {"id": "p7-1", "in": "img", "src": "{{asset('/activity/hhhb/images/p7-1.png')}}"},
        {"id": "btn-start", "in": "img", "src": "{{asset('/activity/hhhb/images/btn-start.png')}}"},
        {"id": "music", "in": "sound", "src": "{{asset('/activity/hhhb/images/music.mp3')}}"}
    ];
    loadImages();
    function loadImages() {
        var loader = new createjs.LoadQueue();
        loader.setMaxConnections(10);
        loader.installPlugin(createjs.Sound);
        loader.on('complete', function () {
            $('.loading').fadeOut();
            music = createjs.Sound.createInstance('music');
            music.volume = 0.8;
            music.play({loop: -1});
            playing = true;
        });
        loader.on('progress', function (e) {
            $('.load-percent').text(((this.progress + 0.000) * 100).toFixed(0) + '%');
        });
        loader.on("fileload", function (e) {
            var file = e.item;
            var type = file.type;
            if (type == createjs.LoadQueue.IMAGE) {
                if (file.in == 'img') {
                    $('.' + file.id).attr('src', file.src);
                } else {
                    $('.' + file.id).css('background', 'url(' + file.src + ') 50% 50% / 100% 100%  no-repeat');
                }
            }
        });
        loader.loadManifest(imgs);
    }
    var swiper = new Swiper('.swiper-container', {
        direction: 'vertical',
        nextButton: '.swiper-next',
        onSliderMove: function (swiper, event) {
            if (swiper.activeIndex + 1 == swiper.slides.length) {
            }
        }
    });
    $('.swiper-audio').click(function () {
        if (playing) {
            music.stop();
            playing = false;
            $(this).addClass('off');
            $(this).removeClass('rolling');
        } else {
            music.play();
            playing = true;
            $(this).removeClass('off');
            $(this).addClass('rolling');
        }
    });
    $('.swiper-skip,.btn-start').click(function () {
        $('.swiper-container').hide();
        $('.activity').show();
        step(1);
    });
    //提示位置
    toastr.options.positionClass = 'toast-top-center';
    //本地远程图片
    var images = {
        localId: [],
        serverId: []
    };
    //点击上传图片
    $('.btn-upload').click(function () {
        console.log(6666);
        wx.chooseImage({
            success: function (res) {
                images.localId = res.localIds;
                $('.btn-upload').attr('src', images.localId[0]);
                upload();
            }
        });
    });
    //微信上传图片
    function upload() {
        console.log(444);
        wx.uploadImage({
            localId: images.localId[0],
            success: function (res) {
                images.serverId.push(res.serverId);
            },
            fail: function (res) {
                toastr.error('上传失败，请重新选择照片！');
            }
        });
    }
    //上传照片
    $('.btn-next').click(function () {
        if (images.localId.length <= 0) {
            toastr.error('请点击上传照片');
            return false;
        }
        if (images.serverId.length <= 0) {
            toastr.error('请点击照片尝试再次上传');
            return false;
        }
        var imgid = images.serverId[images.serverId.length - 1];
        $('.send-text').text('保存中...');
        $('.send-tip').addClass('show');
        var url = "{{url('hhhb/photo')}}";
        $.when(post(url , {'_token':$('input[name=_token]').val(),uoid: uoid, imgid: imgid})).done(function (msg) {
            $('.send-tip').removeClass('show');
            toastr.options.hideDuration = 8000;
            if (msg.status == 'fail') {
                toastr.error(msg.msg);

            } else {
                step(2);
                $('.btn-next').hide();
                $('.index-box').hide();
                $('.info-box').show();
            }
        });
    });
    //快选
    $('#prev-text').change(function () {
        var content = $(this).val();
        $('#content').val(content);
    });
    //生成
    $('.btn-ok').click(function () {
        var name = $('#name').val();
        var content = $('#content').val();
        if (name == '') {
            toastr.error('请输入您的姓名！');
            return false;
        }
        if (content == '') {
            toastr.error('请输入今晚不走啥！');
            return false;
        }
        $('.send-text').text('生成中...');
        $('.send-tip').addClass('show');
        $.when(post('{{url('hhhb/make')}}', {uoid: uoid, name: name, content: content})).done(function (msg) {
            $('.send-tip').removeClass('show');
            if (msg.status == 'fail') {
                toastr.error(msg.msg);
            } else {
                step(3);
                $('.btn-preview').attr('src', msg.poster);
                $('.info-box').hide();
                $('.view-box').show();
                //图片预览
                $('.btn-preview').click(function () {
                    wx.previewImage({
                        current:  msg.poster,
                        urls: [
                             msg.poster
                        ]
                    });
                });
            }
        });
    });

    //重做
    $('.btn-again').click(function () {
        location.reload();
    });
    //分享
    $('.btn-share').click(function () {
        $('.share-tip').show();
    });
    $('.share-tip').click(function () {
        $(this).hide();
    });
    //步骤
    function step(id) {
        $('.step' + id + ' img').each(function (i) {
            i = i + 1;
            if (i == id) {
                $(this).attr('src', '/activity/hhhb/images/btn-s' + i + '-y.png');
            } else {
                $(this).attr('src', '/activity/hhhb/images/btn-s' + i + '-n.png');
            }
        })
    }
</script>
@stop
