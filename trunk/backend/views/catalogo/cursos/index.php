<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Catalogo;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CatalogoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catálogo de cursos.';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogo-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear nuevo', ['curso-crear'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
        		
            'CLAVE',
            'NOMBRE',
            'DESCRIPCION',
        		
            // 'ORDEN',
            // 'CATEGORIA',
             ['attribute' =>'ACTIVO',
             	'content'=>function($data){ return  ($data->ACTIVO)?'SI':'NO'; },
             	'filter'=>[1=>'SI',2=>'NO']
             ]
             
             ,
      

           	['class' => 'yii\grid\ActionColumn',
    		'template' => '{update} {delete}', // Template de los botones. Aqui se indica que botones apareceran y el orden en el que apareceran
    		'buttons' => [

    		'update' => function ($url, $model, $id) { //Boton actualizar
    		return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => Yii::t('app', 'Actualizar')]);
    		},
    			
    			
    		'delete' => function ($url, $model, $id) {//Boton borrar
    		return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => Yii::t('app', 'Eliminar'), 'data' => ['confirm' => '¿Realmente quiere borrar este curso?','method' => 'post',]]);
    		},
    		],
    		'urlCreator' => function ($action, $model, $key, $index) {
    			    				
    			if ($action === 'update') {
    				return Yii::$app->urlManager->createUrl(['/catalogo/curso-actualizar', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
    		
    			}
    				
    			if ($action === 'delete') {
    				return Yii::$app->urlManager->createUrl(['/catalogo/curso-borrar', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
    					
    			}
    				
    				
    		}
    		],
        ],
    ]); ?>

</div>
