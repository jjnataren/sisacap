<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Catalogo;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */
$this->title ='Empresa' .'-' . $model->NOMBRE_RAZON_SOCIAL ;
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-university  fa-stack-1x"></i>
								   </span>';
//$this->title = $model->ID_EMPRESA;
//$this->params['breadcrumbs'][] = ['label' => 'Establecimiento', 'url' => ['indexestablishment']];
//$this->params['breadcrumbs'][] = $this->title;
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

    				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						
						<?= Yii::t('backend', 'Detalles') ?> <small></small> </h3>
						
					</div>
					<div class="panel-body">
       <div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Datos del establecimiento') ?></h3>
                </div>
                <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID_EMPRESA',
            //'ID_REPRESENTANTE_LEGAL',
            'NOMBRE_RAZON_SOCIAL',
         // 'RFC',
			//'CURP',
],
    ]) ?>
    </div>
    </div>
    </div>
    
       <div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Contacto del establecimiento') ?></h3>
                </div>
                <div class="panel-body">  
<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			'NOMBRE_CONTACTO',
			//'NUM_CONTACTO',
			'TELEFONO',
           'CORREO_ELECTRONICO',
            //'ACTIVO',
        ],
    ]) ?>
    <br><br>
</div>
</div>
</div>
      
   <div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Centro de trabajo') ?></h3>
                </div>
                <div class="panel-body">  
<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			'NOMBRE_CENTRO_TRABAJO',
			'NOMBRE_COMERCIAL',	
			[
		'attribute'=>'GIRO_PRINCIPAL',
		'type'=>'raw',
		'value'=>$tmp_otroGiro
		],
			//'OTRO_GIRO',		
		//	[
		// 'attribute'=>'ESQUEMA_SEGURIDAD_SOCIAL',
		// 'type'=>'raw',
		// 'value'=>isset($model->SGS_TIPOS[ $model->ESQUEMA_SEGURIDAD_SOCIAL ])? $model->SGS_TIPOS[$model->ESQUEMA_SEGURIDAD_SOCIAL]: 'no establecido'
	//	],
		//	'NSS',
				
				
			  [
			'attribute'=>'FECHA_INICIO_OPERACIONES',
			'type'=>'html',
			'value'=>isset($model->FECHA_INICIO_OPERACIONES) ? $model->FECHA_INICIO_OPERACIONES : '',
			],
],
    ]) ?>
    </div>
    </div>
    </div>
       <div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Domicilio') ?></h3>
                </div>
                <div class="panel-body">  

<?= DetailView::widget([
		'model' => $model,
		'attributes' => [			          
            //'MORAL',
            'CALLE',
            'NUMERO_EXTERIOR',
            'NUMERO_INTERIOR',
            'COLONIA',
			[
            'attribute'=>'ENTIDAD_FEDERATIVA',
			'type'=>'raw',
			'value'=>isset($entidadFederativa) ? $entidadFederativa->NOMBRE : '<i>no establecido</i>',
			],
            //'LOCALIDAD',            
           [
			'attribute'=>'MUNICIPIO_DELEGACION',
			'type'=>'raw',
			'value'=>isset($municipioDelegacion) ? $municipioDelegacion->NOMBRE : '<i>no establecido</i>',
			],

		[
		'attribute'=>'CODIGO_POSTAL',
		'type'=>'raw',
		'value'=>(null !== $model->CODIGO_POSTAL)?$model->CODIGO_POSTAL : 'no establecido',
		],
         
],
    ]) ?>
</div>
</div>
</div>

</div>
</div>

</div>

