<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "用户中心";
$this->params['breadcrumbs'][] = $this->title;
$isVerified = 0;
if($model->companyUserDetails->company->verified == 0){
    $isVerified = 1;//创建了公司没有被审核
}else{
    $isVerified = 2;//已经审核的公司
}
?>

<div class="user-view">
    <div class="row">
    <div class="col-lg-3 col-md-3">
    <?= $this->render('@app/views/layouts/company_user_left_menu') ?>
    </div>
    <div class="col-lg-9 col-md-9">
    <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> <?= Html::encode($this->title) ?></div>
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        
        'attributes' => [
            'user_name',
            'companyUserDetails.user_nickname',
            'companyUserDetails.user_sex',
            'companyUserDetails.user_phone_number',
            'companyUserDetails.user_email',
            'companyUserDetails.user_comment'
        ],
    ]) ?>
    <?= Html::a($isVerified == 2 ? '查看我的公司' : '公司审核中', ['my-company'],$isVerified == 2 ? ['class'=>'btn btn-primary'] : ['class'=>'btn btn-warning']) ?>
    </div>
    </div>
    </div>
    </div>
</div>
