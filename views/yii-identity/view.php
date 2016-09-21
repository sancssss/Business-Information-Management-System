<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiIdentity */

$this->title = $model->identity_id;
$this->params['breadcrumbs'][] = ['label' => 'Yii Identities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yii-identity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->identity_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->identity_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'identity_id',
            'identity_name:ntext',
        ],
    ]) ?>

</div>
