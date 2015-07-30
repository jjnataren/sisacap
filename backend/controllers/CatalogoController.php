<?php

namespace backend\controllers;

use Yii;
use backend\models\Catalogo;
use backend\models\search\CatalogoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatalogoController implements the CRUD actions for Catalogo model.
 */
class CatalogoController extends Controller
{
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
     * Lists entidades federativas .
     * @return mixed
     */
    public function actionMunicipios()
    {
    	$searchModel = new CatalogoSearch();
    	
    	$dataProvider = $searchModel->searchByCategoria(Yii::$app->request->queryParams,Catalogo::CATEGORIA_MUNICIPIOS);
    	
    	return $this->render('municipios/index.php', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    	]);
    }
    
    
    /**
     * Updates an entidad federativa
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionMunicipiosActualizar($id)
    {
    	$model = $this->findModelByCategory($id,Catalogo::CATEGORIA_MUNICIPIOS);
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['municipios-ver','id'=>$id]);
    	} else {
    		return $this->render('municipios/update.php', [
    				'model' => $model,
    		]);
    	}
    }
    
    
    /**
     * Displays a single Catalogo model.
     * @param integer $id
     * @return mixed
     */
    public function actionMunicipiosVer($id)
    {
    	return $this->render('municipios/view.php', [
    			'model' => $this->findModelByCategory($id,Catalogo::CATEGORIA_MUNICIPIOS),
    	]);
    }
    
    
    /**
     * Updates an entidad federativa
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionMunicipiosBorrar($id)
    {
    	$this->findModelByCategory($id,Catalogo::CATEGORIA_MUNICIPIOS)->delete();
    
    	return $this->redirect(['municipios']);
    
    }
    
    /**
     * Creates a new Catalogo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionMunicipiosCrear()
    {
    	$model = new Catalogo();
    	$model->ACTIVO = 1;
    	$model->CATEGORIA = Catalogo::CATEGORIA_MUNICIPIOS;
    	 
    	 
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['municipios-ver', 'id' => $model->ID_ELEMENTO]);
    	} else {
    		return $this->render('municipios/create.php', [
    				'model' => $model,
    		]);
    	}
    }
    
    
    
    /**
     * Lists entidades federativas .
     * @return mixed
     */
    public function actionEntidadesFederativas()
    {
    	$searchModel = new CatalogoSearch();
    	 
    	$dataProvider = $searchModel->searchByCategoria(Yii::$app->request->queryParams,Catalogo::CATEGORIA_ENTIDADES_FEDERATIVAS);
    	 
    	return $this->render('entidad-federativa/index.php', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    	]);
    }
    
    
    
    /**
     * Updates an entidad federativa
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionEntidadesFederativasActualizar($id)
    {
    	$model = $this->findModelByCategory($id,Catalogo::CATEGORIA_ENTIDADES_FEDERATIVAS);
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['entidades-federativas-ver','id'=>$id]);
    	} else {
    		return $this->render('entidad-federativa/update.php', [
    				'model' => $model,
    		]);
    	}
    }
    
    
    /**
     * Displays a single Catalogo model.
     * @param integer $id
     * @return mixed
     */
    public function actionEntidadesFederativasVer($id)
    {
    	return $this->render('entidad-federativa/view.php', [
    			'model' => $this->findModelByCategory($id,Catalogo::CATEGORIA_ENTIDADES_FEDERATIVAS),
    	]);
    }
    
    /**
     * Updates an entidad federativa
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionEntidadesFederativasBorrar($id)
    {
    	  $this->findModelByCategory($id,Catalogo::CATEGORIA_ENTIDADES_FEDERATIVAS)->delete();

        return $this->redirect(['entidades-federativas']);
        
    }
    
    /**
     * Creates a new Catalogo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionEntidadesFederativasCrear()
    {
    	$model = new Catalogo();
    	$model->ACTIVO = 1;
    	$model->CATEGORIA = Catalogo::CATEGORIA_ENTIDADES_FEDERATIVAS;
    	
    	
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['entidades-federativas-ver', 'id' => $model->ID_ELEMENTO]);
    	} else {
    		return $this->render('entidad-federativa/create.php', [
    				'model' => $model,
    		]);
    	}
    }
    
    /**
     * Lists all Catalogo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatalogoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Catalogo model.
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
     * Creates a new Catalogo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Catalogo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_ELEMENTO]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Catalogo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_ELEMENTO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Catalogo model.
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
     * Finds the Catalogo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Catalogo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Catalogo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    
    /**
     * Finds the Catalogo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Catalogo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelByCategory($id, $category)
    {
    	if (($model = Catalogo::findOne(['ID_ELEMENTO'=>$id,'CATEGORIA'=>$category])) !== null) {
    		return $model;
    	} else {
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    }
}
