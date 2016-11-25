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
    <a href="<?= Url::to(['/system-admin/index']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-list-alt"></span> 基本信息</a>
    <a href="<?= Url::to(['/system-admin/update-user']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-edit"></span> 修改资料</a>
    </div>
    <a class="list-group-item list-group-item-info" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><span class="glyphicon glyphicon-folder-close"></span> 企业管理</a>
    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingtwo">
    <a href="<?= Url::to(['/province-admin/company-waitting-list']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-ok"></span> 审核企业</a>
    <a href="<?= Url::to(['/province-admin/company-list']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-list-alt"></span> 企业列表</a>
    <a href="<?= Url::to(['/province-admin/company-log']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-time"></span> 审核记录</a>
    </div>
    <a class="list-group-item list-group-item-info" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><span class="glyphicon glyphicon-user"></span> 县市管理员审核</a>
    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
    <a href="<?= Url::to(['/province-admin/county-waitting-list']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-ok"></span> 审核县级管理员</a>
    <a href="<?= Url::to(['/province-admin/city-waitting-list']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-ok"></span> 审核市级管理员</a>
    <a href="<?= Url::to(['/province-admin/admin-list']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-list-alt"></span> 管理员列表</a>
    <a href="<?= Url::to(['/province-admin/admin-log']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-time"></span> 审核记录</a>
    </div>
    <a class="list-group-item list-group-item-info" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><span class="glyphicon glyphicon-user"></span> 省级管理员设置</a>
    <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
    <a href="<?= Url::to(['/system-admin/add-padmin']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-plus"></span> 增加管理</a>
    <a href="<?= Url::to(['/system-admin/admin-list']) ?>" class="list-group-item" ><span class="glyphicon glyphicon-list-alt"></span> 管理列表</a>
    </div>
</ul>



