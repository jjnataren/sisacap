<?php

namespace backend\controllers;

use Yii;
use backend\models\IndicadorComision;
use backend\models\search\IndicadorComisionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\EmpresaUsuario;
use yii\base\Object;
use yii\data\ActiveDataProvider;
/**
 * IndicadorComisionController implements the CRUD actions for IndicadorComision model.
 */
class IndicadorComisionController extends Controller
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
    public function actionIndex()
    {
        $searchModel = new IndicadorComisionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
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
    	$searchModel = new IndicadorComisionSearch();
    	//$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$query = IndicadorComision::findBySql('select * from tbl_indicador_comision where id_comision in
    	                            		(select id_comision_mixta from tbl_comision_mixta_cap where id_empresa = '.EmpresaUsuario::getMyCompany()->ID_EMPRESA.' and ACTIVO=1) AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia  ');
    	 
    	 
    	 
    	 
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
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
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
    		if ($companyModel->ID_EMPRESA !== $model->iDCOMISION->ID_EMPRESA){
    		
    			throw new NotFoundHttpException('The requested page does not exist.');
    		}
    	
    	return $this->render('view_by_company', [
    			'model' => $model
    			]);
    }

    /**
     * Creates a new IndicadorComision model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IndicadorComision();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_EVENTO]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IndicadorComision model.
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
     * Deletes an existing IndicadorComision model.
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
     * Deletes an existing IndicadorComision model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteByCompany($id)
    {
    	$companyModel = EmpresaUsuario::getMyCompany();
    	
    	$model = $this->findModel($id);
    	$model->delete();
    	return $this->redirect(['index-by-company']);
    }
    

    /**
     * Finds the IndicadorComision model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IndicadorComision the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IndicadorComision::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
