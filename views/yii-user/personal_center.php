<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "用户中心";
$this->params['breadcrumbs'][] = ['label' => 'Yii Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yii-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'user_name',
            'user_password',
            'user_identityid',
        ],
    ]) ?>

</div>
