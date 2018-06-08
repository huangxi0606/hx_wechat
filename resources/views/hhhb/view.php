<?php

use yii\helpers\Url;
use yii\helpers\Json;

$this->title = $activity['title'];
$this->registerCssFile($imgServer . '/activity/blhb/css/style.css?t=' . time());
$this->registerCssFile($imgServer . '/activity/blhb/css/select.css');
$this->registerCssFile($imgServer . '/css/loading.css');
$this->registerCssFile($imgServer . '/js/toastr/toastr.min.css');
$this->registerJsFile($imgServer . '/js/jquery.min.js');
$this->registerJsFile($imgServer . '/js/jquery.touch.min.js');
$this->registerJsFile($imgServer . '/js/toastr/toastr.min.js');
$this->registerJsFile($imgServer . '/js/validate.js');
$this->registerJsFile($imgServer . '/js/yii.js');
$this->registerJsFile('http://res.wx.qq.com/open/js/jweixin-1.0.0.js');
?>
<div class="activity" >
    <div class="wrapper view-box">
        <img src="<?= $imgServer ?>/activity/blhb/images/bg1.jpg">
        <div class="wrapper-inner">
            <div class="show-photo">
                <img src="<?= $imgServer ?><?= $join->poster ?>" class="btn-preview">
            </div>
            <img src="<?= $imgServer ?>/activity/blhb/images/btn-join.png" class="btn-join">
        </div>
    </div>
</div>
<!--分享提示-->
<div class="share-tip"><img src="<?= $imgServer ?>/activity/blhb/images/guide.png"></div>
<!--加载动画-->
<div class="send-tip ui-dialog ui-dialog-notice">
    <div class="ui-dialog-cnt"><i class="ui-loading-bright"></i><p class="send-text">加载中......</p></div>
</div>
<script>
<?php $this->beginBlock('js') ?>
    var uoid = '<?= $uoid ?>';
    //微信相关
    var share = {
        title: '<?= str_replace('{nickname}', $user->nickname, $activity['share_title']) ?>',
        desc: '<?= str_replace('{nickname}', $user->nickname, $activity['share_desc']) ?>',
        link: '<?= Url::to(['index', 'uid' => $user->id], 1) ?>',
        imgUrl: '<?= $activity['share_img'] ?>',
        success: function (res) {
            $.get('<?= Url::to(['upshare', 'aid' => $activity['id']], true) ?>');
            $('.share-tip').hide();
        }
    };
    wx.config(<?= Json::encode($jsApi) ?>);
    wx.ready(function () {
        wx.onMenuShareAppMessage(share);
        wx.onMenuShareTimeline(share);
        wx.onMenuShareQQ(share);
        wx.onMenuShareWeibo(share);
    });
    //统计
    $.get('<?= Url::to(['uphit', 'aid' => $activity['id']], true) ?>');
    //图片预览
    $('.btn-preview').click(function () {
        wx.previewImage({
            current: '<?= $imgServer ?><?= $join->poster ?>',
            urls: [
                '<?= $imgServer ?><?= $join->poster ?>'
            ]
        });
    });
    //加入
    $('.btn-join').click(function () {
        location.href = '<?= Url::to(['index'], true) ?>';
    });
<?php $this->endBlock() ?>
</script>
<?php $this->registerJs($this->blocks['js'], \yii\web\View::POS_END); ?>