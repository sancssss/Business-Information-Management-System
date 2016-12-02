<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = "图片类型列表";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cmanagerlist-view">
 <div class = "row">
 <div class="col-lg-3 col-md-3">
    <?= $this->render('@app/views/layouts/admin_user/system_admin_left_menu') ?>
 </div>
 <div class="col-lg-9 col-md-9">
 <?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-warning alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= Yii::$app->session->getFlash('error') ?>
    </div>
    <?php endif; ?>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= Yii::$app->session->getFlash('success') ?>
    </div>
    <?php endif; ?>
    <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-book"></span> <?= Html::encode($this->title) ?></div>
    <div class="panel-body"> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            'type_id',
            'type_name',
             [
                'class' => 'yii\grid\ActionColumn',
                'template' => "{update-company-image-type} {delete-company-image-type}",
                'buttons' => [
                    'delete-company-image-type' => function ($url, $model, $key){
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>',
                            $url,
                            [
                               'title' => '删除',
                            ]
                            );
                            }, 
                    'update-company-image-type' => function ($url, $model, $key){
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            $url,
                            [
                               'title' => '更新',
                            ]
                            );
                            }
                            
                        ],
                       
                        'urlCreator' => function ($action, $model, $key, $index) {
                           if($action == 'update-company-image-type') {
                               return ['update-company-image-type', 'id' => $model->type_id];
                           }else if($action == 'delete-company-image-type') {
                               return ['delete-company-image-type', 'id' => $model->type_id];
                           }
                        }
                ],
        ],
    ]); ?>
    <p>
        <?= Html::a('增加图片类型', ['add-company-image-type'], ['class'=>'btn btn-info']) ?>
    </p>
    </div>
    </div>
 </div>
 </div>
</div>