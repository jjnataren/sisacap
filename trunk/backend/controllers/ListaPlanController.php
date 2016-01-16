<?php

namespace backend\controllers;

use Yii;
use backend\models\ListaPlan;
use backend\models\search\ListaPlanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\EmpresaUsuario;
use backend\models\Plan;
use backend\models\Empresa;
use yii\web\UploadedFile;
use yii\helpers\Json;
use backend\models\EmpresaSearch;
use yii\data\ActiveDataProvider;
use backend\models\ListaEstablecimiento;
use backend\models\EmpresaUsuarioSearch;
use backend\models\Constancia;
use backend\models\ListaConstancia;

/**
 * ListaPlanController implements the CRUD actions for ListaPlan model.
 */
class ListaPlanController extends Controller
{
	
	
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
	
	
	protected  $no_constancias = 20; 
	
  /*  public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }*/

    /**
     * Lists all ListaPlan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ListaPlanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    
    /**
     * Upload a single document
     * @param unknown $id
     * @param unknown $document
     */
    public function actionUploaddocument($id,$document){
    
    	$model = $this->findModel($id);
    
    	switch ($document){
    		 
    		case 1:
    			$file = UploadedFile::getInstanceByName('DOCUMENTO_PROBATORIO');
    			$fileReturn = Yii::$app->fileStorage->save($file);
    
    			$model->DOCUMENTO_PROBATORIO = $fileReturn->url;
    			$model->NOMBRE_DOC_PROB = $file->name;
    
    			$model->save();
    
    			break;
    		case 2:
    			break;
    
    	}
    
    	echo Json::encode(['message'=>'OK']);
    	return;
    }
    
    
    /**
     *
     * @param unknown $id
     * @param unknown $document
     */
    public function actionDeletedocument($id,$document){
    
    	$model = $this->findModel($id);
    
    	switch ($document){
    
    		case 1:
    
    			$model->DOCUMENTO_PROBATORIO = NULL;
    			$model->save();
    
    			break;
    		case 2:
    			break;
    
    	}
    
    	echo Json::encode(['message'=>'OK']);
    	return;
    }

    
    /**
     *
     * @param number $id
     * @param number $id_const
     * @throws NotFoundHttpException
     * @return Ambigous <\yii\web\Response, \yii\web\static, \yii\web\Response>
     */
    public function actionDeleteConstancia($id, $id_const){
    	
    	$companyUser = EmpresaUsuario::getMyCompany();
    	
    	$model = $this->findModel($id);
    	
    	if($model->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyUser->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    	
    	
    	$listaConstanciaModel =  ListaConstancia::findOne(['ID_LISTA'=>$id, 'ID_CONSTANCIA'=>$id_const]);
    	
    	if($listaConstanciaModel === null)
    		throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	
    	$listaConstanciaModel->delete();
    	
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	'body'=> '<i class="fa fa-check"></i> Constancia  borrada correctamente.',
    	]);
    	
    	
    	return $this->redirect(['dashboard', 'id' => $id]);
    	
    	
    }
    
    
    
    /**
     * 
     * @param number $id
     * @param number $id_est
     * @throws NotFoundHttpException
     * @return Ambigous <\yii\web\Response, \yii\web\static, \yii\web\Response>
     */
    public function actionDeleteEstablishment($id, $id_est){
    	 
    	$companyUser = EmpresaUsuario::getMyCompany();
    
    	$model = $this->findModel($id);
    	 
    	$establesimientoModel = Empresa::findOne(['ID_EMPRESA'=>$id_est, 'ID_EMPRESA_PADRE'=>$companyUser->ID_EMPRESA, 'ACTIVO'=>1]);
    	 
    	if ( $establesimientoModel=== NULL || $model->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyUser->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	$establecimientoListaModel = ListaEstablecimiento::findOne(['ID_LISTA'=>$id, 'ID_ESTABLECIMIENTO'=>$id_est]);
    	
    	if ($establecimientoListaModel=== null){
    		 
    		throw new NotFoundHttpException('The requested page does not exist.');
    		
    	}else
    		 
    	$establecimientoListaModel->delete();
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	'body'=> '<i class="fa fa-check"></i> Establecimiento borrado correctamente.',
    	]);
    	 
    	return $this->redirect(['dashboard', 'id' => $id]);
    }
    
    
    
    /**
     * Relates an establishment to a particular Lista-plan
     * @param Integer $id
     * @param Integer $id_establishment
     * @throws NotFoundHttpException
     * @return Ambigous <\yii\web\Response, \yii\web\static, \yii\web\Response>
     */
    public function actionAddEstablishment($id, $id_est){
    	 
    	$companyUser = EmpresaUsuario::getMyCompany();
    	 
    	$model = $this->findModel($id);
    	
    	 
    	$establishmentModel = Empresa::findOne(['ID_EMPRESA_PADRE'=>$companyUser->ID_EMPRESA, 'ID_EMPRESA'=>$id_est]);
    	 
    	if ($establishmentModel === NULL || $model->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyUser->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    	 
    
    
    	$listaEstablecimientoModel = ListaEstablecimiento::findOne(['ID_LISTA'=>$id, 'ID_ESTABLECIMIENTO'=>$id_est]);
    	 
    	if ($listaEstablecimientoModel === null){
    		 
    		$listaEstablecimientoModel = new ListaEstablecimiento();
    		$listaEstablecimientoModel->ID_LISTA = $id;
    		$listaEstablecimientoModel->ID_ESTABLECIMIENTO = $id_est;
    		$listaEstablecimientoModel->FECHA_AGREGO  = date('Y-m-d H:i:s');
    		$listaEstablecimientoModel->ACTIVO = 1;
    		
    		if (!$listaEstablecimientoModel->save()){
    				
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-warning'],
    			'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> No fue posible agregar el establecimiento',
    			]);
    			 
    		}
    	}
    
    
    
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	'body'=> '<i class="fa fa-check"></i> Establecimiento agregado correctamente.',
    	]);
    	 
    	return $this->redirect(['dashboard', 'id' => $id]);
    }
    
    
    
    
    
    
    /**
     * Shows main view of Plans
     * @return mixed
     */
    public function actionDashboard($id)
    {

    	$companyModel = EmpresaUsuario::getMyCompany();
    	
    	$model = $this->findModel($id);
    	
		if ($model->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA){

			throw new NotFoundHttpException('The requested page does not exist.');
			
		}
    	
    	
	$establishmentsSearchModel = new EmpresaSearch();
	$establishmentsDataProvider =  new ActiveDataProvider([
    			'query' => $model->iDPLAN->getPlanEstablecimientos(),
    			]);
		
		
    	
    	return $this->render('dashboard', [
    			'model' => $model,
    			'establishmentsSearchModel'=>$establishmentsSearchModel,
    			'establishmentsDataProvider'=>$establishmentsDataProvider,
    			]);
    }

    /**
     * Displays a single ListaPlan model.
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
     * Creates a new ListaPlan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateByPlan($id_plan)
    {
    	
    	
    	$companyModel = EmpresaUsuario::getMyCompany();
    	
    	$planModel = Plan::findOne(['ID_PLAN'=>$id_plan, 'ACTIVO'=>1]);
    	
    	if ($planModel === NULL || $planModel->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    	
    	
    	$model = new ListaPlan();
    
    	$model->ID_PLAN = $id_plan;
    	
    	$model->ACTIVO = 1;
    	

    	
    	if ($model->load(Yii::$app->request->post()) ) {
    		
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_ELABORACION);
    		$model->FECHA_ELABORACION = ($tmpdate === false)? null : $tmpdate ->format('Y-m-d') ;
    		
    	
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_SOLICITUD);
    		$model->FECHA_SOLICITUD = ($tmpdate === false)? null : $tmpdate ->format('Y-m-d') ;
    		
    		 

    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_P_DOF);
    		$model->FECHA_P_DOF = ($tmpdate === false)? null : $tmpdate ->format('Y-m-d') ;
    		
    		$model->FECHA_AGREGO = date('Y-m-d H:i');
    		
    		if ($model->save()){
    			
    			Yii::$app->session->setFlash('alert', [
    					'options'=>['class'=>'alert-success'],
    					'body'=> '<i class="fa fa-check fa-lg"></i> Lista creada correctamente',
    			]);
    			
    			return $this->redirect(['plan/dashboard', 'id' => $id_plan]);
    			
    		}else {
    		return $this->render('create_by_plan', [
    				'model' => $model,
    				'id_plan'=>$id_plan
    				]);
    	}
    		
    		
    		
    	} else {
    		return $this->render('create_by_plan', [
    				'model' => $model,
    				'id_plan'=>$id_plan
    				]);
    	}
    }
    
    
    /**
     * Retrieves the  DC4 Report 
     * @param Number $id
     * @return Ambigous <string, string>
     */
    public function actionReportPdfPart2($id, $id_const){
    	 
		$companyModel = EmpresaUsuario::getMyCompany();
    	
    	$model = $this->findModel($id);
    
    	$constanciaModel = Constancia::findOne(['ID_CONSTANCIA'=>$id_const, 'ACTIVO'=>'1' ]);
    	
    	if($constanciaModel === null || $constanciaModel->iDCURSO->ID_PLAN !== $model->ID_PLAN || $model->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA )
    		throw new NotFoundHttpException('The requested page does not exist.');
    
    	// Rotate the page
    	// Rotate the page
    	
    	Yii::$app->response->format = 'pdf';
		
		// Rotate the page
		Yii::$container->set(Yii::$app->response->formatters['pdf']['class'], [
		//'format' => [210, 297], // Legal page size in mm
		'orientation' => 'Landscape', // This value will be used when 'format' is an array only. Skipped when 'format' is empty or is a string
		'marginLeft' => 7.5, // Optional
		'marginRight' => 10.8, // Optional
		'marginTop' => 7, // Optional
		'marginBottom' => 3, // Optional
		
		'beforeRender' => function($mpdf, $data) {},
		]); 
	
		$this->layout = '//_print';
		return $this->render('reports/DC-4_',['model'=>$model, 'constancia'=>$constanciaModel]);
	
    }
    
    
    /**
     * Retrieves the  DC1 Report for a particular comision mixta
     * @param Number $id
     * @return Ambigous <string, string>
     */
    public function actionReportPdf4($id){
    
    	$model = $this->findModel($id);
    
    
    
    	// Rotate the page
    	// Rotate the page
    
   		Yii::$app->response->format = 'pdf';
    
    
    
    	// Rotate the page
    	Yii::$container->set(Yii::$app->response->formatters['pdf']['class'], [
    	//'format' => [210, 297], // Legal page size in mm
    	'orientation' => 'Landscape', // This value will be used when 'format' is an array only. Skipped when 'format' is empty or is a string
    	'marginLeft' => 7.5, // Optional
    	'marginRight' => 10.5, // Optional
    	'marginTop' => 8, // Optional
    
    	'beforeRender' => function($mpdf, $data) {},
    	]);
 
    	$this->layout = '//_print';
    	
    	return $this->renderPartial('reports/DC-4',['model'=>$model, ]);
    	
    	
    	//return $this->render('reports/DC-4',['model'=>$model]);
    
    }

    
    
    
    /**
     * Retrieves the  DC1 Report for a particular comision mixta
     * @param Number $id
     * @return Ambigous <string, string>
     */
    public function actionReportPdfAll($id,$paquete){
    
    	$model = $this->findModel($id);
    
    	
    	if (count($model->iDCONSTANCIAs) > ($paquete-1) * $this->no_constancias){
    		
    		
    		$inicio =  (($paquete - 1) * $this->no_constancias) +1 ; // ($paquete*$this->no_constancias) - ($this->no_constancias - 1);
    		
    	}else 
    		
    		throw new NotFoundHttpException('The requested page does not exist.');
    	
    
    	// Rotate the page
    	// Rotate the page
    
    	Yii::$app->response->format = 'pdf';
    
    
    
    	// Rotate the page
    	Yii::$container->set(Yii::$app->response->formatters['pdf']['class'], [
    			//'format' => [210, 297], // Legal page size in mm
    			'orientation' => 'Landscape', // This value will be used when 'format' is an array only. Skipped when 'format' is empty or is a string
    			'marginLeft' => 7.5, // Optional
    			'marginRight' => 10.8, // Optional
    			'marginTop' => 8, // Optional
    
    			'beforeRender' => function($mpdf, $data) {},
    			]);
    
    	$this->layout = '//_print';
    	 
    	return $this->renderPartial('reports/DC-4_ALL',['model'=>$model, 'inicio'=>$inicio, 'no_constancias'=>$this->no_constancias]);
    	 
    	 
    	//return $this->render('reports/DC-4',['model'=>$model]);
    
    }
    
    
    /**
     * Creates a new ListaPlan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ListaPlan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_LISTA]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    
    
    

    /**
     * Updates an existing ListaPlan model by its plan.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateByPlan($id)
    {
    	$model = $this->findModel($id);
    	
    	$companyModel = EmpresaUsuarioSearch::getMyCompany();

    	if($model->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA)    		
    		throw new NotFoundHttpException('The requested page does not exist.');
    	
    	if ($model->load(Yii::$app->request->post())) {
    		
    	
    		 
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_ELABORACION);
    		$model->FECHA_ELABORACION = ($tmpdate === false)? null : $tmpdate ->format('Y-m-d') ;
    		
    		
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_SOLICITUD);
    		$model->FECHA_SOLICITUD = ($tmpdate === false)? null : $tmpdate ->format('Y-m-d') ;
    		
    		 
    		
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_P_DOF);
    		$model->FECHA_P_DOF = ($tmpdate === false)? null : $tmpdate ->format('Y-m-d') ;
    		
    		$model->FECHA_AGREGO = date('Y-m-d H:i');
    		
    		if ($model->save()){
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=> '<i class="fa fa-check"></i> Se ha guardado correctamente el reporte.',
    		]);
    		}else{
    			return $this->render('update_by_plan', [
    					'model' => $model,
    			]);
    			
    		}
    		
    		
    		return $this->redirect(['dashboard', 'id' => $model->ID_LISTA]);
    	} else {
    		return $this->render('update_by_plan', [
    				'model' => $model,
    				]);
    	}
    }
    
    
    
    

    /**
     * Updates an existing ListaPlan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['lista-plan/dashboard', 'id' => $model->ID_LISTA]);
        } else {
            return $this->render('update_by_plan', [
                'model' => $model,
            ]);
        }
    }
    
    
  
   
    
    
    /**
     * Adds a new constancia
     * @param number $id
     * @param number $id_const
     * @throws NotFoundHttpException
     * @return Ambigous <\yii\web\Response, \yii\web\static, \yii\web\Response>|Ambigous <string, string>
     */
    public function actionAddConstancia($id, $id_const){
    	

    	$model = $this->findModel($id);
    	
    	$companyModel = EmpresaUsuario::getMyCompany();
    	
    	$constancia = Constancia::findOne(['ID_CONSTANCIA'=>$id_const, 'ACTIVO'=>1] );
    	
    	$listaConstanciaModel = new ListaConstancia();
    	
    	
    	if ($constancia->iDCURSO->ID_PLAN !== $model->ID_PLAN || $model->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA)
    				throw new NotFoundHttpException('The requested page does not exist.');
    		
    	
    	$listaConstanciaModel->ACTIVO = 1;
    	$listaConstanciaModel->ID_CONSTANCIA = $id_const;
    	$listaConstanciaModel->ID_LISTA = $id;
    	$listaConstanciaModel->FECHA_AGREGO = date('Y-m-d H:i:s');
    	
    	$constancia->ESTATUS = Constancia::STATUS_IN_REPORT;
    	
    	if (/*$listaConstanciaModel->load(Yii::$app->request->post()) &&*/ $listaConstanciaModel->save() && $constancia->save(false)) {
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=> '<i class="fa fa-check"></i> Constancia agregada corectamente.',
    		]);
    		
    		return $this->redirect(['dashboard', 'id' => $model->ID_LISTA]);
    	} else {
    		
    		Yii::$app->session->setFlash('warning', [
    		'options'=>['class'=>'alert-success'],
    		'body'=> '<i class="fa fa-check"></i> Ocurrio un error al  agregar la constancia.',
    		]);
    		
    		return $this->redirect(['dashboard', 'id' => $model->ID_LISTA]);
    	}
    	//	return $this->render('add_update_constancia', [
    //				'model' => $model,
    	//			'constancia' => $constancia,
    		//		'listaConstancia'=>$listaConstanciaModel
    			//	]);
    //	}    	
    	
    	
    }
    
    
    

    /**
     * Deletes an existing ListaPlan model.
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
     * Deletes an existing ListaPlan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteLista($id,$id_lista)
    {
    	
    	
    	$companyUser = EmpresaUsuario::getMyCompany();
    	 
    	$model = $this->findModel($id_lista);
    	
    	if (  $model->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyUser->ID_EMPRESA)
    		
    		throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	$listaModel = ListaPlan::findOne(['ID_PLAN'=>$id,'ID_LISTA'=>$id_lista]);
    	
    	if ($listaModel === null){
    	
    		throw new NotFoundHttpException('The requested page does not exist.');
    		
    	}else
    	
    		$listaModel->delete();
    	
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	'body'=> '<i class="fa fa-check"></i> La constacia se ha borrado correctamente.',
    	]);
    	 
    	return $this->redirect(['plan/dashboard', 'id' => $id]);
    
    
    	
    }
    

    /**
     * Finds the ListaPlan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ListaPlan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ListaPlan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
