<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

    $this->title = "管理员中心";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yii-user-view">

    <h1><?= Html::encode('我的资料') ?></h1>

    <p>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        
        'attributes' => [
            'user_id',
            'user_name',
            'userIdentity.identity_name',
            'user2Detail.some_info'
        ],
    ]) ?>
<?=Html::a('查看全部企业', ['/manager/user-list'], ['class'=>'btn btn-primary'])?> 
<?=Html::a('查看未审核企业', ['/manager/nochecked-user-list'], ['class'=>'btn btn-primary'])?>
</div>
