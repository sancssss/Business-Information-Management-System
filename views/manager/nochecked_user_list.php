<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeacherWorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '未审核企业列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-list">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php $form = ActiveForm::begin([
        'id' => 'list-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'user_id',
            //'twork_content',
            'user_name',
            [
               'attribute'=>'confirmLink', 'format'=>'raw' 
            ],
        ],
    ]); ?>
    <?=Html::submitButton('确认选中项', ['class' => 'btn btn-primary',]);?>
    <?php ActiveForm::end(); ?>
</div>
