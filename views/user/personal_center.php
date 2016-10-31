<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "用户中心";
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
    <?= Html::a($model->userIdentity->identity_id == 1 ? '更新资料>>>' : '等待审核中...', ['/user/update'],$model->userIdentity->identity_id == 1 ? ['class'=>'btn btn-primary'] : ['class'=>'btn btn-warning']) ?>

</div>
