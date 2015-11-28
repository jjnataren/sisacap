<?php

namespace backend\controllers;

use backend\models\Curso;
use yii\web\NotFoundHttpException;
use backend\models\EmpresaUsuario;
use backend\models\Empresa;
use yii;
use backend\models\Constancia;
use yii\web\UploadedFile;
use yii\helpers\Json;
use backend\models\Indicadores;
use backend\models\search\TrabajadorSearch;
use backend\models\Trabajador;
use backend\models\PlanPuesto;
class ConstanciasController extends \yii\web\Controller
{
    
	
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
	
	  
	public function actionIndex()
    {
        return $this->render('index');
    }
    
    
    /**
     * Updates an existing Constancia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatebyuser($id)
    {
    	
    	$companyModel  = EmpresaUsuario::getMyCompany();
    	$model = $this->findModel($id);
    	
    	
    	if ($model->iDCURSO->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA){
    		
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    	
    
    	if ($model->load(Yii::$app->request->post()) ) {
    		
    		
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_EMISION_CERTIFICADO);
    		
    	    		
    		$model->FECHA_EMISION_CERTIFICADO = ($tmpdate) ?   $tmpdate->format('Y-m-d') : '';
    		
    		 if (!$model->save()){
    		 	
    		 	Yii::$app->session->setFlash('alert', [
    		 	'options'=>['class'=>'alert-warning'],
    		 	'body'=> '<i class="fa-exclamation-circle fa-lg"></i> Ocurrio un error al actualizar la constancia por favor revise los errores.',
    		 	]);
    		 	
    		 	
    		 	return $this->render('dashboard', [
    		 			'model' => $model,
    		 			]);
    		 
    		 }
    		 
    		 
    		 
    		 Yii::$app->session->setFlash('alert', [
    		 'options'=>['class'=>'alert-success'],
    		 'body'=> '<i class="fa fa-check fa-lg"></i> La constancia ha sido modificada correctamente.',
    		 ]);
    		 
    		 Indicadores::setIndicadorConstancia($model);
    		 
    		 if ($model->iDTRABAJADOR->iDEMPRESA->ID_EMPRESA_PADRE === null){
    		 	
    		 	return $this->redirect(['createbycourse', 'id' => $model->ID_CURSO, 'is_company'=>1]);
    		 	
    		 }else 
    		 	return $this->redirect(['createbycourse', 'id' => $model->ID_CURSO, 'id_est'=>$model->iDTRABAJADOR->ID_EMPRESA]);
    		 
    		
    		
    		
    	} else {
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=> '<i class="fa-exclamation-circle"></i> Ocurrio un error al actualizar la constancia por favor revise los errores.',
    		]);
    		 
    		
    		return $this->render('dashboard', [
    				'model' => $model,
    				]);
    	}
    }
    
    
    
    
    public function actionUpdatebyinstructor($id)
    {
    	 
    	$companyModel  = EmpresaUsuario::getMyCompany();
    	$model = $this->findModel($id);
    	 
    	 
    	if ($model->iDCURSO->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA){
    
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    	 
    
    	if ($model->load(Yii::$app->request->post()) ) {
    
    
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_EMISION_CERTIFICADO);
    
    		 
    		$model->FECHA_EMISION_CERTIFICADO = ($tmpdate) ?   $tmpdate->format('Y-m-d') : '';
    
    		if (!$model->save()){
    
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-warning'],
    			'body'=> '<i class="fa-exclamation-circle fa-lg"></i> Ocurrio un error al actualizar la constancia por favor revise los errores.',
    			]);
    
    
    			return $this->render('dashboardbyinstructor', [
    					'model' => $model,
    					]);
    			 
    		}
    		 
    		 
    		 
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=> '<i class="fa fa-check fa-lg"></i> La constancia ha sido modificada correctamente.',
    		]);
    		 
    		Indicadores::setIndicadorConstancia($model);
    		 
    		if ($model->iDTRABAJADOR->iDEMPRESA->ID_EMPRESA_PADRE === null){
    
    			return $this->redirect(['course-by-instructor', 'id' => $model->ID_CURSO, 'is_company'=>1]);
    
    		}else
    			return $this->redirect(['course-by-instructor', 'id' => $model->ID_CURSO, 'id_est'=>$model->iDTRABAJADOR->ID_EMPRESA]);
    		 
    
    
    
    	} else {
    
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=> '<i class="fa-exclamation-circle"></i> Ocurrio un error al actualizar la constancia por favor revise los errores.',
    		]);
    		 
    
    		return $this->render('dashboardbyinstructor', [
    				'model' => $model,
    				]);
    	}
    }
    
    
	
    /**
     * 
     * @param unknown $id
     * @throws NotFoundHttpException
     * @return Ambigous <string, string>
     */
    public function actionDashboard($id){
    	
    	$model = EmpresaUsuario::getMyCompany();
    	
    	$modelConstancia = $this->findModel($id);
    	
    	if ($modelConstancia->iDCURSO->iDPLAN->iDCOMISION->ID_EMPRESA !== $model->ID_EMPRESA)
    			throw new NotFoundHttpException('The requested page does not exist.');
    	
    	return $this->render('invoice',['model'=>$modelConstancia]);
    	
    }
    
