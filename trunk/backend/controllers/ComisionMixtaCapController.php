<?php

namespace backend\controllers;

use Yii;
use backend\models\ComisionMixtaCap;
use backend\models\ComisionMixtaCapSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\EmpresaUsuarioSearch;
use backend\models\Indicadores;
use backend\models\EmpresaUsuario;
use backend\models\Empresa;
use backend\models\EstablecimientoSearch;
use backend\models\EmpresaSearch;
use backend\models\ComisionEstablecimiento;
use trntv\filekit\actions\UploadAction;
use yii\web\UploadedFile;
use yii\helpers\Json;
use backend\models\IndicadorComision;
use backend\models\search\TrabajadorSearch;
use backend\models\Trabajador;

/**
 * ComisionMixtaCapController implements the CRUD actions for ComisionMixtaCap model.
 */
class ComisionMixtaCapController extends Controller
{
	
	/*
	public function actions(){
		return [
		'uploaddocument'=>[
		'class'=>UploadAction::className(),
		'fileProcessing'=>function($file){
		//Image::thumbnail($file->path->getPath(), 215,215)
		//->save($file->path->getPath());
		
			$a_tmp_file = UploadedFile::getInstancesByName('_fileinput_w0');
			$tmp_file = $a_tmp_file[0];
			
			$file->url = $file->url.'?name='.$tmp_file->name; 
			
			Yii::$app->fileStorage->save($file);
		}
		
		],
		'view'=>[
			'class'=>'trntv\filekit\actions\ViewAction',
      	 ]
		];
	}*/
	
	
	
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
				
				Indicadores::setIndicadoresComision($model); 
				
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
				
