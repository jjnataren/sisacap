<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmpresaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comisiones en mi empresa';
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="glyphicon glyphicon-copyright-mark -lg  fa-stack-1x"></i>
							   </span>';
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						<?= Yii::t('backend', 'Todas mis comisiones') ?> <small></small> </h3>
					</div>
					<div class="panel-body">
<div class="empresa-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square"></i> Crear comision', ['createbycompany'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
			'ID_COMISION_MIXTA',	
            'ALIAS',
            'FECHA_CONSTITUCION',
    		'FECHA_ELABORACION',
    		'NUMERO_INTEGRANTES',
            //'NOMBRE_RAZON_SOCIAL',
            //'RFC',
            //'NSS',
            // 'CURP',	
            // 'MORAL',
            // 'CALLE',
            // 'NUMERO_EXTERIOR',
            // 'NUMERO_INTERIOR',
            // 'COLONIA',
            // 'ENTIDAD_FEDERATIVA',
            // 'LOCALIDAD',
            // 'TELEFONO',
            // 'MUNICIPIO_DELEGACION',
            // 'GIRO_PRINCIPAL',
            // 'NUMERO_TRABAJADORES',
            // 'CODIGO_POSTAL',
            // 'FAX',
            // 'CORREO_ELECTRONICO',
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
    		return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => Yii::t('app', 'Eliminar'), 'data' => ['confirm' => '¿Realmente quiere borrar esta comisión?','method' => 'post',]]);
    		},
    		],
    		'urlCreator' => function ($action, $model, $key, $index) {
    			if ($action === 'update') {
    				return Yii::$app->urlManager->createUrl(['/comision-mixta-cap/updatebyuser', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
    					
    			}
    				
    			if ($action === 'view') {
    				return Yii::$app->urlManager->createUrl(['/comision-mixta-cap/viewbycompany', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
    		
    			}
    				
    			if ($action === 'delete') {
    				return Yii::$app->urlManager->createUrl(['/comision-mixta-cap/deletebyuser', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
    					
    			}
    				
    				
    		}
    		],
    		    ]]); ?>
    		
    		</div>
    		</div>
    		</div>
    		</div>
    		
    		    		