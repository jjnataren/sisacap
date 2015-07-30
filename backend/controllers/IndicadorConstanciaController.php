<?php

namespace backend\controllers;

use Yii;
use backend\models\IndicadorConstancia;
use backend\models\search\IndicadorConstanciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\search\IndicadorComisionSearch;
use backend\models\EmpresaUsuario;
use yii\data\ActiveDataProvider;

/**
 * IndicadorConstanciaController implements the CRUD actions for IndicadorConstancia model.
 */
class IndicadorConstanciaController extends Controller
{
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
     * Lists all IndicadorComision models.
     * @return mixed
     */
    public function actionIndexByCompany()
    {
    	 
    	$companyModel = EmpresaUsuario::getMyCompany();
    	$searchModel = new IndicadorConstanciaSearch();
    	
    	$query = IndicadorConstancia::findBySql('select * from tbl_indicador_constancia where id_constancia in 
                            		(select id_constancia from tbl_constancia where id_trabajador in 
                             			(select id_trabajador from tbl_trabajador where id_empresa in 
                            				(select id_empresa from tbl_empresa where id_empresa_padre = '.EmpresaUsuario::getMyCompany()->ID_EMPRESA.' OR id_empresa = '.EmpresaUsuario::getMyCompany()->ID_EMPRESA.'  and ACTIVO=1) 
                            			AND ACTIVO=1)
                            		AND ACTIVO=1)
                             	  AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia
    											 ');
    	
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    	]);
    	
    	
    
    	return $this->render('index_by_company', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    }
    
    
    /**
     * Displays a single IndicadorComision model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewByCompany($id)
    {
    	 
    	$companyModel = EmpresaUsuario::getMyCompany();
    	 
    	 
    	$model = $this->findModel($id);
    	 
    	if ($companyModel->ID_EMPRESA !== $model->iDCONSTANCIA->iDTRABAJADOR->ID_EMPRESA && $companyModel->ID_EMPRESA !== $model->iDCONSTANCIA->iDTRABAJADOR->iDEMPRESA->ID_EMPRESA_PADRE){
    
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    	 
    	return $this->render('view_by_company', [
    			'model' => $model
    			]);
    }

    /**
     * Lists all IndicadorConstancia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IndicadorConstanciaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IndicadorConstancia model.
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
     * Creates a new IndicadorConstancia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IndicadorConstancia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_EVENTO]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IndicadorConstancia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_EVENTO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IndicadorConstancia model.
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
     * Deletes an existing IndicadorConstancia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteByCompany($id)
    {

    	$companyModel = EmpresaUsuario::getMyCompany();
    	$model = $this->findModel($id);
    	
    	if($companyModel->ID_EMPRESA !== $model->iDCONSTANCIA->ID_EMPRESA )
    		throw new NotFoundHttpException('The requested page does not exist.');
    	else 
    		$model->delete();
    		
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	'body'=> '<i class="fa fa-check"></i> Notificación borrada correctamente.',
    	]);
    
    	return $this->redirect(['index-by-company']);
    }
    

    /**
     * Finds the IndicadorConstancia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IndicadorConstancia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IndicadorConstancia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
