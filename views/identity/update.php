<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\YiiIdentity */

$this->title = 'Update Yii Identity: ' . $model->identity_id;
$this->params['breadcrumbs'][] = ['label' => 'Yii Identities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->identity_id, 'url' => ['view', 'id' => $model->identity_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="yii-identity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
