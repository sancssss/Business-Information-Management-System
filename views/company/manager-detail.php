<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "负责人详情";
$this->params['breadcrumbs'][] = ['label' => '公司管理', 'url' => ['/company/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新信息', ['update-manager', 'id' => $model->manager_type_id], ['class'=>'btn btn-info']) ?>
    </p>
    
    <?= DetailView::widget([
        'model' => $model,
        
        'attributes' => [
            'manager_type_id',
            'manager_sex',
            'manager_idnumber',
            'manager_mobilephone',
            'manager_telephone',
            'manager_fax',
            'manager_email',
            'manager_address',
            'manager_zip_code',
            'manager_comment',
        ],
    ]) ?>

</div>
