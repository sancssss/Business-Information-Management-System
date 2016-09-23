<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "注册用户";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请填写详细信息注册：</p>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true], ['prompt' => 'nihao']) ?>
    <?= $form->field($model, 'user_password')->textInput(['maxlength' => true], ['prompt' => $model->user_password]) ?>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
</div>