<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Catalogo;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmpresaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-building fa-stack-1x"></i>
							   </span>';


$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    
        <?= Html::a(' <i class="fa fa-building"></i> Crear empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
    		//'ID_EMPRESA',
            'ID_REPRESENTANTE_LEGAL',
            'NOMBRE_RAZON_SOCIAL',
            'RFC',
            'NSS',
            // 'CURP',
            // 'MORAL',
            // 'CALLE',
            // 'NUMERO_EXTERIOR',
            // 'NUMERO_INTERIOR',
            // 'COLONIA',
             [
			'attribute'=>'ENTIDAD_FEDERATIVA',
    		'content'=>function($data){
    			
    			$tmpModel = Catalogo::findOne(['ID_ELEMENTO'=>$data->ENTIDAD_FEDERATIVA,'CATEGORIA'=>1, 'ACTIVO'=>1]);
    			
    			return isset($tmpModel)?$tmpModel->NOMBRE: $data->ENTIDAD_FEDERATIVA;
    			
	    		},
    		'filter'=>ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>1, 'ACTIVO'=>1]), 'ID_ELEMENTO','NOMBRE'),
    		],
            // 'LOCALIDAD',
            // 'TELEFONO',
            [
             'attribute'=>'MUNICIPIO_DELEGACION',
             'content'=>function ($data){
    			$tmModel = Catalogo::findOne(['ID_ELEMENTO'=>$data->MUNICIPIO_DELEGACION ,'CATEGORIA'=>2, 'ACTIVO'=>1]);
    			return isset($tmModel) ? $tmModel-> NOMBRE: $data-> MUNICIPIO_DELEGACION;
    		},
    		'filter'=>ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>2, 'ACTIVO'=>1]), 'ID_ELEMENTO','NOMBRE'),
             ],
             [
             'attribute'=>'GIRO_PRINCIPAL',
             'content'=>function ($data){
             	$tModel = Catalogo::findOne(['ID_ELEMENTO'=>$data->GIRO_PRINCIPAL ,'CATEGORIA'=>4, 'ACTIVO'=>1]);
             	return isset($tModel) ? $tModel-> NOMBRE: $data-> GIRO_PRINCIPAL;
             },
             'filter'=>ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>4, 'ACTIVO'=>1]), 'ID_ELEMENTO','NOMBRE'),
             ],
           
            // 'NUMERO_TRABAJADORES',
            // 'CODIGO_POSTAL',
            // 'FAX',
            // 'CORREO_ELECTRONICO',
            // 'ACTIVO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
