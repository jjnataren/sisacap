<?php

namespace backend\controllers;

use Yii;
use backend\models\Instructor;
use backend\models\InstructorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\EmpresaUsuario;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * InstructorController implements the CRUD actions for Instructor model.
 */
class InstructorController extends Controller
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
     *
     * @param integer $id
     */
    public function actionDashboard(){
    	     	     	 
    	if(Yii::$app->user->can('administrator')){
    		 
    		return $this->redirect(['instructor/index']);
    	}
    	 
    	$model = EmpresaUsuario::getMyCompany();
    	 
    	 
    	 
    	return $this->render('dashboard', [
    			'model' => $model->iDEMPRESA,
    			]);
    	 
    }
    
    public function actionConstanciasByInstructor(){
    	
    	    	
    	if(Yii::$app->user->can('administrator')){
    		 
    		return $this->redirect(['instructor/index']);
    	}
    	
    	$model = EmpresaUsuario::getMyCompany();
    	
    	
    	
    	return $this->render('constancias_by_instructor', [
    			'model' => $model->iDEMPRESA,
    			]);
    	
    	}
    	
    	
    
    
    
    /**
     * Lists all Instructor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InstructorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Instructor models.
     * @return mixed
     */
    public function actionIndexbycompany(){
    
    $model = EmpresaUsuario::getMyCompany();
    
    
    	$searchModel = new InstructorSearch();
    	$dataProvider = $searchModel->searchByCompany(Yii::$app->request->queryParams, $model->ID_EMPRESA);
    
    	return $this->render('index_by_company', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    
    
    }
    
    
    
    public function actionIndexbyinstructor(){
    
    	$model = EmpresaUsuario::getMyCompany();
    
    
    	$searchModel = Instructor::getOwnData();
    	$searchModel = new InstructorSearch();
    	$dataProvider = $searchModel->searchByCompany(Yii::$app->request->queryParams, $model->ID_EMPRESA);
    
    	return $this->render('index', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    
    
    }
    
        
      
    /**
     * Displays a single Instructor model.
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
     * Displays a single Instructor model by its company.
     * @param integer $id
     * @return mixed
     */
public function actionViewbycompany($id){
    
    	$model = EmpresaUsuario::getMyCompany();
    	 
    	$instructorModel = $this->findModel($id);
    	
    	if ($instructorModel->ID_EMPRESA !== $model->ID_EMPRESA){
    		
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    
    	return $this->render('view_by_company',['model'=>$instructorModel]);
    
    
    
     }
     
     
     /**
      * Displays a single Instructor model by its company.
      * @param integer $id
      * @return mixed
      */
     public function actionViewByInstructor(){
     
     	$model = Instructor::getOwnData();
           
     	return $this->render('view_by_instructor',['model'=>$model]);
     
     
     
     }
 
    
     /**
      * Creates a new Instructor model by its company.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return mixed
      */
     public function actionCreateByInstructor()
     {
     
     	$companyUserModel = EmpresaUsuario::getMyCompany();
     
     
     	$model = new Instructor();
     	 
     	$model->ID_EMPRESA = $companyUserModel->ID_EMPRESA;
     	$model->ACTIVO = 1;
     	 
     	if ($model->load(Yii::$app->request->post()) && $model->save()) {
     		return $this->redirect(['view-by-instructor']);
     	} else {
     		return $this->render('create_by_instructor', [
     				'model' => $model,
     		]);
     	}
     }
      
    
    
    /**
     * Creates a new Instructor model by its company.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatebycompany()
    {
    	

    	$companyUserModel = EmpresaUsuario::getMyCompany();
    	
    	$model = new Instructor();
    	
    	$model->ID_EMPRESA = $companyUserModel->ID_EMPRESA;
    	$model->ACTIVO = 1;
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['view-by-instructor', 'id' => $model->ID_INSTRUCTOR]);
    	} else {
    		return $this->render('create_by_company', [
    				'model' => $model,
    				]);
    	}
    }
    
    
    
    /**
     * Creates a new Instructor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Instructor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_INSTRUCTOR]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Instructor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_INSTRUCTOR]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    
    /**
     * Updates an existing Instructor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatebycompany($id)
    {
    	$model = $this->findModel($id);
    	$companyModel = EmpresaUsuario::getMyCompany();
    	
    	if ($model->ID_EMPRESA !== $companyModel->ID_EMPRESA)
    	throw new NotFoundHttpException('The requested page does not exist.');
    	    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Instructor actualizado correctamente.',
    		]);
    		return $this->redirect(['viewbycompany', 'id' => $model->ID_INSTRUCTOR]);
    	} else {
    		return $this->render('update_by_company', [
    				'model' => $model,
    				]);
    	}
    }

    
    
    public function actionUpdateByInstructor()
    {
    	$model = Instructor::getOwnData();
   
    	 
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Instructor actualizado correctamente.',
    		]);
    		return $this->redirect(['view-by-instructor', 'id' => $model->ID_INSTRUCTOR]);
    	} else {
    		return $this->render('update_by_instructor', [
    				'model' => $model,
    				]);
    	}
    }
    
    
      
    /**
     * Deletes an existing Instructor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletebycompany($id)
    {
    	
    	$model = $this->findModel($id);
    	$companyModel = EmpresaUsuario::getMyCompany();
    	
    	if ($model->ID_EMPRESA !== $companyModel->ID_EMPRESA)
    		throw new NotFoundHttpException('The requested page does not exist.');
    	
    	$model->ACTIVO = 0;
    	
    	if ($model->save()){
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=>Yii::t('frontend', 'Se ha eliminado el instructor correctamente')
    		]);
    		
    	}else{
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=>Yii::t('frontend', 'No se pudo  eliminar el instructor')
    		]);
    		 
    		
    	}
    
    	return $this->redirect(['indexbycompany']);
    }
    
    
    
    /**
     * shows signing picture
     * @throws NotFoundHttpException
     * @return \yii\web\Response|string
     */
    public function actionViewSignPic(){
    		
    	 
    	$instructor =Instructor::getOwnData();
    	
    	$image64Data = null;
    	 
    	$passwordoriginal  = $instructor->SIGN_PASSWD;
    	 
    	if ($instructor->load(Yii::$app->request->post())) {
    
    	
    		
    		$passphrase = md5($instructor->SIGN_PASSWD);
    
    		if($passwordoriginal  !==  $passphrase){
    			 
    
    			Yii::$app->session->setFlash('alert', [
    					'options'=>['class'=>'alert-warning'],
    					'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <b>La constraseña proporcionada no puede des encriptar la firma </b>',
    			]);
    			 
    		}else{
    			 
    			Yii::$app->session->setFlash('alert', [
    					'options'=>['class'=>'alert-success'],
    
    					'body'=> '<i class="fa fa-check"></i> Firma des encriptada correctamente.',
    			]);
    			 
    			/* Turn a human readable passphrase
    			 * into a reproducable iv/key pair
    			*/
    			$iv = substr(md5('iv'.$passphrase, true), 0, 8);
    			$key = substr(md5('pass1'.$passphrase, true) .
    					md5('pass2'.$passphrase, true), 0, 24);
    			$opts = array('iv'=>$iv, 'key'=>$key);
    
    			$fp = fopen($instructor->SIGN_PIC, 'r');
    			stream_filter_append($fp, 'mdecrypt.tripledes', STREAM_FILTER_READ, $opts);
    			$data = rtrim(stream_get_contents($fp));
    			fclose($fp);
    
    			$image64Data =  $data;
    
    		}
    
    	}
    	 
    	 
    	 
    	return $this->render('view_sign_pic',['model'=>$instructor, 'SIGN_IMAGE'=> base64_encode($image64Data)]);
    	 
    }
    
    
    
    /**
     * Manages signing picture
     * @throws NotFoundHttpException
     * @return \yii\web\Response|string
     */
    public function actionManageSignPic(){
    
    	$instructor =Instructor::getOwnData();
    

    	 
    	$image64Data = null;
    	 
    	if ($instructor->load(Yii::$app->request->post())) {
    
    
    		$file = UploadedFile::getInstance($instructor,'SIGN_PIC');
    
    
    		if ($file === null){
    			
    			Yii::$app->session->setFlash('alert', [
    					'options'=>['class'=>'alert-danger'],
    			
    					'body'=> '<i class="fa fa-info"></i> Debe seleccionar una imagen',
    			]);
    			return $this->render('manage-sign-pic',['model'=>$instructor, 'SIGN_IMAGE'=> base64_encode($image64Data)]);
    			
    		}
    		
    		$passphrase = md5($instructor->SIGN_PASSWD);
    
    
    
    		/* Turn a human readable passphrase
    		 * into a reproducable iv/key pair
    		*/
    		$iv = substr(md5('iv'.$passphrase, true), 0, 8);
    		$key = substr(md5('pass1'.$passphrase, true) .
    				md5('pass2'.$passphrase, true), 0, 24);
    		$opts = array('iv'=>$iv, 'key'=>$key);
    
    		$fp = fopen($file->tempName, "r");
    
    		$fileStream  = stream_get_contents($fp); //  fgets($fp,$file->size);
    
    		fclose($fp);
    
    		$fpw = fopen($file->tempName, "w");
    
    
    		stream_filter_append($fpw, 'mcrypt.tripledes', STREAM_FILTER_WRITE, $opts);
    
    		fwrite($fpw, $fileStream);
    
    		fclose($fpw);
    
    		$fileReturn = Yii::$app->fileStorage->save($file);
    
    		$instructor->SIGN_PIC = $fileReturn->url;
    		$instructor->SIGN_PASSWD = $passphrase;
    		$instructor->SIGN_PIC_EXTENSION = $file->extension;
    		$instructor->SIGN_CREATED_AT = date("Y-m-d H:i:s");
    
    
    		if($instructor->save() ) {
    
    			Yii::$app->session->setFlash('alert', [
    					'options'=>['class'=>'alert-success'],
    
    					'body'=> '<i class="fa fa-check"></i> Firma guardada y encriptada correctamente, ¡ Puede desencriptar la firma  proporcionando la constraseña nuevamente !.',
    			]);
    			 
    			return $this->redirect(['view-sign-pic']);
    		}
    
    
    	}
    
    
    
    
    	return $this->render('manage-sign-pic',['model'=>$instructor, 'SIGN_IMAGE'=> base64_encode($image64Data)]);
    
    }

    /**
     * Deletes an existing Instructor model.
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
     * Finds the Instructor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Instructor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Instructor::findOne(['ID_INSTRUCTOR'=>$id, 'ACTIVO'=>1])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
