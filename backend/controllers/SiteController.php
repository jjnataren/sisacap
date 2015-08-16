<?php
namespace backend\controllers;

use Yii;

/**
 * Site controller
 */
class SiteController extends \yii\web\Controller
{
	
	

	
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    
    
    
    
    public function actionIndex(){
    	
    	$this->render('error');
    }
    
    
    
    public function beforeAction($action)
    {
        $this->layout = Yii::$app->user->isGuest ? '_base' : 'main';
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
}
