<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<ul class="list-group">
    <a class="list-group-item list-group-item-info" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span class="glyphicon glyphicon-user"></span> 用户管理</a>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
    <a href="<?= Url::to(['/city-admin/index']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-list-alt"></span> 基本信息</a>
    <a href="<?= Url::to(['/city-admin/update-user']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-edit"></span> 修改资料</a>
    </div>
</ul>



