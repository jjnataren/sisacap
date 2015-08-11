<?php

namespace backend\controllers;

use Yii;
use backend\models\IndicadorPlan;
use backend\models\search\IndicadorPlanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\EmpresaUsuario;
use yii\data\ActiveDataProvider;

/**
 * IndicadorPlanController implements the CRUD actions for IndicadorPlan model.
 */
class IndicadorPlanController extends Controller
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
     * Lists all IndicadorPlan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IndicadorPlanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    /**
     * Lists all IndicadorPlan models.
     * @return mixed
     */
    public function actionIndexByCompany()
    {
    	
    	$companyModel = EmpresaUsuario::getMyCompany();
    	$searchModel = new IndicadorPlanSearch();
    	
    	 
    	$query = IndicadorPlan::findBySql('select * from tbl_indicador_plan where id_plan in 
                            		(select id_plan from tbl_plan where id_comision in 
                             		(select id_comision_mixta from tbl_comision_mixta_cap where id_empresa = '.$companyModel->ID_EMPRESA.' and ACTIVO=1) AND ACTIVO=1) '
                             		.' AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia
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
     * Displays a single IndicadorPlan model.
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
     * Displays a single IndicadorPlan model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewByCompany($id)
    {
    	
    	
    	$companyModel = EmpresaUsuario::getMyCompany();
    	
    	
    	$model = $this->findModel($id);
    	
    	if ($companyModel->ID_EMPRESA !== $model->iDPLAN->iDCOMISION->ID_EMPRESA){
    		
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    	
    	return $this->render('view_by_company', [
    			'model' => $model
    			]);
    }
    
    
    

    /**
     * Creates a new IndicadorPlan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IndicadorPlan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_EVENTO]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IndicadorPlan model.
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
     * Deletes an existing IndicadorPlan model.
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
     * Deletes an existing IndicadorPlan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteByCompany($id)
    {
    	
    	
    	$companyModel = EmpresaUsuario::getMyCompany();
    	
    	$model = $this->findModel($id);
    	
    	
    	if($model->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA){
    		
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    
    	
    	
    	$model->delete();
    	
    	return $this->redirect(['index-by-company']);
    }
    
    
    
    /**
     * Finds the IndicadorPlan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IndicadorPlan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IndicadorPlan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
