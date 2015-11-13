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
    		
    		
    		$passphrase = 'My secret';
    		
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
    		
    		
    		$representante->save();
    		
//     		$passphrase = 'My secret';
//     		 $cipher = 'mcrypt.tripledes';
//     		 $mode = 'ofb';
    		
//     		// Turn a human readable passphrase
//     		// into a reproducible iv/key pair
    		
//     		$iv = substr(md5("\x1B\x3C\x58".$passphrase, true), 0, 8);
//     		$key = substr(md5("\x2D\xFC\xD8".$passphrase, true) .
//     				md5("\x2D\xFC\xD9".$passphrase, true), 0, 24);
//     		$opts = array('iv' => $iv, 'key' => $key, 'mode' => 'stream');
    		
//     		//$typeencrypt  = mcrypt_module_open($cipher, '', $mode, '');
    		
//     		// Open the file
//     		$fp = fopen($file->tempName, 'wb');
    		
//     		// Add the Mcrypt stream filter
//     		// We use Triple DES here, but you
//     		// can use other encryption algorithm here
//     		stream_filter_append($fp, $cipher, STREAM_FILTER_WRITE, $opts);
    		
    		// Wrote some contents to the file
    		//  fwrite($fp, 'Secret secret secret data');
    		
    		// Close the file
    		//  fclose($fp);
    		 
    		//$fileReturn = Yii::$app->fileStorage->save($file);
    		 
    		//$file = fopen($_FILES['SIGN_PICTURE']['tmp_name'],"r");
    		 
    		// 	$content = fread($file,filesize($_FILES['SIGN_PICTURE']['tmp_name']));
    		
    	}else{
    		
    		
    		$passphrase = 'My secret';
    		
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
    
    		//$file = UploadedFile::getInstanceByName('SIGN_PICTURE');
    		
    		//$fileReturn = Yii::$app->fileStorage->save($file);
    		
    		
    		/*$model->SIGN_PICTURE = $fileReturn->url;
    		
    		if( $representante->save()) {
    			Yii::$app->session->setFlash('alert', [
    					'options'=>['class'=>'alert-success'],
    					 
    					'body'=> '<i class="fa fa-check"></i> Imagen guardada correctamente.',
    			]);
    		}
    		return $this->redirect(['viewbycompany', 'id' => $representante->ID_REPRESENTANTE_LEGAL]);
    	}
    	else {
    		return $this->render('manage-sign-pic', [
    				'model' => $representante,
    		]);
    	}*/
    	 
    
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
