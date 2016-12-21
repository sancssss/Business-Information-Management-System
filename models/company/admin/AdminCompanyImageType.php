<?php

namespace app\models\company\admin;

use yii\helpers\Url;
use yii\helpers\Html;
use Yii;

class AdminCompanyImageType extends \app\models\company\CompanyImagetype {
        
    public function attributeLabels() {
        $lables = [
            
        ];
        return array_merge($lables, parent::attributeLabels());
    }
    
    public function getImagesListLink()
    {
        $url = Url::to(['company-image-list', 'id' => $this->imageFile->company_id, 'typeid' => $this->type_id]);
        $options =  [];
        return Html::a($this->type_name, $url, $options);
    }
    
}

