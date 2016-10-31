<?php

namespace app\controllers;
use yii\filters\AccessControl;
use app\models\User;
use \yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use Yii;

class ManagerController extends \yii\web\Controller
{
     
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'nochecked-user-list', 'user-list', 'confirm-user'],
                //非登陆用户无法进入个人中心
                'rules' => [
                     [
                        'allow' => 'true',
                        'actions' => ['index' ,'nochecked-user-list', 'user-list', 'confirm-user'],
                        'roles' => ['manager_user'],
                    ],
                ]
            ],
        ];
    }
    /**
     * 显示管理员的用户中心,管理员的个人信息.
     * @return mixed
     */
    public function actionIndex()
    {
         return $this->render('special_personal_center', [
            'model' => $this->findModel(Yii::$app->user->getId()),
        ]);
    }
    /**
     * 显示全部用户列表.
     * @return mixed
     */
    public function actionUserList()
    {
        $query = User::find()->where(['user_identityid' => [User::ROLE_NOCHECK_USER, User::ROLE_USER]]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('user_list', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * 显示未审核用户列表.
     * @return mixed
     */
    public function actionNocheckedUserList()
    {
        $selectionData = Yii::$app->request->post('selection');
        if($selectionData != NULL)
        {
            //Yii::trace($selectionData);
            //Yii::trace(sizeof($selectionData));
            //Yii::trace($selectionData[0]);
            for($i = 0; $i < sizeof($selectionData); $i++){
                Yii::trace($selectionData[$i]);
                $this->verifiedItem($selectionData[$i]);
            }
        }
        $query = User::find()->where(['user_identityid' => [User::ROLE_NOCHECK_USER]]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('nochecked_user_list', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * 确认某个用户为认证用户.
     * @return boolean 
     */
    public function actionConfirmUser($uid)
    {
        $this->verifiedItem($uid);
        return $this->redirect(['manager/user-list']);
    }
    
    public function actionUserDetail($uid)
    {
        $user = User::find()->where(['user_id' => $uid, 'user_identityid' => [User::ROLE_USER, User::ROLE_NOCHECK_USER]])->one();
         return $this->render('user_detail', [
            'model' => $user,
        ]);
    }


    protected function verifiedItem($uid)
    {
        $model = User::findOne($uid);
        if($model->user_identityid == User::ROLE_NOCHECK_USER){
            $model->user_identityid = User::ROLE_USER;
            if($model->save()){
                $auth = Yii::$app->authManager;
                $userRole = $auth->getRole('nochecked_user');
                //先取消原有角色
                $auth->revoke($userRole, $uid);
                $userNewRole = $auth->getRole('checked_user');
                $auth->assign($userNewRole, $uid);
            }else{
               //TODO 
            }
        }
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
            throw new NotFoundHttpException('请求错误');
        }
    }

}
