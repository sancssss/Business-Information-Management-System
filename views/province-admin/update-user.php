<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = '更新资料';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yii-user-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="yii-user-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}<div class=\"col-lg-3 col-md-4\">{input}</div>\n<div class=\"col-lg-8 col-md-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-md-1 control-label'],
            ],
    ]); ?>
    <?= $form->field($userModel, 'user_password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($detailModel, 'user_nickname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detailModel, 'user_phone_number')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detailModel, 'user_sex')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detailModel, 'user_email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detailModel, 'user_id_number')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detailModel, 'user_address')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detailModel, 'user_zip_code')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detailModel, 'user_legal_person')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detailModel, 'user_type')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detailModel, 'user_comment')->textarea(['maxlength' => true]) ?> 
    
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('更新资料',  ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
