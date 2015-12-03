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
    
    //aqui empieza catalogo area tematica

    public function actionArea()
    {
    	$searchModel = new CatalogoSearch();
    
    	$dataProvider = $searchModel->searchByCategoria(Yii::$app->request->queryParams,Catalogo::CATEGORIA_AREA_TEMATI);
    
    	return $this->render('area/index.php', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    }
    
    public function actionAreaActualizar($id)
    {
    	$model = $this->findModelByCategory($id,Catalogo::CATEGORIA_AREA_TEMATI);
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Area actualizada correctamente.',
    		]);
    		return $this->redirect(['area','id'=>$id]);
    	} else {
    		return $this->render('area/update.php', [
    				'model' => $model,
    				]);
    	}
    }
    
    public function actionAreaVer($id)
    {
    	return $this->render('area/view.php', [
    			'model' => $this->findModelByCategory($id,Catalogo::CATEGORIA_AREA_TEMATI),
    			]);
    }
    
    public function actionAreaBorrar($id)
    {
    	$this->findModelByCategory($id,Catalogo::CATEGORIA_AREA_TEMATI)->delete();
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	
    	'body'=> '<i class="fa fa-check"></i> Area borrada correctamente.',
    	]);
    
    	return $this->redirect(['area']);
    
    }
    
    public function actionAreaCrear()
    {
    	$model = new Catalogo();
    	$model->ACTIVO = 1;
    	$model->CATEGORIA = Catalogo::CATEGORIA_AREA_TEMATI;
    
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Area creada correctamente.',
    		]);
    		return $this->redirect(['area', 'id' => $model->ID_ELEMENTO]);
    	} else {
    		return $this->render('area/create.php', [
    				'model' => $model,
    				]);
    	}
    }
    
    
    //aqui empieza  ocupaciones 
    public function actionOcupaciones()
    {
    	$searchModel = new CatalogoSearch();
    	 
    	$dataProvider = $searchModel->searchByCategoria(Yii::$app->request->queryParams,Catalogo::CATEGORIA_OCUPACION);
    	 
    	return $this->render('ocupaciones/index.php', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    }
    
    public function actionOcupacionesActualizar($id)
    {
    	$model = $this->findModelByCategory($id,Catalogo::CATEGORIA_OCUPACION);
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Ocupacion actualizada correctamente.',
    		]);
    		return $this->redirect(['ocupaciones','id'=>$id]);
    	} else {
    		return $this->render('ocupaciones/update.php', [
    				'model' => $model,
    				]);
    	}
    }
    
    public function actionOcupacionesVer($id)
    {
    	return $this->render('ocupaciones/view.php', [
    			'model' => $this->findModelByCategory($id,Catalogo::CATEGORIA_OCUPACION),
    			]);
    }
    
    public function actionOcupacionesBorrar($id)
    {
    	$this->findModelByCategory($id,Catalogo::CATEGORIA_OCUPACION)->delete();
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	
    	'body'=> '<i class="fa fa-check"></i> Ocupacion borrada correctamente.',
    	]);
    
    	return $this->redirect(['ocupaciones']);
    
    }
    
    public function actionOcupacionesCrear()
    {
    	$model = new Catalogo();
    	$model->ACTIVO = 1;
    	$model->CATEGORIA = Catalogo::CATEGORIA_OCUPACION;
    
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Ocupacion creada correctamente.',
    		]);
    		return $this->redirect(['ocupaciones', 'id' => $model->ID_ELEMENTO]);
    	} else {
    		return $this->render('ocupaciones/create.php', [
    				'model' => $model,
    				]);
    	}
    }
    
    
    //aqui empieca el catalogo de giros 
    public function actionGiro()
    {
    	$searchModel = new CatalogoSearch();
    
    	$dataProvider = $searchModel->searchByCategoria(Yii::$app->request->queryParams,Catalogo::CATEGORIA_GIRO);
    
    	return $this->render('giro/index.php', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    }
    
    public function actionGiroActualizar($id)
    {
    	$model = $this->findModelByCategory($id,Catalogo::CATEGORIA_GIRO);
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Giro actualizado correctamente.',
    		]);
    		return $this->redirect(['giro','id'=>$id]);
    	} else {
    		return $this->render('giro/update.php', [
    				'model' => $model,
    				]);
    	}
    }
    
    public function actionGiroVer($id)
    {
    	return $this->render('giro/view.php', [
    			'model' => $this->findModelByCategory($id,Catalogo::CATEGORIA_GIRO),
    			]);
    }
    
    public function actionGiroBorrar($id)
    {
    	$this->findModelByCategory($id,Catalogo::CATEGORIA_GIRO)->delete();
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	
    	'body'=> '<i class="fa fa-check"></i> Giro borrado correctamente.',
    	]);
    
    	return $this->redirect(['giro']);
    
    }
    
    public function actionGiroCrear()
    {
    	$model = new Catalogo();
    	$model->ACTIVO = 1;
    	$model->CATEGORIA = Catalogo::CATEGORIA_GIRO;
    
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Giro creado correctamente.',
    		]);
    		return $this->redirect(['giro', 'id' => $model->ID_ELEMENTO]);
    	} else {
    		return $this->render('giro/create.php', [
    				'model' => $model,
    				]);
    	}
    }
    
    
    //aqui empiesa el catalogo de cursos
    public function actionCurso()
    {
    	$searchModel = new CatalogoSearch();
    
    	$dataProvider = $searchModel->searchByCategoria(Yii::$app->request->queryParams,Catalogo::CATEGORIA_CURSO);
    
    	return $this->render('cursos/index.php', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    }
    
    public function actionCursoActualizar($id)
    {
    	$model = $this->findModelByCategory($id,Catalogo::CATEGORIA_CURSO);
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Plantilla de curso actualizada correctamente.',
    		]);
    		return $this->redirect(['curso','id'=>$id]);
    	} else {
    		return $this->render('cursos/update.php', [
    				'model' => $model,
    				]);
    	}
    }
    
    public function actionCursoVer($id)
    {
    	return $this->render('cursos/view.php', [
    			'model' => $this->findModelByCategory($id,Catalogo::CATEGORIA_CURSO),
    			]);
    }
    
    public function actionCursoBorrar($id)
    {
    	$this->findModelByCategory($id,Catalogo::CATEGORIA_CURSO)->delete();
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	
    	'body'=> '<i class="fa fa-check"></i> Plantilla de curso borrada correctamente.',
    	]);
    	return $this->redirect(['curso']);
    
    }
    
    public function actionCursoCrear()
    {
    	$model = new Catalogo();
    	$model->ACTIVO = 1;
    	$model->CATEGORIA = Catalogo::CATEGORIA_CURSO;
    
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Plantilla de curso creada correctamente.',
    		]);
    		return $this->redirect(['curso', 'id' => $model->ID_ELEMENTO]);
    	} else {
    		return $this->render('cursos/create.php', [
    				'model' => $model,
    				]);
    	}
    }
    
    
