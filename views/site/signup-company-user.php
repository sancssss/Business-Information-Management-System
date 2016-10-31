<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = '企业注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yii-user-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="yii-user-form">

    <?php $form = ActiveForm::begin([
    ]); ?>
    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_nickname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_phone_number')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_sex')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_email')->textInput(['maxlength' => true]) ?>  
    <?= $form->field($model, 'user_comment')->textarea(['maxlength' => true]) ?>  
    <?= $form->field($model, 'user_password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_confirm_password')->passwordInput(['maxlength' => true])?>
    <div class="form-group">
        <?= Html::submitButton('注册企业',  ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
