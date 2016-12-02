<?php

use app\assets\AppAsset;


    AppAsset::register($this);
    $auth = Yii::$app->authManager;
    $userRole = $auth->getRolesByUser(Yii::$app->user->getId());
    if(isset($userRole['province_admin'])){
        echo Yii::$app->view->render('@app/views/layouts/admin_user/province_admin_left_menu');
    }else{
        echo Yii::$app->view->render('@app/views/layouts/admin_user/system_admin_left_menu');
    }

