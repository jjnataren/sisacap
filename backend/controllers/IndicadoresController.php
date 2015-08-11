<?php

namespace backend\controllers;

class IndicadoresController extends \yii\web\Controller
{
	
	
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
	
	
    public function actionIndex()
    {
        return $this->render('index');
    }

}
