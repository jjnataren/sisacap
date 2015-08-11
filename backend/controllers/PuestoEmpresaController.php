<?php

namespace backend\controllers;

use Yii;
use backend\models\PuestoEmpresa;
use backend\models\PuestoEmpresaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\EmpresaUsuario;

/**
 * PuestoEmpresaController implements the CRUD actions for PuestoEmpresa model.
 */
class PuestoEmpresaController extends Controller
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
     * Lists all PuestoEmpresa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PuestoEmpresaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PuestoEmpresa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    
    public function actionViewbycompany($id){
    
    	$model = EmpresaUsuario::getMyCompany();
    	 
    	$puestoModel = PuestoEmpresa::findOne(['ID_PUESTO'=>$id, 'ID_EMPRESA'=>$model->ID_EMPRESA, 'ACTIVO'=>1]);
    	
    	if ($puestoModel === null){
    		
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    
    	return $this->render('view_by_company',['model'=>$puestoModel]);
    
    
    
     }
    
    
    /**
     * Lists all Puestos por empresa models.
     * @return mixed
     */
    public function actionIndexbycompany()
    {
    
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id]);
    
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	 
    	$searchModel = new PuestoEmpresaSearch();
    
    	$dataProvider = $searchModel->searchByCompany(Yii::$app->request->queryParams, $model->ID_EMPRESA);
    
    	return $this->render('index_by_company', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    }
    
    
    
    /**
     * Creates a new PuestoEmpresa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
		
    public function actionCreate()
    {
    	$model = new PuestoEmpresa();
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['view', 'id' => $model->ID_PUESTO]);
    	} else {
    		return $this->render('create', [
    				'model' => $model,
    				]);
    	}
    }
    
    
    /**
     * Creates a new Puesto  model by its company.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatebycompany()
    {
    	$companyUserModel = EmpresaUsuario::getMyCompany();
    
    	 
    	$model = new PuestoEmpresa();
    	$model->ACTIVO = 1;
    	$model->ID_EMPRESA = $companyUserModel->ID_EMPRESA;
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['viewbycompany', 'id' => $model->ID_PUESTO]);
    	} else {
    		return $this->render('create_by_company', [
    				'model' => $model,
    				]);
    	}
    }
    
   
    
    /**
     * Updates an existing PuestoEmpresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_PUESTO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing PuestoEmpresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatebyuser($id)
    {
    	$model = $this->findModel($id);
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Puesto actualizado correctamente.',
    		]);
    		return $this->redirect(['viewbycompany', 'id' => $model->ID_PUESTO]);
    	} else {
    		return $this->render('update_by_company', [
    				'model' => $model,
    				]);
    	}
    }
    /**
     * Deletes an existing PuestoEmpresa model.
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
     * Deletes an existing PuestoEmpresa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletebyuser($id)
    {
    	$this->findModel($id)->delete();
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	'body'=>Yii::t('frontend', 'Se ha eliminado el puesto correctamente')
    	]);
    	return $this->redirect(['indexbycompany']);
    }
    /**
     * Finds the PuestoEmpresa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PuestoEmpresa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PuestoEmpresa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
