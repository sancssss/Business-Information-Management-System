<?php

namespace app\controllers;

use Yii;
use app\models\YiiUser;
use app\models\YiiIUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * YiiUserController implements the CRUD actions for YiiUser model.
 */
class YiiUserController extends Controller
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
        ];
    }

    /**
     * Lists all YiiUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new YiiIUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single YiiUser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new YiiUser model.
     * general user signup
     * If creation is successful, the browser will be redirected to the 'personal_center' page.
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new YiiUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['personal_center', 'id' => $model->user_id]);
        } else {
            return $this->render('signup', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Creates a new SpecialYiiUser model
     * If creation is successful, the browser will be redirected to the 'special_personal_center' page.
     * @return mixed
     */
    public function actionSpecialSignup(){
        
    }

    /**
     * Updates an existing YiiUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
        if (($model = YiiUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
