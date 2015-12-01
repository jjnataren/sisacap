<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\models\UserForm;
use backend\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserForm();
        $model->setScenario('create');
        if ($model->load(Yii::$app->request->post())) {
        	
        	$plainPassword = $model->password;
            if ($model->save()) {
            	
            	
           if ($model->status) 	{
            $message = 	$this->sendNewUserNotification($model,$plainPassword);
            
            Yii::$app->session->setFlash('alert', [
            		'options'=>['class'=>'alert-info'],
            		 
            		'body'=> '<i class="fa fa-check"></i> ' .$message,
            ]);
           }
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    
    
    
    
    
    /**
     * Updates an existing User model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = new UserForm();
        $model->model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    private function sendNewUserNotification($user,$plainPassword)
    {
    	
    	

    	 
    	$this->layout = '@app/mail/html';
    	 
    	$email = $user->email;
    	
    	if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
    	
    		return '<h2><i class="fa fa-frown-o"></i>&nbsp;Ha ocurrido un error al enviar la notificación</h2>' .
    				'<br /> Detalle del error: <br />'. 'El trabajador <strong>no tiene un correo electronico valido</strong>';
    	}
    	
    	
    	 
    	try {
    	
    		Yii::$app->mail->compose('@app/views/user/notifications/new_user', ['model'=>$user])
    		->setFrom("sisacap@gmail.com")
    		->setTo($email)
    		->setSubject('Notificaciones SISACAP.  Alta de cuenta  acceso')
    		->send();
    	

    	}catch (\Exception $e){
    	
    		return '<h2><i class="fa fa-frown-o"></i>&nbsp;Ha ocurrido un error al enviar la notificación,  por favor contacte al administrador.</h2>' .
    				'<br /> Detalle del error: <br />'.
    				$e->getMessage();
    	
    	}
    	 
    	return '<h1><i class="fa  fa-thumbs-o-up"></i>&nbsp; ¡Nuevo Usuario  creado y  notificado por correo correctamente! </h1>';
    	
    	
    }
    
}
