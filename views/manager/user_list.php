<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeacherWorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '全部企业列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-list">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            //'twork_content',
            [
               'attribute'=>'userDetailLink', 'format'=>'raw' 
            ],
            [
               'attribute'=>'confirmLink', 'format'=>'raw' 
            ],
        ],
    ]); ?>
    
</div>
