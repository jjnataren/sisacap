<?php

namespace backend\controllers;

use Yii;
use backend\models\RepresentanteLegal;
use backend\models\RepresentanteLegalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\EmpresaUsuario;
use yii\web\UploadedFile;

/**
 * RepresentanteLegalController implements the CRUD actions for RepresentanteLegal model.
 */
class RepresentanteLegalController extends Controller
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
     * Lists all RepresentanteLegal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RepresentanteLegalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RepresentanteLegal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionViewbycompany(){
    
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id]);
    	 
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    	 
    	$company= $model->iDEMPRESA;
    	
    	$representante =$company->iDREPRESENTANTELEGAL; 
    	 
    	return $this->render('view_by_company',['model'=>$representante]);
    	 
    }
    
    
    public function actionViewByInstructor(){
    
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id]);
    
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    
    	$company= $model->iDEMPRESA;
    	 
    	$representante =$company->iDREPRESENTANTELEGAL;
    
    	return $this->render('view_by_instructor',['model'=>$representante]);
    
    }
    /**
     * Creates a new RepresentanteLegal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RepresentanteLegal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_REPRESENTANTE_LEGAL]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatebycompany(){
    
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id]);
    
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    
    	$company= $model->iDEMPRESA;
    	 
    	$representante =$company->iDREPRESENTANTELEGAL;
    	
    	$representante->SIGN_PICTURE = null;
    	
    	if ($representante->load(Yii::$app->request->post())) {
    		
    		
    		if( $representante->save()) {
    			Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-success'],
    			
    			'body'=> '<i class="fa fa-check"></i> Representante legal actualizado correctamente.',
    			]);
    	}
    		return $this->redirect(['viewbycompany', 'id' => $representante->ID_REPRESENTANTE_LEGAL]);
    	}
     else {
    		return $this->render('update_by_company', [
    				'model' => $representante,
    				]);
    	}
    	
    
    	return $this->render('update_by_company',['model'=>$representante]);
    
    }
    
    
    
    
    /**
     * shows signing picture
     * @throws NotFoundHttpException
     * @return \yii\web\Response|string
     */
    public function actionViewSignPic(){
    	   	
    	$modelEmpresa = EmpresaUsuario::getMyCompany();
    	
    	$representante =$modelEmpresa->iDEMPRESA->iDREPRESENTANTELEGAL;
    	
    	$image64Data = null;
    	
    	$passwordoriginal  = $representante->SIGN_PASSWD;
    	
    	if ($representante->load(Yii::$app->request->post())) {
    		
    		
    	
    		
    		$passphrase = md5($representante->SIGN_PASSWD);
    		
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
    		
    		$fp = fopen($representante->SIGN_PICTURE, 'r');
    		stream_filter_append($fp, 'mdecrypt.tripledes', STREAM_FILTER_READ, $opts);
    		$data = rtrim(stream_get_contents($fp));
    		fclose($fp);
    		
    		$image64Data =  $data;
    		
    		}
    		
    	}
    	
    	
    	
    	return $this->render('view_sign_pic',['model'=>$representante, 'SIGN_IMAGE'=> base64_encode($image64Data)]);
    	
    }
    
    
    
    /**
     * Manages signing picture
     * @throws NotFoundHttpException
     * @return \yii\web\Response|string
     */
    public function actionManageSignPic(){
    
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id]);
    
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    
    	$company= $model->iDEMPRESA;
    
    	$representante =$company->iDREPRESENTANTELEGAL;
    	
      	$image64Data = null;
    	
    	if ($representante->load(Yii::$app->request->post())) {
    		
    		
    		$file = UploadedFile::getInstance($representante,'SIGN_PICTURE');
    		
    		if ($file === null){
    			 
    			Yii::$app->session->setFlash('alert', [
    					'options'=>['class'=>'alert-danger'],
    					 
    					'body'=> '<i class="fa fa-info"></i> Debe seleccionar un archivo con la firma digitalizada',
    			]);
    			return $this->render('manage-sign-pic',['model'=>$representante, 'SIGN_IMAGE'=> base64_encode($image64Data)]);
    			 
    		}
    		
    		
    		$passphrase = md5($representante->SIGN_PASSWD);
    		
    		
    		
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
    		
    		$representante->SIGN_PICTURE = $fileReturn->url;
    		$representante->SIGN_PASSWD = $passphrase;
    		$representante->SIGN_EXTENSION = $file->extension;
    		$representante->SIGN_CREATED = date("Y-m-d H:i:s");
    		
    		
    		if($representante->save() ) {
    		
    			Yii::$app->session->setFlash('alert', [
    					'options'=>['class'=>'alert-success'],
    					 
    					'body'=> '<i class="fa fa-check"></i> Firma guardada y encriptada correctamente, ¡ Puede desencriptar la firma  proporcionando la constraseña nuevamente !.',
    			]);
    			
    			return $this->redirect(['view-sign-pic']);
    		}

    		
    	}
    
    
    	 
    
    	return $this->render('manage-sign-pic',['model'=>$representante, 'SIGN_IMAGE'=> base64_encode($image64Data)]);
    
    }
    
    /**
     * Updates an existing RepresentanteLegal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_REPRESENTANTE_LEGAL]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RepresentanteLegal model.
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
     * Finds the RepresentanteLegal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RepresentanteLegal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RepresentanteLegal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
