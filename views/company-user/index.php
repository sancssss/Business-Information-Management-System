<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "用户中心";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
    </p>

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
    <?= Html::a($model->companyUserDetails->company->verified == 1 ? '查看我的公司' : '公司审核中', ['my-company'],$model->companyUserDetails->company->verified == 1 ? ['class'=>'btn btn-primary'] : ['class'=>'btn btn-warning']) ?>

</div>
