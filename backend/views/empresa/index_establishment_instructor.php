<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Catalogo;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmpresaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Establecimientos de la empresa';
$this->params['subtitle'] = '';

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-university fa-stack-1x"></i>
							   </span>';
$this->params['breadcrumbs'][] = ['label' => '
Establecimientos 
', 'url' => ['']];
							
?>
<div class="empresa-index">

  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

       <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID_EMPRESA',
            'NOMBRE_COMERCIAL',
            //'ID_REPRESENTANTE_LEGAL',
            //'NOMBRE_CENTRO_TRABAJO',
            //'NOMBRE_RAZON_SOCIAL',
            //'RFC',
            //'NSS',
            // 'CURP',
            // 'MORAL',
            
            // 'NUMERO_EXTERIOR',
            // 'NUMERO_INTERIOR',
            // 'COLONIA',
             //'ENTIDAD_FEDERATIVA',
            [
			'attribute'=>'ENTIDAD_FEDERATIVA',
    		'content'=>function($data){
    			
    			$tmpModel = Catalogo::findOne(['ID_ELEMENTO'=>$data->ENTIDAD_FEDERATIVA,'CATEGORIA'=>1, 'ACTIVO'=>1]);
    			
    			return isset($tmpModel)?$tmpModel->NOMBRE: $data->ENTIDAD_FEDERATIVA;
    			
	    		},
    		'filter'=>ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>1, 'ACTIVO'=>1]), 'ID_ELEMENTO','NOMBRE'),
    		],
            // 'LOCALIDAD',
	    	/*	[
             'attribute'=>'MUNICIPIO_DELEGACION',
             'content'=>function ($data){
    			$tmModel = Catalogo::findOne(['ID_ELEMENTO'=>$data->MUNICIPIO_DELEGACION ,'CATEGORIA'=>2, 'ACTIVO'=>1]);
    			return isset($tmModel) ? $tmModel-> NOMBRE: $data-> MUNICIPIO_DELEGACION;
    		},
    		'filter'=>ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>2, 'ACTIVO'=>1]), 'ID_ELEMENTO','NOMBRE'),
             ],*/
             'CALLE',
    		'NOMBRE_CONTACTO',
    		'TELEFONO',
    		
            // 'GIRO_PRINCIPAL',
            // 'NUMERO_TRABAJADORES',
            // 'CODIGO_POSTAL',
            // 'FAX',
            // 'CORREO_ELECTRONICO',
            // 'ACTIVO',

            ['class' => 'yii\grid\ActionColumn',
    		'template' => ' {view} ', // Template de los botones. Aqui se indica que botones apareceran y el orden en el que apareceran
    		'buttons' => [
					
					'view' => function ($url, $model, $id) {//Boton Ver
					return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => Yii::t('app', 'Ver')]);
					},
					
					
			],
			'urlCreator' => function ($action, $model, $key, $index) {
				
					
				if ($action === 'view') {
					return Yii::$app->urlManager->createUrl(['/empresa/view-by-instructor', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
						
				}
					
					
			}
        ],
    ]]); ?>

</div>
