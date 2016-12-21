<?php

namespace app\models\company;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * This is the model class for table "course_notice".
 */
class CompanyImagetype extends \app\models\index\ImageType
{
   
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $attributeLabels = [
           'imagesListLink' => '图片类型'
        ];
        return array_merge(parent::attributeLabels(), $attributeLabels);
    }
    
    public function getImagesCount()
    {
        return $this->getImageFiles()->count();
    }
    
     public function getImagesListLink()
    {
        $url = Url::to(['/company-picture/pictures-list', 'id' => $this->type_id]);
        $options =  [];
        return Html::a($this->type_name, $url, $options);
    }
    
}
