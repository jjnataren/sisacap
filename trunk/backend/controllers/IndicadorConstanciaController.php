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
use backend\models\Instructor;
use yii\base\Object;
use yii\data\ActiveDataProvider;

/**
 * IndicadorConstanciaController implements the CRUD actions for IndicadorConstancia model.
 */
class IndicadorConstanciaController extends Controller
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
     * Lists all IndicadorComision models.
     * @return mixed
     */
    public function actionIndexByInstructor()
    {
    	
    	
    	$instructorModel = Instructor::getOwnData();
    	$companyModel = EmpresaUsuario::getMyCompany();
    	$searchModel = new IndicadorConstanciaSearch();
    	
    	
    	
    	$query = IndicadorConstancia::findBySql('select * from tbl_indicador_constancia where id_constancia in
				                            		(select id_constancia from tbl_constancia where id_curso in
				                            			(select id_curso from tbl_curso where id_instructor   = '.$instructorModel->ID_INSTRUCTOR.' ) )'
    											.' AND (CLAVE = \'CON0004\'  OR CLAVE = \'CON0003\') AND  curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia');
    	
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    	]);
    	
    	
    	return $this->render('index_by_instructor', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    	]);
    	 
    	
    }
    
    
    /**
     * Lists all IndicadorComision models.
     * @return mixed
     */
    public function actionIndexByCompany()
    {
    
    	$companyModel = EmpresaUsuario::getMyCompany();
    	$searchModel = new IndicadorConstanciaSearch();
    	 
    	$dataProvider = $searchModel->searchByCompany(Yii::$app->request->queryParams, $companyModel->ID_EMPRESA);
    
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
    public function actionViewByInstructor($id)
    {
    
    	$companyModel = EmpresaUsuario::getMyCompany();
    
    
    	$model = $this->findModel($id);
    
    	if ($companyModel->ID_EMPRESA !== $model->iDCONSTANCIA->iDTRABAJADOR->ID_EMPRESA && $companyModel->ID_EMPRESA !== $model->iDCONSTANCIA->iDTRABAJADOR->iDEMPRESA->ID_EMPRESA_PADRE){
    
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    	
    	
    	if(! ( $model->CLAVE === 'CON0003'  ||  $model->CLAVE === 'CON0004') ){
    		
    		throw new NotFoundHttpException('The requested page does not exist.');
    		
    	}
    
    	return $this->render('view_by_instructor', [
    			'model' => $model
    	]);
    }
    
    
    
    
    
    
    
    
    /**
     * Displays a single Indicador to user Istructor model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewByUserInstructor($id)
    {
    
    	$companyModel = EmpresaUsuario::getMyCompany();
    
    
    	$model = $this->findModel($id);
    
    	if ($companyModel->ID_EMPRESA !== $model->iDCONSTANCIA->iDTRABAJADOR->ID_EMPRESA && $companyModel->ID_EMPRESA !== $model->iDCONSTANCIA->iDTRABAJADOR->iDEMPRESA->ID_EMPRESA_PADRE){
    
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    	 
    	 
    	if(! ( $model->CLAVE === 'CON0003'  ||  $model->CLAVE === 'CON0004') ){
    
    		throw new NotFoundHttpException('The requested page does not exist.');
    
    	}
    
    	return $this->render('view_by_user_instructor', [
    			'model' => $model
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
     * Deletes an existing IndicadorConstancia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteByInstructor($id)
    {
    
    	$companyModel = EmpresaUsuario::getMyCompany();
    	$instructorModel = Instructor::getOwnData();
    	
    	$model = $this->findModel($id);
    	 
    	if($companyModel->ID_EMPRESA !== $model->iDCONSTANCIA->iDCURSO->iDINSTRUCTOR->ID_EMPRESA )
    		throw new NotFoundHttpException('The requested page does not exists.');
    	else{
    		
    		if($model->CLAVE === 'CON0004' || $model->CLAVE === 'CON0003'){
    		
    			$model->delete();
    		
    		}else{
    			
    			throw new NotFoundHttpException('The requested page does not existe.');
    		}
    			
    	}
    	Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-success'],
    			'body'=> '<i class="fa fa-check"></i> Notificación borrada correctamente.',
    	]);
    
    	return $this->redirect(['index-by-instructor']);
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
