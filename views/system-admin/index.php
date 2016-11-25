<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "系统管理员";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="county-admin-view">
    <div class="row">
    <div class="col-lg-3 col-md-3">
    <?= $this->render('@app/views/layouts/admin_user/system_admin_left_menu') ?>
    </div>
    <div class="col-lg-9 col-md-9">
        <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> <?= Html::encode($this->title) ?></div>
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        
        'attributes' => [
            'user_id',
            'user_name'
        ],
    ]) ?>
        <p>
            <?= Html::a('修改密码', ['/system-admin/update-user'], ['class'=>'btn btn-success']) ?>
        </p>
    </div>
    </div>
    </div>
    </div>
</div>
