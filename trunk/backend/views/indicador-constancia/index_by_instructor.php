<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\IndicadorPlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-bell fa-stack-1x"></i>
							   </span>';
$this->title = 'Notificaciones de las constancias de adiestramiento';
$this->params['breadcrumbs'][] = $this->title;

?>


<h4>Informe notificaciones de las constancias de adiestramiento </h4>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
       

            'ID_CONSTANCIA',
    		
    		[
    		'attribute'=>'ID_CONSTANCIA',
    		'label'=>'Curso',
    		'content'=>function($data){
    			 
    			return $data->iDCONSTANCIA->iDCURSO->NOMBRE;
    			 
    			},
    		
    		],
    		
    		[
    		'attribute'=>'ID_CONSTANCIA',
    		'label'=>'Trabajador',
    		'content'=>function($data){
    		
    			
    		
    			return isset($data->iDCONSTANCIA->iDTRABAJADOR) ? $data->iDCONSTANCIA->iDTRABAJADOR->NOMBRE . ' ' . $data->iDCONSTANCIA->iDTRABAJADOR->APP . ' ' . $data->iDCONSTANCIA->iDTRABAJADOR->APM . ' '  : '<i>no establecido</i>';
    		
    		},
    		
    		],
    		
    		[
    		'attribute'=>'TITULO',
    		'label'=>'Evento',
			],
			[
			'attribute'=>'DATA',
			'label'=>'Descripción',
			],
               		
    		
            // 'ID_ALERTA',
            // 'FECHA_CREACION',
            // 'FECHA_INICIO_VIGENCIA',
            // 'FECHA_FIN_VIGENCIA',
            // 'ESTATUS',
            // 'ACTIVO',
            // 'ID_USUARIO',

            ['class' => 'yii\grid\ActionColumn',
			'template' => '{view} {delete}', // Template de los botones. Aqui se indica que botones apareceran y el orden en el que apareceran
			'buttons' => [
				
			'view' => function ($url, $model, $id) {//Boton Ver
			return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => Yii::t('app', 'Ver')]);
			},
				
			'delete' => function ($url, $model, $id) {//Boton borrar
			return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => Yii::t('app', 'Eliminar'), 'data' => ['confirm' => '¿Realmente quiere borrar esta notificación?','method' => 'post',]]);
			},
			],
			'urlCreator' => function ($action, $model, $key, $index) {
					
				if ($action === 'view') {
					return Yii::$app->urlManager->createUrl(['/indicador-constancia/view-by-instructor', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
			
				}
					
				if ($action === 'delete') {
					return Yii::$app->urlManager->createUrl(['/indicador-constancia/delete-by-instructor', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
						
				}
					
					
			}
			],
		],
    ]); ?>