    /**
     *
     * @param unknown $id
     * @throws NotFoundHttpException
     * @return Ambigous <string, string>
     */
    public function actionDashboardByInstructor($id){
    	 
    	$model = EmpresaUsuario::getMyCompany();
    	 
    	$modelConstancia = $this->findModel($id);
    	 
    	if ($modelConstancia->iDCURSO->iDPLAN->iDCOMISION->ID_EMPRESA !== $model->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	return $this->render('invoice_by_instructor',['model'=>$modelConstancia]);
    	 
    }
    
    
    /**
     *
     * @param unknown $id
     * @throws NotFoundHttpException
     * @return Ambigous <string, string>
     */
    public function actionDashboardInstructorConstancia($id){
    
    	$model = EmpresaUsuario::getMyCompany();
    
    	$modelConstancia = $this->findModel($id);
    
    	if ($modelConstancia->iDCURSO->iDPLAN->iDCOMISION->ID_EMPRESA !== $model->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    
    	return $this->render('invoice_view_constancia',['model'=>$modelConstancia]);
    
    }
    
    /**
     *
     * @param unknown $id
     * @throws NotFoundHttpException
     * @return Ambigous <string, string>
     */
    public function actionConstanciaFirmada($id){
    
    	$model = EmpresaUsuario::getMyCompany();
    
    	$modelConstancia = $this->findModel($id);
    
    	if ($modelConstancia->iDCURSO->iDPLAN->iDCOMISION->ID_EMPRESA !== $model->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    
    	return $this->render('view_const_firmada',['model'=>$modelConstancia]);
    
    }
    
    

    
    
    /**
     * Uploads a single document
     * @param unknown $id
     * @param unknown $document
     */
    public function actionSendNotification($id){
    	
    	$companyModel = EmpresaUsuario::getMyCompany();
    	 
    	$constanciaModel = $this->findModel($id);
    	 
    	if ($constanciaModel->iDCURSO->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    	
    	$this->layout = '@app/mail/html';
    	
    	$email = $constanciaModel->iDTRABAJADOR->CORREO_ELECTRONICO;
    	 
    	if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
    		
    		return '<h2><i class="fa fa-frown-o"></i>&nbsp;Ha ocurrido un error al enviar la notificación</h2>' .
    				'<br /> Detalle del error: <br />'. 'El trabajador <strong>no tiene un correo electronico valido</strong>';
    	}
    		
    		
    	
    	try {
    		
    		Yii::$app->mail->compose('@app/views/constancias/mail-templates/notification_constancia', ['model'=>$constanciaModel])
    		->setFrom("sisacap@gmail.com")
    		->setTo($email)
    		->setSubject('Notificaciones SISACAP.  Constancia de capacitación')
    		->send();
    		
    		$constanciaModel->ESTATUS = Constancia::STATUS_DELIVERED;
    		
    		$constanciaModel->save();
    		
    	}catch (\Exception $e){
    		
    		return '<h2><i class="fa fa-frown-o"></i>&nbsp;Ha ocurrido un error al enviar la notificación,  por favor contacte al administrador.</h2>' . 
					'<br /> Detalle del error: <br />'.
    		$e->getMessage();
    		
    	}
    	    	  	
    	return '<h1><i class="fa  fa-thumbs-o-up"></i>&nbsp; ¡Mensaje enviado correctamente! </h1>';
    	
    }
    
    
    
    /**
     * Uploads a single document
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
    * Creates  a constancia 
    * @param integer $id
    * @param integer $id_trab
    */
    public function actionAddConstancia($id,$id_trab){
    
    	$companyModel = EmpresaUsuario::getMyCompany();
    	
    	$courseModel = Curso::findOne($id);
    	
    	$workerModel = Trabajador::findOne($id_trab);
    	
    	/**
    	 * ACL Validation
    	 */
    	
    	if ($courseModel === null|| $workerModel === null || 
    			$courseModel->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA ||
					($workerModel->ID_EMPRESA !== $companyModel->ID_EMPRESA && $workerModel->iDEMPRESA->ID_EMPRESA_PADRE !== $companyModel->ID_EMPRESA) ){
    		
    		throw new NotFoundHttpException('The requested page does not exist.');
    		
    		
    	}
    	
    	
    	/**
    	 * Validates if a trabajador has a correct position
    	 * @var unknown
    	 */
    	
    	if(!$courseModel->iDPLAN->TIPO_PLAN){
    		
    			if(PlanPuesto::findOne(['ID_PLAN'=>$courseModel->ID_PLAN, 'ID_PUESTO'=>$workerModel->PUESTO]) === null){
    				
    				Yii::$app->session->setFlash('alert', [
    				'options'=>['class'=>'alert-warning'],
    				'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i>ERROR <br /> El trabajador que selecciono  no pertenece a los puestos de trabajo del plan.',
    				]);
    				
    				if($workerModel->iDEMPRESA->ID_EMPRESA_PADRE === null)
    					return $this->redirect(['createbycourse', 'id' => $id]);
    				else
    					return $this->redirect(['createbycourse', 'id' => $id, 'id_est'=>$workerModel->ID_EMPRESA]);
    				
    			}
    		
    	}	
    
    	//$workerModel->PUESTO
    	
    	
    	$constanciaModel = new Constancia();
    	
    	$constanciaModel->ACTIVO = 1;
    	$constanciaModel->ESTATUS = Constancia::STATUS_ALREADY;
    	$constanciaModel->ID_TRABAJADOR = $id_trab;
    	$constanciaModel->ID_CURSO = $id;
    	
    	if ($constanciaModel->save()){
    	
	 	   Yii::$app->session->setFlash('alert', [
	    		'options'=>['class'=>'alert-success'],
	    		'body'=> '<i class="fa fa-check fa-lg"></i> Se ha creado la constancia correctamente.',
	    	]);
	 	   
	 	   Indicadores::setIndicadorConstancia($constanciaModel);
	 	   
    	}
    	else{
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> Ha ocurrido un error al crear la constancia.',
    		]);
    	
    	}
    	
    	
    	
    	if($workerModel->iDEMPRESA->ID_EMPRESA_PADRE === null)
    		return $this->redirect(['createbycourse', 'id' => $id]);
    	else
    		return $this->redirect(['createbycourse', 'id' => $id, 'id_est'=>$workerModel->ID_EMPRESA]);
    	
    	
    	
    }
    
    
    
    
    
    /**
     * Save all workers by  company id
     * @param int $id
     */
    public function actionSaveallbycourse($id, $id_est){
    
    
    	if( !Yii::$app->request->isPost){
    
    
    	$model = EmpresaUsuario::getMyCompany();
    
    	if($model === null ) throw new NotFoundHttpException('The requested page does not exist.');
    
    	
    	$courseModel = Curso::findOne($id);
    	
    	if ($cursoModel === null || $cursoModel->iDPLAN->iDCOMISION->ID_EMPRESA !== $model->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    
    
    	$i= 0;
    
    	$constanciasPost = Yii::$app->request->post('Constancia');
    	$constancias = [];
    
    	foreach ($constanciasPost as $constancia){
    
    		$constancias[] = new Trabajador();
    	}
    
    
    	//$workers  =  Trabajador::findAll(['ID_EMPRESA'=>$id_company]);
    
    	//$workers = $workers ?:
    
    	//$postData = Yii::$app->request->post();
    	//if ($postData) {
    	//		foreach ($postData as $i => $single) {
    	//			$workers[$i] = new Trabajador();
    	//		}
    	// 	}
    
    	if (Constancia::loadMultiple($constancias, Yii::$app->request->post(), null) && Constancia::validateMultiple($constancias)) {
    
    
    		$count = 0;
    		foreach ($constancias as $constancia) {
    			// populate and save records for each model
    
    			$constancia->ACTIVO = 1;
    			$constancia->ID_CURSO = $id;
    			$constancia->FECHA_CREACION = date("Y-m-d H:i:s");
    			$constancia->ESTATUS = 1;
    			$constancia->ID_EMPRESA = $model->ID_EMPRESA;
    			$constancia->ID_PLAN = $cursoModel->ID_PLAN;
    
    			if ($constancia->save()) {
    				// do something here after saving
    				$count++;
    			}
    		}
    
    		//Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
    
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=>Yii::t('frontend', "{$count} constancias guardadas correctamente")
    		]);
    
    
    		return $this->redirect(['createbycourse','id'=>$id]); // redirect to your next desired page
    
    
    	}else  return $this->render('loadbyestablishment', [
    			'model' => $companyModel,
    			'fileModel'=>$fileModel,
    			'workers'=>$workers
    
    			]);
    
    	}
    
    }
    
    
   /**
    * Generates a DC3 Report
    * @param unknown $id
    * @throws NotFoundHttpException
    * @return Ambigous <string, string>
    */
    public function actionConstanciapdf($id){
    	
		$companyModel = EmpresaUsuario::getMyCompany();
		
		$constanciaModel = Constancia::findOne($id);
		
		if ($companyModel === null || $constanciaModel->iDCURSO->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA)
			throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
		
		
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
		return $this->render('reports/DC-3',['model'=>$constanciaModel]);
		
    }
    
    
    /**
     * Generates a DC3 Report
     * @param unknown $id
     * @throws NotFoundHttpException
     * @return Ambigous <string, string>
     */
    public function actionConstanciaComprobantePdf($id){
    	 
    	$companyModel = EmpresaUsuario::getMyCompany();
    
    	$constanciaModel = Constancia::findOne($id);
    
    	if ($companyModel === null || $constanciaModel->iDCURSO->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA)
    		throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    
    
    	Yii::$app->response->format = 'pdf';
    
    
    
    	// Rotate the page
    	Yii::$container->set(Yii::$app->response->formatters['pdf']['class'], [
    	'format' =>'A4-L',// [297,210], // Legal page size in mm
    	'orientation' => 'L', // This value will be used when 'format' is an array only. Skipped when 'format' is empty or is a string
    	'marginLeft' => 7.5, // Optional
    	'marginRight' => 10.8, // Optional
    	'marginTop' => 10, // Optional
    	    	
    	'beforeRender' => function($mpdf, $data) {
    	
    		$mpdf->SetWatermarkText('CONSTANCIA', 0.1);
			$mpdf->showWatermarkText = true;
			
    	},
    	
    		
    	]);
    
    	$this->layout = '//_print';
    	return $this->render('reports/invoice',['model'=>$constanciaModel]);
    
    }
        
    
    /**
     * Deletes a particular constancia
     * @param unknown $id
     * @throws NotFoundHttpException
     */
    public function actionDeleteConstancia($id){
    	
    	$model = $this->findModel($id);
    	
    	$companyModel = EmpresaUsuario::getMyCompany();
    	
    	if ($model->iDCURSO->iDPLAN->iDCOMISION->ID_EMPRESA !== $companyModel->ID_EMPRESA)
    		throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    	
    	$id_curso = $model->ID_CURSO;
    	$trabajadorModel = $model->iDTRABAJADOR;
    	
    	$model->delete();
    	
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	'body'=>'<i class="fa fa-check fa-lg"></i>'.Yii::t('frontend', "Se ha eliminado la constancia  correctamente")
    	]);
    	
    	
    	if ($trabajadorModel->iDEMPRESA->ID_EMPRESA_PADRE === null)
    	
    		return $this->redirect(['createbycourse', 'id' => $id_curso, 'is_company'=>1]);
    	
    	else 
    		
    		return $this->redirect(['createbycourse', 'id' => $id_curso, 'id_est'=>$trabajadorModel->ID_EMPRESA]);
    	
    	}
    
    
    /**
     *  Create constancias by a particular course
     * @param unknown $id
     */
    public function actionCreatebycourse($id){
    	    	
    	$courseModel = Curso::findOne($id);
    	
    	
    	$constancias = [];
    	
    	if ($courseModel === null )
			throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    	
    	$companyModel = EmpresaUsuario::getMyCompany();
    	
    	if ($companyModel->ID_EMPRESA !== $courseModel->iDPLAN->iDCOMISION->ID_EMPRESA)
    		throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    	
    	
    	$id_est = yii::$app->request->get('id_est');
    	

    	
    	if(Yii::$app->request->isPost && Yii::$app->request->post('Constancia') !== NULL){
    	
    		$id_establishment = yii::$app->request->get('id_est');
    	
    		$i= 0;
    	
    		$constanciasPost = Yii::$app->request->post('Constancia');
    		$constancias = [];
    	
    		foreach ($constanciasPost as $constancia){
    	
    			$constancias[] = new Constancia();
    		}
    	
    	  		if (Constancia::loadMultiple($constancias, Yii::$app->request->post(), null) ) {
    				
    	  			 Constancia::validateMultiple($constancias);
    	
    			$count = 0;
    			foreach ($constancias as $constancia) {
    				// populate and save records for each model
    				
    				$tmpConstancia = Constancia::findOne(['ID_CURSO'=>$id, 'ID_TRABAJADOR'=>$constancia->ID_TRABAJADOR]);
    				
    				if ($tmpConstancia === null){
    					
    					$constancia->ACTIVO = 1;
    					$constancia->ID_CURSO = $id;
    					$constancia->FECHA_CREACION = date("Y-m-d H:i:s");
    					$constancia->ESTATUS = 1;
    					$constancia->ID_EMPRESA = $companyModel->ID_EMPRESA;
    					$constancia->ID_PLAN = $courseModel->ID_PLAN;
    					
    					
    				}else{ 
    					
    					$tmpConstancia->METODO_OBTENCION = $constancia->METODO_OBTENCION;
    					$tmpConstancia->TIPO_CONSTANCIA = $constancia->TIPO_CONSTANCIA;
    					$tmpConstancia->ESTATUS = $constancia->ESTATUS;
    					$tmpConstancia->PROMEDIO = $constancia->PROMEDIO;
    					$tmpConstancia->APROBADO = $constancia->APROBADO;
    					
    					$constancia = $tmpConstancia;
    				
    				}
    				
    				$constancia->FECHA_AGREGO = date('Y-m-d H:i');
    	
    				if ($constancia->save()) {
    					// do something here after saving
    					
    					Indicadores::setIndicadorConstancia($constancia);
    					
    					$count++;
    				}
    			}
    	
    			//Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
    	
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-success'],
    			'body'=>'<i class="fa fa-check fa-lg"> </i>'.Yii::t('frontend', "Constancia(s) guardadas correctamente")
    			]);
    	
    			return $this->redirect(['createbycourse','id'=>$id, 'id_est'=>$id_establishment]); // redirect to your next desired page
    	
    	
    		}else  return $this->render('create_constancias', [
    					'model' => $courseModel,
    					'constancias'=>$constancias,
    	
    				]);
    	
    	}
    	
    	if (yii::$app->request->get('id_est') !== null ){
    	
    	
	    	$establishmentModel = Empresa::findOne($id_est);
	    	
	    	if ($establishmentModel === null || $companyModel->ID_EMPRESA !== $establishmentModel->ID_EMPRESA_PADRE)
	    		throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
	    	
	    	
	    	$constancias = Constancia::findBySql('select * from tbl_constancia where  id_curso = :id_curso AND  id_trabajador in
    												(select id_trabajador from tbl_trabajador where id_empresa = :id_empresa)
    											  AND ACTIVO = 1',[':id_empresa'=>$id_est, ':id_curso'=>$id])->all(); //All($condition)(['ID_CURSO'=>$id, 'ACTIVO'=>1]);
	    	
	    	
	    	
	    	$searchModel = new TrabajadorSearch();
	    	 
	    	$dataProvider = $searchModel->searchByCourse(Yii::$app->request->queryParams,$id_est,$id);
	    	 
	    	
	    	//$workers = $establishmentModel->trabajadors;
	    	
	    	//$constancias = [];
	    	
	    	/*foreach ($workers as $worker){
	    		
	    		$constancia = Constancia::findOne(['ID_CURSO'=>$id, 'ID_TRABAJADOR'=>$worker->ID_TRABAJADOR]);
	    		
	    		if ($constancia === null){ 
	    			
	    			$constancia = new Constancia();
	    			$constancia->ID_TRABAJADOR = $worker->ID_TRABAJADOR;
	    		
	    		}
	    		
	    		$constancias[] = $constancia;
	    		
	    	}*/
	    	
    	
    	}else {
    		
    		
    		 
    		//$workers = $companyModel->iDEMPRESA->trabajadors;
    		
    		$constancias = Constancia::findBySql('select * from tbl_constancia where id_curso= :id_curso AND id_trabajador in
    												(select id_trabajador from tbl_trabajador where id_empresa = :id_empresa)
    											  AND ACTIVO = 1',[':id_empresa'=>$companyModel->ID_EMPRESA, ':id_curso'=>$id])->all(); //All($condition)(['ID_CURSO'=>$id, 'ACTIVO'=>1]);
    		
    		$searchModel = new TrabajadorSearch();
    		$dataProvider = $searchModel->searchByCourse(Yii::$app->request->queryParams,$companyModel->ID_EMPRESA,$id);
    		
    		
    		/*foreach ($companyModel->iDEMPRESA->trabajadors as $worker){
    			 
    			$constancia = Constancia::findOne(['ID_CURSO'=>$id, 'ID_TRABAJADOR'=>$worker->ID_TRABAJADOR]);
    			 
    			if ($constancia === null){
    		
    				$constancia = new Constancia();
    				$constancia->ID_TRABAJADOR = $worker->ID_TRABAJADOR;
    				 
    			}
    			 
    			$constancias[] = $constancia;
    			 
    		}*/
    		
    	}
    	
    	
    	return $this->render('create_constancias', [
    			'model' => $courseModel,    			
    			'searchModel'=>$searchModel,
    			'dataProvider'=>$dataProvider,
    			'constancias'=>$constancias,
    			]);
    	
    	
    }
    
    
    
    
    ///
    
    public function actionCourseByInstructor($id){
    
    	$courseModel = Curso::findOne($id);
    	 
    	 
    	$constancias = [];
    	 
    	if ($courseModel === null )
    		throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    	 
    	$companyModel = EmpresaUsuario::getMyCompany();
    	 
    	if ($companyModel->ID_EMPRESA !== $courseModel->iDPLAN->iDCOMISION->ID_EMPRESA)
    		throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    	 
    	 
    	$id_est = yii::$app->request->get('id_est');
    	 
    
    	 
    	if(Yii::$app->request->isPost && Yii::$app->request->post('Constancia') !== NULL){
    		 
    		$id_establishment = yii::$app->request->get('id_est');
    		 
    		$i= 0;
    		 
    		$constanciasPost = Yii::$app->request->post('Constancia');
    		$constancias = [];
    		 
    		foreach ($constanciasPost as $constancia){
    			 
    			$constancias[] = new Constancia();
    		}
    		 
    		if (Constancia::loadMultiple($constancias, Yii::$app->request->post(), null) ) {
    
    			Constancia::validateMultiple($constancias);
    			 
    			$count = 0;
    			foreach ($constancias as $constancia) {
    				// populate and save records for each model
    
    				$tmpConstancia = Constancia::findOne(['ID_CURSO'=>$id, 'ID_TRABAJADOR'=>$constancia->ID_TRABAJADOR]);
    
    				if ($tmpConstancia === null){
    						
    					$constancia->ACTIVO = 1;
    					$constancia->ID_CURSO = $id;
    					$constancia->FECHA_CREACION = date("Y-m-d H:i:s");
    					$constancia->ESTATUS = 1;
    				
    					if ($constancia->ESTATUS =3){
    				  		   		   						
    						
    					}else { $constanciaModel->ESTATUS = Constancia::STATUS_ASIGNADA;
    					
    					
    					$constancia->ID_EMPRESA = $companyModel->ID_EMPRESA;
    					$constancia->ID_PLAN = $courseModel->ID_PLAN;
    					}
    						
    				}else{
    						
    					$tmpConstancia->METODO_OBTENCION = $constancia->METODO_OBTENCION;
    					$tmpConstancia->TIPO_CONSTANCIA = $constancia->TIPO_CONSTANCIA;
    					$tmpConstancia->ESTATUS = $constancia->ESTATUS;
    					$tmpConstancia->PROMEDIO = $constancia->PROMEDIO;
    					$tmpConstancia->APROBADO = $constancia->APROBADO;
    						
    					$constancia = $tmpConstancia;
    
    				}
    
    				$constancia->FECHA_AGREGO = date('Y-m-d H:i');
    				 
    				if ($constancia->save()) {
    					// do something here after saving
    						
    					Indicadores::setIndicadorConstancia($constancia);
    						
    					$count++;
    				}
    			}
    			 
    			//Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
    			 
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-success'],
    			'body'=>'<i class="fa fa-check fa-lg"> </i>'.Yii::t('frontend', "Constancia(s) guardadas correctamente")
    			]);
    			 
    			return $this->redirect(['course-by-instructor','id'=>$id, 'id_est'=>$id_establishment]); // redirect to your next desired page
    			 
    			 
    		}else  return $this->render('create_constancias', [
    				'model' => $courseModel,
    				'constancias'=>$constancias,
    				 
    				]);
    		 
    	}
    	 
    	if (yii::$app->request->get('id_est') !== null ){
    		 
    		 
    		$establishmentModel = Empresa::findOne($id_est);
    
    		if ($establishmentModel === null || $companyModel->ID_EMPRESA !== $establishmentModel->ID_EMPRESA_PADRE)
    			throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    
    
    		$constancias = Constancia::findBySql('select * from tbl_constancia where  id_curso = :id_curso AND  id_trabajador in
    												(select id_trabajador from tbl_trabajador where id_empresa = :id_empresa)
    											  AND ACTIVO = 1',[':id_empresa'=>$id_est, ':id_curso'=>$id])->all(); //All($condition)(['ID_CURSO'=>$id, 'ACTIVO'=>1]);
    
    
    
    		$searchModel = new TrabajadorSearch();
    		 
    		$dataProvider = $searchModel->searchByCourse(Yii::$app->request->queryParams,$id_est,$id);
    		 
    
    		 
    	}else {
    
    
    
    		$constancias = Constancia::findBySql('select * from tbl_constancia where id_curso= :id_curso AND id_trabajador in
    												(select id_trabajador from tbl_trabajador where id_empresa = :id_empresa)
    											  AND ACTIVO = 1',[':id_empresa'=>$companyModel->ID_EMPRESA, ':id_curso'=>$id])->all(); //All($condition)(['ID_CURSO'=>$id, 'ACTIVO'=>1]);
    
    		$searchModel = new TrabajadorSearch();
    		$dataProvider = $searchModel->searchByCourse(Yii::$app->request->queryParams,$companyModel->ID_EMPRESA,$id);
    
    	}
    	
    	if ($courseModel->getCurrentStatus () === Curso::STATUS_CREADO) {
    		
    		
    		
    		return $this->render('view_constancias_instructor', [
    				'model' => $courseModel,
    				'searchModel'=>$searchModel,
    				'dataProvider'=>$dataProvider,
    				'constancias'=>$constancias,
    				]);
    		
    		
    	}
    	elseif ($courseModel->getCurrentStatus () === Curso::STATUS_INICIADO) {
    		 
    	return $this->render('create_constancias_instructor', [
    			'model' => $courseModel,
    			'searchModel'=>$searchModel,
    			'dataProvider'=>$dataProvider,
    			'constancias'=>$constancias,
    			]);
    	     }
    	     
    	      elseif ($courseModel->getCurrentStatus () === Curso::STATUS_CONCLUIDO) {
    	      	return $this->render('view_course_instructor', [
    	      			'model' => $courseModel,
    	      			'searchModel'=>$searchModel,
    	      			'dataProvider'=>$dataProvider,
    	      			'constancias'=>$constancias,
    	      			]);
    }
    }
    
    /*view contancias del curso por impartir*/
    
    
    public function actionViewCourseInstructor($id){
    
    	$courseModel = Curso::findOne($id);
    
    
    	$constancias = [];
    
    	if ($courseModel === null )
    		throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    
    	$companyModel = EmpresaUsuario::getMyCompany();
    
    	if ($companyModel->ID_EMPRESA !== $courseModel->iDPLAN->iDCOMISION->ID_EMPRESA)
    		throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    
    
    	$id_est = yii::$app->request->get('id_est');
    
    
    
    	if(Yii::$app->request->isPost && Yii::$app->request->post('Constancia') !== NULL){
    		 
    		$id_establishment = yii::$app->request->get('id_est');
    		 
    		$i= 0;
    		 
    		$constanciasPost = Yii::$app->request->post('Constancia');
    		$constancias = [];
    		 
    		foreach ($constanciasPost as $constancia){
    
    			$constancias[] = new Constancia();
    		}
    		 
    		if (Constancia::loadMultiple($constancias, Yii::$app->request->post(), null) ) {
    
    			Constancia::validateMultiple($constancias);
    
    			$count = 0;
    			foreach ($constancias as $constancia) {
    				// populate and save records for each model
    
    				$tmpConstancia = Constancia::findOne(['ID_CURSO'=>$id, 'ID_TRABAJADOR'=>$constancia->ID_TRABAJADOR]);
    
    				if ($tmpConstancia === null){
    
    					$constancia->ACTIVO = 1;
    					$constancia->ID_CURSO = $id;
    					$constancia->FECHA_CREACION = date("Y-m-d H:i:s");
    					$constancia->ESTATUS = 1;
    
    					if ($constancia->ESTATUS =3){
    
    
    					}else { $constanciaModel->ESTATUS = Constancia::STATUS_ASIGNADA;
    						
    						
    					$constancia->ID_EMPRESA = $companyModel->ID_EMPRESA;
    					$constancia->ID_PLAN = $courseModel->ID_PLAN;
    					}
    
    				}else{
    
    					$tmpConstancia->METODO_OBTENCION = $constancia->METODO_OBTENCION;
    					$tmpConstancia->TIPO_CONSTANCIA = $constancia->TIPO_CONSTANCIA;
    					$tmpConstancia->ESTATUS = $constancia->ESTATUS;
    					$tmpConstancia->PROMEDIO = $constancia->PROMEDIO;
    					$tmpConstancia->APROBADO = $constancia->APROBADO;
    
    					$constancia = $tmpConstancia;
    
    				}
    
    				$constancia->FECHA_AGREGO = date('Y-m-d H:i');
    					
    				if ($constancia->save()) {
    					// do something here after saving
    
    					Indicadores::setIndicadorConstancia($constancia);
    
    					$count++;
    				}
    			}
    
    
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-success'],
    			'body'=>'<i class="fa fa-check fa-lg"> </i>'.Yii::t('frontend', "Constancia(s) guardadas correctamente")
    			]);
    
    			return $this->redirect(['course-by-instructor','id'=>$id, 'id_est'=>$id_establishment]); // redirect to your next desired page
    
    
    		}else  return $this->render('create_constancias', [
    				'model' => $courseModel,
    				'constancias'=>$constancias,
    					
    				]);
    		 
    	}
    
    	if (yii::$app->request->get('id_est') !== null ){
    		 
    		 
    		$establishmentModel = Empresa::findOne($id_est);
    
    		if ($establishmentModel === null || $companyModel->ID_EMPRESA !== $establishmentModel->ID_EMPRESA_PADRE)
    			throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    
    
    		$constancias = Constancia::findBySql('select * from tbl_constancia where  id_curso = :id_curso AND  id_trabajador in
    												(select id_trabajador from tbl_trabajador where id_empresa = :id_empresa)
    											  AND ACTIVO = 1',[':id_empresa'=>$id_est, ':id_curso'=>$id])->all(); //All($condition)(['ID_CURSO'=>$id, 'ACTIVO'=>1]);
    
    		$searchModel = new TrabajadorSearch();
    		 
    		$dataProvider = $searchModel->searchByCourse(Yii::$app->request->queryParams,$id_est,$id);
    		 
    	}else {
    
    		
    		$constancias = Constancia::findBySql('select * from tbl_constancia where id_curso= :id_curso AND id_trabajador in
    												(select id_trabajador from tbl_trabajador where id_empresa = :id_empresa)
    											  AND ACTIVO = 1',[':id_empresa'=>$companyModel->ID_EMPRESA, ':id_curso'=>$id])->all(); //All($condition)(['ID_CURSO'=>$id, 'ACTIVO'=>1]);
    
    		$searchModel = new TrabajadorSearch();
    		$dataProvider = $searchModel->searchByCourse(Yii::$app->request->queryParams,$companyModel->ID_EMPRESA,$id);
    
    	}
    	
    	
    	
    
    	return $this->render('view_constancias_instructor', [
    			'model' => $courseModel,
    			'searchModel'=>$searchModel,
    			'dataProvider'=>$dataProvider,
    			'constancias'=>$constancias,
    			]);
    
    
    }
    
    
    /*View cursos finalizados*/
    
    public function actionViewCourseConstancia($id){
    
    	$courseModel = Curso::findOne($id);
    
    
    	$constancias = [];
    
    	if ($courseModel === null )
    		throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    
    	$companyModel = EmpresaUsuario::getMyCompany();
    
    	if ($companyModel->ID_EMPRESA !== $courseModel->iDPLAN->iDCOMISION->ID_EMPRESA)
    		throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    
    
    	$id_est = yii::$app->request->get('id_est');
    
    
    
    	if(Yii::$app->request->isPost && Yii::$app->request->post('Constancia') !== NULL){
    		 
    		$id_establishment = yii::$app->request->get('id_est');
    		 
    		$i= 0;
    		 
    		$constanciasPost = Yii::$app->request->post('Constancia');
    		$constancias = [];
    		 
    		foreach ($constanciasPost as $constancia){
    
    			$constancias[] = new Constancia();
    		}
    		 
    		if (Constancia::loadMultiple($constancias, Yii::$app->request->post(), null) ) {
    
    			Constancia::validateMultiple($constancias);
    
    			$count = 0;
    			foreach ($constancias as $constancia) {
    				// populate and save records for each model
    
    				$tmpConstancia = Constancia::findOne(['ID_CURSO'=>$id, 'ID_TRABAJADOR'=>$constancia->ID_TRABAJADOR]);
    
    				if ($tmpConstancia === null){
    
    					$constancia->ACTIVO = 1;
    					$constancia->ID_CURSO = $id;
    					$constancia->FECHA_CREACION = date("Y-m-d H:i:s");
    					$constancia->ESTATUS = 1;
    
    					if ($constancia->ESTATUS =3){
    
    
    					}else { $constanciaModel->ESTATUS = Constancia::STATUS_ASIGNADA;
    
    
    					$constancia->ID_EMPRESA = $companyModel->ID_EMPRESA;
    					$constancia->ID_PLAN = $courseModel->ID_PLAN;
    					}
    
    				}else{
    
    					$tmpConstancia->METODO_OBTENCION = $constancia->METODO_OBTENCION;
    					$tmpConstancia->TIPO_CONSTANCIA = $constancia->TIPO_CONSTANCIA;
    					$tmpConstancia->ESTATUS = $constancia->ESTATUS;
    					$tmpConstancia->PROMEDIO = $constancia->PROMEDIO;
    					$tmpConstancia->APROBADO = $constancia->APROBADO;
    
    					$constancia = $tmpConstancia;
    
    				}
    
    				$constancia->FECHA_AGREGO = date('Y-m-d H:i');
    					
    				if ($constancia->save()) {
    					// do something here after saving
    
    					Indicadores::setIndicadorConstancia($constancia);
    
    					$count++;
    				}
    			}
    
    
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-success'],
    			'body'=>'<i class="fa fa-check fa-lg"> </i>'.Yii::t('frontend', "Constancia(s) guardadas correctamente")
    			]);
    
    			return $this->redirect(['course-by-instructor','id'=>$id, 'id_est'=>$id_establishment]); // redirect to your next desired page
    
    
    		}else  return $this->render('create_constancias', [
    				'model' => $courseModel,
    				'constancias'=>$constancias,
    					
    				]);
    		 
    	}
    
    	if (yii::$app->request->get('id_est') !== null ){
    		 
    		 
    		$establishmentModel = Empresa::findOne($id_est);
    
    		if ($establishmentModel === null || $companyModel->ID_EMPRESA !== $establishmentModel->ID_EMPRESA_PADRE)
    			throw  new NotFoundHttpException('La pagina que ha solicitado no existe');
    
    
    		$constancias = Constancia::findBySql('select * from tbl_constancia where  id_curso = :id_curso AND  id_trabajador in
    												(select id_trabajador from tbl_trabajador where id_empresa = :id_empresa)
    											  AND ACTIVO = 1',[':id_empresa'=>$id_est, ':id_curso'=>$id])->all(); //All($condition)(['ID_CURSO'=>$id, 'ACTIVO'=>1]);
    
    		$searchModel = new TrabajadorSearch();
    		 
    		$dataProvider = $searchModel->searchByCourse(Yii::$app->request->queryParams,$id_est,$id);
    		 
    	}else {
    
    
    		$constancias = Constancia::findBySql('select * from tbl_constancia where id_curso= :id_curso AND id_trabajador in
    												(select id_trabajador from tbl_trabajador where id_empresa = :id_empresa)
    											  AND ACTIVO = 1',[':id_empresa'=>$companyModel->ID_EMPRESA, ':id_curso'=>$id])->all(); //All($condition)(['ID_CURSO'=>$id, 'ACTIVO'=>1]);
    
    		$searchModel = new TrabajadorSearch();
    		$dataProvider = $searchModel->searchByCourse(Yii::$app->request->queryParams,$companyModel->ID_EMPRESA,$id);
    
    	}
    
    
    	return $this->render('view_course_instructor', [
    			'model' => $courseModel,
    			'searchModel'=>$searchModel,
    			'dataProvider'=>$dataProvider,
    			'constancias'=>$constancias,
    			]);
    
    
    }
    
    
    
    
    
    
    
    
    
    /**
     * Finds the Constancia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ComisionMixtaCap the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
    	if (($model = Constancia::findOne($id)) !== null) {
    		return $model;
    	} else {
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    }

}
