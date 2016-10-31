<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = '更新企业资料: ' . $model->user_name;
$this->params['breadcrumbs'][] = ['label' => '个人中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = '更新资料';
?>
<div class="yii-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update_form', [
        'model' => $model,
        'identitylist' => $identitylist,
    ]) ?>

</div>
