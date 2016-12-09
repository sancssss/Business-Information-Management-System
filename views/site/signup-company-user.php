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
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}<div class=\"col-lg-3 col-md-4\">{input}</div>\n<div class=\"col-lg-8 col-md-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-md-1 control-label'],
            ],
    ]); ?>
    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_nickname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_phone_number')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_sex')->dropDownList(['男' => '男', '女' => '女'], ['prompt'=>'选择您的性别'])  ?>
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
