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
<div class = "row">
  <div class="col-lg-3 col-md-3">
    <?= $this->render('@app/views/layouts/company_manager_left_menu') ?>
    </div>
    <div class="col-lg-9 col-md-9">
  <div class="panel panel-default">
  <div class="panel-heading"><span class="glyphicon glyphicon-th-large"></span> <?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <h4>公司简介 <?= Html::a('查看详细信息>>', ['/company-user/my-company']) ?></h4>
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
    <p>
        <?= Html::a('管理图片', ['company-picture'], ['class'=>'btn btn-primary']) ?>
        <?= Html::a('更新资料', ['update-company'], ['class'=>'btn btn-primary']) ?>
        <?= Html::a('负责人管理', ['managers-list'], ['class'=>'btn btn-primary']) ?>
    </p>
    </div>
      </div>
    </div>
</div>
</div>
