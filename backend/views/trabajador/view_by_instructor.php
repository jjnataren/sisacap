<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Catalogo;
use backend\models\PuestoEmpresa;

/* @var $this yii\web\View */
/* @var $model backend\models\Trabajador */


$this->title = 'Trabajador Id ' . $model->ID_TRABAJADOR;
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-child fa-lg fa-stack-1x"></i>
							   </span>';
$this->params['breadcrumbs'][] = ['label' => 'Trabajadores', 'url' => ['indexcompany']];
$this->params['breadcrumbs'][] = $this->title;

$PUESTO = PuestoEmpresa::findOne(['ID_PUESTO'=>$model->PUESTO,'ACTIVO'=>1]);

$entidadFederativa = Catalogo::findOne(['ID_ELEMENTO'=>$model->ENTIDAD_FEDERATIVA,'CATEGORIA'=>1,'ACTIVO'=>1]);
$NTCL = Catalogo::findOne(['ID_ELEMENTO'=>$model->NTCL,'CATEGORIA'=>7,'ACTIVO'=>1]);

$municipioDelegacion = Catalogo::findOne(['ID_ELEMENTO'=>$model->MUNICIPIO_DELEGACION,'CATEGORIA'=>2,'ACTIVO'=>1]);
//$ocupacion = Catalogo::findOne(['ID_ELEMENTO'=>$model->OCUPACION_ESPECIFICA,'CATEGORIA'=>5,'ACTIVO'=>1]);
$tmp_ocupacionEspecifica = '';


if ($model->OCUPACION_ESPECIFICA === '99999'){

	$tmp_ocupacionEspecifica = $model->OTRO_OCUPACION;

}else {
	// consulta por el catalogo

	$catalogo = Catalogo::findOne(['ID_ELEMENTO'=>$model->OCUPACION_ESPECIFICA,'CATEGORIA'=>5, 'ACTIVO'=>1]);

	$tmp_ocupacionEspecifica = isset($catalogo)?$catalogo->NOMBRE : 'no especificado';


}
?>
<div class="trabajador-view">

   

    
     <div class=" col-xs-12 col-sm-12 col-md-9">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						
						<?= Yii::t('backend', 'Detalles') ?> <small>Trabajador</small> </h3>
						
					</div>
					<div class="panel-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'ID_TRABAJADOR',
           // 'ID_EMPRESA',
           // 'ROL',
            'NOMBRE',
            'APP',
            'APM',
			
    		//SEXO
    		[
    		'attribute'=>'SEXO',
    		'type'=>'raw',
    		'value'=>isset($model->SEX_TIPO[ $model->SEXO])? $model->SEX_TIPO[$model->SEXO]: 'no establecido'
    		
    				],
            'CURP',
            'RFC',
            'NSS',
    		[
    		'attribute'=>'PUESTO',
    		'type'=>'raw',
    		'value'=> isset($PUESTO) ? $PUESTO-> NOMBRE_PUESTO : 'no establecido ',
    		],
    		[
    		'attribute'=>'OCUPACION_ESPECIFICA',
    		'type'=>'raw',
    		'value'=> $tmp_ocupacionEspecifica
    		],
    		[
    		'attribute'=>'GRADO_ESTUDIO',
    		'type'=>'raw',
    		'value'=>isset($model->GRADO_TIPO[ $model->GRADO_ESTUDIO])? $model->GRADO_TIPO[$model->GRADO_ESTUDIO]: 'no establecido'
    		
    				],
    		[
    		'attribute'=>'DOCUMENTO_PROBATORIO',
    		'type'=>'raw',
    		'value'=>isset($model->DOC_TIPO[ $model->DOCUMENTO_PROBATORIO ])? $model->DOC_TIPO[$model->DOCUMENTO_PROBATORIO]: 'no establecido'
    		
    				],
    		[
    		'attribute'=>'INSTITUCION_EDUCATIVA',
    		'type'=>'raw',
    		'value'=>isset($model->INST_TIPO[ $model->INSTITUCION_EDUCATIVA])? $model->INST_TIPO[$model->INSTITUCION_EDUCATIVA]: 'no establecido'
    		
    				],
    		'FECHA_EMISION_CERTIFICADO',
    		[
    		'attribute'=> 'ENTIDAD_FEDERATIVA',
    		'type'=>'raw',
    		'value'=>isset($entidadFederativa) ? $entidadFederativa->NOMBRE : 'no establecido',
    		],
    		//MUNICIPIO
    		[
    		'attribute'=>'MUNICIPIO_DELEGACION',
    		'type'=>'raw',
    		'value'=>isset($municipioDelegacion) ? $municipioDelegacion->NOMBRE : 'no establecido',
    		],
    		//  'DOMICILIO',
    		'LUGAR_RESIDENCIA',
    		
    		'CORREO_ELECTRONICO',
    		'TELEFONO',
    		//DOCUMENTO APROBATORIO 
			
    		
    		//INSTITUCION EDUCATIVA 
			
    		
    		//GRADO DE ESTUDIOS
    		
    		
    	
    		//ntcl
    		
    		
    		
    		//ENTIDAD FEDERATIVA
		
            'CORREO_ELECTRONICO',
            'TELEFONO',
    		[
    		'attribute'=> 'NTCL',
    		'type'=>'raw',
    		'value'=>isset($NTCL) ? $NTCL->NOMBRE : 'no establecido',
    		],
    		
			//'OTRO_OCUPACION',
            'FECHA_AGREGO',
			
            //'ACTIVO',
        ],
    ]) ?>

</div>
</div>
<p>
        
    </p>
</div>
</div>
