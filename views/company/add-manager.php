<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = '创建企业负责人';
$this->params['breadcrumbs'][] = ['label' => '管理公司', 'url' => ['/company/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yii-user-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="yii-user-form">

    <?php $form = ActiveForm::begin([
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
            'template' => "{label}<div class=\"col-lg-3 col-md-4\">{input}</div>\n<div class=\"col-lg-8 col-md-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-md-1 control-label'],
            ],
    ]); ?>
    <?= $form->field($model, 'manager_name')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'manager_sex')->dropDownList(['男' => '男', '女' => '女'], ['prompt'=>'选择您的性别'])  ?>
    <?= $form->field($model, 'manager_type_id')->dropDownList(
                                $allType,
                                ['prompt'=>'负责人类型']) 
                                ?>
    <?= $form->field($model, 'manager_idnumber')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'manager_mobilephone')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'manager_telephone')->textInput(['maxlength' => true]) ?>  
    <?= $form->field($model, 'manager_fax')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'manager_email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'manager_address')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'manager_zip_code')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'manager_comment')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('创建负责人',  ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
