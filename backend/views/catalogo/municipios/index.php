<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Catalogo;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CatalogoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Municipios por entidad federativa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogo-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear nuevo', ['municipios-crear'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'ID_ELEMENTO',
        		
            'CLAVE',
            'NOMBRE',
            'DESCRIPCION',
        		[
        		'attribute'=>'ELEMENTO_PADRE',
        		'label'=>'Entidad federativa',
        		'content'=>function($data){
        		
        			//$tmpModel = PuestoEmpresa::findOne(['ID_PUESTO'=>$data->PUESTO, 'ACTIVO'=>1]);
        		
        			return isset($data->eLEMENTOPADRE)?$data->eLEMENTOPADRE->NOMBRE: 'no establecido';
        		
        		},
        		'filter'=>ArrayHelper::map(Catalogo::findAll([ 'ACTIVO'=>1,'CATEGORIA'=>1]), 'ID_ELEMENTO','NOMBRE'),
        		],
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
    		return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => Yii::t('app', 'Eliminar'), 'data' => ['confirm' => '¿Realmente quiere borrar este municipio?','method' => 'post',]]);
    		},
    		],
    		'urlCreator' => function ($action, $model, $key, $index) {
    			    				
    			if ($action === 'update') {
    				return Yii::$app->urlManager->createUrl(['/catalogo/municipios-actualizar', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
    		
    			}
    				
    			if ($action === 'delete') {
    				return Yii::$app->urlManager->createUrl(['/catalogo/municipios-borrar', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
    					
    			}
    				
    				
    		}
    		],
        ],
    ]); ?>

</div>
