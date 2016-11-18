<?php

namespace app\controllers;

use Yii;
use app\models\user\User;
use app\models\company\Company;
use \app\models\FormModel\UpdateUserForm;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use \app\models\Identity;
use yii\helpers\ArrayHelper;
/**
 * YiiUserController implements the CRUD actions for YiiUser model.
 */
class CompanyUserController extends Controller
{
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'update'],
                'rules' => [
                     [
                        'allow' => 'true',
                        'actions' => ['index'],
                        'roles' => ['notcheck_company','company'],
                    ],
                     [
                        'allow' => 'true',
                        'actions' => ['update'],
                        'roles' => ['checked_user'],
                    ],
                ]
            ],
        ];
    }

    /**
     * 显示个人资料.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = $this->findModel(Yii::$app->user->getId());
        if($model->companyUserDetails->company == NULL){
            return $this->redirect(['/company/create-company']);
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * 显示已登录用户的公司资料
     * @return mixed
     */
    public function actionMyCompany()
    {
        $model = Company::find()->where(['user_id' => Yii::$app->user->getId()])->one();
        return $this->render('my-company', [
            'model' => $model,
        ]);
    }

    
    /**
     * Updates an existing YiiUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = $this->findModel(Yii::$app->user->getId());
        $model->user_password = '';
        $formModel = new UpdateUserForm();
        $formModel->user_name = $model->user_name;
        $formModel->user_someinfo = $model->user1Detail->some_info;
        //下拉实现demo
        $identity = Identity::find()->all();
        $identityList = ArrayHelper::map($identity, 'identity_id', 'identity_name');
        //
        if ($formModel->load(Yii::$app->request->post()) && $formModel->validate()) {
            $model->user_password = md5($formModel->user_password);
            $model->user_name = $formModel->user_name;
            $userDetail = User1Details::findOne(Yii::$app->user->getId());
            $userDetail->some_info =  $formModel->user_someinfo;
            if($model->save() && $userDetail->save()){
                $formModel->user_password = '';
                Yii::$app->session->setFlash('success', "资料更新成功！");
                return $this->render('update', ['model' => $formModel, 'identitylist' => $identityList]);
            }
        } else {
            return $this->render('update', [
                'model' => $formModel,
                'identitylist' => $identityList,
            ]);
        }
    }
    

    /**
     * Deletes an existing YiiUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the YiiUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return YiiUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
