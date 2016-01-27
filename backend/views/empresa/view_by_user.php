<?php
use yii\widgets\DetailView;
use backend\models\Catalogo;
use backend\models\Empresa;

$this->title = 'Ver mi empresa';$this->params['subtitle'] = '';

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-building   fa-stack-1x"></i>
							   </span>';
$this->params['breadcrumbs'][] = ['label' => 'Ver empresa'];
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
  <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						<?= Yii::t('backend', 'Detalles') ?> <small>de mi empresa</small> </h3>
					</div>
					<div class="panel-body">
					<div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Datos de la empresa') ?></h3>
                </div>
                <div class="panel-body">

<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
		'ID_EMPRESA',
		//'ID_REPRESENTANTE_LEGAL',
		'NOMBRE_RAZON_SOCIAL',
		'RFC',
		'CURP',
	
		'FECHA_INICIO_OPERACIONES'
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
		'CALLE',
		'NUMERO_EXTERIOR',
		'NUMERO_INTERIOR',
		'COLONIA',

		[
		'attribute'=> 'ENTIDAD_FEDERATIVA',
		'type'=>'raw',
		'value'=>isset($entidadFederativa) ? $entidadFederativa->NOMBRE : 'no establecido',
		],

		[
		'attribute'=>'MUNICIPIO_DELEGACION',
		'type'=>'raw',
		'value'=>isset($municipioDelegacion) ? $municipioDelegacion->NOMBRE : 'no establecido',
		],
		'CODIGO_POSTAL',
		
],
    ]) ?>
    </div>
    </div>
    <br><br>
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
		 'attribute'=>'ESQUEMA_SEGURIDAD_SOCIAL',
		 'type'=>'raw',
		 'value'=>isset($model->SGS_TIPOS[ $model->ESQUEMA_SEGURIDAD_SOCIAL ])? $model->SGS_TIPOS[$model->ESQUEMA_SEGURIDAD_SOCIAL]: 'no establecido'
		],
		'NSS',		
		
		//'MORAL',
		
		//'LOCALIDAD',		
		[
		'attribute'=>'GIRO_PRINCIPAL',
		'type'=>'raw',
		'value'=> $tmp_otroGiro
		],
		//'OTRO_GIRO',
		'NUMERO_TRABAJADORES',
		
		
		],
    ]) ?>
		</div>
		</div>
		</div>
		 <div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Contacto') ?></h3>
                </div>
                <div class="panel-body">
<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
		'NOMBRE_CONTACTO',
		'NUM_CONTACTO',
		'TELEFONO',
		'CORREO_ELECTRONICO',
],
    ]) ?>

</div>
</div>
</div>
</div>

</div>
</div>