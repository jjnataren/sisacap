<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Empresa;
use backend\models\EmpresaSearch;
use backend\models\EmpresaUsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\search\UserSearch;
use backend\models\EmpresaUsuario;
use common\models\User;
use backend\models\RepresentanteLegal;
use backend\models\RepresentanteLegalSearch;
use backend\models\ComisionMixtaCapSearch;
use trntv\filekit\actions\UploadAction;
use yii\imagine\Image;
use backend\models\Catalogo;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use backend\models\Instructor;
use yii\base\Object;

/**
 * EmpresaController implements the CRUD actions for Empresa model.
 */
class EmpresaController extends Controller
{
	
	
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
	
	public function actions(){
		return [
		'avatar-upload'=>[
		'class'=>UploadAction::className(),
		'fileProcessing'=>function($file){
				//Image::thumbnail($file->path->getPath(), 215,215)
				//->save($file->path->getPath());
				
			Yii::$app->fileStorage->save($file);
		}
		]
		];
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
     * Lists all Empresa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpresaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Lists all Empresa models.
     * @return mixed
     */
    public function actionIndexestablishment()
    {
    	$model = EmpresaUsuario::getMyCompany();
    	$searchModel = new EmpresaSearch();
    	$dataProvider = $searchModel->searchEstablishments(Yii::$app->request->queryParams,$model->ID_EMPRESA);
    
    	return $this->render('index_establishment', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'ID_EMPRESA'=>$model->ID_EMPRESA,
    			]);
    }
    
    
    public function actionIndexEstablishmentInstructor()
    {
    	$model = EmpresaUsuario::getMyCompany();
    	$searchModel = new EmpresaSearch();
    	$dataProvider = $searchModel->searchEstablishments(Yii::$app->request->queryParams,$model->ID_EMPRESA);
    
    	return $this->render('index_establishment_instructor', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'ID_EMPRESA'=>$model->ID_EMPRESA,
    			]);
    }
    

	
    
    /**
     * 
     * @param integer $id
     */
    public function actionDashboard(){
    	  	
    	
    	if(Yii::$app->user->can('administrator')){
    	
    		return $this->redirect(['empresa/index']);
    		
    	}elseif (Yii::$app->user->can('instructor')){
    		
    		return $this->redirect(['empresa/dashboard-instructor']);
    	}
    	
    	$model = EmpresaUsuario::getMyCompany();
    	
    	return $this->render('dashboard', [
    			'model' => $model->iDEMPRESA,
    			]);
    	
    }
    
    
    /**
     *
     * @param integer $id
     */
    public function actionDashboardInstructor(){
    	 
    	 
   	
    	
    	$model = Instructor::getOwnData();
    	 
    	return $this->render('dashboard_by_instructor', [
    			'model' => $model,
    	]);
    	 
    }
    
    
    

    /**
     * 
     * @throws NotFoundHttpException
     */
    public function actionUpdatebyuser(){
    	
    	
    	//Yii::$app->user
    	//$new_model = new Em
    	
    	$model = EmpresaUsuario::getMyCompany();
    	
    	
    	$empresa = $model->iDEMPRESA;
    	
    	
    	if ($empresa->load(Yii::$app->request->post())){
    		
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $empresa->FECHA_INICIO_OPERACIONES);
    		
    		
    		$empresa->FECHA_INICIO_OPERACIONES = ($tmpdate === false )? null : $tmpdate->format('Y-m-d') ;
    		
    	
    	 IF ($empresa->save()) {
    	 	Yii::$app->session->setFlash('alert', [
    	 	'options'=>['class'=>'alert-success'],
    	 	
    	 	'body'=> '<i class="fa fa-check"></i> Empresa actualizada correctamente.',
    	 	]);
    		return $this->redirect(['viewbyuser', 'id' => $empresa->ID_EMPRESA]);
    	}
    	}
    	
    	return $this->render('update_by_user', [
    			'model' => $empresa,
    			]);
    	
    	
    }
    
    /**
     *
     * @throws NotFoundHttpException
     */
    public function actionUpdatebystableshiment($id){
    	 
    	//Yii::$app->user
    	//$new_model = new Em
    	 
    	
    	$model = EmpresaUsuario::getMyCompany();
    	 
    	$empresa = Empresa::findOne([
	
    			'ID_EMPRESA'=>$id,
    			'ID_EMPRESA_PADRE'=>$model->ID_EMPRESA
    	]);
    	 
    	 
    	if ($empresa->load(Yii::$app->request->post())){
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $empresa->FECHA_INICIO_OPERACIONES);
    		$empresa->FECHA_INICIO_OPERACIONES = ($tmpdate === false )? null : $tmpdate->format('Y-m-d') ;
    		
    		
    	IF($empresa->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Establecimiento actualizado correctamente.',
    		]);
    		return $this->redirect(['viewbystablishment', 'id' => $empresa->ID_EMPRESA]);
    		
    	}
    	}
    	 
    	return $this->render('update_by_stablishment', [
    			'model' => $empresa,
    			]);
    	 
    	 
    }
    
    
    

    /**
     * Lists all Empresa models.
     * @return mixed
     */
    public function actionEstablishments()
    {
    	
    		 
    	$companyUserModel = EmpresaUsuario::getMyCompany();
    	
    	
    	
    	$searchModel = new EmpresaSearch();
    	
    	$dataProvider = $searchModel->searchEstablishments(Yii::$app->request->queryParams, $companyUserModel->ID_EMPRESA);
    
    	return $this->render('index_establishment', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'ID_EMPRESA'=>$companyUserModel->ID_EMPRESA
    			]);
    }	
    
    
    /**
     * Get all municipios 
     */
    public function actionGetmunicipios() {
    	$out = [];
    	
    	if (isset($_POST['depdrop_parents'])) {
    		$parents = $_POST['depdrop_parents'];
    		if ($parents != null) {
    			$cat_id = $parents[0];
    			//$out = self::getSubCatList($cat_id);
    			
    			$catalogo = Catalogo::findOne($cat_id);
    			
    			$out=ArrayHelper::map($catalogo->catalogos, 'ID_ELEMENTO', 'NOMBRE');
    			
    			$items = [];
    			$i= 0;
    			foreach ($out as $key=>$item){
    				
    				$items[] = ['id'=>$key, 'name'=>$item];
    				
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
     * Lists all Empresa models.
     * @return mixed
     */    
    public function actionViewbyuser(){
    	 
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id]);   
    	
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    	
    	$company= $model->iDEMPRESA;
    	
    	return $this->render('view_by_user',['model'=>$company]);
    	
    }
    
    
    public function actionViewByInstructor(){
    	
    	
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id]);
    	 
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	$company= $model->iDEMPRESA;
    	 
    	return $this->render('view_by_instructor',['model'=>$company]);
    	 
    	  	
    
    	
    }
    
    
    
    /**
     * Lists all Empresa models.
     * @return mixed
     */
    public function actionViewbystablishment($id){
    
    	$model = EmpresaUsuario::getMyCompany();
    	 
    	$empresa = Empresa::findOne([
	
    			'ID_EMPRESA'=>$id,
    			'ID_EMPRESA_PADRE'=>$model->ID_EMPRESA
    	]);
    	 
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	$company= $model->iDEMPRESA;
    	 
    	return $this->render('view_by_stablisment',[
    			'model'=>$empresa]);
    	 
    }
    
    
    public function actionViewbystablishmentinstructor($id){
    
    	$model = EmpresaUsuario::getMyCompany();
    
    	$empresa = Empresa::findOne([
    
    			'ID_EMPRESA'=>$id,
    			'ID_EMPRESA_PADRE'=>$model->ID_EMPRESA
    			]);
    
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    
    	$company= $model->iDEMPRESA;
    
    	return $this->render('view_by_stablishment_instructor',[
    			'model'=>$empresa]);
    
    }
     

    /**
     * Displays a single Empresa model.
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
     * Creates a new Empresa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    

    public function actionCreate()
    {
        $model = new Empresa();

        if ($model->load(Yii::$app->request->post())){
        	$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_INICIO_OPERACIONES);
        	$model->FECHA_INICIO_OPERACIONES =( $tmpdate === false)? null : $tmpdate ->format('Y-m-d') ;
        	$model->ACTIVO = 1;
        	
        	if ($model->save()){

        		
        		Yii::$app->session->setFlash('alert', [
        				'options'=>['class'=>'alert-success'],
        		
        				'body'=> '<i class="fa fa-check"></i> Empresa  creada correctamente.',
        		]);
        		
        		return $this->redirect(['view', 'id' => $model->ID_EMPRESA]);
      		  }
        
        }   
            
            return $this->render('create', [
                'model' => $model,
            ]);
    }

    
    
    
    
    /**
     * Adds a new User to Empresa.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddUser($id, $id_u)  
    {
    
    
    	$model = EmpresaUsuario::findOne(['ID_EMPRESA' => $ID_EMPRESA, 'ID_USUARIO' => $ID_USUARIO]);
    	
	    if ($model === null){
	    	
	    	$model = new EmpresaUsuario();
	    	
	    	$model->ID_EMPRESA = $id;
	    	
	    	$model->ID_USUARIO = $id_u;
	    	
	    	if(! $model->save())	    	
	    			
	    		throw new NotFoundHttpException('The requested page does not exist.');
	    	
	    	
	    } 	
    	
   	    
   		return $this->redirect(['manage', 'id' => $id]);
    	
    }
    
    
    /**
     * Updates an existing Empresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionCreateestablishment()
    {


    	$companyModel = EmpresaUsuario::getMyCompany();
    	
    	
    	$establishment_model = new Empresa();
    	
    	//$establishment_model->scenario = 'establecimiento';
    	
    	$establishment_model->ID_EMPRESA_PADRE = $companyModel->ID_EMPRESA;
    	
    	$establishment_model->ACTIVO = 1;
    	
    	
    	
    	if ($establishment_model->load(Yii::$app->request->post())) {
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $establishment_model->FECHA_INICIO_OPERACIONES);
    		$establishment_model->FECHA_INICIO_OPERACIONES =( $tmpdate === false)? null : $tmpdate ->format('Y-m-d') ;
    		
    		
    		if( $establishment_model->save()) {
    			
    			Yii::$app->session->setFlash('alert', [
    					'options'=>['class'=>'alert-success'],
    					 
    					'body'=> '<i class="fa fa-check"></i> Establecimiento creado correctamente.',
    			]);
    			

    			return $this->redirect(['viewbystablishment', 'id' => $establishment_model->ID_EMPRESA]);
		    			
		    }
    		
    		
    		
    		
    	} 
    		
    		return $this->render('create_establishment', [
    				'model' => $establishment_model,
    				]);

    }
    
    
    
    
    
    
    
    /**
     * Updates an existing Empresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
        	$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_INICIO_OPERACIONES);
        	$model->FECHA_INICIO_OPERACIONES =( $tmpdate === false)? null : $tmpdate ->format('Y-m-d') ;
        	if   ( $model->save()) {
        		
        		Yii::$app->session->setFlash('alert', [
        				'options'=>['class'=>'alert-success'],
        		
        				'body'=> '<i class="fa fa-check"></i> Empresa actualizada correctamente.',
        		]);
        		
        		return $this->redirect(['view', 'id' => $model->ID_EMPRESA]);
        	}


        }
            return $this->render('update', [
                'model' => $model,
            ]);
    }
    
    /**
     * Updates an existing Empresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatebyestablishiment($id)
    {
    	$model = $this->findModel($id);
    	$companyModel = EmpresaUsuario::getMyCompany();
    
    	if ($model->load(Yii::$app->request->post())){
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $empresa->FECHA_INICIO_OPERACIONES);
    		$empresa->FECHA_INICIO_OPERACIONES = $tmpdate->format('Y-m-d') ;
    		
    		if ($model->save()) {
    			
    			
    			Yii::$app->session->setFlash('alert', [
    					'options'=>['class'=>'alert-success'],
    					 
    					'body'=> '<i class="fa fa-check"></i> Establecimiento actualizado correctamente.',
    			]);
    			
    			return $this->redirect(['view', 'id' => $model->ID_EMPRESA]);
    		}
    		
    	}
    	
   
    		return $this->render('update_by_establishment', [
    				'model' => $model,
    				]);
    }
    
    /**
     * Updates an existing Empresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionManage($id)
    {
    	$model = $this->findModel($id);
    	
     	
    
        
    	if (Yii::$app->request->get('id_u')) {
    		
    		
    		$id_u = Yii::$app->request->get('id_u');
    		
    		$modelUser = User::findOne($id_u);
    		
    		if($modelUser === null)
    			throw new NotFoundHttpException('The requested page does not exist.');
    		
    		$modelEmpresaUsuario = EmpresaUsuario::findOne(['ID_EMPRESA' => $id, 'ID_USUARIO' => $id_u]);
    		 
    		if ($modelEmpresaUsuario === null){
    		
    			$modelEmpresaUsuario = new EmpresaUsuario();
    		
    			$modelEmpresaUsuario->ID_EMPRESA = $id;
    		
    			$modelEmpresaUsuario->ID_USUARIO = $id_u;
    			
    			$modelEmpresaUsuario->FECHA_AGREGO = date("Y-m-d h:i:s");
    			
    			$modelEmpresaUsuario->ACTIVO = 1;
    			
    			$modelEmpresaUsuario->save();
    			
    			if ($modelUser->role === User::ROLE_INSTRUCTOR){
    				
    				$instructor = Instructor::findOne(['ID_EMPRESA'=>$id,'ID_USUARIO'=>$id_u, 'ACTIVO'=>1]);
    				
    				if ($instructor === null){
    					
    					$instructor = new Instructor();
    					
    					$usuario = $modelEmpresaUsuario->iDUSUARIO;
    					
    					$instructor->ACTIVO = 1;
    					$instructor->ID_EMPRESA = $id;
    					$instructor->ID_USUARIO = $id_u;
    					$instructor->COMENTARIOS = 'Instructor nuevo';
    					$instructor->CORREO_ELECTRONICO = $usuario->email;
    					$instructor->save();
    				}
    				
    			}
    			
    			  			    		   		
    		}
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=>Yii::t('frontend', 'Usuario agregado correctamente')
    		]);
    		
    		return $this->redirect(['manage', 'id' => $id]);
    		
    	}else if (Yii::$app->request->get('id_legal')){
    			
    			$id_legal = Yii::$app->request->get('id_legal');
    			
    			$legalModel = RepresentanteLegal::findOne($id_legal);
    			 
    			if($legalModel === null)
    				throw new NotFoundHttpException('The requested page does not exist.');
    			 
    			$model->ID_REPRESENTANTE_LEGAL = $id_legal;
    			
    			$model->save();
    			
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-success'],
    			'body'=>Yii::t('frontend', 'Representante legal  agregado correctamente')
    			]);
    			 
    			 
    			
    			
    			return $this->redirect(['manage', 'id' => $id]);
    			
    		
    			
    		} else {
    		
    		$searchModel = new UserSearch();
    		
    		//$query = User::findBySql('select * from tbl_user where role = 5');  
    		
    		$dataProvider = $searchModel->searchNotAssigned(Yii::$app->request->queryParams);
    		
    		$instructorDataProvider = $searchModel->searchInstructorNotAssigned(Yii::$app->request->queryParams);
    		 
    		$searchModel_lr = new RepresentanteLegalSearch();
    		$dataProvider_lr = $searchModel_lr->search(Yii::$app->request->queryParams);
    		
    		return $this->render('manage', [
    				'model' => $model,
    				'searchModel' => $searchModel,
    				'dataProvider' => $dataProvider,
    				'searchModel_lr'=>$searchModel_lr,
    				'dataProvider_lr'=>$dataProvider_lr,
    				'instructorDataProvider'=>$instructorDataProvider,
    					]);
    	}
    }
    
    
    /**
     * Deletes an existing EmpresaUsuario model.
     * If deletion is successful, the browser will be redirected to the 'manage' page.
     * @param integer $id
     * @param integer $id_user
     * @return mixed
     */
    public function actionDeleteuser($id, $id_user)
    {
    	
    	
    	$model = EmpresaUsuario::findOne(['ID_EMPRESA'=>$id, 'ID_USUARIO'=>$id_user]); 
    	
    	if ($model === null) 
    		throw new NotFoundHttpException('The requested page does not exist.');
    	
    	else $model->delete();
    
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	'body'=>Yii::t('frontend', 'Usuario desasignado correctamente')
    	]);
    	
    	
    	
    	return $this->redirect(['manage','id'=>$id]);
    }
    
    public function actionDeletebyuser($id)
    {
    	$model = $this->findModel($id);
    	$companyModel = EmpresaUsuario::getMyCompany();
    	 
    	if ($model->ID_EMPRESA_PADRE !== $companyModel->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	
    	$model->ACTIVO=0;
    	
    	if ($model->delete()){
    		 
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=>Yii::t('frontend', 'Se ha eliminado el establecimiento correctamente')
    		]);
    	}else{
    
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=>Yii::t('frontend', 'No se pudo  eliminar el establesimiento')
    		]);
    	}
    	return $this->redirect(['indexestablishment']);
    }

    /**
     * Deletes an existing Empresa model.
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
     * Finds the Empresa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empresa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empresa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
