<?php

namespace backend\controllers;

use Yii;
use backend\models\Trabajador;
use backend\models\EmpresaUsuario;
use backend\models\search\TrabajadorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Empresa;
use backend\models\FileForm;
use yii\base\DynamicModel;
use yii\web\UploadedFile;
use backend\models\Constancia;
use backend\models\Indicadores;
use backend\models\Catalogo;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * TrabajadorController implements the CRUD actions for Trabajador model.
 */
class TrabajadorController extends Controller
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
     * Lists all Trabajador models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrabajadorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    

    /**
     * Gets all NTCL
     */
    public function actionGetNormas() {
    	$out = [];
    	 
    	if (isset($_POST['depdrop_parents'])) {
    		$parents = $_POST['depdrop_parents'];
    		if ($parents != null) {
    			$cat_id = $parents[0];
    			//$out = self::getSubCatList($cat_id);
    			 
    			//$catalogo = Catalogo::findOne($cat_id);
    			 
    			//$out=ArrayHelper::map($catalogo->catalogos, 'ID_ELEMENTO', 'NOMBRE');
    			
    			
    			$dataListNTCL=ArrayHelper::map(Catalogo::findBySql('select tcc.ID_ELEMENTO, CONCAT(tcc.CLAVE,\' - \' , tcc.NOMBRE) AS NOMBRE, (select NOMBRE FROM tbl_cat_catalogo where tcc.ELEMENTO_PADRE = ID_ELEMENTO) PADRE
						from tbl_cat_catalogo tcc where categoria=7 AND tcc.ELEMENTO_PADRE IN (select id_elemento from tbl_cat_catalogo where elemento_padre = :id_sector AND categoria = 8)
 						',[':id_sector'=>$cat_id])->all(), 'ID_ELEMENTO', 'NOMBRE','PADRE');
    			 
    			$items  = null;
    			$i= 0;
    			foreach ($dataListNTCL as $key=>$item){
    
    				
    				
    				$subItems = null;
    				
    				foreach ($item as $sub_key=>$sub_item){
    					
    					$subItems[] =  ['id'=>$sub_key, 'name'=>$sub_item];
    					
    				}
    
    				$items[$key] =  $subItems;
    				
    				$i++;
    
    			}
    			 
    			// the getSubCatList function will query the database based on the
    			// cat_id and return an array like below:
    			// [
    			// ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
    			// ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
    			// ]
    			echo Json::encode(['output'=>$items, 'selected'=>'']);
    			return;
    		}
    	}
    	echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    
    
    
    
    /**
     * Lists all Trabajador models by company.
     * @return mixed
     */
    public function actionIndexcompany(){
    	
    	
    	$model = EmpresaUsuario::getMyCompany();
    	
    	
    	$companyModel = $model->iDEMPRESA;
    	
    	
    	
    	if ($companyModel === null || $model === null)  throw new NotFoundHttpException('The requested page does not exist.');
    	
    	$searchModel = new TrabajadorSearch();
    	$dataProvider = $searchModel->searchByCompany(Yii::$app->request->queryParams,$companyModel->ID_EMPRESA);
    
    	return $this->render('index_company', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'id_company'=>$companyModel->ID_EMPRESA
    			]);
    }
    
    
    /**
     * Lists all Trabajador models by company.
     * @return mixed
     */
    public function actionIndexestablishment($id_establishment){
    	 
    	 
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id, 'ACTIVO'=>1 ]);
    	 
    	$companyModel = $model->iDEMPRESA;

    	$establishmentModel = Empresa::findOne(['ID_EMPRESA'=>$id_establishment, 'ID_EMPRESA_PADRE'=>$companyModel->ID_EMPRESA ?: -1]);
    	 
    	 
    	if ($companyModel === null || $model === null || $establishmentModel===null)  throw new NotFoundHttpException('The requested page does not exist.');
    
    	 
    	$searchModel = new TrabajadorSearch();
    	$dataProvider = $searchModel->searchByCompany(Yii::$app->request->queryParams,$id_establishment);
    
    	return $this->render('index_establishment', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'id_company'=>$id_establishment
    			]);
    }
    
    
    
    /**
     *Load workers througt file
     * @param int $id_company
     * @return Ambigous <string, string>
     */
    public function actionLoadbyestablishment($id){
    
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id, 'ACTIVO'=>1 ]);
    	
    	if ($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    	
    
    	$companyModel = Empresa::findOne(['ID_EMPRESA_PADRE'=> $model->ID_EMPRESA, 'ID_EMPRESA'=>$id]);
    
    	if ($companyModel === null)  throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	$fileModel = new FileForm();
    	 
    	$i= 0;
    
    	$workers = array();
    
    	if (Yii::$app->request->isPost) {
    
    		$fileModel->file  = UploadedFile::getInstance($fileModel, 'file');
    
    		if ($fileModel->file && $fileModel->validate()) {
    			//$model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
    			 
    			 
    			$fp = fopen($fileModel->file->tempName, 'r');
    			if($fp)	{
    				//  $line = fgetcsv($fp, 1000, ",");
    				//  print_r($line); exit;
    				$first_time = true;
    				do {
    					if ($first_time) {
    						$first_time = false;
    						continue;
    					}
    						
    						
    					if($i++){
    							
    
    
    						//$worker = Trabajador::find(['RFC'=>$line[5], 'ID_EMPRESA'=>$id_company, 'NSS'=>$line[6]]);
    
    						//if ($worker === null)
    
    						$worker = new Trabajador();
    							
    							
    						$worker->ROL = $line[0];
    						$worker->NOMBRE = $line[1];
    						$worker->APP = $line[2];
    						$worker->APM = $line[3];
    							
    						$worker->CURP = $line[4];
    						$worker->RFC = $line[5];
    						$worker->NSS = $line[6];
    						$worker->DOMICILIO = $line[7];
    						$worker->CORREO_ELECTRONICO = $line[8];
    						$worker->TELEFONO = $line[9];
    						$worker->PUESTO = $line[10];
    						$worker->OCUPACION_ESPECIFICA = $line[11];
    						//$worker->SEXO = $line[11];
    						$worker->ACTIVO = 1;
    							
    						$worker->validate();
    							
    						$workers[] = $worker;
    					}
    						
    						
    				}while( ($line = fgetcsv($fp, 1000, ",")) != FALSE);
    
    				return $this->render('load_by_establishment', [
    						'model' => $companyModel,
    						'fileModel'=>$fileModel,
    						'workers'=>$workers
    						]);
    				 
    			}
    		}
    
    		return $this->redirect(['loadbystablishment', 'id' => $id]);
    
    	} else {
    		return $this->render('load_by_establishment', [
    				'model' => $companyModel,
    				'fileModel'=>$fileModel
    				]);
    	}
    	 
    	 
    	 
    	 
    	 
    }
    
    
    /**
     * 
     * @param int $id_company
     * @return Ambigous <string, string>
     */
    public function actionLoad(){
    	 
    
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id, 'ACTIVO'=>'1']);
    	
    	if($model === null ) throw new NotFoundHttpException('The requested page does not exist.');
    	
    	$companyModel = $model->iDEMPRESA;
    	
       	$fileModel = new FileForm(); 
    	
       	$i= 0;
       	
    	$workers = array();
       	
    	if (Yii::$app->request->isPost) {
    		    		
    		$fileModel->file  = UploadedFile::getInstance($fileModel, 'file');
    		
    		if ($fileModel->file && $fileModel->validate()) {
    			//$model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
    			
    			
    			$fp = fopen($fileModel->file->tempName, 'r');
    			if($fp)	{
    				//  $line = fgetcsv($fp, 1000, ",");
    				//  print_r($line); exit;
    				$first_time = true;
    				do {
    					if ($first_time) {
    						$first_time = false;
    						continue;
    					}
    					
    					
    					if($i++){
    					
    						
    						
    					//$worker = Trabajador::find(['RFC'=>$line[5], 'ID_EMPRESA'=>$id_company, 'NSS'=>$line[6]]);	
    						
    					//if ($worker === null) 
    						
    						$worker = new Trabajador();
    					
    					
    					$worker->ROL = $line[0];
    					$worker->NOMBRE = $line[1];
    					$worker->APP = $line[2];
    					$worker->APM = $line[3];
    					
    					$worker->CURP = $line[4];
    					$worker->RFC = $line[5];
    					$worker->NSS = $line[6];
    					$worker->DOMICILIO = $line[7];
    					$worker->CORREO_ELECTRONICO = $line[8];
    					$worker->TELEFONO = $line[9];
    					$worker->PUESTO = $line[10];
    					
    					
    					//$worker->OCUPACION_ESPECIFICA = $line[11];
    					
    					//$catalogo = Catalogo::findOne(['CLAVE'=>$line[11], 'CATEGORIA'=>Catalogo::CATEGORIA_MUNICIPIOS]);
    					
    					//$worker->OCUPACION_ESPECIFICA = $catalogo->ID_ELEMENTO;
    					
    					
    					//$worker->SEXO = $line[11];
    					$worker->ACTIVO = 1;
    					
    					$worker->validate();
    					
    					$workers[] = $worker;
    					}
    					
    					
    				}while( ($line = fgetcsv($fp, 1000, ",")) != FALSE);
    				
    				return $this->render('load', [
    						'model' => $companyModel,
    						'fileModel'=>$fileModel,
    						'workers'=>$workers
    						]);
    			
    			}   			
    		}
    		
    		return $this->redirect(['load', 'id_company' => $id_company]);
    		
    	} else {
    		return $this->render('load', [
    			'model' => $companyModel,
    			'fileModel'=>$fileModel
    			]);
    	}
    	
    	
   
    	
    	
    }
    
    
    
    /**
     * Save all workers by  company id
     * @param int $id
     */
    public function actionSaveallbyestablishment($id){
    
    	 
    	if( !Yii::$app->request->isPost) throw new NotFoundHttpException('The requested page does not exist.');
    	 
    
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id, 'ACTIVO'=>'1']);
    
    	if($model === null ) throw new NotFoundHttpException('The requested page does not exist.');
    
    	$companyModel = Empresa::findOne(['ID_EMPRESA_PADRE'=>$model->ID_EMPRESA, 'ID_EMPRESA'=>$id]);

    	 
    	/**
    	@todo Validate that company belongs to specific user
    	*/
    	
    	 
    	if ($companyModel === null)  throw new NotFoundHttpException('The requested page does not exist.');
    
    	$fileModel = new FileForm();
    
    	$i= 0;
    	 
    	$workersPost = Yii::$app->request->post('Trabajador');
    	$workers = [];
    	 
    	foreach ($workersPost as $workerPost){
    
    		$workers[] = new Trabajador();
    	}
    	 
    	 
    	//$workers  =  Trabajador::findAll(['ID_EMPRESA'=>$id_company]);
    	 
    	//$workers = $workers ?:
    
    	//$postData = Yii::$app->request->post();
    	//if ($postData) {
    	//		foreach ($postData as $i => $single) {
    	//			$workers[$i] = new Trabajador();
    	//		}
    	// 	}
    	 
    	if (Trabajador::loadMultiple($workers, Yii::$app->request->post(), null) && Trabajador::validateMultiple($workers)) {
    
    
    		$count = 0;
    		foreach ($workers as $worker) {
    			// populate and save records for each model
    
    			$worker->ACTIVO = 1;
    			$worker->ID_EMPRESA = $companyModel->ID_EMPRESA;
    			 
    			if ($worker->save()) {
    				// do something here after saving
    				$count++;
    			}
    		}
    
    		//Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
    
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=>Yii::t('frontend', "{$count} workers have been saved correctly")
    		]);
    
    
    		return $this->redirect(['indexestablishment','id_establishment'=>$id]); // redirect to your next desired page
    
    
    	}else  return $this->render('loadbyestablishment', [
    			'model' => $companyModel,
    			'fileModel'=>$fileModel,
    			'workers'=>$workers
    			 
    			]);
    	 
    	 
    	 
    }
    
    
    
    
    /**
     * Save all workers by  company id
     * @param unknown $id_company
     */
    public function actionSaveall(){

    	
    	if( !Yii::$app->request->isPost) throw new NotFoundHttpException('The requested page does not exist.');
    	

    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id, 'ACTIVO'=>'1']);
    	 
    	if($model === null ) throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	
    	
    	
    	/**
		@todo Validate that company belongs to userid	
    	 */
    	$companyModel = $model->iDEMPRESA;
    	
    	if ($companyModel === null)  throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	$fileModel = new FileForm();
    	 
    	$i= 0;
    	
    	$workersPost = Yii::$app->request->post('Trabajador');
    	$workers = [];
    	
    	foreach ($workersPost as $workerPost){
    		
    		$workers[] = new Trabajador();
    	}
    	
    	
    	//$workers  =  Trabajador::findAll(['ID_EMPRESA'=>$id_company]);
    	
    	//$workers = $workers ?:

    	//$postData = Yii::$app->request->post();
    	//if ($postData) {
    //		foreach ($postData as $i => $single) {
    //			$workers[$i] = new Trabajador();
    //		}
   // 	}
    	
    	if (Trabajador::loadMultiple($workers, Yii::$app->request->post(), null) && Trabajador::validateMultiple($workers)) {
    		
    		
    		$count = 0;
    		foreach ($workers as $worker) {
    			// populate and save records for each model
    		
    			$worker->ACTIVO = 1;
    			$worker->ID_EMPRESA = $companyModel->ID_EMPRESA;
    			
    			if ($worker->save()) {
    				// do something here after saving
    				$count++;
    			}
    		}
    		
    		//Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=>Yii::t('frontend', "{$count} workers have been saved correctly")
    		]);
    		
    		
    		return $this->redirect(['indexcompany']); // redirect to your next desired page
    		
    		
    	}else  return $this->render('load', [
            'model' => $companyModel,
    		'fileModel'=>$fileModel,
    		'workers'=>$workers
    			
        ]);
    	
    	
    	
    }
    
    
    /**
     * Displays a single Trabajador model.
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
     * Displays a single Trabajador model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewbycompany($id){
    
  		$model = EmpresaUsuario::getMyCompany();
    	
    	$trabajadorModel = $this->findModel($id);
    	
    	if (!($model->ID_EMPRESA === $trabajadorModel->ID_EMPRESA))
    		throw new NotFoundHttpException('The requested page does not exist.');
    	
    	return $this->render('view_by_company', [
    			'model'=>$trabajadorModel		]);
    }
    
    /**
     * Displays a single Trabajador model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewbystablishment($id){
    
    	$model = EmpresaUsuario::getMyCompany();
    	 
    	$trabajadorModel = $this->findModel($id);
    	 
    	if (($model->ID_EMPRESA !== $trabajadorModel->iDEMPRESA->ID_EMPRESA_PADRE))
    		throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	return $this->render('view_by_stablishment', [
    			'model'=>$trabajadorModel		]);
    }
      
    
    
    
    /**
     * Creates a new Trabajador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateworkerbycompany()
    {
    	

    	$trabajadorModel = new Trabajador();
    	
    	$model = EmpresaUsuario::getMyCompany();

    	$companyModel = $model->iDEMPRESA;
    	
    	
    	if($model === null || $companyModel === null) throw new NotFoundHttpException('The requested page does not exist.');

    	$tmpTrabajadors = 0;
    	
    	foreach ( $companyModel->empresas as $empresa){
    		
    		$tmpTrabajadors+= count ( $empresa->trabajadors);
    	}	
    	
    	
    	if($tmpTrabajadors >= $companyModel->NUMERO_TRABAJADORES ){
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Ha exedido el numero total de trabajadores ['.$companyModel->NUMERO_TRABAJADORES.'] <a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		return $this->redirect(['indexcompany']);
    		
    	}
    	
    	$trabajadorModel->ID_EMPRESA = $model->ID_EMPRESA;
    	$trabajadorModel->ACTIVO = 1;
    	
    
    	if ($trabajadorModel->load(Yii::$app->request->post())){
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $trabajadorModel->FECHA_EMISION_CERTIFICADO);
    		
    		$trabajadorModel->FECHA_EMISION_CERTIFICADO = ($tmpdate=== false)? null : $tmpdate->format('Y-m-d') ;
    		
    		$trabajadorModel->FECHA_AGREGO = date('Y-m-d H:i');
    		
    	 if ($trabajadorModel->save()) {
    		
    	 	Yii::$app->session->setFlash('alert', [
    	 			'options'=>['class'=>'alert-success'],
    	 			'body'=> '<i class="fa fa-check fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Trabajador guardado correctamente<a href=\'#\' class=\'alert-link\'></a>',
    	 	]);
    	 	
    	 	
    		return $this->redirect(['viewbycompany', 'id' => $trabajadorModel->ID_TRABAJADOR]);
    	}else{
    		
    		
    		Yii::$app->session->setFlash('alert', [
    				'options'=>['class'=>'alert-danger'],
    				'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Ha ocurrido un error, por favor revise los campos<a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		
    		return $this->render('create_by_company', [
    				'model' => $trabajadorModel,
    		]);
    		
    		
    	}
    	
    	
    	
    	}  
    	
    	else {
    		
    		
    	
    		return $this->render('create_by_company', [
    				'model' => $trabajadorModel,
    				]);
    	}
    }
    
    /**
     * Creates a new Trabajador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateworkerbyestablishment($id)
    {
    	 
    
    	$trabajadorModel = new Trabajador();
    	 
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id, 'ACTIVO'=>'1']);
    	
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    
    	$companyModel = Empresa::findOne(['ID_EMPRESA_PADRE'=>$model->ID_EMPRESA, 'ID_EMPRESA'=>$id ]);
    	 
    	if( $companyModel === null) throw new NotFoundHttpException('The requested page does not exist.');
    
    	$tmpTrabajadors = 0; 
    	
     	foreach ( $model->iDEMPRESA->empresas as $empresa){
    		
    		$tmpTrabajadors+= count ( $empresa->trabajadors);
    		
    		
    	}	
    	
    	$tmpTrabajadors+= count ( $model->iDEMPRESA->trabajadors);
    	
    	if($tmpTrabajadors >= $model->iDEMPRESA->NUMERO_TRABAJADORES ){
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Ha exedido el numero total de trabajadores ['.$companyModel->NUMERO_TRABAJADORES.'] <a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		return $this->redirect(['indexcompany']);
    		
    	}
   
    	$trabajadorModel->ID_EMPRESA = $id;
    	
    	
    	
    	$trabajadorModel->ACTIVO = 1;
    	
    	$trabajadorModel->FECHA_AGREGO = date("Y-m-d H:i:s");
    	
    
    	if ($trabajadorModel->load(Yii::$app->request->post())) {
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $trabajadorModel->FECHA_EMISION_CERTIFICADO);
    		
    		$trabajadorModel->FECHA_EMISION_CERTIFICADO = ($tmpdate === false)? null: $tmpdate->format('Y-m-d') ;
    		
    	if( $trabajadorModel->save()) {
    		
    		    		
    		return $this->redirect(['viewbystablishment', 'id' => $trabajadorModel->ID_TRABAJADOR]);
    		
    	}else{
    		
    		
    		Yii::$app->session->setFlash('alert', [
    				'options'=>['class'=>'alert-danger'],
    				'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Ha ocurrido un error, por favor revise los campos<a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		
    		return $this->render('create_by_company', [
    				'model' => $trabajadorModel,
    		]);
    	}
    	
    	
    	
    	} else {
    		

    		Yii::$app->session->setFlash('alert', [
    				'options'=>['class'=>'alert-danger'],
    				'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Ha ocurrido un error, por favor revise los campos<a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		
    		return $this->render('create_by_company', [
    				'model' => $trabajadorModel,
    				]);
    	}
    }
    
    
    
    /**
     * Creates a new Trabajador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatefromconst($id_course,$id_est)
    {
    
    
    	$trabajadorModel = new Trabajador();
    
    	$model = EmpresaUsuario::getMyCompany();
    	
    	$companyModel = Empresa::findOne(['ID_EMPRESA_PADRE'=>$model->ID_EMPRESA, 'ID_EMPRESA'=>$id_est ]);
    
    	if( $companyModel === null) throw new NotFoundHttpException('The requested page does not exist.');
    
    	
    	if($companyModel->NUMERO_TRABAJADORES <= count($companyModel->trabajadors)){
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>De acuerdo con la información, has excedido el numero de trabajadores propuestos.. <a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		 
    	}

    	$trabajadorModel->ID_EMPRESA = $id_est;
    	 
    	$trabajadorModel->ACTIVO = 1;
    	 
    	$trabajadorModel->FECHA_AGREGO = date("Y-m-d H:i:s");
    	 
    
    	if ($trabajadorModel->load(Yii::$app->request->post()) && $trabajadorModel->save()) {
    
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=> '<i class="fa fa-check fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Se ha creado el trabajador correctamente <a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		
    		
    		$constanciaModel = new Constancia();
    		
    		$constanciaModel->ID_CURSO = $id_course;
    		
    		$constanciaModel->ACTIVO = 1;
    		
    		$constanciaModel->ID_TRABAJADOR = $trabajadorModel->ID_TRABAJADOR;
    		
    		$constanciaModel->ESTATUS = Constancia::STATUS_ALREADY;
    		
    		$constanciaModel->FECHA_CREACION = date("Y-m-d H:i:s");
    		
    		if ($constanciaModel->save()){
    			 
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-success'],
    			'body'=> '<i class="fa fa-check fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Se ha creado  la constancia correctamente <a href=\'#\' class=\'alert-link\'></a>',
    			]);
    			
    			Indicadores::setIndicadorConstancia($constanciaModel);
    			
    		}
    		
    		return $this->redirect(['constancias/createbycourse', 'id' =>$id_course,'id_est'=>$id_est]);
    
    
    	} else {
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>
					No fue posible crear el trabajador, revise los errores
    				<a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		 
    		
    		return $this->redirect(['constancias/createbycourse', 'id' =>$id_course,'id_est'=>$id_est]);
    	}
    }
    

    
    /**
     * Creates a new Trabajador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateFromConstCompany($id_course)
    {
    
    
    	$trabajadorModel = new Trabajador();
    
    	$model = EmpresaUsuario::getMyCompany();
    	
    	$totalTrabajadores = count(Trabajador::findBySql('select * from tbl_trabajador where id_empresa in
    													(select id_empresa from tbl_empresa where id_empresa_padre = :empresa_padre OR ID_EMPRESA= :empresa_padre) ',[':empresa_padre'=>$model->ID_EMPRESA])->all());
    	
    	if($model->iDEMPRESA->NUMERO_TRABAJADORES >= $totalTrabajadores){
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Ha exedido el numero de trabajadores, comuniquese con el administrador. <a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		 
    		 
    	}
    	
    	
    	$trabajadorModel->ID_EMPRESA = $model->ID_EMPRESA;
    
    	$trabajadorModel->ACTIVO = 1;
    
    	$trabajadorModel->FECHA_AGREGO = date("Y-m-d H:i:s");
    
    
    	if ($trabajadorModel->load(Yii::$app->request->post()) && $trabajadorModel->save()) {
    
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Se ha creado el trabajador correctamente <a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		
    		$constanciaModel = new Constancia();
    		
    		$constanciaModel->ID_CURSO = $id_course;
    		
    		$constanciaModel->ACTIVO = 1;
    		
    		$constanciaModel->ID_TRABAJADOR = $trabajadorModel->ID_TRABAJADOR;
    		
    		$constanciaModel->ESTATUS = Constancia::STATUS_ALREADY;
    		
    		$constanciaModel->FECHA_CREACION = date("Y-m-d H:i:s");
    		
    		if ($constanciaModel->save()){
    			
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-success'],
    			'body'=> '<i class="fa fa-check fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Se ha creado  la constancia correctamente <a href=\'#\' class=\'alert-link\'></a>',
    			]);
    			
    			Indicadores::setIndicadorConstancia($constanciaModel);
    		}
    		
        
    		return $this->redirect(['constancias/createbycourse', 'id' =>$id_course]);
        
    	} else {
    
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>
					No fue posible crear el trabajador, revise los errores '.json_encode($trabajadorModel->getErrors()).'
    				<a href=\'#\' class=\'alert-link\'></a>',
        				]);
    		 
    
    		return $this->redirect(['constancias/createbycourse', 'id' =>$id_course]);
    	}
    }
    
    
    /**
     * Creates a new Trabajador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trabajador();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_TRABAJADOR]);
        } else {
            return $this->render('create_by_company', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Trabajador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['viewbycompany', 'id' => $model->ID_TRABAJADOR]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Empresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatebyuser($id)
    {
    	$model = $this->findModel($id);
    	$companyModel = EmpresaUsuario::getMyCompany();
    	
    	
    
    	if ($model->load(Yii::$app->request->post())) {
    		
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_EMISION_CERTIFICADO);
    		$model->FECHA_EMISION_CERTIFICADO = ($tmpdate === false)? null : $tmpdate->format('Y-m-d') ;
    	
    		
    	
    	if ( $model->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check fa-lg"></i> Trabajador actualizado correctamente.',
    		]);
    		return $this->redirect(['viewbycompany', 'id' => $model->ID_TRABAJADOR]);
    	} 
    } else {
    		return $this->render('update_by_user', [
    				'model' => $model,
    				]);
    	}
    }
    
    
    /**
     * Updates an existing Empresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatebystablish($id)
    {
    	
    	$model = $this->findModel($id);
    	$companyModel = EmpresaUsuario::getMyCompany();
    	 
    	//$trabajadorModel->ID_EMPRESA = $model->ID_EMPRESA;
    
    	if ($model->load(Yii::$app->request->post())){
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_EMISION_CERTIFICADO);
    		$model->FECHA_EMISION_CERTIFICADO = ($tmpdate === false)? null : $tmpdate->format('Y-m-d') ;
    		
    		
    		if($model->save()) {
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-success'],
    			
    			'body'=> '<i class="fa fa-check"></i> Trabajador actualizado correctamente.',
    			]);
    		return $this->redirect(['viewbystablishment', 'id' => $model->ID_TRABAJADOR]);
    	} 
    } else {
    		return $this->render('update_stablisment', [
    				'model' => $model,
    				]);
    	}
    }
    /**
     * Deletes an existing Trabajador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['indexcompany']);
    }
    
    public function actionDeletebyuser($id)
    {
    	$model = $this->findModel($id);
    	$companyModel = EmpresaUsuario::getMyCompany();
    
    	if ($model->ID_EMPRESA !== $companyModel->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    
    	 
    	$model->ACTIVO=0;
    	 
    	if ($model->save()){
    		 
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=>Yii::t('frontend', 'Se ha eliminado el trabajador correctamente')
    		]);
    	}else{
    
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=>Yii::t('frontend', 'No se pudo  eliminar el trabajador')
    		]);
    	}
    	return $this->redirect(['indexcompany']);
    }
    
    
    /**
     * eliminar trabajador de establecimiento 
     */
    public function actionDeletebystablish($id)
    {
    
    	$companyModel = EmpresaUsuario::getMyCompany();
    	$model = $this->findModel($id);
    	
    	if ($model->iDEMPRESA->ID_EMPRESA_PADRE !== $companyModel->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    
    
    	$model->ACTIVO=0;
    	$establishment = $model->ID_EMPRESA;
    
    	if ($model->delete()){
    		 
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=>Yii::t('frontend', 'Se ha eliminado el trabajador correctamente')
    		]);
    	}else{
    
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=>Yii::t('frontend', 'No se pudo  eliminar el trabajador')
    		]);
    	}
    	return $this->redirect(['indexestablishment','id_establishment'=>$establishment]);
    }
    
    
    /**
     * Finds the Trabajador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Trabajador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trabajador::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
