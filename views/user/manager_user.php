<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YiiIUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yii Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yii-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Yii User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_id',
            'user_name',
            'user_password',
            'user_identityid',
            'userIdentity.identity_name',
            //'userIdentity.identity_name',//userIdentity为方法名
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
