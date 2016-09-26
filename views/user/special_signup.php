<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = '企业注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yii-user-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_formSpecial', [
        'model' => $model,
    ]) ?>

</div>
