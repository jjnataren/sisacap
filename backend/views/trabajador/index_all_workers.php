<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\PuestoEmpresa;
use yii\helpers\ArrayHelper;
use backend\models\Empresa;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TrabajadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Todos los trabajadores. ';
$this->params['breadcrumbs'][] = $this->title;
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-users fa-lg  fa-stack-1x"></i>
							   </span>';
?>


   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						<?= Yii::t('backend', 'Todos los trabajadores. Empresa/establecimientos') ?> <small></small> </h3>
					</div>
					<div class="panel-body">
<div class="trabajador-index">
    
  

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'ID_TRABAJADOR',
           [
    		'attribute'=>'ID_EMPRESA',
    		'content'=>function($data){
    			 
    			$tmpModel = Empresa::findOne(['ID_EMPRESA'=>$data->ID_EMPRESA]);
    			 
    			return isset($tmpModel)?$tmpModel->NOMBRE_COMERCIAL: $data->NOMBRE_COMERCIAL;
    			 
    		},
    		'filter'=>ArrayHelper::map(Empresa::findBySql('select * from tbl_empresa where id_empresa = (select ID_EMPRESA from tbl_empresa_usuario where id_usuario  = '.Yii::$app->user->id.' )  OR id_empresa_padre = (select id_empresa from tbl_empresa_usuario where id_usuario = '.Yii::$app->user->id.' )' )->all(), 'ID_EMPRESA','NOMBRE_COMERCIAL'),
    		],
            //'ROL',
            'NOMBRE',
            'APP',
            'APM',
             'CURP',
             'RFC',
            // 'NSS',
            // 'DOMICILIO',
            'CORREO_ELECTRONICO',
           //  'TELEFONO',
            
    		
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
						return Yii::$app->urlManager->createUrl(['/trabajador/updatebyall', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
							
					}
				
					if ($action === 'view') {
						return Yii::$app->urlManager->createUrl(['/trabajador/viewbyall', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
				
					}
				
					if ($action === 'delete') {
						return Yii::$app->urlManager->createUrl(['/trabajador/deletebyall', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
							
					}
				
				
				}
				],
				    		    ]]); ?>
				    		</div>
				    		</div>
				    		</div>
				    		
				    		</div>