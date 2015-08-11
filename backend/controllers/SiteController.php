<?php
namespace backend\controllers;

use Yii;

/**
 * Site controller
 */
class SiteController extends \yii\web\Controller
{
	
	
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
	
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
        return parent::beforeAction($action);
    }
}
