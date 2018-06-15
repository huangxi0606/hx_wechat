<?php

use yii\helpers\Html;
use app\assets\AppAsset;

$this->title = '登录验证';
AppAsset::register($this);
?>
<div class="container-fluid">
    <div class="panel panel-info" style="margin-top:10%;">
        <div class="panel-heading">
            <h2 class="panel-title">登录验证</h2>
        </div>
        <div class="panel-body">
            <?= Html::beginForm() ?>
            <?= Html::hiddenInput('forward', $forward) ?>
            <p><?= Html::label('请输入登录密码', 'password') ?></p>
            <p><?= Html::input('password', 'password', '', ['id' => 'password', 'class' => 'form-control']) ?></p>
            <p><?= Html::submitButton('登录', ['class' => 'btn btn-info btn-block']) ?></p>
            <?= Html::endForm() ?>
        </div>
    </div>
</div>