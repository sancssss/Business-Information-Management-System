<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = '创建一个新企业';
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
    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_credit_code')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_charater')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_registered_capital')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_established_time')->textInput(['maxlength' => true]) ?>  
    <?=   $form->field($model, 'company_region_id')->dropDownList(
                                $regionList,
                                ['prompt'=>'行政代码']) 
                                ?>
    <?= $form->field($model, 'company_re_province')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_reg_city')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_reg_county')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_reg_address')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_reg_longitude')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_reg_latitude')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_prod_province')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_prod_city')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_prod_county')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_prod_address')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_prod_longitude')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_prod_latitude')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_doctor_num')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_master_num')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_bachelor_num')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_juniorcollege_num')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_staff_num')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_comment')->textInput(['maxlength' => true])?>
    <div class="form-group">
        <?= Html::submitButton('创建一个新企业',  ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
