<?php

namespace backend\controllers;

use Yii;
use backend\models\Plan;
use backend\models\PlanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\EmpresaUsuario;
use backend\models\ComisionMixtaCap;
use backend\models\EmpresaSearch;
use backend\models\PlanEstablecimiento;
use backend\models\Empresa;
use yii\data\ActiveDataProvider;
use backend\models\PuestoEmpresa;
use backend\models\PlanPuesto;
use backend\models\Curso;
use trntv\filekit\actions\UploadAction;
use yii\web\UploadedFile;
use yii\helpers\Json;
use backend\models\Indicadores;
/**
 * PlanController implements the CRUD actions for Plan model.
 */
class PlanController extends Controller
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
     * Lists all Plan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    /**
     * Lists all Plan models.
     * @return mixed
     */
    public function actionIndexbycompany()
    {
    	
    	
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id, 'ACTIVO'=>'1']);
    	 
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    	
    	
    	$searchModel = new PlanSearch();
    	$dataProvider = $searchModel->searchByCompany(Yii::$app->request->queryParams, $model->ID_EMPRESA);
    
    	return $this->render('index_by_company', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    }
    
    
    
    /**
     *
     * Shows dashboard of particular Plan
     * @param integer $id
     * @return mixed plan
     */
    public function actionDashboard($id)
    {
    	 
    	$companyUser = EmpresaUsuario::getMyCompany();
    	 
    	$model = $this->findModel($id);
    
    	if ($model->iDCOMISION->ID_EMPRESA !== $companyUser->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	 
    	$searchPlanEstablecimientoModel = new EmpresaSearch();
    	
    	$dataproviderPlanEstablecimiento = $searchPlanEstablecimientoModel-> searchEstablishmentsByComision(Yii::$app->request->queryParams, $model->ID_COMISION);
		/**
		 *@todo it must change with  a particular search 
		 * 
		 */
    	 
    	$searchPuestoModel = new PuestoEmpresa();
    	
    	
    	$dataProviderPuesto = new ActiveDataProvider([
    			'query' => $companyUser->iDEMPRESA->getPuestoEmpresas(),
    			]);
    	
    	 
    	return $this->render('dashboard', [
    			'model' => $model,
    			'searchPlanEstablecimientoModel'=>$searchPlanEstablecimientoModel,
    			'dataproviderPlanEstablecimiento'=>$dataproviderPlanEstablecimiento,
    			'searchPuestoModel'=>$searchPuestoModel,
    			'dataProviderPuesto'=>$dataProviderPuesto
    			
    			]);
    
    }
    
    
    
    
    /**
     *
     * @param unknown $id
     * @throws NotFoundHttpException
     * @return Ambigous <string, string>
     */
    public function actionReportpdf($id){
    	 
    	$companyModel = EmpresaUsuario::getMyCompany();
    
    	$planModel = $this->findModel($id);
    
    	if ($planModel->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA)
    		throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    
    
    	Yii::$app->response->format = 'pdf';
    
    
    
    	// Rotate the page
    	Yii::$container->set(Yii::$app->response->formatters['pdf']['class'], [
		//'format' => [210, 297], // Legal page size in mm
		'orientation' => 'Landscape', // This value will be used when 'format' is an array only. Skipped when 'format' is empty or is a string
		'marginLeft' => 7.5, // Optional
		'marginRight' => 10.8, // Optional
		'marginTop' => 2, // Optional
		
		'beforeRender' => function($mpdf, $data) {},
		]);
    
    	$this->layout = '//_print';
    	return $this->render('reports/DC-2',['model'=>$planModel]);
    
    }
    
    public function actionUploaddocument($id,$document){
    
    	$model = $this->findModel($id);
    
    	switch ($document){
    			
    		case 1:
    			$file = UploadedFile::getInstanceByName('DOCUMENTO_APROBATORIO');
    			$fileReturn = Yii::$app->fileStorage->save($file);
    			
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-warning'],
    			'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>La constitución del plan conforme al formato DC-2 ,ha sido autentifido como adjunto. <a href=\'#\' class=\'alert-link\'></a>',
    			]);
    
    			$model->DOCUMENTO_APROBATORIO = $fileReturn->url;
    			$model->NOMBRE_DOC_APROBATORIO = $file->name;
    			
    
    			$model->save();
    			
    			Indicadores::setIndicadorPlan($model);
    			 
    
    			break;
    		case 2:
    			break;
    
    	}
    
    	echo Json::encode(['message'=>'OK']);
    	return;
    }
    
    
    
    /**
     * Creates a new Plan model by its company
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatebycomision($id){
    	
    	$model = EmpresaUsuario::getMyCompany();
    	
    	$comisionModel= ComisionMixtaCap::findOne($id);
    	
    	if ($comisionModel === null || !($comisionModel->ID_EMPRESA === $model->ID_EMPRESA) ) throw new NotFoundHttpException('The requested page does not exist.');
    	
		if($comisionModel->getCurrentStatus() < ComisionMixtaCap::STATUS_VALIDADA){
    		    		
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-warning'],
    	'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Constituir la comisión para crear el plan. <a href=\'#\' class=\'alert-link\'></a>',
    	]);
    	return $this->redirect(['comision-mixta-cap/dashboard', 'id' => $id]);
    	}
     
		$planModel = new  Plan();
		
		$planModel->ACTIVO=1;
		
    	$planModel->ID_COMISION = $id;
    	
    	$planModel->ID_EMPRESA = $model->ID_EMPRESA;
   
    	if ($planModel->load(Yii::$app->request->post())){
    		
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $planModel->VIGENCIA_INICIO);
    		$planModel->VIGENCIA_INICIO = ($tmpdate ===false)?null :$tmpdate->format('Y-m-d') ;
    
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $planModel->VIGENCIA_FIN);
    		$planModel->VIGENCIA_FIN = ($tmpdate === false)? null : $tmpdate->format('Y-m-d') ;
    		
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $planModel->FECHA_INFO);
    		$planModel->FECHA_INFO = ($tmpdate ===false)?null :$tmpdate->format('Y-m-d') ;
    		
    		$planModel->FECHA_AGREGO = date('Y-m-d H:i');
    		
    
    		if($numTrab = $planModel-> TOTAL_HOMBRES + $planModel->TOTAL_MUJERES){
    			
    			
    			echo $numTrab;
    		}
    		
    		
    		
    		
    		$planModel->ACTIVO = 1;
    	
		if ( $planModel->save()){		

			
			Yii::$app->session->setFlash('alert', [
			'options'=>['class'=>'alert-success'],
			'body'=> '<i class="fa fa-check"></i> Plan creado correctamente',
			]);
			
			Indicadores::setIndicadorPlan($planModel);
			
			return $this->redirect(['comision-mixta-cap/dashboard', 'id' => $id]);
		
		}else{
			
			Yii::$app->session->setFlash('alert', [
					'options'=>['class'=>'alert-danger'],
					'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Ha ocurrido un error, por favor revise los campos<a href=\'#\' class=\'alert-link\'></a>',
			]);
			
		}			
		
		

		
		
		}
		
			
			$empresa = $model->iDEMPRESA;
			$query = $empresa->getEmpresas();
			
			$dataProvider = new ActiveDataProvider(
					['query' => $query]
					);
			
			$searchModel = new EmpresaSearch();
			
			return $this->render('create_by_comision', [
					'model' => $planModel,
					'dataProvider'=>$dataProvider,
					'searchModel'=>$searchModel
					]);
    	
 	}
    
    
    	/**
    	 * Relates an establishment to a particular Plan
    	 * @param Integer $id
    	 * @param Integer $id_establishment
    	 * @throws NotFoundHttpException
    	 * @return Ambigous <\yii\web\Response, \yii\web\static, \yii\web\Response>
    	 */
    	public function actionAddestablishment($id, $id_establishment){
    		 
    		$companyUser = EmpresaUsuario::getMyCompany();
    		 
    		$model = $this->findModel($id);
    		 
    		$establishmentModel = Empresa::findOne(['ID_EMPRESA_PADRE'=>$companyUser->ID_EMPRESA, 'ID_EMPRESA'=>$id_establishment]);
    		 
    		if ($establishmentModel === NULL || !($model->iDCOMISION->ID_EMPRESA === $companyUser->ID_EMPRESA))
    			throw new NotFoundHttpException('The requested page does not exist.');
    		 
    		 
    		
    		
    		
    		if ($model->MODALIDAD_CAPACITACION === 1 ){
    		
    			foreach ($model->planEstablecimientos as $planEstablecimientoModel){
    					
    				$planEstablecimientoModel->delete();
    		
    			}
    		}
    		
    		
    		
    		
    		$planEstablecimientoModel = PlanEstablecimiento::findOne(['ID_PLAN'=>$id, 'ID_ESTABLECIMIENTO'=>$id_establishment]);
    		 
    		
    		
    		
    		if ($planEstablecimientoModel === null){
    	
    			
    			
    			
    			$planEstablecimientoModel = new PlanEstablecimiento();
    			$planEstablecimientoModel->ID_PLAN = $id;
    			$planEstablecimientoModel->ID_ESTABLECIMIENTO = $id_establishment;
    			$planEstablecimientoModel->ACTIVO = 1;
    			if (!$planEstablecimientoModel->save()){
    				 
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
    	 * Deletes a particular puesto from plan
    	 * @param integer $id
    	 * @param integer $id_puesto
    	 * @throws NotFoundHttpException
    	 */
    	public function actionDeletepuesto($id, $id_puesto){
    		 
    		$companyUser = EmpresaUsuario::getMyCompany();
    		 
    		$model = $this->findModel($id);
    		 
    		$puestoModel = PuestoEmpresa::findOne(['ID_PUESTO'=>$id_puesto, 'ID_EMPRESA'=>$companyUser->ID_EMPRESA, 'ACTIVO'=>1]);
    		 
    		if ($puestoModel === NULL || ($model->iDCOMISION->ID_EMPRESA !== $companyUser->ID_EMPRESA))
    			throw new NotFoundHttpException('The requested page does not exist.');
    		
    		
    		$planPuestoModel = PlanPuesto::findOne(['ID_PLAN'=>$id, 'ID_PUESTO'=>$id_puesto]);
    		
    		if ($planPuestoModel === null){
    			
    			throw new NotFoundHttpException('The requested page does not exist.');
    		}else 
    			
    			$planPuestoModel->delete();
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=> '<i class="fa fa-check"></i> Puesto borrado correctamente.',
    		]);
    		
    		return $this->redirect(['dashboard', 'id' => $id]);
    	}
    	

    	
    	
    	
    	
    	/*delete documento provatorio*/
    	
    	public function actionDeletedocument($id,$document){
    	
    		$model = $this->findModel($id);
    	
    		switch ($document){
    	
    			case 1:
    	
    				$model->DOCUMENTO_APROBATORIO = NULL;
    				$model->save();
    	
    				break;
    			case 2:
    				break;
    	
    		}
    	
    		echo Json::encode(['message'=>'OK']);
    		return;
    	}
    	
    	
    	

    	public function actionDeletecursos($id, $id_curso){
    		$companyUser = EmpresaUsuario::getMyCompany();
    		 
    		$model = $this->findModel($id);
    		
    		$planModel = Plan::findOne(['ID_PLAN'=>$id,  'ACTIVO'=>1]);
    		
    		if ( $planModel=== NULL || $planModel->iDCOMISION->ID_EMPRESA !== $companyUser->ID_EMPRESA)
    			throw new NotFoundHttpException('The requested page does not exist.');
    		 
    		$cursoModel = Curso::findOne(['ID_PLAN'=>$id, 'ID_CURSO'=>$id_curso]);
    		if ($cursoModel=== null){
    			 
    			throw new NotFoundHttpException('The requested page does not exist.');
    		}else
    			 
    			$cursoModel->delete();
    		 
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=> '<i class="fa fa-check"></i> Curso borrado correctamente.',
    		]);
    		
    		return $this->redirect(['dashboard', 'id' => $id]);
    	}
    	/**
    	 * 
    	 * @param unknown $id
    	 * @param unknown $id_establecimiento
    	 * @throws NotFoundHttpException
    	 * @return Ambigous <\yii\web\Response, \yii\web\static, \yii\web\Response>
    	 */
    	public function actionDeleteestablecimiento($id, $id_establecimiento){
    		 
    	$companyUser = EmpresaUsuario::getMyCompany();
    	
    	$model = $this->findModel($id);
    	
    	$modelPlan = Plan::findOne(['ID_PLAN'=>$id,  'ACTIVO'=>1]);
    	
    	if ( $modelPlan === NULL || $modelPlan->iDCOMISION->ID_EMPRESA !== $companyUser->ID_EMPRESA)
    		
    		   		throw new NotFoundHttpException('The requested page does not exist.');
    		 
    		$establecimientoModel = PlanEstablecimiento::findOne(['ID_PLAN'=>$id, 'ID_ESTABLECIMIENTO'=>$id_establecimiento]);
    		
    		if ($establecimientoModel === null){
    			 
    			throw new NotFoundHttpException('The requested page does not exist.');
    		}else
    			 
    			$establecimientoModel->delete();
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=> '<i class="fa fa-check"></i> Establecimiento borrado correctamente.',
    		]);
    		 
    		return $this->redirect(['dashboard', 'id' => $id]);
    	}
    	
    	
    	
    	/**
    	 * Relates an establishment to a particular Plan
    	 * @param Integer $id
    	 * @param Integer $id_establishment
    	 * @throws NotFoundHttpException
    	 * @return Ambigous <\yii\web\Response, \yii\web\static, \yii\web\Response>
    	 */
    	public function actionAddpuesto($id, $id_puesto){
    		 
    		$companyUser = EmpresaUsuario::getMyCompany();
    		 
    		$model = $this->findModel($id);
    		 
    		$puestoModel = PuestoEmpresa::findOne(['ID_PUESTO'=>$id_puesto, 'ID_EMPRESA'=>$companyUser->ID_EMPRESA, 'ACTIVO'=>1]);
    		 
    		if ($puestoModel === NULL || !($model->iDCOMISION->ID_EMPRESA === $companyUser->ID_EMPRESA))
    			throw new NotFoundHttpException('The requested page does not exist.');
    		 

    		$planPuestoModel = PlanPuesto::findOne(['ID_PLAN'=>$id, 'ID_PUESTO'=>$id_puesto]);
    	
    		if ($planPuestoModel === null){
    			
    			if($model->TIPO_PLAN === 1 ){
    				
    					return $this->redirect(['dashboard', 'id' => $model->ID_PLAN]);
    				} 
    				
    				   			
    			 $planPuestoModel = new PlanPuesto();
    			
    			
    			$planPuestoModel->ID_PLAN = $id;
    			$planPuestoModel->ID_PUESTO = $id_puesto;
    			$planPuestoModel->ACTIVO = 1;
    			if (!$planPuestoModel->save()){
    					
    				Yii::$app->session->setFlash('alert', [
    				'options'=>['class'=>'alert-warning'],
    				'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> No fue posible agregar el puesto del trabajador',
    				]);
    				 
    			}
    			
    		}
    		
    		
    	
    	
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=> '<i class="fa fa-check"></i> Puesto agregado correctamente.',
    		]);
    		 
    		return $this->redirect(['dashboard', 'id' => $id]);
    	}
    	 
    	
    	
    	
    
    
    
    
    
    
    /**
     * Displays a single Plan model.
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
     * Displays a single Plan model by its company.
     * @param integer $id
     * @return mixed
     */
    public function actionViewbycompany($id)
    {
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id]);
    	 
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    	
    	$planModel = $this->findModel($id);
    
    	
    	return $this->render('view_by_company', [
    			
    			'model' => $planModel,
    			]);
    }
    
    
    
    
    /**
     * Creates a new Plan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Plan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_PLAN]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    


    /**
     * Updates an existing Plan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['vies', 'id' => $model->ID_PLAN]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    
   public function actionUpdatebycurso($id, $id_curso){
   	$companyUser = EmpresaUsuario::getMyCompany();
   	 
   	$model = $this->findModel($id);
   	$curso = Curso::findOne(['ID_PLAN'=>$id, 'ID_CURSO'=>$id_curso]);
   	$searchModel = new InstructorSearch();
   	
   	$dataProvider = $searchModel->searchByCompany(null, $companyUsuarioModel->ID_EMPRESA);
   	
   if ($curso->load(Yii::$app->request->post()) && $curso->save()) {
   	Yii::$app->session->setFlash('alert', [
   	'options'=>['class'=>'alert-success'],
   	'body'=>Yii::t('frontend', 'El curso se actualizo correctamente. ')
   	]);Yii:
       		return $this->redirect(['plan/dashboard', 'id' => $model->ID_PLAN]);
   	
   }
   
   return $this->render('/curso/create_by_plan', [
   		'model' => $curso,
   		]);
   }
   
   
    /**
     * Updates a particular plan
     * @param unknown $id
     * @return \yii\web\Response|Ambigous <string, string>
     */
    public function actionUpdatebycompany($id){
    	 
    	
    	//Yii::$app->user
    	//$new_model = new Em
    	 
    	$model = EmpresaUsuario::getMyCompany();
    	    	 
    	$plan = $this->findModel($id);

    	if ($plan->load(Yii::$app->request->post()) ) {

    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $plan->VIGENCIA_INICIO);
    		$plan->VIGENCIA_INICIO = ($tmpdate == false)? null :  $tmpdate->format('Y-m-d') ;
    		
    		$tmpdate2 = \DateTime::createFromFormat('d/m/Y', $plan->VIGENCIA_FIN);
    		$plan->VIGENCIA_FIN = ($tmpdate2 === false )? null : $tmpdate2->format('Y-m-d') ;
    		
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $plan->FECHA_INFO);
    		$plan->FECHA_INFO = ($tmpdate ===false)?null :$tmpdate->format('Y-m-d') ;
    		
    		$plan->ACTIVO = 1;
    		
    		if( $plan->save()){
    		
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],

    		'body'=> '<i class="fa fa-check"></i> Plan actualizado correctamente.',
    		]);

    		
    		
    		Indicadores::setIndicadorPlan($plan);
    		   		
    		
    		return $this->redirect(['plan/dashboard', 'id' => $plan->ID_PLAN]);
    		
    		}else{
    			
    			Yii::$app->session->setFlash('alert', [
    					'options'=>['class'=>'alert-danger'],
    					'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Ha ocurrido un error, por favor revise los campos<a href=\'#\' class=\'alert-link\'></a>',
    			]);
    			
    		}
    		
    		
    		
    	}
    	
    	
    	
    	
    	$empresa = $model->iDEMPRESA;
    	$query = $empresa->getEmpresas();
    		
    	$dataProvider = new ActiveDataProvider(
    			['query' => $query]
    	);
    		
    	$searchModel = new EmpresaSearch();
    	
    	return $this->render('update_by_company', [
    			'model' => $plan,
    			'dataProvider'=>$dataProvider,
    			'searchModel'=>$searchModel
    			,
    			]);  

    	
    }

    
    /*
     * updatebygridview
     */
    
    public function actionUpdatebygrid($id){
    
    
    	//Yii::$app->user
    	//$new_model = new Em
    
    	$model = EmpresaUsuario::getMyCompany();
    
    	$plan = $this->findModel($id);
    
    	if ($plan->load(Yii::$app->request->post()) && $plan->save()) {
    
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=>Yii::t('frontend', 'Actualizando los planes y programas de capacitación, adiestramiento y productividad ')
    		]);Yii:
    
    		return $this->redirect(['/plan/indexbycompany', 'id' => $plan->ID_PLAN]);
    	}
    
    	$empresa = $model->iDEMPRESA;
    	$query = $empresa->getEmpresas();
    
    	$dataProvider = new ActiveDataProvider(
    			['query' => $query]
    	);
    
    	$searchModel = new EmpresaSearch();
    
    	return $this->render('update_by_company', [
    			'model' => $plan,
    			'dataProvider'=>$dataProvider,
    			'searchModel'=>$searchModel
    			,
    			]);
    
    
    }
    
   
    
    
    /**
     * Deletes an existing Plan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        
    	
    	
    	$this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    
    public function actionDeletebycomisiones($id)
    {
    	$model = EmpresaUsuario::getMyCompany();
    	
    	$plan = $this->findModel($id);
    	
    	$this->findModel($id)->delete();
    
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	'body'=> '<i class="fa fa-check"></i> Plan borrado correctamente.',
    	]);

        return $this->redirect(['comision-mixta-cap/dashboard', 'id' => $plan->ID_COMISION]);
    }
    
    
    /*
     * deletegridview
     */
    
    public function actionDeletebygridview($id)
    {
    	$model = EmpresaUsuario::getMyCompany();
    
    	$plan = $this->findModel($id);
    
    	$this->findModel($id)->delete();
    
    	return $this->redirect(['/plan/indexbycompany', 'id' => $plan->ID_PLAN]);
    }
    
    
    
    /**
     * Finds the Plan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plan::findOne(['ID_PLAN'=> $id, 'ACTIVO'=>1])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
