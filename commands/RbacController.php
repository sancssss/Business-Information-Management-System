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
         * Permissions
         */


        /**
         * Roles
         */
/*
        // create and add "user" role
        $user = $auth->createRole('checked_user');
        $auth->add($user);

        // create and add "author" role
        $nocheck_user = $auth->createRole('nochecked_user');
        $auth->add($nocheck_user);

        // create and add "admin" role
        $manager = $auth->createRole('manager_user');
        $auth->add($manager);
        
         // create and add "admin" role
        $admin = $auth->createRole('admin_user');
        $auth->add($admin);
        /**
         * Mutual connections
         */

        //$auth->addChild($admin, $manager);
        //$auth->addChild($admin, $user);
        $user = $auth->createRole('nochecked_manager_user');
        $auth->add($user);
        $auth->addChild($auth->getRole('admin_user'), $user);
        
    }
}