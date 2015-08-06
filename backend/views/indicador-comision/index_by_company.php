<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\IndicadorComisionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-bell fa-stack-1x"></i>
							   </span>';
$this->title = 'Notificacion de la comisión mixta';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="indicador-plan-index">
<h4>Informe de notificaciones de la comisión mixta de capacitación, adiestramiento y productividad</h4>
   <bt>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_COMISION',
    		
    		[
    		'attribute'=>'ID_COMISION',
    		'label'=>'ALIAS',
    		'content'=>function($data){
    			 
    			return $data->iDCOMISION->ALIAS;
    			 
    			},
    		
    		],
    		
            'DESCRIPCION',
            'DATA',
        
    		
    		
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
					return Yii::$app->urlManager->createUrl(['/indicador-comision/view-by-company', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
			
				}
					
				if ($action === 'delete') {
					return Yii::$app->urlManager->createUrl(['/indicador-comision/delete-by-company', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
						
				}
					
					
			}
			],
		],
    ]); ?>

</div>










