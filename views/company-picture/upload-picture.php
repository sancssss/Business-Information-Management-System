<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = '上传图片';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yii-picture-upload">

    <h3><?= Html::encode($type->type_name)?></h3>
    <div class="yii-picture-form">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= Yii::$app->session->getFlash('success') ?>
    </div>
    <?php endif; ?>
   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],
            'fieldConfig' => [
            'template' => "{label}<div class=\"col-lg-3 col-md-4\">{input}</div>\n<div class=\"col-lg-8 col-md-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-md-1 control-label'],
            ],
       ]) ?>

    <?= $form->field($model, 'mutiFiles[]')->fileInput(['multiple' => true]) ?>

   
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('上传图片', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
