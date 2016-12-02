<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = '更新备注';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yii-company-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="yii-company-form">
    <?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-warning alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= Yii::$app->session->getFlash('error') ?>
    </div>
    <?php endif; ?>
    <?php $form = ActiveForm::begin([
             'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
            'template' => "{label}<div class=\"col-lg-3 col-md-4\">{input}</div>\n<div class=\"col-lg-8 col-md-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-md-1 control-label'],
            ],
    ]); ?>
    <?= $form->field($model, 'file_comment')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('更新备注',  ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
