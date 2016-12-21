<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "负责人列表";
$this->params['breadcrumbs'][] = ['label' => '公司详情', 'url' => ['/province-admin/company-detail', 'id' => $id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-list-view">
<div class="row">
    <div class="col-lg-3 col-md-3">
    <?= $this->render('@app/views/layouts/admin_user/system_province_admin_left_menu') ?>
    </div>
    <div class="col-lg-9 col-md-9">
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
    </div>
    </div>
 </div>
 </div>
</div>
