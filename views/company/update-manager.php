<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = '更新企业负责人信息';
$this->params['breadcrumbs'][] = ['label' => '管理公司', 'url' => ['/company/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yii-user-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="yii-user-form">

    <?php $form = ActiveForm::begin([
    ]); ?>
    <?= $form->field($model, 'manager_type')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'manager_sex')->dropDownList(['男' => '男', '女' => '女'], ['prompt'=>'选择您的性别'])  ?>
    <?= $form->field($model, 'manager_idnumber')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'manager_mobilephone')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'manager_telephone')->textInput(['maxlength' => true]) ?>  
    <?= $form->field($model, 'manager_fax')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'manager_email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'manager_address')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'manager_zip_code')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'manager_comment')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('更新负责人',  ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
