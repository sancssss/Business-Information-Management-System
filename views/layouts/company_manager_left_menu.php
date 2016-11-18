<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<ul class="list-group">
    <a href="<?= Url::to(['/company-user/index']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-user"></span> 个人资料</a>
    <a href="<?= Url::to(['/company-user/my-company']) ?>" class="list-group-item"><span class="glyphicon glyphicon-file"></span> 公司资料</a>
    <a href="<?= Url::to(['/company/index']) ?>" class="list-group-item"><span class="glyphicon glyphicon-th-large"></span> 管理公司</a>
    <a href="<?= Url::to(['/company/managers-list']) ?>" class="list-group-item"> <span class="glyphicon glyphicon-book"></span> 负责人管理</a>
    <a href="<?= Url::to(['/company/company-picture']) ?>" class="list-group-item"><span class="glyphicon glyphicon-picture"></span> 图片管理</a>
</ul>