//aqui empieza el catalogo ntcl

    public function actionNtcl()
    {
    	$searchModel = new CatalogoSearch();
    
    	$dataProvider = $searchModel->searchByCategoria(Yii::$app->request->queryParams,Catalogo::CATEGORIA_NTCL);
    
    	return $this->render('ntcl/index.php', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    }
    
    public function actionNtclActualizar($id)
    {
    	$model = $this->findModelByCategory($id,Catalogo::CATEGORIA_NTCL);
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> NTCL actualizado correctamente.',
    		]);
    		return $this->redirect(['ntcl','id'=>$id]);
    	} else {
    		return $this->render('ntcl/update.php', [
    				'model' => $model,
    				]);
    	}
    }
    
    public function actionNtclVer($id)
    {
    	return $this->render('ntcl/view.php', [
    			'model' => $this->findModelByCategory($id,Catalogo::CATEGORIA_NTCL),
    			]);
    }
    
    public function actionNtclBorrar($id)
    {
    	$this->findModelByCategory($id,Catalogo::CATEGORIA_NTCL)->delete();
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	
    	'body'=> '<i class="fa fa-check"></i> NTCL borrado correctamente.',
    	]);
    
    	return $this->redirect(['ntcl']);
    
    }
    
    public function actionNtclCrear()
    {
    	$model = new Catalogo();
    	$model->ACTIVO = 1;
    	$model->CATEGORIA = Catalogo::CATEGORIA_NTCL;
    
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> NTCL creado correctamente.',
    		]);
    		return $this->redirect(['ntcl', 'id' => $model->ID_ELEMENTO]);
    	} else {
    		return $this->render('ntcl/create.php', [
    				'model' => $model,
    				]);
    	}
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
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Municipio actualizado correctamente.',
    		]);
    		return $this->redirect(['municipios','id'=>$id]);
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
    	Yii::$app->session->setFlash('alert', [
    	'options'=>['class'=>'alert-success'],
    	
    	'body'=> '<i class="fa fa-check"></i> Municipio borrado correctamente.',
    	]);
    
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
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Municipio creado correctamente.',
    		]);
    		return $this->redirect(['municipios', 'id' => $model->ID_ELEMENTO]);
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
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Entidad actualizada correctamente.',
    		]);
    		return $this->redirect(['entidades-federativas','id'=>$id]);
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
    	  Yii::$app->session->setFlash('alert', [
    	  'options'=>['class'=>'alert-success'],
    	  
    	  'body'=> '<i class="fa fa-check"></i> Entidad borrada correctamente.',
    	  ]);

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
    		Yii::$app->session->setFlash('alert', [
    		'options'=>['class'=>'alert-success'],
    		
    		'body'=> '<i class="fa fa-check"></i> Entidad creada correctamente.',
    		]);
    		return $this->redirect(['entidades-federativas', 'id' => $model->ID_ELEMENTO]);
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
