<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        /**
         * Roles
         */
        $company = $auth->createRole('company');
        $company->type = 1;
        $auth->add($company);
        
        $notcheck_company = $auth->createRole('notcheck_company');
        $notcheck_company->type = 2;
        $auth->add($notcheck_company);
        
        $county_admin = $auth->createRole('county_admin');
        $county_admin->type = 3;
        $auth->add($county_admin);
        
        $notcheck_county_admin = $auth->createRole('notcheck_county_admin');
        $notcheck_county_admin->type = 4;
        $auth->add($notcheck_county_admin);
        
        $city_admin = $auth->createRole('city_admin');
        $city_admin->type = 5;
        $auth->add($city_admin);
        
        $notcheck_city_admin = $auth->createRole('notcheck_city_admin');
        $notcheck_city_admin->type = 6;
        $auth->add($notcheck_city_admin);
        
        $province_admin = $auth->createRole('province_admin');
        $province_admin->type = 7;
        $auth->add($province_admin);
        
        $notcheck_province_admin = $auth->createRole('notcheck_province_admin');
        $notcheck_province_admin->type = 8;
        $auth->add($notcheck_province_admin);
        
        $system_admin = $auth->createRole('system_admin');
        $system_admin->type = 9;
        $auth->add($system_admin);
        
        
        /**
         * add child
         */
        //省级管理员的子权限
        $auth->addChild($province_admin, $company);
        $auth->addChild($province_admin, $county_admin);
        $auth->addChild($province_admin, $city_admin);
        //系统管理员子权限
        $auth->addChild($system_admin, $province_admin);
        
        
        
        
    }
}