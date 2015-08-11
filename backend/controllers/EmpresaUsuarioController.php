<?php

namespace backend\controllers;

use Yii;
use backend\models\EmpresaUsuario;
use backend\models\EmpresaUsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpresaUsuarioController implements the CRUD actions for EmpresaUsuario model.
 */
class EmpresaUsuarioController extends Controller
{
	
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
	
	
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all EmpresaUsuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpresaUsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmpresaUsuario model.
     * @param integer $ID_EMPRESA
     * @param integer $ID_USUARIO
     * @return mixed
     */
    public function actionView($ID_EMPRESA, $ID_USUARIO)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_EMPRESA, $ID_USUARIO),
        ]);
    }

    /**
     * Creates a new EmpresaUsuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmpresaUsuario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_EMPRESA' => $model->ID_EMPRESA, 'ID_USUARIO' => $model->ID_USUARIO]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EmpresaUsuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID_EMPRESA
     * @param integer $ID_USUARIO
     * @return mixed
     */
    public function actionUpdate($ID_EMPRESA, $ID_USUARIO)
    {
        $model = $this->findModel($ID_EMPRESA, $ID_USUARIO);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_EMPRESA' => $model->ID_EMPRESA, 'ID_USUARIO' => $model->ID_USUARIO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EmpresaUsuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID_EMPRESA
     * @param integer $ID_USUARIO
     * @return mixed
     */
    public function actionDelete($ID_EMPRESA, $ID_USUARIO)
    {
        $this->findModel($ID_EMPRESA, $ID_USUARIO)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EmpresaUsuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID_EMPRESA
     * @param integer $ID_USUARIO
     * @return EmpresaUsuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_EMPRESA, $ID_USUARIO)
    {
        if (($model = EmpresaUsuario::findOne(['ID_EMPRESA' => $ID_EMPRESA, 'ID_USUARIO' => $ID_USUARIO])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
