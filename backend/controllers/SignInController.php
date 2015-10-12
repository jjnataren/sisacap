<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 8/2/14
 * Time: 11:20 AM
 */

namespace backend\controllers;

use backend\models\LoginForm;
use backend\models\AccountForm;
use trntv\filekit\actions\UploadAction;
use Yii;
use yii\imagine\Image;
use yii\web\Controller;

class SignInController extends Controller{

    public $defaultAction = 'login';
    
    public function beforeAction($action) {
    	$this->enableCsrfValidation = false;
    	return parent::beforeAction($action);
    }
    

    public function actions(){
        return [
            'avatar-upload'=>[
                'class'=>UploadAction::className(),
                'fileProcessing'=>function($file){
                    Image::thumbnail($file->path->getPath(), 215,215)
                        ->save($file->path->getPath());
                }
            ]
        ];
    }

    

    public function actionLogin()
    {
        $this->layout = '_base';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
       //return $this->redirect( Yii::getAlias('@frontendUrl'));
        return $this->goHome();
    }

    public function actionProfile()
    {
        $model = Yii::$app->user->identity->profile;
        if($model->load($_POST) && $model->save()){
            Yii::$app->session->setFlash('alert', [
                'options'=>['class'=>'alert-success'],
                'body'=>Yii::t('frontend', 'tu perfil ha sido actualizado satisfactoriamente')
            ]);
            return $this->refresh();
        }
        return $this->render('profile', ['model'=>$model]);
    }

    public function actionAccount(){
        $user = Yii::$app->user->identity;
        $model = new AccountForm();
        $model->username = $user->username;
        if($model->load($_POST) && $model->validate()){
            $user->username = $model->username;
            $user->setPassword($model->password);
            $user->save();
            Yii::$app->session->setFlash('alert', [
                'options'=>['class'=>'alert-success'],
                'body'=>Yii::t('frontend', 'Your profile has been successfully saved')
            ]);
            return $this->refresh();
        }
        return $this->render('account', ['model'=>$model]);
    }

}