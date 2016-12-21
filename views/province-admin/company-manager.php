<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "负责人详情";
$this->params['breadcrumbs'][] = ['label' => '公司详情', 'url' => ['/province-admin/company-detail', 'id' => $id]];
$this->params['breadcrumbs'][] = ['label' => '已添加的法人', 'url' => ['/province-admin/company-manager-list', 'id' => $id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    
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
