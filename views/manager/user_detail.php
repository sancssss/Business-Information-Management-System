<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "企业详情";
$this->params['breadcrumbs'][] = ['label' => '全部企业', 'url' => ['/manager/user-list']];
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
            'userIdentity.identity_name',
            'user1Detail.some_info'
        ],
    ]) ?>

</div>
