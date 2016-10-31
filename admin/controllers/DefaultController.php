<?php

namespace app\admin\controllers;

use yii\web\Controller;
use app\models\User;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = User::findOne(10000);
        return $this->render('index', ['model' => $model]);
    }
}
