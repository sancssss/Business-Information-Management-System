<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = $ImageType->type_name."的图片列表";
$this->params['breadcrumbs'][] = ['label' => '公司详情', 'url' => ['/province-admin/company-detail', 'id' => $id]];
$this->params['breadcrumbs'][] = ['label' => '已上传图片类型', 'url' => ['/province-admin/company-image-type-list', 'id' => $id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-list-view">
 <div class = "row">
    <div class="col-lg-3 col-md-3">
    <?= $this->render('@app/views/layouts/admin_user/system_province_admin_left_menu') ?>
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
            'file.file_name',
            'file.file_extension',
            'file.file_time:date',
            'image_comment',
            [
                'label'=>'缩略图',
                'attribute' => 'fileUrlName',
                'format'=>'html',
                'value'=>function($data){
                return Html::a(Html::img(Yii::$app->request->BaseUrl.'/uploads/'.$data->fileUrlName,  [
                    'width' => 120])  , Url::to(Yii::$app->request->BaseUrl.'/uploads/'.$data->fileUrlName)
                    );
                },
            ],
        ],
    ]); ?>
    </div>
    </div>
 </div>
 </div>
</div>
