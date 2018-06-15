<?php

use yii\helpers\Html;
use app\assets\AppAsset;

$this->title = '用户信息';
AppAsset::register($this);
?>
<div class="container-fluid">
    <div class="panel panel-info" style="margin-top:10%;">
        <div class="panel-heading">
            <h2 class="panel-title">用户信息</h2>
        </div>
        <div class="panel-body">
            <?= Html::beginForm() ?>
            <?= Html::hiddenInput('exchange', 1) ?>
            <?= Html::hiddenInput('uoid', $uoid) ?>
            <p>姓名：<?= $join->name ?></p>
            <p>电话：<?= $join->tel ?></p>
            <p>奖品：<?= $prize ?></p>
            <?php if ($join->exchange) { ?>
                <p><?= Html::button('已兑换过了', ['class' => 'btn btn-danger btn-block', 'disabled' => 'disabled']) ?></p>
            <?php } else { ?>
                <p><?= Html::submitButton('确定兑换', ['class' => 'btn btn-success btn-block']) ?></p>
            <?php } ?>
            <?= Html::endForm() ?>
        </div>
    </div>
</div>