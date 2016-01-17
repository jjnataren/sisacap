<?php

namespace backend\controllers;

use Yii;
use backend\models\Curso;
use backend\models\CursoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\EmpresaUsuario;
use backend\models\search\InstructorSearch;
use backend\models\Plan;
use backend\models\Indicadores;
use backend\models\Instructor;
use backend\models\Catalogo;
use yii\web\UploadedFile;
use yii\helpers\Json;

/**
 * CursoController implements the CRUD actions for Curso model.
 */
class CursoController extends Controller
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
    			$model->NOMBRE_DOCUMENTO_PROBATORIO = $file->name;
    	
    			$model->FECHA_DOCUMENTO_PROBATORIO = Date('Y m d');		
    			$model->save(false);
    
    			Indicadores::setIndicadorCurso($model);
    
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
    			$model->NOMBRE_DOCUMENTO_PROBATORIO = NULL;
    			$model->FECHA_DOCUMENTO_PROBATORIO = NULL;
    			$model->save();
    
    			Indicadores::setIndicadorCurso($model);
    			break;
    		case 2:
    			break;
    
    	}
    
    	echo Json::encode(['message'=>'OK']);
    	return;
    }
    
    
    /**
     * Lists all Curso models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CursoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    
   
    
    
    /**
     * Lists all Curso models.
     * @return mixed
     */
    public function actionIndexbycompany(){
    
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id]);
    
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    
    	
    	
    	$searchModel = new CursoSearch();
    	$dataProvider = $searchModel->searchbycompany(Yii::$app->request->queryParams, $model->ID_EMPRESA);
    	
    	return $this->render('index_by_company', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    	
    	//$curso= $model->iDEMPRESA;
    	 
    	//$representante =$company->iDREPRESENTANTELEGAL;
    
    	//return $this->render('index_by_company',['model'=>$representante]);
    
   }
    /**
   /**
     * Displays a single Curso model by its company.
     * @param integer $id
     * @return mixed
     */
    public function actionViewbycompany($id)
    {
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id]);
    	 
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    	
    	$cursoModel = $this->findModel($id);
    
    	
    	return $this->render('view_by_company', [
    			
    			'model' => $cursoModel,
    			]);
    }
    
    
    
    /**
     * Displays a single Curso model by its company.
     * @param integer $id
     * @return mixed
     */
    public function actionDashboardInstructor()
    {
    	
    	$model  = Instructor::getOwnData();
    	
    	return $this->render('view_by_company', [
    			'model' => $cursoModel,
    	]);
    }
    
    
    
    /**
     * Displays a single Curso model.
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
     * Creates a new Curso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Curso();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_CURSO]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    
    /**
     * 
     * @return Ambigous <\yii\web\Response, \yii\web\static, \yii\web\Response>|Ambigous <string, string>
     */
    public function actionCreatebyplan($id_plan)
    {
    	
    	$companyUsuarioModel = EmpresaUsuario::getMyCompany();
    	
    	$planModel = Plan::findOne($id_plan);
    	
    	if ($planModel === null || !($planModel->iDCOMISION->ID_EMPRESA===$companyUsuarioModel->ID_EMPRESA)) throw new NotFoundHttpException('The requested page does not exist.');
    	
    	if($planModel->getCurrentStatus() >= Plan::STATUS_CONCLUIDO){
    	
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>El plan ha finalizado, no es posible realizar esta acción. <a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		return $this->redirect(['plan/dashboard', 'id' => $id_plan]);
    	}
    	
    	
    	
    	$searchModel = new InstructorSearch();
    	
    	$dataProvider = $searchModel->searchByCompany(null, $companyUsuarioModel->ID_EMPRESA);
    	 
    /*	if($planModel->getCurrentStatus() < Curso::STATUS_CONCLUIDO){
    	
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-warning'],
    		'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>El curso no esta vigente <a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		return $this->redirect(['comision-mixta-cap/dashboard', 'id' => $id]);
    	}
    	*/
    	
   
  
    	    		   	
    	$model = new Curso();
    	
    	$model->ID_PLAN = $id_plan;
    
			

    	//$model->NOMBRE = $listCurso->NOMBRE ;
    	    	
    	if ($model->load(Yii::$app->request->post())){
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_INICIO);
    		$model->FECHA_INICIO = ($tmpdate === false)? null : $tmpdate->format('Y-m-d') ;
    	
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $model->FECHA_TERMINO);
    		$model->FECHA_TERMINO = ($tmpdate === false)? null: $tmpdate ->format('Y-m-d') ;
    	
   
    		$nombretmp  = $model->NOMBRE;
    		
    		if ($model->OTRO_NOMBRE !== Curso::CURSO_PERSONALIZADO && $model->NOMBRE === NULL){
    			
    				$catalogoModel = Catalogo::findOne($model->OTRO_NOMBRE);
    			
    				$model->NOMBRE = $catalogoModel->NOMBRE;
    				
    				$model->OBJETIVO_CAPACITACION = 2;

    				$model->AREA_TEMATICA = 2625;
    				
    				
    		}
    		
    		
    	if ($model->save()) {	
    		
    		Yii::$app->session->setFlash('alert', [
    				'options'=>['class'=>'alert-success'],
    				'body'=> '<i class="fa fa-check"></i> Se ha creado el curso correctamente.',
    		]);
    		
    		Indicadores::setIndicadorPlan($planModel);
    		
    		return $this->redirect(['plan/dashboard', 'id' => $planModel->ID_PLAN]);
    	}else{
    		
    		Yii::$app->session->setFlash('alert', [
    				'options'=>['class'=>'alert-danger'],
    				'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Ha ocurrido un error, por favor revise los campos<a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		
    		$model->NOMBRE = $nombretmp;		
    		
    	}
    	
    	
    	}
    	
    			return $this->render('create_by_plan', [
    					'model' => $model,
    					'dataProvider'=>$dataProvider,
    					'searchModel'=>$searchModel
    					]);
    	
    }    
    
   
    
    
    /**
     * Updates an existing Curso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_CURSO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    
    /**
     * Updates an existing Curso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatebyplan($id_plan,$id)
    {
    	
    	$model = EmpresaUsuario::getMyCompany();
    	$planModel = Plan::findOne($id_plan);
    	$curso = $this->findModel($id);
    	$searchModel = new InstructorSearch();
    	
    	
    	
    	if($planModel->getCurrentStatus() >= Plan::STATUS_CONCLUIDO){
    		 
    		Yii::$app->session->setFlash('alert', [
    				'options'=>['class'=>'alert-danger'],
    				'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>El plan ha finalizado, no es posible realizar esta acción. <a href=\'#\' class=\'alert-link\'></a>',
    		]);
    		return $this->redirect(['plan/dashboard', 'id' => $id_plan]);
    	}
    	
    	 
    	$dataProvider = $searchModel->searchByCompany(null, $model->ID_EMPRESA);
    
    	if ($curso->load(Yii::$app->request->post())){
    		
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $curso->FECHA_INICIO);
    		$curso->FECHA_INICIO = ($tmpdate === false ) ? null : $tmpdate->format('Y-m-d') ;
    	
    		$tmpdate = \DateTime::createFromFormat('d/m/Y', $curso->FECHA_TERMINO);
    		$curso->FECHA_TERMINO = ($tmpdate === false) ? null : $tmpdate->format('Y-m-d') ;
    	
    		
    		if ($curso->save()) {
    	
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		'body'=> '<i class="fa fa-check"></i> Curso actualizado correctamente.',
    		]);
    		
    		Indicadores::setIndicadorPlan($planModel);
    		
    		return $this->redirect(Yii::$app->user->returnUrl);
    		
    		}else{
    				
    			Yii::$app->session->setFlash('alert', [
    					'options'=>['class'=>'alert-danger'],
    					'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> <a href=\'#\' class=\'alert-link\'>Ha ocurrido un error, por favor revise los campos<a href=\'#\' class=\'alert-link\'></a>',
    			]);
    			
    			return $this->render('_form_by_update', [
    					'model' => $curso,
    					'dataProvider'=>$dataProvider,
    					'searchModel'=>$searchModel
    			]);
    			
    		}
    	} 
    	
    	
    	Yii::$app->user->returnUrl = Yii::$app->request->referrer;
    	
    		return $this->render('_form_by_update', [
    				'model' => $curso,
    				'dataProvider'=>$dataProvider,
    				'searchModel'=>$searchModel
    				]);
    	
    }
    
    
    /**
     * Deletes an existing Curso model.
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
     * Finds the Curso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Curso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Curso::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