				Indicadores::setIndicadoresComision($model);
				break;
			case 2:
				break;
	
		}
	
		echo Json::encode(['message'=>'OK']);
		return;
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
     * Lists all ComisionMixtaCap models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ComisionMixtaCapSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ComisionMixtaCap model.
     * @param integer $id
     * @return mixed
     */
    
    
  /**
     * Lists all Empresa models.
     * @return mixed
     */
    public function actionIndexbycompany()
    {
    	 
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id]);
    	 
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    	
    	
    	$searchModel = new ComisionMixtaCapSearch();
    	 
    	$dataProvider = $searchModel->searchByCompany(Yii::$app->request->queryParams, $model->ID_EMPRESA);
    
    	return $this->render('index_comisiones', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    }
    
    
    
    /**
     * 
     * @param unknown $id
     */
    public function actionManageestablishments($id){
    	
    	$model =  EmpresaUsuario::getMyCompany();
    	
    	
    	return $this->render('manage_establishments', [
    			'model'=>$capacitacionModel
    			]);
    }
    
    
    /**
     * Relates an establishment to a particular comision mixta
     * @param Integer $id
     * @param Integer $id_establishment
     * @throws NotFoundHttpException
     * @return Ambigous <\yii\web\Response, \yii\web\static, \yii\web\Response>
     */
    public function actionAddestablishment($id, $id_establishment){
    	
    	$companyUser = EmpresaUsuario::getMyCompany();
    	
    	$model = $this->findModel($id);
    	
    	$establishmentModel = Empresa::findOne(['ID_EMPRESA_PADRE'=>$companyUser->ID_EMPRESA, 'ID_EMPRESA'=>$id_establishment]);
    	
    	if ($establishmentModel === NULL || !($model->ID_EMPRESA === $companyUser->ID_EMPRESA))
    			throw new NotFoundHttpException('The requested page does not exist.');
    	
    	
    	$comisionEstablecimientoModel = ComisionEstablecimiento::findOne(['ID_COMISION_MIXTA'=>$id, 'ID_ESTABLECIMIENTO'=>$id_establishment]);
    	
    	if ($comisionEstablecimientoModel === null){ 

    		$comisionEstablecimientoModel = new ComisionEstablecimiento();
    		$comisionEstablecimientoModel->ID_COMISION_MIXTA = $id;
    		$comisionEstablecimientoModel->ID_ESTABLECIMIENTO = $id_establishment;
    		$comisionEstablecimientoModel->ACTIVO = 1;
    		if (!$comisionEstablecimientoModel->save()){
    			
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
     * Relates an establishment to a particular comision mixta
     * @param Integer $id
     * @param Integer $id_establishment
     * @throws NotFoundHttpException
     * @return Ambigous <\yii\web\Response, \yii\web\static, \yii\web\Response>
     */
    public function actionSelectRepresentante($id, $id_trabajador){
    						
    	$companyUser = EmpresaUsuario::getMyCompany();
    	 
    	$model = $this->findModel($id);
    	 
    	$trabajadorModel = Trabajador::find($id_trabajador);
    	 
    	if ( $model->ID_EMPRESA !== $companyUser->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	 
    
    		$model->ID_REPRESENTANTE_TRABAJADORES = $id_trabajador;

    		if (!$model->save()){
    			 
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-warning'],
    			'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> No ha sido posible seleccionar el representante de los trabajadores',
    			]);
    
    		}else{
    		     	 
			    	Yii::$app->session->setFlash('alert', [
			    	'options'=>['class'=>'alert-success'],
			    	'body'=> '<i class="fa fa-check fa-lg"></i> Se ha seleccionado el representante de los trabajadores correctamente',
			    	]);
    	
    		}
    	 
    	return $this->redirect(['dashboard', 'id' => $id]);
    	 
    }
    
    
    /**
     * Lists all Empresa models.
     * @return mixed
     */
    public function actionViewbycompany($id)
    {
    
    	$model = EmpresaUsuario::getMyCompany();
    
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	
    	$capacitacionModel = $this->findModel($id);
    	
    	return $this->render('view_by_company', [
    			'model'=>$capacitacionModel
    			]);
    }
    
    
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ComisionMixtaCap model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ComisionMixtaCap();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_COMISION_MIXTA]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Creates a new Comision model by its company
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatebycompany()
    {
    	 
    	$model = EmpresaUsuario::getMyCompany();

    	$companyModel = $model->iDEMPRESA;
    	
    	
    	if($companyModel->NUMERO_TRABAJADORES < 50){
    	
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>El artículo 7 de la segunda sección de la secretaria del trabajo y prevención social, estipula como obligatorio crear comisiones mixtas a las empresas que cuenten con más de 50 trabajadores, al no contar con ello es opcional crear la comisión mixta.,  presione el boton [<a href=\'#\' class=\'alert-link\'>Confirmar crear comision</a>] para continuar',
    		]);
    		
    	}
    	
    	
    	/**
		@todo: Build a query that allows you to get total row of workers by parent company
    	 */
    	
    	/*$workers = count( $companyModel->trabajadors);
    	
    	$establishments = $companyModel->empresas;
    	
    	foreach ($establishments as $establishment){
    		
			$workers+= count($establishment->trabajadors);
			    		
    	}
    	
    	if($workers < 10){
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=>Yii::t('frontend', 'No se puede crear una comision en este momento')
    		]);
    		
    		return $this->redirect(['indexbycompany']);
    	}*/
    	
    	
    	$modelComisionMixtaCap = new  ComisionMixtaCap();
    
    	$modelComisionMixtaCap->ACTIVO=1;
    
    	$modelComisionMixtaCap->ID_EMPRESA = $model->ID_EMPRESA;
    	 
    	if ($modelComisionMixtaCap->load(Yii::$app->request->post()) ) {
    		
    		/*if ($modelComisionMixtaCap->NUMERO_INTEGRANTES < 50){
    			
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-success'],
    			'body'=>Yii::t('frontend', 'No se puede crear una comision en este momento')
    			]);
    			
    			return $this->redirect(['viewbycompany', 'id' => $modelComisionMixtaCap->ID_COMISION_MIXTA]);
    		}*/
    
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $modelComisionMixtaCap->FECHA_CONSTITUCION);
    		
    		
    		$modelComisionMixtaCap->FECHA_CONSTITUCION = ($tmpdate ===false)? null : $tmpdate->format('Y-m-d') ;
    		
    		//$trabajadorModel->FECHA_EMISION_CERTIFICADO = ($tmpdate=== false)? null : $tmpdate->format('Y-m-d') ;
    		
    		$tmpdate2 =\DateTime::createFromFormat('d/m/Y', $modelComisionMixtaCap-> FECHA_ELABORACION);
    		
    		$modelComisionMixtaCap->FECHA_ELABORACION = ($tmpdate2 === false)? null :$tmpdate2->format('Y-m-d');
    		
    		
    		$modelComisionMixtaCap->FECHA_AGREGO = date('Y-m-d H:i');
    		
    		if($modelComisionMixtaCap->save()){
    			
    			Indicadores::setIndicadoresComision($modelComisionMixtaCap);
    		
    			return $this->redirect(['viewbycompany', 'id' => $modelComisionMixtaCap->ID_COMISION_MIXTA]);
    		
    		}
    		else return $this->render('create_by_company', [
    				'model' => $modelComisionMixtaCap,
    				]);
    
    
    	} else {
    		return $this->render('create_by_company', [
    				'model' => $modelComisionMixtaCap,
    				]);
    	}
    }
    
    
    /*
      public function actionValidateComapny()
    	{
    		
    		$model = EmpresaUsuario::getMyCompany();
    		
    		if ($model->load(Yii::$app->request->post()) ) {
    			
    			Yii::$app->response->format = 'json';
    			return [
    			'message' => 'Success!!!',
    			];
    			
    		}
    		
    		
    		
    	}
    */
    

    /**
     * Updates an existing ComisionMixtaCap model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_COMISION_MIXTA]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    /**
     *
     * @throws NotFoundHttpException
     */
    public function actionUpdatebyuser($id){
    	 
    	 
    	//Yii::$app->user
    	//$new_model = new Em
    	 
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id]);
    	 
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	 
    	$ComisionMictaCap = $this->findModel($id);
    	 
    	 
    	if ($ComisionMictaCap->load(Yii::$app->request->post())) {
    		
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $ComisionMictaCap->FECHA_CONSTITUCION);
    	
    		$tmpdate2 = \DateTime::createFromFormat('d/m/Y', $ComisionMictaCap->FECHA_ELABORACION);
   		
    		$ComisionMictaCap->FECHA_CONSTITUCION = ($tmpdate=== false)? null : $tmpdate->format('Y-m-d') ;
    
    		$ComisionMictaCap->FECHA_ELABORACION = ($tmpdate2 === false )? null:$tmpdate2->format('Y-m-d') ;
    	     		
    		if ($ComisionMictaCap->save()){
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-success'],
    			
    			'body'=> '<i class="fa fa-check"></i> Comisión actualizada correctamente.',
    			]);
    			
    			Indicadores::setIndicadoresComision($ComisionMictaCap);
    			
    			return $this->redirect(['dashboard', 'id' => $id]);
    		}
    		
    	}
    	 
    	 
    	return $this->render('update_by_user', [
    			'model' => $ComisionMictaCap,
    			]);
    	 
    	 
    }
    /**
     * Deletes an existing ComisionMixtaCap model.
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
     * accion para eliminar la comision mixta de capacitacion y adiestramiento 
     * @param unknown $id
     * @throws NotFoundHttpException
     */
    public function actionDeletebyuser($id)
    {
    	$model = $this->findModel($id);
    	$companyModel = EmpresaUsuario::getMyCompany();
    
    	if ($model->ID_EMPRESA !== $companyModel->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    
    	 
    	$model->ACTIVO=0;
    	 
    	if ($model->delete()){
    		 
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=>Yii::t('frontend', 'Se ha eliminado la comisión correctamente')
    		]);
    	}else{
    
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=>Yii::t('frontend', 'No se pudo  eliminar la comisión')
    		]);
    	}
    	return $this->redirect(['indexbycompany']);
    }
    /**
     * 
     * Shows dashboard of particular comision mixta
     * @param integer $id
     * @return mixed
     */
    public function actionDashboard($id)
    {
    	
    	$companyUser = EmpresaUsuario::getMyCompany();
    	
    	$model = $this->findModel($id);

    	if (!($model->ID_EMPRESA === $companyUser->ID_EMPRESA)) 
    		throw new NotFoundHttpException('The requested page does not exist.');
    	
    	$searchEstablecimientoModel = new  EmpresaSearch();
    	$dataproviderEstablecimiento = $searchEstablecimientoModel->searchEstablishments(Yii::$app->request->queryParams, $companyUser->ID_EMPRESA);
    	
    	$searchPlanEstablecimientoModel = new EmpresaSearch();    
    	$dataproviderPlanEstablecimiento = $searchPlanEstablecimientoModel->searchEstablishmentsByComision(null, $id);
    	
    	$trabajadorSearch = new TrabajadorSearch();
    	$dataproviderTrabajadores = $trabajadorSearch->searchRepresentanteTrabajadores(Yii::$app->request->queryParams, $companyUser->ID_EMPRESA);
    	
    	
    	
    	
    		return $this->render('dash_board', [
    				'model' => $model,
    				'searchEstablecimientoModel'=>$searchEstablecimientoModel,
    				'dataproviderEstablecimiento'=>$dataproviderEstablecimiento,
    				'searchPlanEstablecimientoModel'=>$searchPlanEstablecimientoModel,
    				'dataproviderPlanEstablecimiento'=>$dataproviderPlanEstablecimiento,
    				'trabajadorSearch'=>$trabajadorSearch,
    				'dataproviderTrabajadores'=>$dataproviderTrabajadores,
    		]);
    	 
    }    
    
    
    
    /**
     * Deletes an establishment from comision
     * @param integer $id
     * @param integer $id_establesimiento
     * @throws NotFoundHttpException
     * @return Ambigous <\yii\web\Response, \yii\web\static, \yii\web\Response>
     */
    public function actionDeletestablecimiento($id, $id_establesimiento){
    	
    	$companyUser = EmpresaUsuario::getMyCompany();
    	 
    	$model = $this->findModel($id);
    	
    	$establesimientoModel = Empresa::findOne(['ID_EMPRESA'=>$id_establesimiento, 'ID_EMPRESA_PADRE'=>$companyUser->ID_EMPRESA, 'ACTIVO'=>1]);
    	
    	if ( $establesimientoModel=== NULL || $model->ID_EMPRESA !== $companyUser->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    	
    	$establecimientoComisionModel = ComisionEstablecimiento::findOne(['ID_COMISION_MIXTA'=>$id, 'ID_ESTABLECIMIENTO'=>$id_establesimiento]);
    	if ($establecimientoComisionModel=== null){
    		 
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}else
    		 
    	$establecimientoComisionModel->delete();
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	'body'=> '<i class="fa fa-check"></i> Establecimiento borrado correctamente.',
    	]);
    	
    	return $this->redirect(['dashboard', 'id' => $id]);
    }
    
    
    
    /**
     * Retrieves the  DC1 Report for a particular comision mixta
     * @param Number $id
     * @return Ambigous <string, string>
     */
    public function actionReportpdf($id){
    	
    	$model = $this->findModel($id);
    
 		Yii::$app->response->format = 'pdf';
    
    	// Rotate the page
    // Rotate the page
		Yii::$container->set(Yii::$app->response->formatters['pdf']['class'], [
		//'format' => [210, 297], // Legal page size in mm
		'orientation' => 'Landscape', // This value will be used when 'format' is an array only. Skipped when 'format' is empty or is a string
		'marginLeft' => 10, // Optional
		'marginRight' => 8, // Optional
		'marginTop' => 11, // Optional
		'marginBottom' => 20, // Optional
		'beforeRender' => function($mpdf, $data) {},
		]); 
		
		
    	$this->layout = '//_print';
    	return $this->render('reports/DC-1', ['model'=>$model]);
    }

    /**
     * Finds the ComisionMixtaCap model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ComisionMixtaCap the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ComisionMixtaCap::findOne(['ID_COMISION_MIXTA'=>$id, 'ACTIVO'=>1])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
