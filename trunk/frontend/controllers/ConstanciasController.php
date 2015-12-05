<?php

namespace frontend\controllers;

use yii\base\Object;
use frontend\models\ConstanciaForm;
use Yii;
use yii\web\Controller;
use backend\models\Trabajador;
use backend\models\Constancia;
use backend\models\Indicadores;

class ConstanciasController extends \yii\web\Controller
{
	
	
	
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
	
		
    public function actionIndex()
    {
        
    	
    	
        $model = new ConstanciaForm();
        
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        
        	$trabajador = Trabajador::findOne(['RFC'=>$model->rfc_trabajador, 'ACTIVO'=>1]);
        	
        	
        	if($trabajador === null){
        		
        		Yii::$app->session->setFlash('alert', [
    			'options'=>['class'=>'alert-warning'],
    			'body'=> '<span class="glyphicon glyphicon-remove-sign"></span> No fue posible entregar la constancia revise su información',
    			]);
        		
        		$model->addError('rfc_trabajador', 'El RFC indicado no es valido o no existe favor de verificar');
        		
        		return $this->render('index', [
        				'model' => $model,
        		]);
        		
        	}
        	
        	
        	$is_constancia = false;
        	
        	foreach ( $trabajador->constancias as $constancia){
        		
        		
        		if(md5($constancia->ID_CONSTANCIA) === $model->code && $constancia->DOCUMENTO_PROBATORIO !== null ){
        			
        			Yii::$app->session->setFlash('alert', [
        					'options'=>['class'=>'alert-success'],
        					'body'=> '<span class="glyphicon glyphicon-ok-sign"></span> Constancia devuelta correctamente',
        			]);
        			
        			$model->constancia_document =  $constancia->DOCUMENTO_PROBATORIO;
        			
        			$constancia->ESTATUS = Constancia::STATUS_RECEIVED_WORKER;
        			
        			$constancia->save();
        			
        			Indicadores::setIndicadorConstancia($constancia);
        			
        			$is_constancia = true;
        			
        			break;
        		}
        		
        	}
        	
        	if(!$is_constancia){
        		
        		Yii::$app->session->setFlash('alert', [
        				'options'=>['class'=>'alert-warning'],
        				'body'=> '<span class="glyphicon glyphicon-remove-sign"></span><b> Aun no esta disponible la constancia </b> contacte al administrador',
        		]);
        	}
        	
        	/*if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
        		Yii::$app->session->setFlash('success', Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'));
        	} else {
        		Yii::$app->session->setFlash('error', \Yii::t('frontend', 'There was an error sending email.'));
        	}*/
				
        	
        }
        
        
        	return $this->render('index', [
        			'model' => $model,
        	]);
        
        
    }

}
