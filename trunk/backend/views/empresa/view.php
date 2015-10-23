<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Catalogo;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */
//substr(NOMBRE_RAZON_SOCIAL, $start , 3);
//$this->title =' '.$model->NOMBRE_RAZON_SOCIAL ;

$this->title=''.  substr("$model->NOMBRE_RAZON_SOCIAL", 0,40).'...';

//$this->title = $model->ID_EMPRESA;


$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

//<?= echo substr("abcdef", 0,2).'...';


$entidadFederativa = Catalogo::findOne(['ID_ELEMENTO'=>$model->ENTIDAD_FEDERATIVA,'CATEGORIA'=>1,'ACTIVO'=>1]);
$municipioDelegacion = Catalogo::findOne(['ID_ELEMENTO'=>$model->MUNICIPIO_DELEGACION,'CATEGORIA'=>2,'ACTIVO'=>1]);
//$giroPrincipal = Catalogo::findOne(['ID_ELEMENTO'=>$model->GIRO_PRINCIPAL,'CATEGORIA'=>4,'ACTIVO'=>1]);

$tmp_otroGiro = '';
if ($model->GIRO_PRINCIPAL === 66666){

	$tmp_otroGiro = $model->OTRO_GIRO;

}else {
	// consulta por el catalogo

	$catalogo = Catalogo::findOne(['ID_ELEMENTO'=>$model->GIRO_PRINCIPAL,'CATEGORIA'=>4, 'ACTIVO'=>1]);

	$tmp_otroGiro = isset($catalogo)?$catalogo->NOMBRE : 'no especificado';


}
?>

<div class="empresa-view">

    <div clas="row"> 

  
<div class=" col-xs-12 col-sm-12 col-md-9">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						
						<?= Yii::t('backend', 'Detalles') ?> <small> Empresa</small> </h3>
						
					</div>
					<div class="panel-body">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_EMPRESA',
            'ID_REPRESENTANTE_LEGAL',
            'NOMBRE_RAZON_SOCIAL',
            'RFC',
						[
			'attribute'=>'ESQUEMA_SEGURIDAD_SOCIAL',
			'type'=>'raw',
			'value'=>isset($model->SGS_TIPOS[ $model->ESQUEMA_SEGURIDAD_SOCIAL ])? $model->SGS_TIPOS[$model->ESQUEMA_SEGURIDAD_SOCIAL]: 'no establecido'
					],
            'NSS',
            'CURP',
            'MORAL',
    		[
    		'attribute'=>'GIRO_PRINCIPAL',
    		'type'=>'raw',
    		'value'=> $tmp_otroGiro
    		],
    		'NUMERO_TRABAJADORES',
    		'FECHA_INICIO_OPERACIONES',
    		'ACTIVO',
            'CALLE',
            'NUMERO_EXTERIOR',
            'NUMERO_INTERIOR',
[
'attribute'=>'MUNICIPIO_DELEGACION',
'type'=>'raw',
'value'=>isset($municipioDelegacion) ? $municipioDelegacion->NOMBRE : 'no establecido',
],
            'COLONIA',
            [
		'attribute'=> 'ENTIDAD_FEDERATIVA',
		'type'=>'raw',
		'value'=>isset($entidadFederativa) ? $entidadFederativa->NOMBRE : 'no establecido',
		],
            'LOCALIDAD',	
            'CODIGO_POSTAL',
          'CORREO_ELECTRONICO_EMPRESA',
		                                                                                                 
			'NOMBRE_CONTACTO',
            'NUM_CONTACTO',
            'TELEFONO',
            'CORREO_ELECTRONICO',
        ],
    ]) ?>

</div>
</div>
<p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->ID_EMPRESA], ['class' => 'btn btn-primary']) ?>
         &nbsp;
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ID_EMPRESA], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>

</div>
</div>
