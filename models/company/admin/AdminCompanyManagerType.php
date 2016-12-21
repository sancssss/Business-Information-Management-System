<?php

namespace app\models\company\admin;

use yii\helpers\Url;
use yii\helpers\Html;
use Yii;

class AdminCompanyManagerType extends \app\models\company\CompanyManager {
        
    public function attributeLabels() {
        $lables = [
            
        ];
        return array_merge($lables, parent::attributeLabels());
    }
    
    /*
     * 得到点击负责人名字的详情链接
     */
    public function getManagerLink()
    {
        $url = Url::to(['/province-admin/company-manager-detail' , 'id' => $this->company_id, 'typeid' => $this->manager_type_id]);
        $option = []; 
        return Html::a($this->manager_name, $url, $option);
    }
    
}

