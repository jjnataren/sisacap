<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\PuestoEmpresa;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TrabajadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trabajadores de la empresa';
$this->params['breadcrumbs'][] = $this->title;
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-users fa-lg  fa-stack-1x"></i>
							   </span>';
?>
<div class="trabajador-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square"></i> Crear Trabajador', ['createworkerbycompany'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-file-excel-o"></i> Cargar por archivo', ['load',], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'ID_TRABAJADOR',
            //'ID_EMPRESA',
            //'ROL',
            'NOMBRE',
            'APP',
            'APM',
             'CURP',
             'RFC',
             'NSS',
            // 'DOMICILIO',
            'CORREO_ELECTRONICO',
             'TELEFONO',
            
    		
    		[
    		'attribute'=>'PUESTO',
    		'content'=>function($data){
    			 
    			$tmpModel = PuestoEmpresa::findOne(['ID_PUESTO'=>$data->PUESTO, 'ACTIVO'=>1]);
    			 
    			return isset($tmpModel)?$tmpModel->NOMBRE_PUESTO: $data->PUESTO;
    			 
    		},
    		'filter'=>ArrayHelper::map(PuestoEmpresa::findAll([ 'ACTIVO'=>1]), 'ID_PUESTO','NOMBRE_PUESTO'),
    		],
    		
    		
    		
            // 'OCUPACION_ESPECIFICA',
            // 'FECHA_AGREGO',
            // 'ACTIVO',
				['class' => 'yii\grid\ActionColumn',
				'template' => '{update} {view} {delete}', // Template de los botones. Aqui se indica que botones apareceran y el orden en el que apareceran
				'buttons' => [
				'update' => function ($url, $model, $id) { //Boton actualizar
				return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => Yii::t('app', 'Actualizar')]);
				},
				 
				'view' => function ($url, $model, $id) {//Boton Ver
				return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => Yii::t('app', 'Ver')]);
				},
				 
				'delete' => function ($url, $model, $id) {//Boton borrar
				return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => Yii::t('app', 'Eliminar'), 'data' => ['confirm' => '¿Realmente quiere borrar a este trabajador?','method' => 'post',]]);
				},
				],
				'urlCreator' => function ($action, $model, $key, $index) {
					if ($action === 'update') {
						return Yii::$app->urlManager->createUrl(['/trabajador/updatebyuser', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
							
					}
				
					if ($action === 'view') {
						return Yii::$app->urlManager->createUrl(['/trabajador/viewbycompany', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
				
					}
				
					if ($action === 'delete') {
						return Yii::$app->urlManager->createUrl(['/trabajador/deletebyuser', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
							
					}
				
				
				}
				],
				    		    ]]); ?>
				    		
				    		</div>