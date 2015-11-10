<?php
use yii\widgets\DetailView;
use backend\models\Catalogo;
use backend\models\Empresa;

$this->title = 'Ver empresa';$this->params['subtitle'] = '';

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

				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						<?= Yii::t('backend', 'Detalles') ?> <small>Empresa</small> </h3>
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
		
		//'ID_REPRESENTANTE_LEGAL',
		'NOMBRE_RAZON_SOCIAL',		
		'NUMERO_TRABAJADORES',
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
