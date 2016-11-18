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
 <?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-warning alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= Yii::$app->session->getFlash('error') ?>
    </div>
    <?php endif; ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加负责人', ['add-manager'], ['class'=>'btn btn-info']) ?>
    </p>
    
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

</div>
