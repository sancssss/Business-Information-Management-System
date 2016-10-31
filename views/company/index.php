<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "管理我的公司";
$this->params['breadcrumbs'][] = ['label' => '个人中心', 'url' => ['/company-user/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('管理公司图片', ['company-picture'], ['class'=>'btn btn-primary']) ?>
        <?= Html::a('更新公司资料', ['company-update'], ['class'=>'btn btn-primary']) ?>
        <?= Html::a('负责人管理', ['company-manager'], ['class'=>'btn btn-info']) ?>
    </p>
    <p><h3>公司简介 <?= Html::a('查看详细信息>>', ['/company-user/my-company']) ?></h3>
    </p>
    
    <?= DetailView::widget([
        'model' => $model,
        
        'attributes' => [
            'company_name',
            'company_credit_code',
            'company_charater',
            'company_registered_capital',
            'company_established_time',
            'company_region_id',
        ],
    ]) ?>

</div>
