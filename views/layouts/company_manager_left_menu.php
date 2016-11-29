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
    <a href="<?= Url::to(['/company-user/index']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-list-alt"></span> 基本信息</a>
    <a href="<?= Url::to(['/company-user/update-user']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-edit"></span> 修改资料</a>
    </div>
    
    <a class="list-group-item list-group-item-info" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne"><span class="glyphicon glyphicon-book"></span>企业信息</a>
    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
    <a href="<?= Url::to(['/company-user/my-company']) ?>" class="list-group-item"><span class="glyphicon glyphicon-file"></span> 公司资料</a>
    <a href="<?= Url::to(['/company/index']) ?>" class="list-group-item"><span class="glyphicon glyphicon-th-large"></span> 管理公司</a>
    <a href="<?= Url::to(['/company/managers-list']) ?>" class="list-group-item"> <span class="glyphicon glyphicon-folder-open"></span> 负责人管理</a>
    <a href="<?= Url::to(['/company-picture/index']) ?>" class="list-group-item"><span class="glyphicon glyphicon-picture"></span> 图片管理</a>
    </div>
</ul>



