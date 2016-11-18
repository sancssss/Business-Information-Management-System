<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "负责人列表";
$this->params['breadcrumbs'][] = ['label' => '公司管理', 'url' => ['/company/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-list-view">
 <div class = "row">
 <div class="col-lg-3 col-md-3">
    <?= $this->render('@app/views/layouts/company_manager_left_menu') ?>
 </div>
 <div class="col-lg-9 col-md-9">
 <?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-warning alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= Yii::$app->session->getFlash('error') ?>
    </div>
    <?php endif; ?>
    <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-book"></span> <?= Html::encode($this->title) ?></div>
    <div class="panel-body">
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [

            'managerType.type_name',
            //'twork_content',
            [
               'attribute'=>'managerLink', 'format'=>'raw' 
            ],
        ],
    ]); ?>
    <p>
        <?= Html::a('添加负责人', ['add-manager'], ['class'=>'btn btn-info']) ?>
    </p>
    </div>
    </div>
 </div>
 </div>
</div>
