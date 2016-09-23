<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YiiIdentity */

$this->title = 'Create Yii Identity';
$this->params['breadcrumbs'][] = ['label' => 'Yii Identities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yii-identity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
