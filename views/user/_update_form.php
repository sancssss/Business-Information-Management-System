<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_password')->textInput(['maxlength' => true]) ?>
    
     <?= $form->field($model, 'user_someinfo')->textarea(['maxlength' => true]) ?>

   <?  /*$form->field($model, 'user_identityid')->dropDownList(
                                $identitylist,
                                ['prompt'=>'Select...'])*/ ?>

    <div class="form-group">
        <?= Html::submitButton( '更新', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= Yii::$app->session->getFlash('success') ?>
    </div>
    <?php endif; ?>
    <?php ActiveForm::end(); ?>

</div>