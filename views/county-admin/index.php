<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "县级管理员中心";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="county-admin-view">
    <div class="row">
    <div class="col-lg-3 col-md-3">
    <?= $this->render('@app/views/layouts/admin_user/county_admin_left_menu') ?>
    </div>
    <div class="col-lg-9 col-md-9">
        <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> <?= Html::encode($this->title) ?></div>
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        
        'attributes' => [
            'adminUserDetails.user_nickname',
            'adminUserDetails.user_sex',
            'adminUserDetails.user_phone_number',
            'adminUserDetails.user_email',
            'adminUserDetails.user_birthday',
            'adminUserDetails.user_id_number',
            'adminUserDetails.user_address',
            'adminUserDetails.user_zip_code',
            'adminUserDetails.user_legal_person',
            'adminUserDetails.user_type',
            'adminUserDetails.user_comment',
            'adminUserDetails.region.region_id',
            'adminUserDetails.region.region_name',
            'identityStatus',
        ],
    ]) ?>
        <p>
            <?= Html::a('更新资料', ['/county-admin/update-user'], ['class'=>'btn btn-success']) ?>
        </p>
    </div>
    </div>
    </div>
    </div>
</div>
