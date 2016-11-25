<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = "公司详情";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">
<div class="row">
    <div class="col-lg-3 col-md-3">
    <?= $this->render('@app/views/layouts/admin_user/province_admin_left_menu') ?>
    </div>
    <div class="col-lg-9 col-md-9">
    <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-book"></span> <?= Html::encode($this->title) ?></div>
    <div class="panel-body">

    <?= DetailView::widget([
        'model' => $model,
        
        'attributes' => [
            'company_name',
            'company_credit_code',
            'company_charater',
            'company_registered_capital',
            'company_established_time',
            'company_region_id',
            'company_re_province',
            'company_reg_city',
            'company_reg_county',
            'company_reg_address',
            'company_reg_longitude',
            'company_reg_latitude',
            'company_prod_province',
            'company_prod_city',
            'company_prod_county',
            'company_prod_address',
            'company_prod_longitude',
            'company_prod_latitude',
            'company_doctor_num',
            'company_master_num',
            'company_bachelor_num',
            'company_juniorcollege_num',
            'company_staff_num',
            [
              'attribute' => 'verifyStatus',
              'format' => 'raw'
            ],
            'company_comment',
        ],
    ]) ?>
    </div>
    </div>
</div>
</div>
