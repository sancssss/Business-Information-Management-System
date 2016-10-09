<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yii-user-form">

    <?php $form = ActiveForm::begin([
    ]); ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_confirm_password')->passwordInput(['maxlength' => true])?>
    <?= $form->field($model, 'some_info')->textarea()?>
    <div class="form-group">
        <?= Html::submitButton('注册',  ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
