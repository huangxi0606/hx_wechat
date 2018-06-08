<?php

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
$this->registerCss('body{padding:1em;}');
?>
<div class="panel panel-success" style="margin-bottom:5%;">
    <div class="panel-heading">
        <h2 class="panel-title">保利海报活动统计</h2>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <li class="list-group-item"><span class="badge"><?= $ucount ?></span>浏览活动总人数</li>
            <li class="list-group-item"><span class="badge"><?= $jcount ?></span>参与活动总人数</li>
            <li class="list-group-item"><span class="badge"><?= $scount ?></span>活动分享次数</li>
            <li class="list-group-item"><span class="badge"><?= $hcount ?></span>活动点击次数</li>
        </ul>
    </div>
</div>